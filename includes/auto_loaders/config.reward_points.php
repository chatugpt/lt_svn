<?php	
	$autoLoadConfig[80][] = array('autoType'=>'class',
                              'loadFile'=>'store_credit.php');	

	$autoLoadConfig[90][] = array('autoType'=>'class',
                              'loadFile'=>'observers/class.store_credit.php');
	$autoLoadConfig[90][] = array('autoType'=>'classInstantiate',
                              'className'=>'storeCreditObserver',
                              'objectName'=>'storeCreditObserver');
?>