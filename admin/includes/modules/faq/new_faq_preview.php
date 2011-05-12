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
//  $Id: new_faq_preview.php 277 2004-09-10 23:03:52Z wilt $

// copy image only if modified
        if (!$_GET['read']) {
          $faqs_image = new upload('faqs_image');
          $faqs_image->set_destination(DIR_FS_CATALOG_IMAGES . $_POST['img_dir']);
          if ($faqs_image->parse() && $faqs_image->save($_POST['overwrite'])) {
            $faqs_image_name = $_POST['img_dir'] . $faqs_image->filename;
          } else {
            $faqs_image_name = (isset($_POST['faqs_previous_image']) ? $_POST['faqs_previous_image'] : '');
          }
        }
?>