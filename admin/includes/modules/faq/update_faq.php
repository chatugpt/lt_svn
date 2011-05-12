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
//  $Id: update_faq.php 290 2004-09-15 19:48:26Z wilt $
//
        if (isset($_POST['edit_x']) || isset($_POST['edit_y'])) {
          $action = 'new_faq';
        } else {
          if (isset($_GET['pID'])) $faqs_id = zen_db_prepare_input($_GET['pID']);
          $sql_data_array = array('faqs_type' => zen_db_prepare_input($_GET['faq_type']),
                                  'faqs_status' => zen_db_prepare_input($_POST['faqs_status']),
                                  'faqs_sort_order' => zen_db_prepare_input($_POST['faqs_sort_order']),
                                  );

// when set to none remove from database
          if (isset($_POST['faqs_image']) && zen_not_null($_POST['faqs_image']) && ($_POST['faqs_image'] != 'none')) {
            $sql_data_array['faqs_image'] = zen_db_prepare_input($_POST['faqs_image']);
            $new_image= 'true';
          } else {
            $sql_data_array['faqs_image'] = '';
            $new_image= 'false';
          }

          if ($action == 'insert_faq') {
            $insert_sql_data = array( 'faqs_date_added' => 'now()',
                                      'master_faq_categories_id' => (int)$current_faq_category_id);

            $sql_data_array = array_merge($sql_data_array, $insert_sql_data);

            zen_db_perform(TABLE_FAQS, $sql_data_array);
            $faqs_id = zen_db_insert_id();

            $db->Execute("insert into " . TABLE_FAQS_TO_FAQ_CATEGORIES . "
                                      (faqs_id, faq_categories_id)
                          values ('" . (int)$faqs_id . "', '" . (int)$current_faq_category_id . "')");
          } elseif ($action == 'update_faq') {
            $update_sql_data = array( 'faqs_last_modified' => 'now()',
                                      'master_faq_categories_id' => ($_POST['master_faq_category'] > 0 ? zen_db_prepare_input($_POST['master_faq_category']) : zen_db_prepare_input($_POST['master_faq_categories_id'])));

            $sql_data_array = array_merge($sql_data_array, $update_sql_data);

            zen_db_perform(TABLE_FAQS, $sql_data_array, 'update', "faqs_id = '" . (int)$faqs_id . "'");


          }

          $languages = zen_get_languages();
          for ($i=0, $n=sizeof($languages); $i<$n; $i++) {
            $language_id = $languages[$i]['id'];

            $sql_data_array = array('faqs_name' => zen_db_prepare_input($_POST['faqs_name'][$language_id]),
									'faqs_contact_name' => zen_db_prepare_input($_POST['faqs_contact_name'][$language_id]),
									'faqs_contact_mail' => zen_db_prepare_input($_POST['faqs_contact_mail'][$language_id]),
                                    'faqs_description' => zen_db_prepare_input($_POST['faqs_description'][$language_id]),
									'faqs_answer' => zen_db_prepare_input($_POST['faqs_answer'][$language_id]),
                                    'faqs_url' => zen_db_prepare_input($_POST['faqs_url'][$language_id]));

            if ($action == 'insert_faq') {
              $insert_sql_data = array('faqs_id' => $faqs_id,
                                       'language_id' => $language_id);

              $sql_data_array = array_merge($sql_data_array, $insert_sql_data);

              zen_db_perform(TABLE_FAQS_DESCRIPTION, $sql_data_array);
            } elseif ($action == 'update_faq') {
              zen_db_perform(TABLE_FAQS_DESCRIPTION, $sql_data_array, 'update', "faqs_id = '" . (int)$faqs_id . "' and language_id = '" . (int)$language_id . "'");
            }
          }

// future image handler code
          if ($new_image == 'true' and IMAGE_MANAGER_HANDLER >= 1) {
define('IMAGE_MANAGER_HANDLER', 0);
define('DIR_IMAGEMAGICK', '');
            $src= DIR_FS_CATALOG . DIR_WS_IMAGES . zen_get_faqs_image((int)$faqs_id);
            $filename_small= $src;
            preg_match("/.*\/(.*)\.(\w*)$/", $src, $fname);
            list($oiwidth, $oiheight, $oitype) = getimagesize($src);

            $small_width= SMALL_IMAGE_WIDTH;
            $small_height= SMALL_IMAGE_HEIGHT;
            $medium_width= MEDIUM_IMAGE_WIDTH;
            $medium_height= MEDIUM_IMAGE_HEIGHT;
            $large_width= LARGE_IMAGE_WIDTH;
            $large_height= LARGE_IMAGE_HEIGHT;

            $k = max($oiheight / $small_height, $oiwidth / $small_width); //use smallest size
            $small_width = round($oiwidth / $k);
            $small_height = round($oiheight / $k);

            $k = max($oiheight / $medium_height, $oiwidth / $medium_width); //use smallest size
            $medium_width = round($oiwidth / $k);
            $medium_height = round($oiheight / $k);

            $large_width= $oiwidth;
            $large_height= $oiheight;

            $faqs_image = zen_get_faqs_image((int)$faqs_id);
            $faqs_image_extention = substr($faqs_image, strrpos($faqs_image, '.'));
            $faqs_image_base = ereg_replace($faqs_image_extention, '', $faqs_image);

            $filename_medium = DIR_FS_CATALOG . DIR_WS_IMAGES . 'medium/' . $faqs_image_base . IMAGE_SUFFIX_MEDIUM . '.' . $fname[2];
            $filename_large = DIR_FS_CATALOG . DIR_WS_IMAGES . 'large/' . $faqs_image_base . IMAGE_SUFFIX_LARGE . '.' . $fname[2];

// ImageMagick
            if (IMAGE_MANAGER_HANDLER == '1') {
              copy($src, $filename_large);
              copy($src, $filename_medium);
              exec(DIR_IMAGEMAGICK . "mogrify -geometry " . $large_width . " " . $filename_large);
              exec(DIR_IMAGEMAGICK . "mogrify -geometry " . $medium_width . " " . $filename_medium);
              exec(DIR_IMAGEMAGICK . "mogrify -geometry " . $small_width . " " . $filename_small);
            }
          }

          zen_redirect(zen_href_link(FILENAME_FAQ_CATEGORIES, 'fcPath=' . $fcPath . '&pID=' . $faqs_id . (isset($_GET['page']) ? '&page=' . $_GET['page'] : '')));
        }
?>