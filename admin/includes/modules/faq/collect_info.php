<?php
//
// +----------------------------------------------------------------------+
// |zen-cart Open Source E-commerce                                       |
// +----------------------------------------------------------------------+
// | Copyright (c) 2004 The zen-cart developers                           |
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
//  $Id: collect_info.php 277 2004-09-10 23:03:52Z wilt $
//

    $parameters = array('faqs_contact_name' => '',
						'faqs_contact_mail' => '',
					   'faqs_name' => '',
                       'faqs_description' => '',
                       'faqs_answer' => '',
                       'faqs_url' => '',
                       'faqs_id' => '',
                       'faqs_image' => '',
                       'faqs_date_added' => '',
                       'faqs_last_modified' => '',
                       'faqs_status' => '',
                       'faqs_sort_order' => '0',
                       'master_faq_categories_id' => ''
                       );

    $pInfo = new objectInfo($parameters);

    if (isset($_GET['pID']) && empty($_POST)) {
      $faq = $db->Execute("select pd.faqs_name, pd.faqs_description, pd.faqs_answer, pd.faqs_url, pd.faqs_contact_name, pd.faqs_contact_mail,
                                      p.faqs_id,
                                      p.faqs_image,
                                      p.faqs_date_added, p.faqs_last_modified,
                                      p.faqs_status, 
                                      p.faqs_sort_order,
                                      p.master_faq_categories_id
                              from " . TABLE_FAQS . " p, " . TABLE_FAQS_DESCRIPTION . " pd
                              where p.faqs_id = '" . (int)$_GET['pID'] . "'
                              and p.faqs_id = pd.faqs_id
                              and pd.language_id = '" . (int)$_SESSION['languages_id'] . "'");

      $pInfo->objectInfo($faq->fields);
    } elseif (zen_not_null($_POST)) {
      $pInfo->objectInfo($_POST);
	  $faqs_name = $_POST['faqs_contact_name'];
	  $faqs_contact_name = $_POST['faqs_contact_mail'];
      $faqs_contact_mail = $_POST['faqs_name'];
      $faqs_description = $_POST['faqs_description'];
	  $faqs_answer = $_POST['faqs_answer'];
      $faqs_url = $_POST['faqs_url'];
	  $faqs_notify = $_POST['faqs_notify'];
    }
    $languages = zen_get_languages();
    if (!isset($pInfo->faqs_status)) $pInfo->faqs_status = '1';
    switch ($pInfo->faqs_status) {
      case '0': $in_status = false; $out_status = true; break;
      case '1':
      default: $in_status = true; $out_status = false;
        break;
    }
// set to out of stock if faq_categories_status is off and new faq or existing faqs_status is off
    if (zen_get_faq_categories_status($current_faq_category_id) == '0' and $pInfo->faqs_status != '1') {
      $pInfo->faqs_status = 0;
      $in_status = false;
      $out_status = true;
    }

// set image overwrite
  $on_overwrite = true;
  $off_overwrite = false;
  

?>
<?php
//  echo $type_faq_admin_handler;
echo zen_draw_form('new_faq', $type_faq_admin_handler , 'fcPath=' . $fcPath . (isset($_GET['faq_type']) ? '&faq_type=' . $_GET['faq_type'] : '') . (isset($_GET['pID']) ? '&pID=' . $_GET['pID'] : '') . '&action=new_faq_preview' . (isset($_GET['page']) ? '&page=' . $_GET['page'] : ''), 'post', 'enctype="multipart/form-data"'); ?>

    <table border="0" width="100%" cellspacing="0" cellpadding="2">
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="pageHeading"><?php echo sprintf(TEXT_NEW_FAQ, zen_output_generated_faq_category_path($current_faq_category_id)); ?></td>
            <td class="pageHeading" align="right"><?php echo zen_draw_separator('pixel_trans.gif', HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT); ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr>
        <td class="main" align="right"><?php echo zen_draw_hidden_field('faqs_date_added', (zen_not_null($pInfo->faqs_date_added) ? $pInfo->faqs_date_added : date('Y-m-d'))) . zen_image_submit('button_preview.gif', IMAGE_PREVIEW) . '&nbsp;&nbsp;<a href="' . zen_href_link(FILENAME_FAQ_CATEGORIES, 'fcPath=' . $fcPath . (isset($_GET['pID']) ? '&pID=' . $_GET['pID'] : '') . (isset($_GET['page']) ? '&page=' . $_GET['page'] : '')) . '">' . zen_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>'; ?></td>
      </tr>
      <tr>
        <td><table border="0" cellspacing="0" cellpadding="2">
<?php
// show when faq is linked
if (zen_get_faq_is_linked($_GET['pID']) == 'true') {
?>
          <tr>
            <td class="main"><?php echo TEXT_MASTER_FAQ_CATEGORIES_ID; ?></td>
            <td class="main">
              <?php
                // echo zen_draw_pull_down_menu('faqs_tax_class_id', $tax_class_array, $pInfo->faqs_tax_class_id);
                echo zen_image(DIR_WS_IMAGES . 'icon_yellow_on.gif', IMAGE_ICON_LINKED) . '&nbsp;&nbsp;';
                echo zen_draw_pull_down_menu('master_faq_category', zen_get_master_faq_categories_pulldown($_GET['pID']), $pInfo->master_faq_categories_id); ?>
            </td>
          </tr>
          <tr>
            <td colspan="2" class="main"><?php echo TEXT_INFO_MASTER_FAQ_CATEGORIES_ID; ?></td>
          </tr>
          <tr>
            <td colspan="2"><?php echo zen_draw_separator('pixel_trans.gif', '100%', '2'); ?></td>
          </tr>

<?php } ?>
<?php
// hidden fields not changeable on faqs page
echo zen_draw_hidden_field('master_faq_categories_id', $pInfo->master_faq_categories_id);
?>
          <tr>
            <td colspan="2" class="main" align="center"><?php echo (zen_get_faq_categories_status($current_faq_category_id) == '0' ? TEXT_FAQ_CATEGORIES_STATUS_INFO_OFF : '') . ($out_status == true ? ' ' . TEXT_FAQS_STATUS_INFO_OFF : ''); ?></td>
          <tr>
          <tr>
            <td class="main"><?php echo TEXT_FAQS_STATUS; ?></td>
                        <td class="main"><?php echo zen_draw_separator('pixel_trans.gif', '24', '15') . '&nbsp;' . zen_draw_radio_field('faqs_status', '1', $in_status) . '&nbsp;' . TEXT_FAQ_AVAILABLE . '&nbsp;' . zen_draw_radio_field('faqs_status', '0', $out_status) . '&nbsp;' . TEXT_FAQ_NOT_AVAILABLE; ?></td>
          </tr>
          <tr>
            <td colspan="2"><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
          </tr>
<?php
    for ($i=0, $n=sizeof($languages); $i<$n; $i++) {
?>
          <tr>
            <td class="main"><?php if ($i == 0) echo TEXT_FAQS_NAME; ?></td>
            <td class="main"><?php echo zen_image(DIR_WS_CATALOG_LANGUAGES . $languages[$i]['directory'] . '/images/' . $languages[$i]['image'], $languages[$i]['name']) . '&nbsp;' . zen_draw_input_field('faqs_name[' . $languages[$i]['id'] . ']', (isset($faqs_name[$languages[$i]['id']]) ? stripslashes($faqs_name[$languages[$i]['id']]) : zen_get_faqs_name($pInfo->faqs_id, $languages[$i]['id'])), zen_set_field_length(TABLE_FAQS_DESCRIPTION, 'faqs_name')); ?></td>
          </tr>
<?php
    }
?>

          <tr>
            <td colspan="2"><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
          </tr>
          <tr>
            <td colspan="2"><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
          </tr>
		  
 
<?php
    for ($i=0, $n=sizeof($languages); $i<$n; $i++) {
?>
          <tr>
            <td class="main" valign="top"><?php if ($i == 0) echo TEXT_FAQS_DESCRIPTION; ?></td>
            <td colspan="2"><table border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td class="main" width="25" valign="top"><?php echo zen_image(DIR_WS_CATALOG_LANGUAGES . $languages[$i]['directory'] . '/images/' . $languages[$i]['image'], $languages[$i]['name']); ?>&nbsp;</td>
                <td class="main" width="100%">
        <?php if (is_null(HTML_EDITOR_PREFERENCE)) echo TEXT_HTML_EDITOR_NOT_DEFINED; ?>
<?php if (HTML_EDITOR_PREFERENCE == "FCKEDITOR") {

				require_once(DIR_WS_INCLUDES.'fckeditor.php');
				$oFCKeditor = new FCKeditor('faqs_description[' . $languages[$i]['id']  . ']') ;
                $oFCKeditor->Value = (isset($faqs_description[$languages[$i]['id']])) ? stripslashes($faqs_description[$languages[$i]['id']]) : zen_get_faqs_description($pInfo->faqs_id, $languages[$i]['id']) ;
                $oFCKeditor->Width  = '90%' ;
                $oFCKeditor->Height = '230' ;
//                $oFCKeditor->Config['ToolbarLocation'] = 'Out:xToolbar' ;
//                $oFCKeditor->Create() ;
                $output = $oFCKeditor->CreateHtml() ;
        		echo '<br />' . $output;

          } else { // using HTMLAREA or just raw "source"
          echo zen_draw_textarea_field('faqs_description[' . $languages[$i]['id'] . ']', 'soft', '100%', '20', (isset($faqs_description[$languages[$i]['id']])) ? stripslashes($faqs_description[$languages[$i]['id']]) : zen_get_faqs_description($pInfo->faqs_id, $languages[$i]['id'])); //,'id="'.'faqs_description' . $languages[$i]['id'] . '"');
          } ?>
        </td>
              </tr>
            </table></td>
          </tr>
<?php
    }
?>
          <tr>
            <td colspan="2"><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
          </tr>
          <tr>
            <td class="main"><?php echo TEXT_FAQS_SORT_ORDER; ?></td>
            <td class="main"><?php echo zen_draw_separator('pixel_trans.gif', '24', '15') . '&nbsp;' . zen_draw_input_field('faqs_sort_order', $pInfo->faqs_sort_order); ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr>
        <td class="main" align="right"><?php echo zen_draw_hidden_field('faqs_date_added', (zen_not_null($pInfo->faqs_date_added) ? $pInfo->faqs_date_added : date('Y-m-d'))) . zen_image_submit('button_preview.gif', IMAGE_PREVIEW) . '&nbsp;&nbsp;<a href="' . zen_href_link(FILENAME_FAQ_CATEGORIES, 'fcPath=' . $fcPath . (isset($_GET['pID']) ? '&pID=' . $_GET['pID'] : '') . (isset($_GET['page']) ? '&page=' . $_GET['page'] : '')) . '">' . zen_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>'; ?></td>
      </tr>
    </table></form>
