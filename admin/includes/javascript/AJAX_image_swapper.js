var xHRObject = false;
if (window.ActiveXObject) {
	xHRObject = new ActiveXObject("Microsoft.XMLHTTP");
}
else if (window.XMLHttpRequest) {
	xHRObject = new XMLHttpRequest();
}


function getData() {
	if (xHRObject.readyState == 4 && xHRObject.status == 200) {
        var serverResponse = xHRObject.responseXML;
		if (serverResponse != null) {
			var itemsNode = serverResponse.getElementsByTagName('items');
			if (itemsNode.length > 0) {
				var attribute = itemsNode[0].attributes[0].value;
				if (attribute == 'loadCategories') {
					var categoryIDNodes = serverResponse.getElementsByTagName('categories_id');
					var categoryNameNodes = serverResponse.getElementsByTagName('categories_name');
					var selectElement = document.getElementById('categoryID');
					
					if (window.ActiveXObject) {
						selectElement.innerHTML = '';
						var option = document.createElement('<option value="">');
						var text = document.createTextNode('--Please select a category--');
						option.appendChild(text);
						selectElement.appendChild(option);
					} 
					else if (window.XMLHttpRequest){
						selectElement.innerHTML = '<option value="">--Please select a category--</option>';
					}
					
					//emptying imageList
					var imageListElement = document.getElementById('imageList');
					imageListElement.innerHTML = '';

					//removing the displayed image
					var imageDisplayElement = document.getElementById('imageDisplay');
					imageDisplayElement.innerHTML = '';
					
					for (i=0; i<categoryIDNodes.length; i++) {
				    if (window.ActiveXObject) {		
							var option = document.createElement('<option value="'+categoryIDNodes[i].text+'">');
							var text = document.createTextNode(categoryNameNodes[i].text);
							option.appendChild(text);
							selectElement.appendChild(option);
						}
						else {
							selectElement.innerHTML += '<option value="' + categoryIDNodes[i].textContent + '">' + categoryNameNodes[i].textContent + '</option>';	
						}
			    }
				}
				else if (attribute == 'loadProducts') {
					var productIDNodes = serverResponse.getElementsByTagName('products_id');
					var productNameNodes = serverResponse.getElementsByTagName('products_name');
					var selectElement = document.getElementById('productID');
					
					if (window.ActiveXObject) {
						selectElement.innerHTML = '';
						var option = document.createElement('<option value="">');
						var text = document.createTextNode('--Please select a product--');
						option.appendChild(text);
						selectElement.appendChild(option);
					} 
					else if (window.XMLHttpRequest){
						selectElement.innerHTML = '<option value="">--Please select a product--</option>';
					}
					
					//emptying imageList
					var imageListElement = document.getElementById('imageList');
					imageListElement.innerHTML = '';

					//removing the displayed image
					var imageDisplayElement = document.getElementById('imageDisplay');
					imageDisplayElement.innerHTML = '';
					
					for (var i=0; i<productIDNodes.length; i++) {
				    if (window.ActiveXObject) {		
							var option = document.createElement('<option value="'+productIDNodes[i].text+'">');
							var text = document.createTextNode(productNameNodes[i].text);
							option.appendChild(text);
							selectElement.appendChild(option);
						}
						else {
							selectElement.innerHTML += '<option value="' + productIDNodes[i].textContent + '">' + productNameNodes[i].textContent + '</option>';	
						}
			    }
				}
				else if (attribute == 'loadAttributes') {
					var optionIDNodes = serverResponse.getElementsByTagName('products_options_id');
					var optionNameNodes = serverResponse.getElementsByTagName('products_options_name');
					var selectElement = document.getElementById('attributeID');
					
					if (window.ActiveXObject) {	
						selectElement.innerHTML = '';
						var option = document.createElement('<option value="">');
						var text = document.createTextNode('--Please select an option name--');
						option.appendChild(text);
						selectElement.appendChild(option);
					} 
					else if (window.XMLHttpRequest){
						selectElement.innerHTML = '<option value="">--Please select an option name--</option>';
					}
					
					var selectElement2 = document.getElementById('optionID');
					if (window.ActiveXObject) {	
						selectElement2.innerHTML = '';
						var option = document.createElement('<option value="">');
						var text = document.createTextNode('--Please select an option value--');
						option.appendChild(text);
						selectElement2.appendChild(option);
					}
					else {
						selectElement2.innerHTML = '<option value="">--Please select an option value--</option>';
					}

					//emptying imageList
					var imageListElement = document.getElementById('imageList');
					imageListElement.innerHTML = '';

					//removing the displayed image
					var imageDisplayElement = document.getElementById('imageDisplay');
					imageDisplayElement.innerHTML = '';
					
					for (var i=0; i<optionIDNodes.length; i++) {
				    if (window.ActiveXObject) {		
							var option = document.createElement('<option value="'+optionIDNodes[i].text+'">');
							var text = document.createTextNode(optionNameNodes[i].text);
							option.appendChild(text);
							selectElement.appendChild(option);
						}
						else {
							selectElement.innerHTML += '<option value="' + optionIDNodes[i].textContent + '">' + optionNameNodes[i].textContent + '</option>';	
						}
			    }				
				}
				else if (attribute == 'loadOptions') {
					var optionValueIDNodes = serverResponse.getElementsByTagName('products_attributes_id');
					var optionValueNameNodes = serverResponse.getElementsByTagName('products_options_values_name');
					var selectElement = document.getElementById('optionID');
					
					if (window.ActiveXObject) {	
						selectElement.innerHTML = '';
						var option = document.createElement('<option value="">');
						var text = document.createTextNode('--Please select an option value--');
						option.appendChild(text);
						selectElement.appendChild(option);
					} 
					else if (window.XMLHttpRequest){
						selectElement.innerHTML = '<option value="">--Please select an option value--</option>';
					}
					
					//emptying imageList
					var imageListElement = document.getElementById('imageList');
					imageListElement.innerHTML = '';

					//removing the displayed image
					var imageDisplayElement = document.getElementById('imageDisplay');
					imageDisplayElement.innerHTML = '';
					
					for (i=0; i<optionValueIDNodes.length; i++) {
						if (window.ActiveXObject) {		
							var option = document.createElement('<option value="'+optionValueIDNodes[i].text+'">');
							var text = document.createTextNode(optionValueNameNodes[i].text);
							option.appendChild(text);
							selectElement.appendChild(option);
						}
						else {
							selectElement.innerHTML += '<option value="' + optionValueIDNodes[i].textContent + '">' + optionValueNameNodes[i].textContent + '</option>';	
						}
					}				
				}
				else if (attribute == 'loadImages' || attribute == 'delImage') {
										
					//get returned XML
					var imageIDNodes = serverResponse.getElementsByTagName('image_id');
					var imagePathNodes = serverResponse.getElementsByTagName('image_path');
					var imageSortOrderNodes = serverResponse.getElementsByTagName('image_sort_order');
					var imageTitleNodes = serverResponse.getElementsByTagName('image_title');
					
					//display the returned XML to imageList
					var selectElement = document.getElementById('imageList');
					selectElement.innerHTML = '';
					if (imageIDNodes.length == 0) {
						if (window.ActiveXObject) {		
							var option = document.createElement('<option value="">');
							var text = document.createTextNode('--There is no image for this attribute--');
							option.appendChild(text);
							selectElement.appendChild(option);
						}
						else {
							selectElement.innerHTML = '<option value="">--There is no image for this attribute--</option>';
						}
					}
					for (var i=0; i<imageIDNodes.length; i++) {
						if (window.ActiveXObject) {		
							var option = document.createElement('<option title="' + imagePathNodes[i].text + '" value="' + imageIDNodes[i].text + '">');
							var text = document.createTextNode(imageTitleNodes[i].text);
							option.appendChild(text);
							selectElement.appendChild(option);
						}
						else {
							selectElement.innerHTML += '<option title="' + imagePathNodes[i].textContent + '" value="' + imageIDNodes[i].textContent + '">' + imageTitleNodes[i].textContent + '</option>';
						}
					}
					show_editable_image_info('new');
				}
				else if (attribute == 'selectImage') {
					var imagePathNodes = serverResponse.getElementsByTagName('image_path');
					var imageTitleNodes = serverResponse.getElementsByTagName('image_title');
					var imageSortNodes = serverResponse.getElementsByTagName('image_sort_order');
					var imageSmallImagesize = serverResponse.getElementsByTagName('image_small_imagesize');
					var imageSmallFilesize = serverResponse.getElementsByTagName('image_small_filesize');
					var imageMediumFilename = serverResponse.getElementsByTagName('image_medium_filename');
					var imageMediumImagesize = serverResponse.getElementsByTagName('image_medium_imagesize');
					var imageMediumFilesize = serverResponse.getElementsByTagName('image_medium_filesize');
					var imageLargeFilename = serverResponse.getElementsByTagName('image_large_filename');
					var imageLargeImagesize = serverResponse.getElementsByTagName('image_large_imagesize');
					var imageLargeFilesize = serverResponse.getElementsByTagName('image_large_filesize');
					
					if (window.ActiveXObject) {		
						var info_values = [imagePathNodes[0].text, imageTitleNodes[0].text, imageSortNodes[0].text, imageSmallImagesize[0].text, imageMediumFilename[0].text, imageSmallFilesize[0].text, imageMediumImagesize[0].text, imageMediumFilesize[0].text, imageLargeFilename[0].text, imageLargeImagesize[0].text, imageLargeFilesize[0].text];
					}
					else {
						var info_values = [imagePathNodes[0].textContent, imageTitleNodes[0].textContent, imageSortNodes[0].textContent, imageSmallImagesize[0].textContent, imageSmallFilesize[0].textContent, imageMediumFilename[0].textContent, imageMediumImagesize[0].textContent, imageMediumFilesize[0].textContent, imageLargeFilename[0].textContent, imageLargeImagesize[0].textContent, imageLargeFilesize[0].textContent];
					}
					
					var info_keys = ['path', 'title', 'sort_order', 'small_imagesize', 'small_filesize', 'medium_filename', 'medium_imagesize', 'medium_filesize', 'large_filename', 'large_imagesize', 'large_filesize'];
					var image_info = info_values.associate(info_keys);
					if (imagePathNodes.length > 0) {
						show_image_info(image_info);
					}
				}
				else if (attribute =='update') {
					//get returned XML
					var imageIDNodes = serverResponse.getElementsByTagName('image_id');
					var imagePathNodes = serverResponse.getElementsByTagName('image_path');
					var imageTitleNodes = serverResponse.getElementsByTagName('image_title');
					var imageSortOrderNodes = serverResponse.getElementsByTagName('image_sort_order');
					
					//display the returned XML to imageList
					var selectElement = document.getElementById('imageList');
					selectElement.innerHTML = '';
					if (imageIDNodes.length == 0) {
						if (window.ActiveXObject) {
							var option = document.createElement('<option value="">');
							var text = document.createTextNode('--There is no image for this attribute--');
							option.appendChild(text);
							selectElement.appendChild(option);
						}
						else {
							selectElement.innerHTML = '<option value="">--There is no image for this attribute--</option>';
						}
					}
					for (var i=0; i<imageIDNodes.length; i++) {
						if (window.ActiveXObject) {		
							var option = document.createElement('<option value="' + imageIDNodes[i].text + '" title="' + imagePathNodes[i].text + '">');
							var text = document.createTextNode(imageTitleNodes[i].text);
							option.appendChild(text);
							selectElement.appendChild(option);
						}
						else {
							selectElement.innerHTML += '<option value="' + imageIDNodes[i].textContent + '">' + imageTitleNodes[i].textContent + '</option>';
						}
					}
				}
				else if (attribute == 'loadImagesFromIframe') {
					
					//get returned XML
					var imageIDNodes = serverResponse.getElementsByTagName('image_id');
					var imagePathNodes = serverResponse.getElementsByTagName('image_path');
					var imageTitleNodes = serverResponse.getElementsByTagName('image_title');
					var imageSortOrderNodes = serverResponse.getElementsByTagName('image_sort_order');
					
					//display the returned XML to imageList
					var selectElement = window.parent.document.getElementById('imageList');
					selectElement.innerHTML = '';
					if (imageIDNodes.length == 0) {
						selectElement.innerHTML = '<option value="">--There is no image for this attribute--</option>';
					}
					for (var i=0; i<imageIDNodes.length; i++) {
						if (window.ActiveXObject) {		
							var option = document.createElement('<option value="' + imageIDNodes[i].text + '" title="' + imagePathNodes[i].text + '">');
							var text = document.createTextNode(imageTitleNodes[i].text);
							option.appendChild(text);
							selectElement.appendChild(option);
						}
						else {
							selectElement.innerHTML += '<option title="' + imagePathNodes[i].textContent + '" value="' + imageIDNodes[i].textContent + '">' + imageTitleNodes[i].textContent + '</option>';
						}
					}
					
					//removing the displayed image
					//var imageDisplayElement = window.parent.document.getElementById('imageDisplay');
					//imageDisplayElement.innerHTML = '';
				}
				else if (attribute == 'cleanUp') {
					
					$('cleaningUp').empty();
					var legend = new Element('legend');
					var b = new Element('b').setText('Cleaning up database');
					
					b.injectInside(legend.injectInside($('cleaningUp').setText('Cleaning Up Successful!')));
				}
				else if (attribute == 'setupImages') {
				
					$('setupImages').empty();
					var legend = new Element('legend');
					var b = new Element('b').setText('Setup Images');
					
					b.injectInside(legend.injectInside($('setupImages').setText('Setting Up Images Successful!')));
				}
			}
		}
	}
}

