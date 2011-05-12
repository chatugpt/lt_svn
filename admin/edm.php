<?php
require('includes/application_top.php');

/**
* 初始化phpmailer设置
*/
function wl_init_mail($charset, $host, $port, $ssl, $user, $pass, $from, $fromname, $altbody) {
	global $mailer;
	$mailer = new PHPMailer();
	$mailer->CharSet = $charset;
	$mailer->Mailer = 'smtp';
	if($ssl) {
		$mailer->SMTPSecure = 'ssl';
	}
	$mailer->SMTPAuth = true; //打开验证就能发送邮件
	$mailer->Host = $host;
	$mailer->Port = $port;
	$mailer->Username = $user;
	$mailer->Password = $pass;
	$mailer->From = $from;
	$mailer->FromName = $fromname;
	$mailer->AltBody = $altbody;
}

/**
* 发送电子邮件
*/
function wl_mail($to, $subject, $body, $html = false) {
	global $mailer;
	$mailer->IsHTML($html); //设置是否是html
	$mailer->Subject = $subject; //设置主题
	$mailer->Body = $body; //设置主体
	$mailer->ClearAddresses(); //清理邮件列表，防止发送多封邮件
	$mailer->AddAddress($to); //添加目的地
	return $mailer->Send(); //发送
}

/**
 * 解析出邮件地址，及用户名
 */
function wl_mail_parse($mails_str, $seperate) {
	$mails_str = trim($mails_str, ';');
	$items = explode($seperate, $mails_str);
	$return = array();
	foreach ($items as $item) {
		if(strpos($item, ',') === false) {
			$email['name'] = '';
			$email['email'] = trim($item);
		} else {
			$arr = explode(',', $item);
			$email['name'] = trim($arr[0]);
			$email['email'] = trim($arr[1]);
		}
		$return[] = $email;
	}
	return $return;
}

//DEBUG:  // these defines will become configuration switches in ADMIN in a future version.
//DEBUG:  // right now, attachments aren't working right unless only sending HTML messages with NO text-only version supplied.
if (!defined('EMAIL_ATTACHMENTS_ENABLED'))        define('EMAIL_ATTACHMENTS_ENABLED',false);
if (!defined('EMAIL_ATTACHMENT_UPLOADS_ENABLED')) define('EMAIL_ATTACHMENT_UPLOADS_ENABLED',false);


$action = (isset($_GET['action']) ? $_GET['action'] : '');

if ($action == 'set_editor') {
	// Reset will be done by init_html_editor.php. Now we simply redirect to refresh page properly.
	$action='';
	zen_redirect(zen_href_link(FILENAME_EDM));
}

if ( ($action == 'send_email_to_user') && isset($_POST['customers_email_address']) && !isset($_POST['back_x']) ) {
	//实现关闭浏览器后台发送
	ignore_user_abort(true);
	set_time_limit(0); //设置不超时
	$customers_email_address = zen_db_prepare_input($_POST['customers_email_address']);
	$seperate = zen_db_prepare_input($_POST['seperate']);
	$host = zen_db_prepare_input($_POST['host']);
	$port = zen_db_prepare_input($_POST['port']);
	$ssl = $_POST['ssl'] == '1' ? true : false;
	$user = zen_db_prepare_input($_POST['user']);
	$pass = zen_db_prepare_input($_POST['pass']);
	$span = (int)zen_db_prepare_input($_POST['span']);
	$from = zen_db_prepare_input($_POST['from']);
	$fromname = zen_db_prepare_input($_POST['fromname']);
	$subject = zen_db_prepare_input($_POST['subject']);
	$message_html = zen_db_prepare_input($_POST['message_html']);
	$message = zen_db_prepare_input($_POST['message']);
	if($message_html != '') {
		$html = true;
		$message = $message_html;
	} else {
		$html = false;
	}
	
	$mails = wl_mail_parse($customers_email_address, $seperate);
	if(count($mails) > EDM_MAX_EMAILS) {
		$messageStack->add_session(sprintf(ERROR_EDM_TOOMUCH, EDM_MAX_EMAILS), 'caution');
		zen_redirect(zen_href_link(FILENAME_EDM));
	}
	// demo active test
	if (zen_admin_demo()) {
		$_GET['action']= '';
		$messageStack->add_session(ERROR_ADMIN_DEMO, 'caution');
		zen_redirect(zen_href_link(FILENAME_EDM));
	}
	
	//send message using the zen email function
	//echo'EOF-attachments_list='.$attachment_file.'->'.$attachment_filetype;
	$recip_count=0;
	//print_r($mail->fields);   caizhouqing update
	//初始化邮件
	wl_init_mail('UTF-8', $host, $port, $ssl, $user, $pass, $from, $fromname, '');
	foreach ($mails as $mail) {
		//发送邮件
		$subject1 = str_replace('#name', $mail['name'], $subject);
		$message1 = str_replace('#name', $mail['name'], $message);
		wl_mail($mail['email'], $subject1, $message1, $html);
		if($span != 0) sleep($span);
		$recip_count++;
	}
	if ($recip_count > 0) {
		$messageStack->add_session(sprintf(NOTICE_EMAIL_SENT_TO, $mail_sent_to .  ' (' . $recip_count . ')'), 'success');
	} else {
		$messageStack->add_session(sprintf(NOTICE_EMAIL_FAILED_SEND, $mail_sent_to .  ' (' . $recip_count . ')'), 'error');  
	}
	zen_redirect(zen_href_link(FILENAME_EDM));
}

