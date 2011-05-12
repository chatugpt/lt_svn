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
//  $Id: invoice.php 919 2005-01-09 17:02:27Z ajeh $
//

  require('includes/application_top.php');
  $cat_box_link_id = $db->Execute("select configuration_group_id from " . TABLE_CONFIGURATION_GROUP . "
            where configuration_group_title = 'Help Center Manager - Categories Box'");
  $cat_box_link = $cat_box_link_id->fields['configuration_group_id'];

  $page_info_link_id = $db->Execute("select configuration_group_id from " . TABLE_CONFIGURATION_GROUP . "
            where configuration_group_title = 'Help Center Manager - Help Info Page'");
  $page_info_link = $page_info_link_id->fields['configuration_group_id'];

  $page_listing_id = $db->Execute("select configuration_group_id from " . TABLE_CONFIGURATION_GROUP . "
            where configuration_group_title = 'Help Center Manager - Help Listing'");
  $page_listing_link = $page_listing_id->fields['configuration_group_id'];

  $page_all_id = $db->Execute("select configuration_group_id from " . TABLE_CONFIGURATION_GROUP . "
            where configuration_group_title = 'Help Center Manager - All Help Page'");
  $page_all_link = $page_all_id->fields['configuration_group_id'];
  
  $page_new_id = $db->Execute("select configuration_group_id from " . TABLE_CONFIGURATION_GROUP . "
            where configuration_group_title = 'Help Center Manager - New Help Page'");
  $page_new_link = $page_new_id->fields['configuration_group_id'];
  
  $page_misc_id = $db->Execute("select configuration_group_id from " . TABLE_CONFIGURATION_GROUP . "
            where configuration_group_title = 'Help Center Manager - General Config'");
  $page_misc_link = $page_misc_id->fields['configuration_group_id'];


  $links = $db->Execute("select count(*) as count from " . TABLE_FAQS . " where faqs_status = '1'");
  $links_pending = $db->Execute("select count(*) as count from " . TABLE_FAQS . " where faqs_status = '2'");
  $links_off = $db->Execute("select count(*) as count from " . TABLE_FAQS . " where faqs_status = '0'");
  $links_reviews = $db->Execute("select count(*) as count from " . TABLE_FAQ_REVIEWS);

?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo TITLE; ?></title>
<link rel="stylesheet" type="text/css" href="includes/stylesheet.css">
<link rel="stylesheet" type="text/css" href="includes/cssjsmenuhover.css" media="all" id="hoverJS">
<script language="javascript" src="includes/menu.js"></script>
<script language="javascript" src="includes/general.js"></script>
<script type="text/javascript">
  <!--
  function init()
  {
    cssjsmenu('navbar');
    if (document.getElementById)
    {
      var kill = document.getElementById('hoverJS');
      kill.disabled = true;
    }
if (typeof _editor_url == "string") HTMLArea.replaceAll();
 }
 // -->
</script>
<?php if (HTML_EDITOR_PREFERENCE=="FCKEDITOR") include (DIR_WS_INCLUDES.'fckeditor.php'); ?>
<?php if (HTML_EDITOR_PREFERENCE=="HTMLAREA")  include (DIR_WS_INCLUDES.'htmlarea.php'); ?>
</head>
<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0" bgcolor="#FFFFFF" onLoad="init()">
<div id="spiffycalendar" class="text"></div>
<!-- header //-->
<?php require(DIR_WS_INCLUDES . 'header.php'); ?>
<!-- header_eof //-->

<!-- body //-->
<table border="0" width="100%" cellspacing="0" cellpadding="2">
  <tr>
    <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
	  <tr>
	    <td colspan="2"><?php echo zen_draw_separator('pixel_trans.gif', '1', '20'); ?></td>
      </tr>
      <tr>
        <td class="pageHeading" align="left">&nbsp;<?php echo OPEN_OPERATIONS_FAQ_MANAGER; ?></td>
        <td class="pageHeading" align="right"><?php echo '<a href="' . zen_href_link(FILENAME_FAQ_MANAGER) . '">' . zen_image(DIR_WS_ICONS . 'faq_manager_home.gif', TABLE_HEADING_FAQ_MANAGER_CONFIGURATION). '</a>' ; ?></td>
      </tr>
	  <tr>
	    <td colspan="2"><?php echo zen_draw_separator('pixel_trans.gif', '1', '20'); ?></td>
      </tr>
	  <tr>
        <td colspan="2"><?php echo zen_draw_separator(); ?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
	  <tr>
	    <td colspan="3"><?php echo zen_draw_separator('pixel_trans.gif', '1', '20'); ?></td>
      </tr>
      <tr>
        <?php //echo '<a href="' . zen_href_link(FILENAME_FAQ_CONFIGURATION, 'gID=' . $cat_box_link) . '">' . zen_image(DIR_WS_ICONS . 'faq_manager_sidebox_config.gif') . '<br>' . TEXT_FAQ_CAT_BOX . '</a>'; ?>
        <td align="center"><?php echo '<a href="' . zen_href_link(FILENAME_FAQ_CATEGORIES) . '">' . zen_image(DIR_WS_ICONS . 'faq_manager_links_categories.gif') . '<br>' . TEXT_FAQ_FAQ_CATEGORIES . '</a>'; ?></td>

        <td align="center" width="33%"><?php echo '<a href="' . zen_href_link(FILENAME_FAQ_CONFIGURATION, 'gID=' . $page_listing_link) . '">' . zen_image(DIR_WS_ICONS . 'faq_manager_links_listing_config.gif') . '<br>' . TEXT_FAQ_LISTING_CONFIG . '</a>'; ?></td>
        <td align="center"  width="33%"><?php echo '<a href="' . zen_href_link(FILENAME_FAQ_CONFIGURATION, 'gID=' . $page_all_link) . '">' . zen_image(DIR_WS_ICONS . 'faq_manager_all_links_page_config.gif') . '<br>' . TEXT_FAQ_ALL_CONFIG . '</a>'; ?></td>
      </tr>
  	  <tr>
  	    <td colspan="3"><?php echo zen_draw_separator('pixel_trans.gif', '1', '20'); ?></td>
      </tr>
      <tr>
        <td align="center"><?php echo '<a href="' . zen_href_link(FILENAME_FAQ_CONFIGURATION, 'gID=' . $page_new_link) . '">' . zen_image(DIR_WS_ICONS . 'faq_manager_new_links_page_config.gif') . '<br>' . TEXT_FAQ_NEW_CONFIG . '</a>'; ?></td>
        <td align="center"><?php echo '<a href="' . zen_href_link(FILENAME_FAQ_CONFIGURATION, 'gID=' . $page_misc_link) . '">' . zen_image(DIR_WS_ICONS . 'faq_manager_general_config.gif') . '<br>' . TEXT_FAQ_MISC_CONFIG . '</a>'; ?></td>
        <td align="center" width="33%"><?php echo '<a href="' . zen_href_link(FILENAME_FAQ_CONFIGURATION, 'gID=' . $page_info_link) . '">' . zen_image(DIR_WS_ICONS . 'faq_manager_links_info_page_config.gif') . '<br>' . TEXT_FAQ_PAGE_INFO . '</a>'; ?></td>
      </tr>
	    <tr>
	      <td colspan="3"><?php echo zen_draw_separator('pixel_trans.gif', '1', '20'); ?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
	  <tr>
	    <td><?php echo zen_draw_separator('pixel_trans.gif', '1', '20'); ?></td>
      </tr>
      <tr>
        <td align="center" class="smallText"><?php echo ACTIVE_FAQ_COUNT . '&nbsp;' . $links->fields['count']; ?></td>
  	  </tr>
	        <tr>
        <td align="center" class="smallText"><?php echo PENDING_FAQ_COUNT . '&nbsp;' . $links_pending->fields['count']; ?></td>
      </tr>
      <tr>
	      <td align="center" class="smallText"><?php echo DISABLED_FAQ_COUNT . '&nbsp;' . $links_off->fields['count']; ?></td>
      </tr>
      <tr>
	      <td align="center" class="smallText"><?php echo REVIEWS_FAQ_COUNT . '&nbsp;' . $links_reviews->fields['count']; ?></td>
      </tr>
	    <tr>
	      <td><?php echo zen_draw_separator('pixel_trans.gif', '1', '20'); ?></td>
      <tr>
    </table></td>
  </tr>
</table>
<!-- body_text_eof //-->

<br>
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>
