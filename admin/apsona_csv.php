<?php
//
// Apsona: export to CSV
// Author: zen-cart@apsona.com
// Copyright 2009 apsona.com
//

require ("includes/functions/apsona_functions.php");
if (isset($_POST['admin_name']) && isset ($_POST['admin_pass']) ) { // Post directly to this page: Allow for API-based access
    $admin_name = $_POST['admin_name'];
    $admin_pass = $_POST['admin_pass'];
    $tableName  = $_POST['tableName'];
    
    // Have to go directly to mysql, without using the ZenCart queryFactory, because the latter wants IS_ADMIN_FLAG to be set.
    require ("includes/configure.php");
    require ("includes/functions/general.php");
    require ("includes/functions/password_funcs.php");
    require (DIR_FS_CATALOG . DIR_WS_INCLUDES . "database_tables.php");
    $resource = mysql_connect (DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, true);
    mysql_select_db (DB_DATABASE, $resource);
    $result = mysql_query ("select admin_id, admin_name, admin_pass from " . TABLE_ADMIN . " where admin_name = '" . addslashes ($admin_name) . "'");
    $ok = false;
    if ($result) {
        $row = mysql_fetch_assoc ($result);
        if ($row && ($admin_name == $row['admin_name']) && zen_validate_password($admin_pass, $row['admin_pass'])) {
            if (isset ($_POST['date_since'])) {
                $dateSince = $_POST['date_since'];
                list($month, $day, $year) = explode('/', $dateSince);
                $dateSince = $year . ((strlen($month) == 1) ? '0' . $month : $month) . ((strlen($day) == 1) ? '0' . $day : $day);
            } else {
                $dateSince = "19700101";
            }
            apsona_writeCSV ($resource, $tableName, $dateSince);
        } else {
            header ('HTTP/1.0 403 Forbidden');
        }
    } else {
        header ('HTTP/1.0 403 Forbidden');
    }
    mysql_close ($resource);
    exit();
}

// Access via browser

require('includes/application_top.php');

$tableName = $_GET["tableName"];
if (isset ($tableName)) {
    $dateSince = zen_db_prepare_input($_GET['date_since']);
    if (zen_not_null($dateSince)) {
        list($month, $day, $year) = explode('/', $dateSince);
        $dateSince = $year . ((strlen($month) == 1) ? '0' . $month : $month) . ((strlen($day) == 1) ? '0' . $day : $day);
    } else {
        $dateSince = "19700101";
    }
    header("Content-type: text/csv");
    header("Content-disposition: attachment;filename=" . $tableName . ".csv");
    apsona_writeCSV ($db->link, $tableName, $dateSince);
} else {
?>
<html>
  <head>
    <title>Download your data in CSV format</title>
    <meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>"/> 
    <link rel="stylesheet" type="text/css" href="includes/stylesheet.css"/>
    <link rel="stylesheet" type="text/css" href="includes/cssjsmenuhover.css" media="all" id="hoverJS" />
    <link rel="stylesheet" type="text/css" href="includes/javascript/spiffyCal/spiffyCal_v2_1.css"/>
    <script type="text/javascript" src="includes/javascript/spiffyCal/spiffyCal_v2_1.js"></script>
    <script type="text/javascript" src="includes/menu.js"></script>
    <script type="text/javascript" src="includes/general.js"></script>
    <script type="text/javascript">
        function init() {
            cssjsmenu('navbar');
            if (document.getElementById) {
                var kill = document.getElementById('hoverJS');
                kill.disabled = true;
            }
        }
        var dateSince = new ctlSpiffyCalendarBox("dateSince", "download_csv", "date_since","btnDate1","",scBTNMODE_CUSTOMBLUE);
    </script>
  </head>
  <body onLoad="init()">
    <?php require(DIR_WS_INCLUDES . 'header.php'); ?>
    <h1>Download your data in CSV format</h1>
    Choose the table below to download your data records in CSV format. You can open the resulting files with
    spreadsheet programs such as Microsoft Excel.
    <form method="get" action="apsona_csv.php" name="download_csv">
      <table>
        <tr valign="top">
          <td>Records to download:</td>
          <td>
            <ul style="list-style: none;">
              <li><input type="radio" name="tableName" value="categories" id="radio_categories" checked/><label for="radio_categories">Product categories</label></li>
              <li><input type="radio" name="tableName" value="products" id="radio_products"/><label for="radio_products">Products</label></li>
              <li><input type="radio" name="tableName" value="customers" id="radio_customers"/><label for="radio_customers">Customer records</label></li>
              <li><input type="radio" name="tableName" value="orders" id="radio_orders"/><label for="radio_orders">Orders</label></li>
              <li><input type="radio" name="tableName" value="orders_products" id="radio_orders_products"/><label for="radio_orders_products">Order products</label></li>
              <li><input type="radio" name="tableName" value="orders_products_attributes" id="radio_orders_products_attributes"/><label for="radio_orders_products_attributes">Order product attributes</label></li>
              <li><input type="radio" name="tableName" value="orders_status_history" id="radio_orders_status_history"/><label for="radio_orders_status_history">Order status history</label></li>
            </ul>
          </td>
        </tr>
        <tr>
          <td>Added or changed since date:<br/>(MM/dd/yyyy format)</td>
          <td><script type="text/javascript">dateSince.writeControl();dateSince.dateFormat="MM/dd/yyyy";</script></td>
        </tr>
        <tr><td></td><td><input type="submit" value="Download" /></td></tr>
      </table>
    </form>
    <p style="margin-top: 20px;">
    This module is provided by <a href="http://apsona.com" target="_blank">apsona.com</a>, a data management tool for e-commerce.
    </p>
    <div id="spiffycalendar" class="text"></div>
  </body>
</html>
<?php
}

require(DIR_WS_INCLUDES . 'application_bottom.php');
?>