if ( EMAIL_ATTACHMENTS_ENABLED && $action == 'preview') {
	// PROCESS UPLOAD ATTACHMENTS
	if (isset($_FILES['upload_file']) && zen_not_null($_FILES['upload_file']) && ($_POST['upload_file'] != 'none')) {
		if ($attachments_obj = new upload('upload_file')) {
			$attachments_obj->set_destination(DIR_WS_ADMIN_ATTACHMENTS . $_POST['attach_dir']);
			if ($attachments_obj->parse() && $attachments_obj->save()) {
				$attachment_file = $_POST['attach_dir'] . $attachments_obj->filename;
				$attachment_fname = $attachments_obj->filename;
				$attachment_filetype= $_FILES['upload_file']['type'];
			}
		}
	}
	
	//DEBUG:
	//$messageStack->add('EOF-attachments_list='.$attachment_file.'->'.$attachment_filetype, 'caution');
} //end attachments upload

// error detection
if ($action == 'preview') {
	if (!isset($_POST['customers_email_address']) ) {
		$messageStack->add(ERROR_NO_CUSTOMER_SELECTED, 'error');
	}
	
	if ( !$_POST['subject'] ) {
		$messageStack->add(ERROR_NO_SUBJECT, 'error');
	}
	
	if ( !$_POST['message'] && !$_POST['message_html'] ) {
		$messageStack->add(ENTRY_NOTHING_TO_SEND, 'error');
	}
}

?>

<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo TITLE; ?></title>
<link rel="stylesheet" type="text/css" href="includes/stylesheet.css">
<link rel="stylesheet" type="text/css" href="includes/cssjsmenuhover.css" media="all" id="hoverJS">
<script language="javascript" src="includes/menu.js"></script>
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
  if (typeof _editor_url == "string") HTMLArea.replace('message_html');
}
// -->
</script>
<?php if ($editor_handler != '') include ($editor_handler); ?>
<script language="javascript" type="text/javascript"><!--
var form = "";
var submitted = false;
var error = false;
var error_message = "";

