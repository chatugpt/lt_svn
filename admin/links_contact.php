<?php
/**
*@Links Manager
*
* @package admin
* @copyright (c)2006-2008 Clyde Jones
* @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
*@version $Id: links_extras_dhtml.php 3/27/2008 Clyde Jones
*/
  require('includes/application_top.php');
  $action = (isset($HTTP_GET_VARS['action']) ? $HTTP_GET_VARS['action'] : '');
  if ( ($action == 'send_email_to_user') && isset($HTTP_POST_VARS['link_partners_email_address']) && !isset($HTTP_POST_VARS['back_x']) ) {
    switch ($HTTP_POST_VARS['link_partners_email_address']) {
      case '***':
        $mail_query = $db->Execute("select distinct links_contact_name, links_contact_email from " . TABLE_LINKS);
        $mail_sent_to = TEXT_ALL_LINK_PARTNERS;
        break;
      default:
        $link_partners_email_address = zen_db_prepare_input($HTTP_POST_VARS['link_partners_email_address']);
        $mail_query = $db->Execute("select links_contact_email, links_contact_name from " . TABLE_LINKS . " where links_contact_email = '" . zen_db_input($link_partners_email_address) . "'");
        $mail_sent_to = $HTTP_POST_VARS['link_partners_email_address'];
        break;
    }

    $from = zen_db_prepare_input($HTTP_POST_VARS['from']);
    $subject = zen_db_prepare_input($HTTP_POST_VARS['subject']);
    $message = zen_db_prepare_input($HTTP_POST_VARS['message']);

    $html_msg['EMAIL_MESSAGE_HTML'] = $message;

    //Let's build a message object using the email class
    //$mimemessage = new email(array('X-Mailer: ForeignAFares'));
    // add the message to the object
    //$mimemessage->add_text($message);
    //$mimemessage->build_message();
	while (!$mail_query->EOF) {
            zen_mail($mail_query->fields['links_contact_name'], $mail_query->fields['links_contact_email'], $subject, $message, STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS, $html_msg);
      //$mimemessage->send( '', $from, $subject);
  $mail_query->MoveNext();
    }
    zen_redirect(zen_href_link(FILENAME_LINKS_CONTACT, 'mail_sent_to=' . urlencode($mail_sent_to)));
  }
  if ( ($action == 'preview') && !isset($HTTP_POST_VARS['link_partners_email_address']) ) {
    $messageStack->add(ERROR_NO_LINK_PARTNER_SELECTED, 'error');
  }
  if (isset($HTTP_GET_VARS['mail_sent_to'])) {
    $messageStack->add(sprintf(NOTICE_EMAIL_SENT_TO, $HTTP_GET_VARS['mail_sent_to']), 'success');
  }
?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo TITLE; ?></title>
<link rel="stylesheet" type="text/css" href="includes/stylesheet.css">
<script type="text/javascript" src="includes/general.js"></script>
<link rel="stylesheet" type="text/css" href="includes/cssjsmenuhover.css" media="all" id="hoverJS">
<script type="text/javascript" src="includes/menu.js"></script>
<script type="text/javascript" src="includes/general.js"></script>
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
  }
  // -->
</script>
</head>
<body onload="init()">

<!-- header //-->
<?php require(DIR_WS_INCLUDES . 'header.php'); ?>
<!-- header_eof //-->
<!-- body_text //-->
    <td width="100%" valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="0">
      <tr>
        <td width="100%"><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="pageHeading"><?php echo HEADING_TITLE; ?></td>
            <td class="pageHeading" align="right"><?php echo zen_draw_separator('pixel_trans.gif', HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT); ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
