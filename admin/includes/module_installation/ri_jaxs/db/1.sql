SET @t4=0;
SELECT (@t4:=configuration_group_id) as t4 
FROM configuration_group
WHERE configuration_group_title= 'Cross Sell';
DELETE FROM configuration WHERE configuration_group_id = @t4;
DELETE FROM configuration_group WHERE configuration_group_id = @t4;

INSERT INTO configuration_group VALUES ('', 'Cross Sell', 'Set Cross Sell Options', '1', '1');
UPDATE configuration_group SET sort_order = last_insert_id() WHERE configuration_group_id = last_insert_id();

SET @t4=0;
SELECT (@t4:=configuration_group_id) as t4 
FROM configuration_group
WHERE configuration_group_title= 'Cross Sell';


UPDATE configuration SET configuration_group_id = @t4 WHERE configuration_key IN ('MIN_DISPLAY_XSELL','MAX_DISPLAY_XSELL','SHOW_PRODUCT_INFO_COLUMNS_XSELL_PRODUCTS','XSELL_DISPLAY_PRICE');

INSERT INTO configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES
('', 'Input type to be used in form', 'XSELL_FORM_INPUT_TYPE', 'model', 'Choose to use product ID or MODEL as your input type. Check readme file for more info', @t4, 1, NOW(), NOW(), NULL, 'zen_cfg_select_option(array(\'id\', \'model\'),');

INSERT INTO configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES
('', 'XSell Product Input Separator', 'XSELL_PRODUCT_INPUT_SEPARATOR', ',', 'You will need to insert all product id/model you want to cross-sell in 1 field, so each product id/model needs to be separated by a separator. The default is comma, choose another if you want to', @t4, 1, NOW(), NOW(), NULL, NULL);

INSERT INTO configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES
('', 'XSell Sort Order', 'XSELL_SORT_ORDER', 'sort_order', 'Sometimes you may want to display the xsell products randomly, especially if each product xsells with lots of others', @t4, 1, NOW(), NOW(), NULL, 'zen_cfg_select_option(array(\'sort_order\', \'random\'),');