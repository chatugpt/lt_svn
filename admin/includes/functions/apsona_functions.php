<?php
//
// Apsona functions: Needed to export data to Apsona in CSV format
//
//
// Author: zen-cart@apsona.com
// Copyright 2009 apsona.com
//
function apsona_toCSV ($fields) {
    $delimiter = ',';
    $enclosure = '"';
    $i = 0;
    $csvline = '';
    $escape_char = '\\';
    $field_cnt = count($fields);
    $enc_is_quote = in_array ($enclosure, array('"',"'"));
    reset($fields);

    foreach( $fields AS $name => $value ) {
		$value=mb_convert_encoding($value,"CP936","UTF8");
        if ($i > 0) {
            $csvline .= $delimiter;
        }
        $csvline .= $enclosure;
        /* enclose a field that contains a delimiter, an enclosure character, or a newline */
        if( is_string($value)) {
            $csvline .= str_replace (array ($enclosure, "\r\n", "\r"),  array ($enclosure . $enclosure, "\n", ""), $value);
        } else {
            $csvline .= $value;
        }
        $csvline .= $enclosure;
        $i++;
    }

    $csvline .= "\n";

    return $csvline;
};


function apsona_writeCSV ($dbResource, $tableName, $dateSince) {

    // Do not change the field aliases in the 'as' clauses of the queries below, because they are matched exactly on the
    // Apsona end.

    switch ($tableName) {
    case "categories":
        $query = 'select
        c.categories_id as uuid,
        c.categories_image as category__image,
        d.categories_name as category__name,
        d.categories_description as category__description,
        cp.categories_name as category__parent_name,
        c.sort_order as category__sort_order,
        c.date_added as category__date_added,
        c.last_modified as category__last_Modified,
        c.categories_status as category__enabled
        from ' . TABLE_CATEGORIES . ' c, ' .TABLE_CATEGORIES_DESCRIPTION . ' d, ' .
        TABLE_CATEGORIES_DESCRIPTION . ' cp
        where c.categories_id = d.categories_id and c.parent_id = cp.categories_id and
        d.language_id = 1 and cp.language_id = 1 and
        (c.date_added >= ' . $dateSince . '  or c.last_modified >= ' . $dateSince . ')';
        break;

    case "customers":
        $query = 'SELECT
        c.customers_id as uuid,
        c.customers_gender as customer__gender,
        c.customers_firstname as customer__first_name,
        c.customers_lastname as customer__last_name,
        c.customers_dob as customer__DOB,
        c.customers_email_address as customer__email_address,
        c.customers_nick as customer__nickname,
        c.customers_telephone as customer__telephone,
        c.customers_fax as customer__fax,
        c.customers_newsletter as customer__newsletter_ok,
        c.customers_group_pricing as customer__group_pricing,
        c.customers_email_format as customer__email_format,
        c.customers_authorization as customer__authorization,
        c.customers_referral as customer__referral,
        o.entry_street_address as customer__street_address,
        o.entry_suburb as customer__suburb,
        o.entry_postcode as customer__postcode,
        o.entry_city as customer__city,
        z.zone_name as customer__state,
        t.countries_name as customer__country,
        ci.customers_info_date_account_created as created,
        ci.customers_info_date_account_last_modified as modified
        FROM ' . TABLE_CUSTOMERS . ' c, ' . TABLE_ADDRESS_BOOK . ' o, ' . TABLE_ZONES . ' z, ' . TABLE_COUNTRIES . ' t, ' . TABLE_CUSTOMERS_INFO . ' ci
        WHERE c.customers_default_address_id = o.address_book_id and o.entry_country_id = t.countries_id and ci.customers_info_id = c.customers_id and
        z.zone_id = o.entry_zone_id and
        (ci.customers_info_date_account_created >= ' . $dateSince . ' or ci.customers_info_date_account_last_modified >= ' . $dateSince . ')';
        break;

    case "orders":
        $query = 'SELECT
        orders.orders_id as uuid,
        orders.customers_id as order__customer_id,
        orders.customers_name as order__customer_name,
        orders.customers_company as order__customer_company,
        orders.customers_street_address as order__customer_street_address,
        orders.customers_suburb as order__customer_suburb,
        orders.customers_city as order__customer_city,
        orders.customers_postcode as order__customer_postcode,
        orders.customers_state as order__customer_state,
        orders.customers_country as order__customer_country,
        orders.customers_telephone as order__customer_telephone,
        orders.customers_email_address as order__customer_email_address,
        orders.delivery_name as order__delivery_name,
        orders.delivery_company as order__delivery_company,
        orders.delivery_street_address as order__delivery_street_address,
        orders.delivery_suburb as order__delivery_suburb,
        orders.delivery_city as order__delivery_city,
        orders.delivery_postcode as order__delivery_postcode,
        orders.delivery_state as order__delivery_state,
        orders.delivery_country as order__delivery_country,
        orders.billing_name as order__billing_name,
        orders.billing_company as order__billing_company,
        orders.billing_street_address as order__billing_street_address,
        orders.billing_suburb as order__billing_suburb,
        orders.billing_city as order__billing_city,
        orders.billing_postcode as order__billing_postcode,
        orders.billing_state as order__billing_state,
        orders.billing_country as order__billing_country,
        orders.payment_method as order__payment_method,
        orders.payment_module_code as order__payment_module_code,
        orders.shipping_method as order__shipping_method,
        orders.shipping_module_code as order__shipping_module_code,
        orders.coupon_code as order__coupon_code,
        orders.last_modified as order__last_modified,
        orders.date_purchased as order__date_purchased,
        orders.orders_status as order__order_status,
        orders_status.orders_status_name as order__order_status_name,
        orders.orders_date_finished as order__date_finished,
        orders.currency as order__currency,
        orders.currency_value as order__currency_value,
        orders.order_total as order__order_total,
        orders.order_tax as order__order_tax,
        orders.ip_address as order__ip_address
        FROM ' . TABLE_ORDERS . ' orders, ' . TABLE_ORDERS_STATUS .' orders_status
        WHERE orders.orders_status = orders_status.orders_status_id and orders.date_purchased >= '. $dateSince;
        break;

    case "orders_products_attributes":
        $query = 'select
        opa.orders_products_attributes_id as uuid,
        opa.orders_products_id as opa__order_product_id,
        opa.products_options as opa__product_option,
        opa.products_options_values as opa__product_option_value,
        opa.options_values_price as opa__option_value_price,
        opa.price_prefix as opa__price_prefix,
        opa.product_attribute_is_free as opa__product_attribute_is_free,
        opa.products_attributes_weight as opa__product_attribute_weight,
        opa.products_attributes_weight_prefix as opa__product_attribute_weight_prefix,
        opa.attributes_discounted as opa__attribute_discounted,
        opa.attributes_price_base_included as opa__attribute_price_base_included,
        opa.attributes_price_onetime as opa__attribute_price_onetime,
        opa.attributes_price_factor as opa__attribute_price_factor,
        opa.attributes_price_factor_offset as opa__attribute_price_factor_offset,
        opa.attributes_price_factor_onetime as opa__attribute_price_factor_onetime,
        opa.attributes_price_factor_onetime_offset as opa__attribute_price_factor_onetime_offset,
        opa.attributes_qty_prices as opa__attributes_qty_price,
        opa.attributes_qty_prices_onetime as opa__attributes_qty_price_onetime,
        opa.attributes_price_words as opa__attributes_price_words,
        opa.attributes_price_words_free as opa__attributes_price_words_free,
        opa.attributes_price_letters as opa__attributes_price_letters,
        opa.attributes_price_letters_free as opa__attributes_price_letters_free
        from ' . TABLE_ORDERS_PRODUCTS_ATTRIBUTES . ' opa, ' . TABLE_ORDERS . ' orders
        where opa.orders_id = orders.orders_id and orders.date_purchased >= '. $dateSince;
        break;

    case "orders_products":
        $query = 'SELECT
        o.orders_products_id as uuid,
        o.orders_id as order_product__order_id,
        o.products_id as order_product__product_id,
        o.products_model as order_product__product_model,
        o.products_name as order_product__product_name,
        o.products_price as order_product__product_price,
        o.final_price as order_product__final_price,
        o.products_tax as order_product__product_tax,
        o.products_quantity as order_product__product_quantity,
        o.onetime_charges as order_product__onetime_charges,
        o.products_priced_by_attribute as order_product__product_priced_by_attribute,
        o.product_is_free as order_product__product_is_free,
        o.products_discount_type as order_product__product_discount_type,
        o.products_discount_type_from as order_product__products_discount_type_from,
        o.products_prid as order_product__products_prid
        FROM ' . TABLE_ORDERS_PRODUCTS . ' as o, ' . TABLE_ORDERS . ' orders
        where o.orders_id = orders.orders_id and orders.date_purchased >= '. $dateSince;
        break;

    case "orders_status_history":
        $query = 'SELECT
        osh.orders_status_history_id as uuid,
        osh.orders_id as osh__order_id,
        osh.date_added as osh__date_added,
        osh.customer_notified as osh__customer_notified,
        os.orders_status_name as osh__order_status_name,
        osh.comments as osh__comments
        from ' . TABLE_ORDERS_STATUS_HISTORY . ' osh, ' . TABLE_ORDERS_STATUS . ' os
        where osh.orders_status_id = os.orders_status_id';
        break;

    case "products":
        $query = 'select
        p.products_id as uuid,
        t.type_name as product__type,
        d.products_name as product__name,
        d.products_description as product__description,
        d.products_url as product__url,
        d.products_viewed as product__viewed_count,
        p.products_quantity as product__quantity,
        p.products_model as product__model,
        p.products_image as product__image,
        p.products_price as product__price,
        p.products_virtual as product__is_virtual,
        p.products_date_added as product__date_added,
        p.products_last_modified as product__last_modified,
        p.products_date_available as product__date_available,
        p.products_weight as product__weight,
        p.products_status as product__enabled,
        p.products_tax_class_id as product__taxable,
        m.manufacturers_name as product__manufacturer,
        p.products_ordered as product__products_ordered,
        p.products_quantity_order_min as product__min_order_quantity,
        p.products_quantity_order_units as product__quantity_order_units,
        p.products_priced_by_attribute as product__priced_by_attribute,
        p.product_is_free as product__is_free,
        p.product_is_call as product__is_call,
        p.products_quantity_mixed as product__quantity_mixed,
        p.product_is_always_free_shipping as product__is_always_free_shipping,
        p.products_qty_box_status as product__qty_box_status_enabled,
        p.products_quantity_order_max as product__max_order_quantity,
        p.products_sort_order as product__sort_order,
        p.products_discount_type as product__discount_type,
        p.products_discount_type_from as product__discount_type_from,
        p.products_price_sorter as product__products_price_sorter,
        p.master_categories_id as product__master_category_id,
        p.products_mixed_discount_quantity as product__products_mixed_discount_quantity,
        p.metatags_title_status as product__metatag_title_enabled,
        p.metatags_products_name_status as product__metatag_product_name_enabled,
        p.metatags_model_status as product__metatags_model_enabled,
        p.metatags_price_status as product__metatag_price_enabled,
        p.metatags_title_tagline_status as product__metatag_title_tagline_enabled
        from ' . TABLE_PRODUCTS . ' p left join ' . TABLE_MANUFACTURERS . ' m on p.manufacturers_id = m.manufacturers_id,
        ' . TABLE_PRODUCT_TYPES . ' t, '. TABLE_PRODUCTS_DESCRIPTION . ' d
        where  p.products_id = d.products_id and d.language_id = 1 and p.products_type = t.type_id and
        (p.products_date_added >= ' . $dateSince . ' or p.products_last_modified >= ' . $dateSince . ')';
        break;
    };

    if (isset ($query)) {
        $qResult = mysql_query ($query, $dbResource);
        if ($qResult) {
            $nFields = mysql_num_fields ($qResult);
            for ($i = 0; $i < $nFields; $i++) {
                if ($i > 0) {
                    echo ",";
                }
                echo '"' . mysql_field_name ($qResult, $i) . '"';
            }
            echo "\n";
            while ($row = mysql_fetch_assoc ($qResult)) {
                $line = apsona_toCSV ($row);
                echo $line;
            };
        }
    }
};

?>