/* show_image_info function
** image_info is an associative array created by mootools associate function
** http://docs.mootools.net/Native/Array.js#Array.associate
** list of array keys used:
** 'path', 'title', 'sort_order', 'small_imagesize', 'small_filesize', 'medium_imagesize', 'medium_filesize', 'large_imagesize', 'large_filesize'
*/
function show_image_info(image_info) {
	
	this.image_info = image_info;
	
	$('imageDisplay').setHTML('');
	new Element('h2', {'id':'title_imageinfo'}).setText('Image Information').injectInside($('imageDisplay'));
	
	var table = new Element('table', {'id':'imageInfo', 'width':'100%'});
	var tbody = new Element('tbody');
	tbody.injectInside(table);

	var row_title = createRow(['Image title', image_info['title']], '', 'imageInfo_row_odd', ['','title'], ['imageInfo_col_title', 'imageInfo_col_content']);
	row_title.injectInside(tbody); 

	var row_path = createRow(['Image path', image_info['path']], '', 'imageInfo_row_even', ['','path'], ['imageInfo_col_title', 'imageInfo_col_content']);
	row_path.injectInside(tbody); 
	
	var div_small_image = createImageInfo('small', image_info);	
	var row_small_image = createRow(['Small size', div_small_image], '', 'imageInfo_row_odd', ['',''], ['imageInfo_col_title', 'imageInfo_col_content']);
	row_small_image.injectInside(tbody); 

	var div_medium_image = createImageInfo('medium', image_info);	
	var row_medium_image = createRow(['Medium size', div_medium_image], '', 'imageInfo_row_even', ['',''], ['imageInfo_col_title', 'imageInfo_col_content']);
	row_medium_image.injectInside(tbody); 

	var div_large_image = createImageInfo('large', image_info);	
	var row_large_image = createRow(['Large size', div_large_image], '', 'imageInfo_row_odd', ['',''], ['imageInfo_col_title', 'imageInfo_col_content']);
	row_large_image.injectInside(tbody); 

	var row_display_order = createRow(['Display order', image_info['sort_order']], '', 'imageInfo_row_even', ['','sort_order'], ['imageInfo_col_title', 'imageInfo_col_content']);
	row_display_order.injectInside(tbody); 

	table.injectInside($('imageDisplay'));
	new Element('input', {
		'id' : 'new_button',
		'type' : 'button',
		'value' : 'New Image',
		'events' : {
			'click' : function() {
				show_editable_image_info('new', this.image_info);
			}.bind(this)
		}
	}).injectInside($('imageDisplay'));

	new Element('input', {
		'id' : 'edit_button',
		'type' : 'button',
		'value' : 'Edit',
		'events' : {
			'click' : function() {
				show_editable_image_info('edit', this.image_info);
			}.bind(this)
		}
	}).injectInside($('imageDisplay'));
	
	new Element('input', {
		'id' : 'delete_button',
		'type' : 'button',
		'value' : 'Delete',
		'events' : {
			'click' : function() {
				delImage();
			}
		}
	}).injectInside($('imageDisplay'));
}