function check_select(field_name, field_default, message) {
  if (form.elements[field_name] && (form.elements[field_name].type != "hidden")) {
    var field_value = form.elements[field_name].value;

    if (field_value == field_default) {
      error_message = error_message + "* " + message + "\n";
      error = true;
    }
  }
}
function check_message(msg) {
  if (form.elements['message'] && form.elements['message_html']) {
    var field_value1 = form.elements['message'].value;
    var field_value2 = form.elements['message_html'].value;

    if ((field_value1 == '' || field_value1.length < 3) && (field_value2 == '' || field_value2.length < 3)) {
      error_message = error_message + "* " + msg + "\n";
      error = true;
    }
  }
}
function check_input(field_name, field_size, message) {
  if (form.elements[field_name] && (form.elements[field_name].type != "hidden")) {
    var field_value = form.elements[field_name].value;

    if (field_value == '' || field_value.length < field_size) {
      error_message = error_message + "* " + message + "\n";
      error = true;
    }
  }
}
function check_attachments(message) {
  if (form.elements['upload_file'] && (form.elements['upload_file'].type != "hidden") && form.elements['attachment_file'] && (form.elements['attachment_file'].type != "hidden")) {
    var field_value_upload = form.elements['upload_file'].value;
    var field_value_file = form.elements['attachment_file'].value;

    if (field_value_upload != '' && field_value_file != '') {
      error_message = error_message + "* " + message + "\n";
      error = true;
    }
  }
}
function check_form(form_name) {
  if (submitted == true) {
    alert("<?php echo JS_ERROR_SUBMITTED; ?>");
    return false;
  }
  error = false;
  form = form_name;
  error_message = "<?php echo JS_ERROR; ?>";

  check_select("customers_email_address", "", "<?php echo ERROR_NO_CUSTOMER_SELECTED; ?>");
  check_input('subject','',"<?php echo ERROR_NO_SUBJECT; ?>");
  //  check_message("<?php echo ENTRY_NOTHING_TO_SEND; ?>");
  check_attachments("<?php echo ERROR_ATTACHMENTS; ?>");

  if (error == true) {
    alert(error_message);
    return false;
  } else {
    submitted = true;
    return true;
  }
}
//-->
</script>
</head>
<body onLoad="init()">
<!-- header //-->
<?php require(DIR_WS_INCLUDES . 'header.php'); ?>
<!-- header_eof //-->

<!-- body //-->
<table border="0" width="100%" cellspacing="2" cellpadding="2">
  <tr>
    <!-- body_text //-->
    <td width="100%" valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="0">
      <tr>
      <td width="100%"><table border="0" width="100%" cellspacing="0" cellpadding="0">
        <tr>
        <td class="pageHeading"><?php echo HEADING_TITLE; ?></td>
        <td class="pageHeading" align="right"><?php echo zen_draw_separator('pixel_trans.gif', HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT); ?></td>
        <td class="main">
<?php
  // toggle switch for editor
  echo TEXT_EDITOR_INFO . zen_draw_form('set_editor_form', FILENAME_EDM, '', 'get') . '&nbsp;&nbsp;' . zen_draw_pull_down_menu('reset_editor', $editors_pulldown, $current_editor_key, 'onChange="this.form.submit();"') .
  zen_hide_session_id() .
  zen_draw_hidden_field('action', 'set_editor') .
  '</form>';
?>
        </td>
      </tr>
      </table></td>
    </tr>
    <tr>
      <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
