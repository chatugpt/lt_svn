<?php
class DSFShipping {
  var $dsf_account_info = array();
  var $dsf_countries_map = array();
  var $dsf_shipping = array();

  function DSFShipping() {
    global $db;
    set_time_limit(90);
    $dsf_account_info_query = "SELECT * FROM `dsf_account_info` WHERE `id`=1 limit 1";
    $dsf_countries_map_query = "SELECT * FROM `dsf_countries_map` WHERE 1";
    $dsf_shipping_query = "SELECT * FROM `dsf_shipping` WHERE `status`=1 order by `sort_index` desc,`dsf_shipping_code`";

    $dsf_account_info_tmp = $db->Execute($dsf_account_info_query);
    $dsf_countries_map_tmp = $db->Execute($dsf_countries_map_query);
    $dsf_shipping_tmp = $db->Execute($dsf_shipping_query);

    //dsf_account_info
    if ($dsf_account_info_tmp->RecordCount() > 0) {
      while (!$dsf_account_info_tmp->EOF) {
        $this->dsf_account_info = $dsf_account_info_tmp->fields;
        $dsf_account_info_tmp->MoveNext();
      }
    } else {
      return ;
    }

    //dsf_countries_map
    if ($dsf_countries_map_tmp->RecordCount() > 0) {
      while (!$dsf_countries_map_tmp->EOF) {
        $this->dsf_countries_map[$dsf_countries_map_tmp->fields['countries_iso_code_2']] = $dsf_countries_map_tmp->fields;
        $dsf_countries_map_tmp->MoveNext();
      }
    }

    //dsf_shipping
    if ($dsf_shipping_tmp->RecordCount() > 0) {
      while (!$dsf_shipping_tmp->EOF) {
        $this->dsf_shipping[$dsf_shipping_tmp->fields['dsf_shipping_code']] = $dsf_shipping_tmp->fields;
        $dsf_shipping_tmp->MoveNext();
      }
    }
  }
  /**
   * calculate shipping fee
   *
   * @param int $countries_id
   * @param double $total_weight
   */
  function calculate($countries_iso_code_2, $total_weight) {
    global $currencies;

    if ($this->dsf_account_info['status'] != "1" || $total_weight <= 0) {
      return array();
    }

    //soap
    $client = new SoapClient($this->dsf_account_info['calculate_wsdl_url'], array('encoding'=>'utf-8'));
    //var_dump($client);
    //error to link
    if (!$client) {
      return array();
    }
    
    //no shippings
    if (count($this->dsf_shipping) <= 0) {
      return array();
    }

    //var_dump($client->__getFunctions());
    //$params = array("in0" => "US", "in1" => "0.9", "in2" => "A0115", "in3" => "61030");
    //$calculateResults = $client->MztExpressFeeService($params);

    $dsf_countries_tmp = $this->dsf_countries_map[$countries_iso_code_2];
    $countries_iso_code_2 = $dsf_countries_tmp['countries_iso_code_2'];
    //var_dump($countries_iso_code_2,$dsf_countries_tmp);
    if (!$countries_iso_code_2) {
      return array();
    }
    
    if (!defined("CONFIG_4PX_SHIPPING_EXCHANGE")) {
    	die("CONFIG_4PX_SHIPPING_EXCHANGE");
    }
    $cny_value = $currencies->get_value("CNY");
    if (!$cny_value) {
    	$cny_value = CONFIG_4PX_SHIPPING_EXCHANGE;
    }

    //Deal with result
    $packetCodesArrayAll = explode(",", $this->dsf_account_info['packet_codes']);
    $packetCodesArray = "";
    $notPacketCodesArray = "";
    $returnData = array();
    foreach ($this->dsf_shipping as $shipping_info) {
      if (in_array($shipping_info['dsf_shipping_code'], $packetCodesArrayAll)) {
        $packetCodesArray[] = $shipping_info['dsf_shipping_code'];
      } else {
        $notPacketCodesArray[] = $shipping_info['dsf_shipping_code'];
      }
    }
    //var_dump($packetCodesArray);
    $packetCodes = @implode(",", $packetCodesArray);
    $notPacketCodes = @implode(",", $notPacketCodesArray);
    //var_dump($packetCodes);

    //get packet shipping
    if (strlen($packetCodes)>3) {
      $params = array("in0" => $countries_iso_code_2, "in1" => ($total_weight)."", "in2" => $packetCodes, "in3" => $this->dsf_account_info['company_id']);
      //var_dump($params);
      $calculateResult = $client->MztExpressFeeService($params);
      //var_dump($calculateResult->out->MztExpressFeeBean);
    }
    if (isset($calculateResult) && count($calculateResult->out->MztExpressFeeBean) > 0) {
      if (is_array($calculateResult->out->MztExpressFeeBean)) {
        foreach ($calculateResult->out->MztExpressFeeBean as $packet_shipping_info) {
          $shipping_displays_name = trim($this->dsf_shipping[$packet_shipping_info->pk_code]['shipping_displays_name'])?$this->dsf_shipping[$packet_shipping_info->pk_code]['shipping_displays_name']:$this->dsf_shipping[$packet_shipping_info->pk_code]['dsf_shipping_name'];
          $price_increase = $this->dsf_shipping[$packet_shipping_info->pk_code]['price_increase'];
          $calculate_total_price = $packet_shipping_info->total_price/$cny_value * $this->dsf_shipping[$packet_shipping_info->pk_code]['price_percentage']/100 + $this->getPrice($price_increase, $_SESSION['currency']);
          //return data
          $shipping_displays_note = $this->dsf_shipping[$packet_shipping_info->pk_code]['shipping_displays_note'];
          if (!trim($shipping_displays_note)) {
          	  $shipping_displays_note = $shipping_displays_name;
          }
          $returnData[] = array('id' => $packet_shipping_info->pk_code,
          'module' => $shipping_displays_name,
          'methods' => array(array('id' => $packet_shipping_info->pk_code,
          'title' => $shipping_displays_note,
          'cost' => $calculate_total_price)));
        }
      } else {
        $shipping_displays_name = trim($this->dsf_shipping[$calculateResult->out->MztExpressFeeBean->pk_code]['shipping_displays_name'])?$this->dsf_shipping[$calculateResult->out->MztExpressFeeBean->pk_code]['shipping_displays_name']:$this->dsf_shipping[$calculateResult->out->MztExpressFeeBean->pk_code]['dsf_shipping_name'];
        $price_increase = $this->dsf_shipping[$calculateResult->out->MztExpressFeeBean->pk_code]['price_increase'];
        $calculate_total_price = $calculateResult->out->MztExpressFeeBean->total_price/$cny_value * $this->dsf_shipping[$calculateResult->out->MztExpressFeeBean->pk_code]['price_percentage']/100 + $this->getPrice($price_increase, $_SESSION['currency']);
        //return data
        $shipping_displays_note = $this->dsf_shipping[$calculateResult->out->MztExpressFeeBean->pk_code]['shipping_displays_note'];
        if (!trim($shipping_displays_note)) {
          $shipping_displays_note = $shipping_displays_name;
        }
        $returnData[] = array('id' => $calculateResult->out->MztExpressFeeBean->pk_code,
        'module' => $shipping_displays_name,
        'methods' => array(array('id' => $calculateResult->out->MztExpressFeeBean->pk_code,
        'title' => $shipping_displays_note,
        'cost' => $calculate_total_price)));
      }
    }
    
    //get other shipping
    if (strlen($notPacketCodes)>3) {
      $params = array("in0" => $countries_iso_code_2, "in1" => ($total_weight)."", "in2" => $notPacketCodes, "in3" => $this->dsf_account_info['company_id']);
      //var_dump($params);
      $calculateResult2 = $client->internatExpressFeeService($params);
    }

    if (isset($calculateResult2) && count($calculateResult2->out->InternatExpressFeeBean) > 0) {
      if (is_array($calculateResult2->out->InternatExpressFeeBean)) {
        foreach ($calculateResult2->out->InternatExpressFeeBean as $packet_shipping_info) {
          $shipping_displays_name = trim($this->dsf_shipping[$packet_shipping_info->pk_code]['shipping_displays_name'])?$this->dsf_shipping[$packet_shipping_info->pk_code]['shipping_displays_name']:$this->dsf_shipping[$packet_shipping_info->pk_code]['dsf_shipping_name'];
          $price_increase = $this->dsf_shipping[$packet_shipping_info->pk_code]['price_increase'];
          $calculate_total_price = $packet_shipping_info->total_price/$cny_value * $this->dsf_shipping[$packet_shipping_info->pk_code]['price_percentage']/100 + $this->getPrice($price_increase, $_SESSION['currency']);
          //return data
          $shipping_displays_note = $this->dsf_shipping[$packet_shipping_info->pk_code]['shipping_displays_note'];
          if (!trim($shipping_displays_note)) {
            $shipping_displays_note = $shipping_displays_name;
          }
          $returnData[] = array('id' => $packet_shipping_info->pk_code,
          'module' => $shipping_displays_name,
          'methods' => array(array('id' => $packet_shipping_info->pk_code,
          'title' => $shipping_displays_note,
          'cost' => $calculate_total_price)));
        }
      } else {
        $shipping_displays_name = trim($this->dsf_shipping[$calculateResult2->out->InternatExpressFeeBean->pk_code]['shipping_displays_name'])?$this->dsf_shipping[$calculateResult2->out->InternatExpressFeeBean->pk_code]['shipping_displays_name']:$this->dsf_shipping[$calculateResult2->out->InternatExpressFeeBean->pk_code]['dsf_shipping_name'];
        $price_increase = $this->dsf_shipping[$calculateResult2->out->InternatExpressFeeBean->pk_code]['price_increase'];
        $calculate_total_price = $calculateResult2->out->InternatExpressFeeBean->total_price/$cny_value * $this->dsf_shipping[$calculateResult2->out->InternatExpressFeeBean->pk_code]['price_percentage']/100 + $this->getPrice($price_increase, $_SESSION['currency']);
        //return data
        $shipping_displays_note = $this->dsf_shipping[$calculateResult2->out->InternatExpressFeeBean->pk_code]['shipping_displays_note'];
        if (!trim($shipping_displays_note)) {
          $shipping_displays_note = $shipping_displays_name;
        }
        $returnData[] = array('id' => $calculateResult2->out->InternatExpressFeeBean->pk_code,
        'module' => $shipping_displays_name,
        'methods' => array(array('id' => $calculateResult2->out->InternatExpressFeeBean->pk_code,
        'title' => $shipping_displays_note,
        'cost' => $calculate_total_price)));
      }
    }

    return $returnData;
  }
  function getCountryInfo($customer_id, $address_id) {
    $address_info = zen_get_address_fields($customer_id, $address_id);
    return zen_get_countries($address_info['country_id'], true);
  }
  function getPrice($price, $currency) {
  	global $db;
  	$cs = $db->Execute("select `value` from " . TABLE_CURRENCIES . " where `code` = '{$currency}'");
  	$c = $cs->fields['value'];
  	$p = $price * $c;
  	return number_format($p, 2, '.', '');
  }
}