function show_editable_image_info(type, image_info) {
	if (typeof(image_info) != 'undefined') {
		this.image_info = image_info;
	}
	this.type = type;
	
	var title = '';
	var sort_order = 0;
	if(type == 'new' || typeof(type) == 'undefined') {
		title = '';
		sort_order = 0;
	}
	else if(type == 'edit') {
		title = $('title').getText();
		sort_order = $('sort_order').getText();
	}
	
	$('imageDisplay').setHTML('');

	if(type == 'new') {
		new Element('h2', {'id':'title_imageinfo'}).setText('Add New Image').injectInside($('imageDisplay'));
	}
	else if(type == 'edit') {
		new Element('h2', {'id':'title_imageinfo'}).setText('Edit Image').injectInside($('imageDisplay'));
	}
	
	var table = new Element('table', {'id':'imageInfo', 'width':'100%'});
	var tbody = new Element('tbody');
	tbody.injectInside(table);

	var input_title = new Element('input', {'id':'input_title', 'name':'input_title', 'value':title});
	var row_title = createRow(['Image title', input_title], '', 'imageInfo_row_odd', ['','title'], ['imageInfo_col_title', 'imageInfo_col_content']);
	row_title.injectInside(tbody);

	var iframe_upload_image = new Element('iframe', {
		'id' : 'iframe_uploader',
		'name' : 'iframe_uploader',
		'frameborder' : '0',
		'scrolling' : 'no',
		'src' : 'image_uploader.php',
		'width' : '100%',
		'height' : '400px',
		'events' : {
			'load' : function() {
				if (this.type == 'edit') {
					var iframe = $('iframe_uploader').contentDocument;
					iframe.getElementById('image_id').setAttribute('value', $('imageList').getProperty('value'));
				}
			}.bind(this)
		}
	});
	
	var row_upload_image = createRow(['Upload image', iframe_upload_image], '', 'imageInfo_row_even', ['',''], ['imageInfo_col_title', 'imageInfo_col_content']);
	row_upload_image.injectInside(tbody);

	var input_sort = new Element('input', {'id':'input_sort', 'name':'input_sort', 'value':sort_order});	
	var row_display_order = createRow(['Display order', input_sort], '', 'imageInfo_row_odd', ['','sort_order'], ['imageInfo_col_title', 'imageInfo_col_content']);
	row_display_order.injectInside(tbody); 

	table.injectInside($('imageDisplay'));
	
	var ok_value = 'Ok'
	if (type == 'new') {
		ok_value = 'Add new image';
	}
	else if (type == 'edit'){
		ok_value = 'Edit image';
	}
	
	new Element('input', {
		'id' : 'ok_button',
		'type' : 'button',
		'value' : ok_value,
		'events' : {
			'click' : function() {
				var iframe = $('iframe_uploader').contentDocument;
				iframe.getElementById('image_title').setAttribute('value', $('input_title').getProperty('value'));
				iframe.getElementById('image_sort_order').setAttribute('value', $('input_sort').getProperty('value'));				
				iframe.forms['iform'].submit();
			}
		}
	}).injectInside($('imageDisplay'));
	
	if (typeof(image_info) != 'undefined') {
		new Element('input', {
			'id' : 'cancel_button',
			'type' : 'button',
			'value' : 'Cancel',
			'events' : {
				'click' : function() {
					show_image_info(this.image_info);
				}.bind(this)
			}
		}).injectInside($('imageDisplay'));
	}
	else {
		new Element('input', {
			'id' : 'cancel_button',
			'type' : 'button',
			'value' : 'Cancel',
			'events' : {
				'click' : function() {
					show_editable_image_info('new');
				}
			}
		}).injectInside($('imageDisplay'));
	}
}