<?php
  if ( ($action == 'preview') && isset($_POST['customers_email_address']) ) {
    //$audience_select = get_audience_sql_query(zen_db_input($_POST['customers_email_address']));
    //$mail_sent_to = $audience_select['query_name'];
?>
        <tr>
          <td><table border="0" width="100%" cellpadding="0" cellspacing="2">
            <tr>
              <td class="smallText"><b><?php echo TEXT_CUSTOMER; ?></b>&nbsp;&nbsp;&nbsp;<?php echo htmlspecialchars(stripslashes($_POST['customers_email_address'])); ?></td>
            </tr>
            <tr>
              <td class="smallText"><b><?php echo TEXT_SEPERATE; ?></b>&nbsp;&nbsp;&nbsp;<?php echo htmlspecialchars(stripslashes($_POST['seperate'])); ?></td>
            </tr>
            <tr>
              <td class="smallText"><b><?php echo TEXT_HOST; ?></b>&nbsp;&nbsp;&nbsp;<?php echo htmlspecialchars(stripslashes($_POST['host'])); ?></td>
            </tr>
            <tr>
              <td class="smallText"><b><?php echo TEXT_PORT; ?></b>&nbsp;&nbsp;&nbsp;<?php echo htmlspecialchars(stripslashes($_POST['port'])); ?></td>
            </tr>
            <tr>
              <td class="smallText"><b><?php echo TEXT_SSL; ?></b>&nbsp;&nbsp;&nbsp;<?php echo $_POST['ssl'] == '1' ? 'true' : 'false'; ?></td>
            </tr>
            <tr>
              <td class="smallText"><b><?php echo TEXT_USER; ?></b>&nbsp;&nbsp;&nbsp;<?php echo htmlspecialchars(stripslashes($_POST['user'])); ?></td>
            </tr>
            <tr>
              <td class="smallText"><b><?php echo TEXT_PASS; ?></b>&nbsp;&nbsp;&nbsp;<?php echo htmlspecialchars(stripslashes($_POST['pass'])); ?></td>
            </tr>
            <tr>
              <td class="smallText"><b><?php echo TEXT_SPAN; ?></b>&nbsp;&nbsp;&nbsp;<?php echo (int)$_POST['span']; //htmlspecialchars(stripslashes($_POST['pass'])) ?></td>
            </tr>
            <tr>
              <td class="smallText"><b><?php echo TEXT_FROM; ?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo htmlspecialchars(stripslashes($_POST['from'])); ?></td>
            </tr>
            <tr>
              <td class="smallText"><b><?php echo TEXT_FROMNAME; ?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo htmlspecialchars(stripslashes($_POST['fromname'])); ?></td>
            </tr>
            <tr>
              <td class="smallText"><b><?php echo TEXT_SUBJECT; ?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo htmlspecialchars(stripslashes($_POST['subject'])); ?></td>
            </tr>
            <tr>
              <td class="smallText"><b><hr /><?php echo strip_tags(TEXT_MESSAGE_HTML); ?></b></td>
            </tr>
            <tr>
              <td width="500">
<?php if (EMAIL_USE_HTML != 'true') echo TEXT_WARNING_HTML_DISABLED.'<br />'; ?>
<?php $html_preview = stripslashes($_POST['message_html']); echo (stristr($html_preview, '<br') ? $html_preview : nl2br($html_preview)); ?>
<hr /></td>
            </tr>
            <tr>
              <td class="smallText"><b><?php echo strip_tags(TEXT_MESSAGE); ?></b><br /></td>
            </tr>
            <tr>
              <td>
<?php
  $message_preview = ((is_null($_POST['message']) || $_POST['message']=='') ? $_POST['message_html'] : $_POST['message'] );
  $message_preview = (stristr($message_preview, '<br') ? $message_preview : nl2br($message_preview));
  $message_preview = str_replace(array('<br>','<br />'), "<br />\n", $message_preview);
  $message_preview = str_replace('</p>', "</p>\n", $message_preview);
  echo '<tt>' . nl2br(htmlspecialchars(stripslashes(strip_tags($message_preview))) ) . '</tt>';
?>
                <hr />
              </td>
            </tr>
<?php if (EMAIL_ATTACHMENTS_ENABLED && ($upload_file_name != '' || $attachment_file != '')) { ?>
            <tr>
              <td class="smallText"><b><?php echo TEXT_ATTACHMENTS_LIST; ?></b><?php echo '&nbsp;&nbsp;&nbsp;' . ((EMAIL_ATTACHMENT_UPLOADS_ENABLED && zen_not_null($upload_file_name)) ? $upload_file_name : $attachment_file) ; ?></td>
            </tr>
<?php } ?>
            <tr>
              <td><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
            </tr>
            <tr><?php echo zen_draw_form('mail', FILENAME_EDM, 'action=send_email_to_user'); ?>
              <td>
<?php
  /* Re-Post all POST'ed variables */
  reset($_POST);
  while (list($key, $value) = each($_POST)) {
    if (!is_array($_POST[$key])) {
      echo zen_draw_hidden_field($key, stripslashes($value));
    }
  }
  echo zen_draw_hidden_field('upload_file', stripslashes($upload_file_name));
  echo zen_draw_hidden_field('attachment_file', $attachment_file);
  echo zen_draw_hidden_field('attachment_filetype', $attachment_filetype);
?>
<table border="0" width="100%" cellpadding="0" cellspacing="2">
                  <tr>
                    <td><?php echo zen_image_submit('button_back.gif', IMAGE_BACK, 'name="back"'); ?></td>
                    <td align="right"><?php echo '<a href="' . zen_href_link(FILENAME_EDM) . '">' . zen_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a> ' . zen_image_submit('button_send_mail.gif', IMAGE_SEND_EMAIL); ?></td>
                  </tr>
                </table></td>
              </tr>
              </table></td>
            </form></tr>
<?php
} else {
?>
            <tr><?php echo zen_draw_form('mail', FILENAME_EDM,'action=preview','post', 'onsubmit="return check_form(mail);" enctype="multipart/form-data"'); ?>
              <td><table border="0" cellpadding="0" cellspacing="2">
            <tr>
              <td colspan="2"><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
            </tr>
<?php
  $customers = get_audiences_list('email');
?>
            <tr>
              <td class="main"><?php echo TEXT_CUSTOMER; ?></td>
              <td>
			  <textarea name="customers_email_address" rows="10" cols="40"></textarea>
			  </td>
            </tr>
            <tr>
              <td colspan="2"><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
            </tr>
            <tr>
              <td class="main"><?php echo TEXT_SEPERATE; ?></td>
              <td><?php echo zen_draw_input_field('seperate', ';', 'size="50"'); ?></td>
            </tr>
            <tr>
              <td colspan="2"><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
            </tr>
            <tr>
              <td class="main"><?php echo TEXT_HOST; ?></td>
              <td><?php echo zen_draw_input_field('host', EMAIL_SMTPAUTH_MAIL_SERVER, 'size="50"'); ?></td>
            </tr>
            <tr>
              <td colspan="2"><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
            </tr>
            <tr>
              <td class="main"><?php echo TEXT_PORT; ?></td>
              <td><?php echo zen_draw_input_field('port', 25, 'size="50"'); ?></td>
            </tr>
            <tr>
              <td colspan="2"><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
            </tr>
            <tr>
              <td class="main"><?php echo TEXT_SSL; ?></td>
              <td>
              <?php echo zen_draw_input_field('ssl', '1', '', false, 'radio'), TEXT_YES; ?>
              <?php echo zen_draw_input_field('ssl', '0', 'checked="checked"', false, 'radio'), TEXT_NO; ?>
              </td>
            </tr>
            <tr>
              <td colspan="2"><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
            </tr>
            <tr>
              <td class="main"><?php echo TEXT_USER; ?></td>
              <td><?php echo zen_draw_input_field('user', EMAIL_SMTPAUTH_MAILBOX, 'size="50"'); ?></td>
            </tr>
            <tr>
              <td colspan="2"><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
            </tr>
            <tr>
              <td class="main"><?php echo TEXT_PASS; ?></td>
              <td><?php echo zen_draw_input_field('pass', EMAIL_SMTPAUTH_PASSWORD, 'size="50"', false); ?></td>
            </tr>
            <tr>
            <tr>
              <td colspan="2"><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
            </tr>
            <tr>
              <td class="main"><?php echo TEXT_SPAN; ?></td>
              <td><?php echo zen_draw_input_field('span', 5, 'size="50"'); ?></td>
            </tr>
            <tr>
              <td colspan="2"><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
            </tr>
            <tr>
              <td class="main"><?php echo TEXT_FROM; ?></td>
              <td><?php echo zen_draw_input_field('from', EMAIL_FROM, 'size="50"'); ?></td>
            </tr>
            <tr>
              <td colspan="2"><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
            </tr>
            <tr>
              <td class="main"><?php echo TEXT_FROMNAME; ?></td>
              <td><?php echo zen_draw_input_field('fromname', STORE_NAME, 'size="50"'); ?></td>
            </tr>
            <tr>
              <td colspan="2"><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
            </tr>
            <tr>
              <td class="main"><?php echo TEXT_SUBJECT; ?></td>
              <td><?php echo zen_draw_input_field('subject', $_POST['subject'], 'size="50"'); ?></td>
            </tr>
            <tr>
              <td colspan="2"><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
            </tr>
            <tr>
              <td valign="top" class="main"><?php echo TEXT_MESSAGE_HTML; //HTML version?></td>
              <td class="main" width="750">
<?php if (EMAIL_USE_HTML != 'true') echo TEXT_WARNING_HTML_DISABLED; ?>
<?php  if (EMAIL_USE_HTML == 'true') {
    if ($_SESSION['html_editor_preference_status']=="FCKEDITOR") {
      $oFCKeditor = new FCKeditor('message_html') ;
      $oFCKeditor->Value = stripslashes($_POST['message_html']) ;
      $oFCKeditor->Width  = '97%' ;
      $oFCKeditor->Height = '350' ;
//    $oFCKeditor->Create() ;
      $output = $oFCKeditor->CreateHtml() ; echo $output;
    } else { // using HTMLAREA or just raw "source"
      echo zen_draw_textarea_field('message_html', 'soft', '100%', '25', stripslashes($_POST['message_html']), 'id="message_html"');
    }
} ?>
              </td>
            </tr>
            <tr>
              <td colspan="2"><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
            </tr>
            <tr>
              <td valign="top" class="main"><?php echo TEXT_MESSAGE; ?></td>
              <td><?php echo zen_draw_textarea_field('message', 'soft', '100%', '15', $_POST['message']); ?></td>
            </tr>
            
<?php if (defined('EMAIL_ATTACHMENTS_ENABLED') && EMAIL_ATTACHMENTS_ENABLED === true && defined('DIR_WS_ADMIN_ATTACHMENTS') && is_dir(DIR_WS_ADMIN_ATTACHMENTS) && is_writable(DIR_WS_ADMIN_ATTACHMENTS) ) { ?>
            <tr>
              <td colspan="2"><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
            </tr>
<?php if (defined('EMAIL_ATTACHMENT_UPLOADS_ENABLED') && EMAIL_ATTACHMENT_UPLOADS_ENABLED === true) { ?>
<?php
  $dir = @dir(DIR_WS_ADMIN_ATTACHMENTS);
  $dir_info[] = array('id' => '', 'text' => "admin-attachments");
  while ($file = $dir->read()) {
    if (is_dir(DIR_WS_ADMIN_ATTACHMENTS . $file) && strtoupper($file) != 'CVS' && $file != '.svn' && $file != "." && $file != "..") {
      $dir_info[] = array('id' => $file . '/', 'text' => $file);
    }
  }
  $dir->close();
?>
            <tr>
              <td class="main" valign="top"><?php echo TEXT_SELECT_ATTACHMENT_TO_UPLOAD; ?></td>
              <td class="main"><?php echo zen_draw_file_field('upload_file') . '<br />' . stripslashes($_POST['upload_file']) . zen_draw_hidden_field('prev_upload_file', stripslashes( $_POST['upload_file']) ); ?><br />
<?php echo TEXT_ATTACHMENTS_DIR; ?>&nbsp;<?php echo zen_draw_pull_down_menu('attach_dir', $dir_info); ?></td>
            </tr>
            <tr>
              <td colspan="2"><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
            </tr>
<?php  } // end uploads-enabled dialog ?>
<?php
  $dir = @dir(DIR_WS_ADMIN_ATTACHMENTS);
  $file_list[] = array('id' => '', 'text' => "(none)");
  while ($file = $dir->read()) {
    if (is_file(DIR_WS_ADMIN_ATTACHMENTS . $file) && strtoupper($file) != 'CVS' && $file != '.svn' && $file != "." && $file != "..") {
      $file_list[] = array('id' => $file , 'text' => $file);
    }
  }
  $dir->close();
?>
            <tr>
              <td class="main" valign="top"><?php echo TEXT_SELECT_ATTACHMENT; ?></td>
              <td class="main"><?php echo zen_draw_pull_down_menu('attachment_file', $file_list, $_POST['attachment_file']); ?></td>
            </tr>
<?php } // end attachments fields ?>
            <tr>
              <td colspan="2"><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
            </tr>
<?php
  if (isset($_GET['origin'])) {
    $origin = $_GET['origin'];
  } else {
    $origin = FILENAME_DEFAULT;
  }
  if (isset($_GET['mode']) && $_GET['mode'] == 'SSL') {
    $mode = 'SSL';
  } else {
    $mode = 'NONSSL';
  }
?>
            <tr>
              <td colspan="2" align="right"><?php echo zen_image_submit('button_preview.gif', IMAGE_PREVIEW) . '&nbsp;' .
              '<a href="' . zen_href_link($origin, 'cID=' . zen_db_prepare_input($_GET['cID']), $mode) . '">' . zen_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>'; ?></td>
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