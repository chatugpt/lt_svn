<?php
//
// +----------------------------------------------------------------------+
// |zen-cart Open Source E-commerce                                       |
// +----------------------------------------------------------------------+
// | Copyright (c) 2003 The zen-cart developers                           |
// |                                                                      |
// | http://www.zen-cart.com/index.php                                    |
// |                                                                      |
// | Portions Copyright (c) 2003 osCommerce                               |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the GPL license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available through the world-wide-web at the following url:           |
// | http://www.zen-cart.com/license/2_0.txt.                             |
// | If you did not receive a copy of the zen-cart license and are unable |
// | to obtain it through the world-wide-web, please send a note to       |
// | license@zen-cart.com so we can mail you a copy immediately.          |
// +----------------------------------------------------------------------+
// $Id: faq_manager.php 001 2005-03-27 dave@open-operations.com
//
// show the faqs in a given categorie
      if (isset($_GET['filter_id']) && zen_not_null($_GET['filter_id']))
      {
// We are asked to show only specific catgeory
        $listing_sql = "select " . $select_column_list . " p.faqs_id, p.faqs_sort_order from " . TABLE_FAQS . " p, " . TABLE_FAQS_DESCRIPTION . " pd, " . TABLE_FAQS_TO_FAQ_CATEGORIES . " p2c where p.faqs_status = '1' and p.faqs_id = p2c.faqs_id and pd.faqs_id = p2c.faqs_id and pd.language_id = '" . (int)$_SESSION['languages_id'] . "' and p2c.faq_categories_id = '" . (int)$current_faq_category_id . "'";
      } else {
// We show them all
        $listing_sql = "select " . $select_column_list . " p.faqs_id, p.faqs_sort_order from " . TABLE_FAQS_DESCRIPTION . " pd, " . TABLE_FAQS . " p, " . TABLE_FAQS_TO_FAQ_CATEGORIES . " p2c where p.faqs_status = '1' and p.faqs_id = p2c.faqs_id and pd.faqs_id = p2c.faqs_id and pd.language_id = '" . (int)$_SESSION['languages_id'] . "' and p2c.faq_categories_id = '" . (int)$current_faq_category_id . "'";
      }


// set the default sort order setting from the Admin when not defined by customer
    if (!isset($_GET['sort']) and FAQ_LISTING_DEFAULT_SORT_ORDER != '') {
      $_GET['sort'] = FAQ_LISTING_DEFAULT_SORT_ORDER;
    }

    if ( (!isset($_GET['sort'])) || (!ereg('[1-8][ad]', $_GET['sort'])) || (substr($_GET['sort'], 0, 1) > sizeof($column_list)) )
    {
      for ($i=0, $n=sizeof($column_list); $i<$n; $i++)
      {
        if ($column_list[$i] == 'FAQ_LIST_NAME')
        {
          $_GET['sort'] = $i+1 . 'a';
          $listing_sql .= " order by p.faqs_sort_order, pd.faqs_name";
          break;
        } else {
          $listing_sql .= " order by p.faqs_sort_order, pd.faqs_name";
          break;
        }
      }
// if set to nothing use faqs_sort_order and FAQS_LIST_NAME is off
      if (FAQ_LISTING_DEFAULT_SORT_ORDER == '') {
        $_GET['sort'] = '20a';
      }
    } else {
      $sort_col = substr($_GET['sort'], 0 , 1);
      $sort_order = substr($_GET['sort'], 1);
      $listing_sql .= ' order by ';
      switch ($column_list[$sort_col-1])
      {
        case 'FAQ_LIST_MODEL':
          $listing_sql .= "p.faqs_model " . ($sort_order == 'd' ? 'desc' : '') . ", pd.faqs_name";
          break;
        case 'FAQ_LIST_NAME':
          $listing_sql .= "pd.faqs_name " . ($sort_order == 'd' ? 'desc' : '');
          break;
      }
    }
// optional FAQ List Filter
    if (FAQ_LIST_FILTER > 0)
    {
      if (isset($_GET['manufacturers_id']) && $_GET['manufacturers_id'] != '')
      {
        $filterlist_sql = "select distinct c.faq_categories_id as id, cd.faq_categories_name as name from " . TABLE_FAQS . " p, " . TABLE_FAQS_TO_FAQ_CATEGORIES . " p2c, " . TABLE_FAQ_CATEGORIES . " c, " . TABLE_FAQ_CATEGORIES_DESCRIPTION . " cd where p.faqs_status = '1' and p.faqs_id = p2c.faqs_id and p2c.faq_categories_id = c.faq_categories_id and p2c.faq_categories_id = cd.faq_categories_id and cd.language_id = '" . (int)$_SESSION['languages_id'] . "' and p.manufacturers_id = '" . (int)$_GET['manufacturers_id'] . "' order by cd.faq_categories_name";
      } else {
        $filterlist_sql= "select distinct m.manufacturers_id as id, m.manufacturers_name as name from " . TABLE_FAQS . " p, " . TABLE_FAQS_TO_FAQ_CATEGORIES . " p2c, " . TABLE_MANUFACTURERS . " m where p.faqs_status = '1' and p.manufacturers_id = m.manufacturers_id and p.faqs_id = p2c.faqs_id and p2c.faq_categories_id = '" . (int)$current_faq_category_id . "' order by m.manufacturers_name";
      }
      $filterlist = $db->Execute($filterlist_sql);
      if ($filterlist->RecordCount() > 1)
      {
          $do_filter_list = true;
        if (isset($_GET['manufacturers_id']))
        {
          $getoption_set =  true;
          $get_option_variable = 'manufacturers_id';
          $options = array(array('id' => '', 'text' => TEXT_ALL_FAQ_CATEGORIES));
        } else {
          $options = array(array('id' => '', 'text' => TEXT_ALL_MANUFACTURERS));
        }
        while (!$filterlist->EOF) {
          $options[] = array('id' => $filterlist->fields['id'], 'text' => $filterlist->fields['name']);
          $filterlist->MoveNext();
        }
      }
    }

// Get the right image for the top-right
    $image = DIR_WS_TEMPLATE_IMAGES . 'table_background_list.gif';
if ($current_faq_category_id) {
      $sql = "select faq_categories_image from " . TABLE_FAQ_CATEGORIES . "
              where  faq_categories_id = '" . (int)$current_faq_category_id . "'";
      $image_name = $db->Execute($sql);
      $image = $image_name->fields['faq_categories_image'];
    }
?>