function init_attributes_area() {
	if ($('useAttribute_0').getProperty('checked') == true) {
		$('for_product_with_attributes').setStyle('display', 'none');
	}
	else {
		$('for_product_with_attributes').setStyle('display', 'block');
	}
}

function set_no_attribute() {
	$('for_product_with_attributes').setStyle('display', 'none');
	if ($('productID').getProperty('value') != '') {
		selectProductID();
	}
}

function set_with_attribute() {
	$('for_product_with_attributes').setStyle('display', 'block');
	if ($('productID').getProperty('value') != '') {
		selectProductID();
	}
}

function createImageInfo(size, image_info) {
	var div_image = new Element('div', {'id':size + '_image_info_container', 'class' : 'image_info_container'});
	var span_image_imagesize = new Element('span', {'id':size + '_imagesize'}).setText(image_info[size + '_imagesize']);
	var a_image = new Element('a', {'target' : 'blank', 'href' : '../' + image_info['path']});
	var img_image = new Element('img', {'src': '../' + image_info['path'], 'class': 'thumb_image'});
	if (size != 'small') {
		a_image = new Element('a', {'target' : 'blank', 'href' : '../' + image_info[size + '_filename']});
		img_image = new Element('img', {'src': '../' + image_info[size + '_filename'], 'class': 'thumb_image'});
	}
	var span_image_filesize = new Element('span', {'id':size + '_filesize'}).setText(image_info[size + '_filesize']);
	
	span_image_imagesize.injectInside(div_image);
	new Element('br').injectInside(div_image);
	img_image.injectInside(a_image);
	a_image.injectInside(div_image);
	new Element('br').injectInside(div_image);
	span_image_filesize.injectInside(div_image);
	
	return div_image;
}

