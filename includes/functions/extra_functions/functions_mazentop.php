<?php
/**
 * get request mazentop
 *
 */
function mazentop_estimator_get($url, $data) {
	$data['sigkey'] = EXTRA_4PX_SIGKEY;
	if(count($data) > 0) {
		$i = 0;
		foreach ($data as $k => $v) {
			$url .= ($i == 0 ? '?' : '&');
			$url .= ($k . '=' . urlencode($v));
			++$i;
		}
	}
	$return = @file_get_contents($url);
	return $return === false ? array() : json_decode($return, true);
}

/**
 * post request mazentop
 *
 */
function mazentop_estimator_post($url, $data) {
	$data['sigkey'] = EXTRA_4PX_SIGKEY;
	$postdata = http_build_query($data);
	
	$opts = array('http' =>
		array(
			'method'  => 'POST',
			'header'  => 'Content-type: application/x-www-form-urlencoded',
			'content' => $postdata
		)
	);
	
	$context  = stream_context_create($opts);
	
	$return = @file_get_contents($url, false, $context);
	return $return === false ? array() : json_decode($return, true);
}

/**
 * mazentop get country
 *
 */
function mazentop_country_info($customer_id, $address_id) {
	$address_info = zen_get_address_fields($customer_id, $address_id);
	return zen_get_countries($address_info['country_id'], true);
}
?>