<?php
  if ( ($action == 'preview') && isset($HTTP_POST_VARS['link_partners_email_address']) ) {
    switch ($HTTP_POST_VARS['link_partners_email_address']) {
      case '***':
        $mail_sent_to = TEXT_ALL_LINK_PARTNERS;
        break;
      default:
        $mail_sent_to = $HTTP_POST_VARS['link_partners_email_address'];
        break;
    }
?>
          <tr><?php echo zen_draw_form('mail', FILENAME_LINKS_CONTACT, 'action=send_email_to_user'); ?>
            <td><table border="0" width="100%" cellpadding="0" cellspacing="2">
              <tr>
                <td><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
              </tr>
              <tr>
                <td class="smallText"><b><?php echo TEXT_LINK_PARTNER; ?></b><br /><?php echo $mail_sent_to; ?></td>
              </tr>
              <tr>
                <td><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
              </tr>
              <tr>
                <td class="smallText"><b><?php echo TEXT_FROM; ?></b><br /><?php echo htmlspecialchars(stripslashes($HTTP_POST_VARS['from'])); ?></td>
              </tr>
              <tr>
                <td><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
              </tr>
              <tr>
                <td class="smallText"><b><?php echo TEXT_SUBJECT; ?></b><br /><?php echo htmlspecialchars(stripslashes($HTTP_POST_VARS['subject'])); ?></td>
              </tr>
              <tr>
                <td><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
              </tr>
              <tr>
                <td class="smallText"><b><?php echo TEXT_MESSAGE; ?></b><br /><?php echo nl2br(htmlspecialchars(stripslashes($HTTP_POST_VARS['message']))); ?></td>
              </tr>
              <tr>
                <td><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
              </tr>
              <tr>
                <td>
<?php
/* Re-Post all POST'ed variables */
    reset($HTTP_POST_VARS);
    while (list($key, $value) = each($HTTP_POST_VARS)) {
      if (!is_array($HTTP_POST_VARS[$key])) {
        echo zen_draw_hidden_field($key, htmlspecialchars(stripslashes($value)));
      }
    }
?>
                <table border="0" width="100%" cellpadding="0" cellspacing="2">
                  <tr>
                    <td><?php echo zen_image_submit('button_back.gif', IMAGE_BACK, 'name="back"'); ?></td>
                    <td align="right"><?php echo '<a href="' . zen_href_link(FILENAME_LINKS_CONTACT) . '">' . zen_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a> ' . zen_image_submit('button_send_mail.gif', IMAGE_SEND_EMAIL); ?></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </form></tr>
<?php
  } else {
?>
          <tr><?php echo zen_draw_form('mail', FILENAME_LINKS_CONTACT, 'action=preview'); ?>
            <td><table border="0" cellpadding="0" cellspacing="2">
              <tr>
                <td colspan="2"><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
              </tr>
<?php
    $link_partners = array();
    $link_partners[] = array('id' => '', 'text' => TEXT_SELECT_LINK_PARTNER);
    $link_partners[] = array('id' => '***', 'text' => TEXT_ALL_LINK_PARTNERS);

    $mail_query = $db->Execute("select distinct links_contact_email, links_contact_name from " . TABLE_LINKS . " order by links_contact_name");
while (!$mail_query->EOF) {
      $link_partners[] = array('id' => $mail_query->fields['links_contact_email'],
                           'text' => $mail_query->fields['links_contact_name'] . ' (' . $mail_query->fields['links_contact_email'] . ')');
 $mail_query->MoveNext();
    }
?>
              <tr>
                <td class="main"><?php echo TEXT_LINK_PARTNER; ?></td>
                <td><?php echo zen_draw_pull_down_menu('link_partners_email_address', $link_partners, (isset($HTTP_GET_VARS['link_partner']) ? $HTTP_GET_VARS['link_partner'] : ''));?></td>
              </tr>
              <tr>
                <td colspan="2"><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
              </tr>
              <tr>
                <td class="main"><?php echo TEXT_FROM; ?></td>
                <td><?php echo zen_draw_input_field('from', EMAIL_FROM); ?></td>
              </tr>
              <tr>
                <td colspan="2"><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
              </tr>
              <tr>
                <td class="main"><?php echo TEXT_SUBJECT; ?></td>
                <td><?php echo zen_draw_input_field('subject'); ?></td>
              </tr>
              <tr>
                <td colspan="2"><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
              </tr>
              <tr>
                <td valign="top" class="main"><?php echo TEXT_MESSAGE; ?></td>
                <td><?php echo zen_draw_textarea_field('message', 'soft', '60', '15'); ?></td>
              </tr>
              <tr>
                <td colspan="2"><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
              </tr>
              <tr>
                <td colspan="2" align="right"><?php echo zen_image_submit('button_send_mail.gif', IMAGE_SEND_EMAIL); ?></td>
              </tr>
            </table></td>
          </form></tr>
<?php
  }
?>
<!-- body_text_eof //-->
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<!-- body_eof //-->

<!-- footer //-->
<?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
<!-- footer_eof //-->
<br />
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>