function createRow(values_array, tr_id, tr_class, td_id_array, td_class_array) {
	if (typeof(tr_id) == 'undefined') var tr_id = '';
	if (typeof(tr_class) == 'undefined') var tr_class = '';
	if (typeof(td_id_array) == 'undefined') {
		var td_id_array = new Array();
		values_array.each(function(item, index){
			td_id_array[index] = '';
		});
	}
	if (typeof(td_class_array) == 'undefined') {
		var td_class_array = new Array();
		values_array.each(function(item, index){
			td_class_array[index] = '';
		});
	}
	
	var tr = new Element('tr', {'id':tr_id, 'class':tr_class});
	values_array.each(function(item, index) {
		var td = new Element('td', {'id':td_id_array[index], 'class':td_class_array[index]});
		if(typeof(item) == 'object') {
			item.injectInside(td);
		}
		else {
			td.setText(item);
		}
		td.injectInside(tr);
	});
	
	return tr;
}	

function selectCategoryID() {
	var categoryID = document.getElementById('categoryID').value;
	submit_values('AJAX_servers/AJAX_image_swapper_server.php', ['action', 'category_id', 'id'], ['loadProducts', categoryID, Number(new Date)]); 
}

function selectProductID() {
	var productID = document.getElementById('productID').value;
	if ($('useAttribute_0').getProperty('checked') == true) {
		show_editable_image_info('new');
		submit_values('AJAX_servers/AJAX_image_swapper_server.php', ['action', 'product_id', 'id'], ['loadImages', productID, Number(new Date)]);
	}
	else {
		submit_values('AJAX_servers/AJAX_image_swapper_server.php', ['action', 'product_id', 'id'], ['loadAttributes', productID, Number(new Date)]); 
	}
}

