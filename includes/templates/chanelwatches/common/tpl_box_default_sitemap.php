<?php

// $Id: tpl_box_default_sitemap.php 2006-01-19 19:48:26Z a_berezin $
//
// Add includes/templates/template_default/common/tpl_box_default_sitemap.php
// (you also may use YOUR_TEMPLATE)

// choose box images based on box position
if ($title_link) {
  $title = '<a href="' . zen_href_link($title_link) . '">' . $title . BOX_HEADING_LINKS . '</a>';
}
preg_match_all("'<a[^>]*>.*?</a>'si", $content, $href);
$url = zen_href_link(FILENAME_SITE_MAP);
$n=sizeof($href[0]);
for($i=0;$i<$n;$i++) {
if(strpos($href[0][$i], $url)) {
unset($href[0][$i]);
}
}

?>
  
  <li class="first"><?php echo $title; ?>
<?php
if(sizeof($href[0]) >0)
echo '<ul><li>' . implode('</li><li>', $href[0]) . '</li></ul></li>';
?>