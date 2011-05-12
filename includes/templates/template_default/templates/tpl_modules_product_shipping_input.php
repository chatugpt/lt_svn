<script type="text/javascript">
$(document).ready(function(){
	$("#shipping_estimator").click(function() {
		var loadingString = '<img src="images/loading.gif" border="0"> loading...';
		$("#productShippingMethods").html(loadingString);
		
		//var
		var products_id = parseInt($("#products_id").val());
		var product_qty = parseInt($("#product_qty").val());
		var zone_country_id = parseInt($("#zone_country_id").val());
		if (!/[0-9]+/.test(products_id+"")) {
			$("#productShippingMethods").html("Products id not be number.");
			return;
		}
		if (products_id <= 0) {
			$("#productShippingMethods").html("Products id not be > 0.");
			return;
		}
		if (!/[0-9]+/.test(product_qty+"")) {
			$("#productShippingMethods").html("Product qty not be number.");
			return;
		}
		if (!/[0-9]+/.test(zone_country_id+"")) {
			$("#productShippingMethods").html("No selected country.");
			return;
		}
		if (zone_country_id <= 0) {
			$("#productShippingMethods").html("No selected country.");
			return;
		}
		$.post("ajax_product_shipping_estimator.php", { products_id: $("#products_id").val(), product_qty: $("#product_qty").val(), zone_country_id: $("#zone_country_id").val() }, function(data) {
			$("#productShippingMethods").html(data);
		}); 
	});
});
</script>

<div id="productShippingInput">
<h2><?php echo CART_SHIPPING_OPTIONS; ?></h2>

<?php echo zen_draw_hidden_field('products_id', (int)$_GET['products_id'], 'id="products_id"'); ?>

<label class="inputLabel" for="product_qty"><?php echo 'Product QTY: '; ?></label>
<?php echo zen_draw_input_field('product_qty', '1', 'id="product_qty" size="5"'); ?>

<label class="inputLabel" for="zone_country_id"><?php echo ENTRY_COUNTRY; ?></label>
<?php echo zen_get_country_list('zone_country_id', $selected_country, 'id="zone_country_id"'); ?>

<input type="button" id="shipping_estimator" value="Estimator" />

<br class="clearBoth" />
</div>
<div id="productShippingMethods"></div>