function selectAttributeID() {
	var productID = document.getElementById('productID').value;
	var attributeID = document.getElementById('attributeID').value;
	submit_values('AJAX_servers/AJAX_image_swapper_server.php', ['action', 'product_id', 'attribute_id', 'id'], ['loadOptions', productID, attributeID, Number(new Date)]); 
}

function selectOptionID() {
	var optionID = document.getElementById('optionID').value;
	show_editable_image_info('new');
	submit_values('AJAX_servers/AJAX_image_swapper_server.php', ['action', 'option_id', 'id'], ['loadImages', optionID, Number(new Date)]);
}

function displayImageName() {
	var imageName = document.getElementById('smallImage').value;
	imageName = imageName.slice(imageName.lastIndexOf('\\')+1);
	var selectElement = document.getElementById('imageName');
	selectElement.innerHTML = imageName;
	var selectElement = window.parent.document.getElementById('input_title');
	if (selectElement.value == '') {
		selectElement.value = imageName;
	}
}

function selectImage() {
	var imageID = document.getElementById('imageList').value;
	var imageDisplay = document.getElementById('imageDisplay');
	submit_values('AJAX_servers/AJAX_image_swapper_server.php', ['action', 'image_id', 'id'], ['selectImage', imageID, Number(new Date)]);
}

