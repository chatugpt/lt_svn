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
//  Original contrib by Vijay Immanuel for osCommerce, converted to zen by dave@open-operations.com - http://www.open-operations.com
//  $Id: links_manager.php 2004-11-19 dave@open-operations.com
//
echo zen_draw_form('submit_link', zen_href_link(FILENAME_LINKS_SUBMIT, '', 'SSL'), 'post', 'onSubmit="return check_form(submit_link);"') . zen_draw_hidden_field('action', 'process'); ?><table border="0" width="100%" cellspacing="0" cellpadding="0">
<table  width="100%" border="0" cellspacing="2" cellpadding="2" class="centerColumn">
      <tr>
        <td class="breadCrumb" colspan="2"><?php echo $breadcrumb->trail(BREAD_CRUMBS_SEPARATOR); ?></td>
      </tr>
      <tr>
    <td class="pageHeading" colspan="2"><h1><?php echo HEADING_TITLE; ?></h1></td>
      </tr>
      <tr>
        <td><?php echo zen_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
<?php
  if ($messageStack->size('submit_link') > 0) {
?>
      <tr>
        <td><?php echo $messageStack->output('submit_link'); ?></td>
      </tr>
      <tr>
        <td><?php echo zen_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
<?php
  }
?>
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
          <tr>
            <td class="plainBoxHeading"><b><?php echo CATEGORY_WEBSITE; ?></b></td>
           <td class="inputRequirement" align="right"><?php echo FORM_REQUIRED_INFORMATION; ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="plainBox">
          <tr class="infoBoxContents">
            <td><table border="0" width="100%" cellspacing="2" cellpadding="2">
              <tr>
                <td class="main" width="25%"><?php echo ENTRY_LINKS_TITLE; ?></td>
                <td class="main"><?php echo zen_draw_input_field('links_title') . '&nbsp;' . (zen_not_null(ENTRY_LINKS_TITLE_TEXT) ? '<span class="inputRequirement">' . ENTRY_LINKS_TITLE_TEXT . '</span>': ''); ?></td>
              </tr>
              <tr>
                <td class="main"><?php echo ENTRY_LINKS_URL; ?></td>
                <td class="main"><?php echo zen_draw_input_field('links_url', 'http://') . '&nbsp;' . (zen_not_null(ENTRY_LINKS_URL_TEXT) ? '<span class="inputRequirement">' . ENTRY_LINKS_URL_TEXT . '</span>': ''); ?></td>
              </tr>
<?php
  //link category drop-down list
  $categories_array = array();
  $categories_values = $db->Execute("select lcd.link_categories_id, lcd.link_categories_name from " . TABLE_LINK_CATEGORIES_DESCRIPTION . " lcd where lcd.language_id = '" . (int)$_SESSION['languages_id'] . "' order by lcd.link_categories_name");
 while (!$categories_values->EOF) {
    $categories_array[] = array('id' => $categories_values->fields['link_categories_name'], 'text' => $categories_values->fields['link_categories_name']);
$categories_values->MoveNext();
  }
  if (isset($HTTP_GET_VARS['lPath'])) {
    $current_categories_id = $HTTP_GET_VARS['lPath'];
    $categories = $db->Execute("select link_categories_name from " . TABLE_LINK_CATEGORIES_DESCRIPTION . " where link_categories_id ='" . (int)$current_categories_id . "' and language_id ='" . (int)$_SESSION['languages_id'] . "'");
    $default_category = $categories->fields['link_categories_name'];
    } else {
      $default_category = '';
    }
?>
              <tr>
                <td class="main"><?php echo ENTRY_LINKS_CATEGORY; ?></td>
                <td class="main">
<?php
    echo zen_draw_pull_down_menu('links_category', $categories_array, $default_category);
    if (zen_not_null(ENTRY_LINKS_CATEGORY_TEXT)) echo '&nbsp;<span class="inputRequirement">' . ENTRY_LINKS_CATEGORY_TEXT;
?>
                </td>
              </tr>
              <tr>
                <td class="main" valign="top"><?php echo ENTRY_LINKS_DESCRIPTION; ?></td>
                <td class="main"><?php echo zen_draw_textarea_field('links_description', 'soft', 25, 5) . '&nbsp;' . (zen_not_null(ENTRY_LINKS_DESCRIPTION_TEXT) ? '<span class="inputRequirement">' . ENTRY_LINKS_DESCRIPTION_TEXT . '</span>': ''); ?></td>
              </tr>
              <tr>
                <td class="main"><?php echo ENTRY_LINKS_IMAGE; ?></td>
                <td class="main"><?php echo zen_draw_input_field('links_image', 'http://') . '&nbsp;' . (zen_not_null(ENTRY_LINKS_IMAGE_TEXT) ? '<span class="inputRequirement">' . ENTRY_LINKS_IMAGE_TEXT . '</span>': ''); ?><?php echo '<a href="javascript:popupWindow(\'' . zen_href_link(FILENAME_POPUP_LINKS_HELP) . '\')">' . TEXT_LINKS_HELP_LINK . '</a>'; ?></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php echo zen_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
      <tr>
        <td class="plainBoxHeading"><b><?php echo CATEGORY_CONTACT; ?></b></td>
      </tr>
      <tr>
        <td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="plainBox">
          <tr class="infoBoxContents">
            <td><table width="100%" border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td class="main" width="25%"><?php echo ENTRY_LINKS_CONTACT_NAME; ?></td>
                <td class="main"><?php echo zen_draw_input_field('links_contact_name', $name) . '&nbsp;' . (zen_not_null(ENTRY_LINKS_CONTACT_NAME_TEXT) ? '<span class="inputRequirement">' . ENTRY_LINKS_CONTACT_NAME_TEXT . '</span>': ''); ?></td>
              </tr>
              <tr>
                <td class="main"><?php echo ENTRY_EMAIL_ADDRESS; ?></td>
                <td class="main"><?php echo zen_draw_input_field('links_contact_email', $email) . '&nbsp;' . (zen_not_null(ENTRY_EMAIL_ADDRESS_TEXT) ? '<span class="inputRequirement">' . ENTRY_EMAIL_ADDRESS_TEXT . '</span>': ''); ?></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php echo zen_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
<?php if (SUBMIT_LINK_REQUIRE_RECIPROCAL == 'true') { ?>
      <tr>
        <td class="plainBoxHeading"><b><?php echo CATEGORY_RECIPROCAL; ?></b></td>
      </tr>
      <tr>
        <td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="plainBox">
          <tr class="infoBoxContents">
            <td><table width="100%" border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td class="main" width="25%"><?php echo ENTRY_LINKS_RECIPROCAL_URL; ?></td>
                <td class="main"><?php echo zen_draw_input_field('links_reciprocal_url', 'http://') . '&nbsp;' . (zen_not_null(ENTRY_LINKS_RECIPROCAL_URL_TEXT) ? '<span class="inputRequirement">' . ENTRY_LINKS_RECIPROCAL_URL_TEXT . '</span>': ''); ?><?php echo '<a href="javascript:popupWindow(\'' . zen_href_link(FILENAME_POPUP_LINKS_HELP) . '\')">' . TEXT_LINKS_HELP_LINK . '</a>'; ?></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php echo zen_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
<?php } ?>
      <tr>
        <td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">
          <tr class="infoBoxContents">
            <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
              <tr>
                <td width="10"><?php echo zen_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
                <td align="right"><?php echo zen_image_submit('button_continue.gif', IMAGE_BUTTON_CONTINUE); ?></td>
                <td width="10"><?php echo zen_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table></form>