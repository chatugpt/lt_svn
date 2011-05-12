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
  define('TABLE_FAQ_CATEGORIES', DB_PREFIX . 'faq_categories');
  define('TABLE_FAQ_CATEGORIES_DESCRIPTION', DB_PREFIX . 'faq_categories_description');
  define('TABLE_FAQS', DB_PREFIX . 'faqs');
  define('TABLE_FAQ_TYPES', DB_PREFIX . 'faq_types');
  define('TABLE_FAQ_TYPE_LAYOUT', DB_PREFIX . 'faq_type_layout');
  define('TABLE_FAQ_TYPES_TO_FAQ_CATEGORY', DB_PREFIX . 'faq_types_to_faq_category');
  define('TABLE_FAQS_DESCRIPTION', DB_PREFIX . 'faqs_description');
  define('TABLE_FAQS_TO_FAQ_CATEGORIES', DB_PREFIX . 'faqs_to_faq_categories');
  define('TABLE_FAQ_REVIEWS', DB_PREFIX . 'faq_reviews');
  define('TABLE_FAQ_REVIEWS_DESCRIPTION', DB_PREFIX . 'faq_reviews_description');
?>