function delImage() {
	var imageID = document.getElementById('imageList').value;
	if ($('useAttribute_0').getProperty('checked') == true) {
		var productID = document.getElementById('productID').value;
		submit_values('AJAX_servers/AJAX_image_swapper_server.php', ['action', 'product_id', 'image_id', 'id'], ['delImage', productID, imageID, Number(new Date)]);
	}
	else {
		var optionID = document.getElementById('optionID').value;
		submit_values('AJAX_servers/AJAX_image_swapper_server.php', ['action', 'option_id', 'image_id', 'id'], ['delImage', optionID, imageID, Number(new Date)]);
	}
}

function cleanUp() {
	submit_values('AJAX_servers/AJAX_image_swapper_server.php', ['action', 'id'], ['cleanUp', Number(new Date)]);
}

function setupImages() {
	submit_values('AJAX_servers/AJAX_image_swapper_server.php', ['action', 'id'], ['setupImages', Number(new Date)]);
}

//example: submit_values('AJAX_servers/AJAX_image_swapper_server.php', ['action', 'new_order','new_title','image_id', 'option_id', 'id'], ['update', new_order, new_title, image_id, option_id, Number(new Date)]);
function submit_values(url, key_list, value_list) {
	var url_string = '';

	for(var i=0; i<key_list.length;i++) {
		if (i > 0) {
			url_string += '&' + key_list[i] + '=' + value_list[i];
		}
		else {
			url_string += key_list[i] + '=' + value_list[i];
		}
	}
	
	if (window.ActiveXObject) {
		xHRObject.open("GET", url + "?" + url_string, true);	
		xHRObject.onreadystatechange = getData;
	}
	else if (window.XMLHttpRequest) {
		xHRObject.onreadystatechange = getData;
		xHRObject.open("GET", url + "?" + url_string, true);	
	}
	xHRObject.send(null);
}