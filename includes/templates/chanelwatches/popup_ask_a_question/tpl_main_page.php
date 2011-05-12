<?php
/**
 * Override Template for common/tpl_main_page.php
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_main_page.php 2870 2006-01-21 21:36:02Z birdbrain $
 */
?>
<body id="popupSearchHelp" onLoad="resize();">
<div id="popup_ask_a_question" class="pad_10px">
<?php echo zen_draw_form('ask_a_question', zen_href_link(FILENAME_POPUP_ASK_A_QUESTION, 'action=send&products_id=' . $_GET['products_id']),'post','onsubmit="return(fmChk(this))"'); ?>
<h2 class="border_b line_30px"><a class="fr font_normal" target="_blank" href="<?php echo zen_href_link(FILENAME_FAQS,'','SSL'); ?>"><?php echo zen_image($template->get_template_dir('help.gif', DIR_WS_TEMPLATE, $current_page_base,'images/button'). '/help.gif') ?></a><?php echo HEADING_TITLE .' - '. $product_info->fields['products_name']; ?></h2>


<?php
  if (isset($_GET['action']) && ($_GET['action'] == 'success')) {
?>
<div class="success_box"><?php echo TEXT_SUCCESS; ?></div>

<div class="g_t_c pad_10px"><a href=javascript:window.opener=null;window.close()>Close</a></div>

<?php
  } else {
?>

<?php echo '<a href="' . zen_href_link(zen_get_info_page($_GET['products_id']), 'products_id=' . $_GET['products_id']) . '" class="fr margin_t">' . zen_image(DIR_WS_IMAGES . $product_info->fields['products_image'], $product_info->fields['products_name'], 85, 85) . '</a>'; ?>
<div id="contactUsNoticeContent" class="content">
<?php
/**
 * require html_define for the contact_us page.  
 */
  require($define_page);
?>
</div>

<?php if ($messageStack->size('contact') > 0) echo $messageStack->output('contact'); ?>

<fieldset class="pad_10px margin_t dark_border" style="width:400px;">
<legend><b><?php echo FORM_TITLE; ?></b></legend>
<div class="alert"><?php echo FORM_REQUIRED_INFORMATION; ?></div>
<br class="clear" />

<?php
// show dropdown if set
    if (CONTACT_US_LIST !=''){
?>
<label class="inputLabel" for="send-to"><?php echo SEND_TO_TEXT. '<span class="red">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?></label>
<?php echo '<br/>'.zen_draw_pull_down_menu('send_to',  $send_to_array, 'id=\"send-to\"') ; ?>
<br class="clear" />
<?php
    }
?>

<label class="inputLabel" for="contactname"><?php echo ENTRY_NAME . '<span class="red">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?></label>
<?php echo '<br/>'.zen_draw_input_field('contactname', $name, ' size="40" id="contactname" class="input_box" chkname="Your Name" chkrule="nnull"'); ?>
<br class="clear" />

<label class="inputLabel" for="email-address"><?php echo ENTRY_EMAIL. '<span class="red">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?></label>
<?php echo '<br/>'.zen_draw_input_field('email', ($error ? $_POST['email'] : $email), ' size="40" id="email-address" class="input_box" chkname="Email" chkrule="nnull/eml"') ; ?>
<br class="clear" />

<label for="enquiry"><?php echo ENTRY_ENQUIRY . '<span class="red">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?></label>
<?php echo '<br/>'.zen_draw_textarea_field('enquiry', '30', '7', '', 'id="enquiry" class="textarea1" chkname="review" chkrule="nnull/max1000"'); ?>

</fieldset>
<div class="pad_10px fl g_t_r" style="width:400px;"><?php echo zen_image_submit(BUTTON_IMAGE_SEND, BUTTON_SEND_ALT); ?></div>
<?php
  }
?>
</form>
</div>
</body>