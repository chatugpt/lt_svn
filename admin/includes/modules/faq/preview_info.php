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
//  $Id: preview_info.php 290 2004-09-15 19:48:26Z wilt $
//

 if (zen_not_null($_POST)) {
    $pInfo = new objectInfo($_POST);
    $faqs_name = $_POST['faqs_name'];
	  $faqs_contact_name = $_POST['faqs_contact_name'];
	  $faqs_contact_mail = $_POST['faqs_contact_mail'];
      $faqs_description = $_POST['faqs_description'];
	  $faqs_answer = $_POST['faqs_answer'];
      $faqs_url = $_POST['faqs_url'];
    } else {
      $faqs = $db->Execute("select p.faqs_id, pd.language_id, pd.faqs_name, pd.faqs_contact_name, pd.faqs_contact_mail,
                                      pd.faqs_description, pd.faqs_answer, pd.faqs_url, p.faqs_image, p.faqs_date_added, p.faqs_last_modified,
                                      p.faqs_status, p.faqs_sort_order
                               from " . TABLE_FAQS . " p, " . TABLE_FAQS_DESCRIPTION . " pd
                               where p.faqs_id = pd.faqs_id
                               and p.faqs_id = '" . (int)$_GET['pID'] . "'");

      $pInfo = new objectInfo($faq->fields);
      $faqs_image_name = $pInfo->faqs_image;
    }

    $form_action = (isset($_GET['pID'])) ? 'update_faq' : 'insert_faq';

    echo zen_draw_form($form_action, $type_faq_admin_handler, 'fcPath=' . $fcPath . (isset($_GET['faq_type']) ? '&faq_type=' . $_GET['faq_type'] : '') . (isset($_GET['pID']) ? '&pID=' . $_GET['pID'] : '') . '&action=' . $form_action . (isset($_GET['page']) ? '&page=' . $_GET['page'] : ''), 'post', 'enctype="multipart/form-data"');

    $languages = zen_get_languages();
    for ($i=0, $n=sizeof($languages); $i<$n; $i++) {
      if (isset($_GET['read']) && ($_GET['read'] == 'only')) {
        $pInfo->faqs_name = zen_get_faqs_name($pInfo->faqs_id, $languages[$i]['id']);
		$pInfo->faqs_contact_name = zen_get_faqs_contact_name($pInfo->faqs_id, $languages[$i]['id']);
		$pInfo->faqs_contact_mail = zen_get_faqs_contact_mail($pInfo->faqs_id, $languages[$i]['id']);
        $pInfo->faqs_description = zen_get_faqs_description($pInfo->faqs_id, $languages[$i]['id']);
		$pInfo->faqs_answer = zen_get_faqs_answer($pInfo->faqs_id, $languages[$i]['id']);
        $pInfo->faqs_url = zen_get_faqs_url($pInfo->faqs_id, $languages[$i]['id']);
      } else {
        $pInfo->faqs_name = zen_db_prepare_input($faqs_name[$languages[$i]['id']]);
		$pInfo->faqs_contact_name = zen_get_faqs_contact_name($pInfo->faqs_id, $languages[$i]['id']);
		$pInfo->faqs_contact_mail = zen_get_faqs_contact_mail($pInfo->faqs_id, $languages[$i]['id']);
        $pInfo->faqs_description = zen_db_prepare_input($faqs_description[$languages[$i]['id']]);
		$pInfo->faqs_answer = zen_get_faqs_answer($pInfo->faqs_id, $languages[$i]['id']);
        $pInfo->faqs_url = zen_db_prepare_input($faqs_url[$languages[$i]['id']]);
      }
?>
    <table border="0" width="100%" cellspacing="0" cellpadding="2">
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="pageHeading"><?php echo zen_image(DIR_WS_CATALOG_LANGUAGES . $languages[$i]['directory'] . '/images/' . $languages[$i]['image'], $languages[$i]['name']) . '&nbsp;' . $pInfo->faqs_name; ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr>
        <td class="main">
          <?php
						//auto replace with defined missing image
						echo $pInfo->faqs_description;
          ?>
        </td>
      </tr>
<?php
      if ($pInfo->faqs_url) {
?>
      <tr>
        <td><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr>
        <td class="main"><?php echo sprintf(TEXT_FAQ_MORE_INFORMATION, $pInfo->faqs_url); ?></td>
      </tr>
<?php
      }
?>
      <tr>
        <td><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
<?php
    }

    if (isset($_GET['read']) && ($_GET['read'] == 'only')) {
      if (isset($_GET['origin'])) {
        $pos_params = strpos($_GET['origin'], '?', 0);
        if ($pos_params != false) {
          $back_url = substr($_GET['origin'], 0, $pos_params);
          $back_url_params = substr($_GET['origin'], $pos_params + 1);
        } else {
          $back_url = $_GET['origin'];
          $back_url_params = '';
        }
      } else {
        $back_url = FILENAME_FAQ_CATEGORIES;
        $back_url_params = 'fcPath=' . $fcPath . '&pID=' . $pInfo->faqs_id;
      }
?>
      <tr>
        <td align="right"><?php echo '<a href="' . zen_href_link($back_url, $back_url_params, 'NONSSL') . '">' . zen_image_button('button_back.gif', IMAGE_BACK) . '</a>'; ?></td>
      </tr>
<?php
    } else {
?>
      <tr>
        <td align="right" class="smallText">
<?php
/* Re-Post all POST'ed variables */
      reset($_POST);
      while (list($key, $value) = each($_POST)) {
        if (!is_array($_POST[$key])) {
          echo zen_draw_hidden_field($key, htmlspecialchars(stripslashes($value)));
        }
      }

      $languages = zen_get_languages();
      for ($i=0, $n=sizeof($languages); $i<$n; $i++) {
        echo zen_draw_hidden_field('faqs_name[' . $languages[$i]['id'] . ']', htmlspecialchars(stripslashes($faqs_name[$languages[$i]['id']])));
		echo zen_draw_hidden_field('faqs_contact_name[' . $languages[$i]['id'] . ']', htmlspecialchars(stripslashes($faqs_contact_name[$languages[$i]['id']])));
		echo zen_draw_hidden_field('faqs_contact_mail[' . $languages[$i]['id'] . ']', htmlspecialchars(stripslashes($faqs_contact_mail[$languages[$i]['id']])));
        echo zen_draw_hidden_field('faqs_description[' . $languages[$i]['id'] . ']', htmlspecialchars(stripslashes($faqs_description[$languages[$i]['id']])));
		echo zen_draw_hidden_field('faqs_answer[' . $languages[$i]['id'] . ']', htmlspecialchars(stripslashes($faqs_answer[$languages[$i]['id']])));
        echo zen_draw_hidden_field('faqs_url[' . $languages[$i]['id'] . ']', htmlspecialchars(stripslashes($faqs_url[$languages[$i]['id']])));
      }
      echo zen_draw_hidden_field('faqs_image', stripslashes($faqs_image_name));

      echo zen_image_submit('button_back.gif', IMAGE_BACK, 'name="edit"') . '&nbsp;&nbsp;';

      if (isset($_GET['pID'])) {
        echo zen_image_submit('button_update.gif', IMAGE_UPDATE);
      } else {
        echo zen_image_submit('button_insert.gif', IMAGE_INSERT);
      }
      echo '&nbsp;&nbsp;<a href="' . zen_href_link(FILENAME_FAQ_CATEGORIES, 'fcPath=' . $fcPath . (isset($_GET['pID']) ? '&pID=' . $_GET['pID'] : '') . (isset($_GET['page']) ? '&page=' . $_GET['page'] : '')) . '">' . zen_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>';
?>
        </td>
      </tr>
    </table></form>
<?php
    }
?>