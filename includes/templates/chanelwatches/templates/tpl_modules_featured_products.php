<?php
 $zc_show_featured = false;
 include(DIR_WS_MODULES . zen_get_module_directory(FILENAME_FEATURED_PRODUCTS_MODULE));
?>

<!-- bof: featured products  -->
<?php if ($zc_show_featured == true) { ?>
<div class="proutbar">
<div class="centerBoxWrapper" id="featuredProducts">
<?php
require($template->get_template_dir('tpl_columnar_display.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_columnar_display.php');
?>

</div>
</div>
<?php } ?>
<!-- eof: featured products  -->
