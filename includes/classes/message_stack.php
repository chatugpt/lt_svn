<?php
/**
 * messageStack Class.
 *
 * @package classes
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: message_stack.php 5384 2006-12-24 19:38:39Z drbyte $
 */
if (!defined('IS_ADMIN_FLAG')) {
  die('Illegal Access');
}
/**
 * messageStack Class.
 * This class is used to manage messageStack alerts
 *
 * @package classes
 */
class messageStack extends base {

  // class constructor
  function messageStack() {

    $this->messages = array();

    if (isset($_SESSION['messageToStack']) && $_SESSION['messageToStack']) {
      $messageToStack = $_SESSION['messageToStack'];
      for ($i=0, $n=sizeof($messageToStack); $i<$n; $i++) {
        $this->add($messageToStack[$i]['class'], $messageToStack[$i]['text'], $messageToStack[$i]['type']);
      }
      $_SESSION['messageToStack']= '';
    }
  }
  // class methods
  function add($class, $message, $type = 'error') {
    global $template, $current_page_base;
	
    $message = trim($message);
    if (strlen($message) > 0) {
      if ($type == 'error') {
        $this->messages[] = array('params' => 'class="error_box larger"', 'class' => $class, 'text' => $message);
      } elseif ($type == 'warning') {
        $this->messages[] = array('params' => 'class="warning_box larger"', 'class' => $class, 'text' => $message);
      } elseif ($type == 'success') {
        $this->messages[] = array('params' => 'class="success_box larger"', 'class' => $class, 'text' => $message);
      } elseif ($type == 'caution') {
        $this->messages[] = array('params' => 'class="caution_box larger clear"', 'class' => $class, 'text' =>$message);
      } else {
        $this->messages[] = array('params' => 'class="error_box larger"', 'class' => $class, 'text' => $message);
      }
    }
  }

  function add_session($class, $message, $type = 'error') {

    if (!$_SESSION['messageToStack']) {
      $messageToStack = array();
    } else {
      $messageToStack = $_SESSION['messageToStack'];
    }

    $messageToStack[] = array('class' => $class, 'text' => $message, 'type' => $type);
    $_SESSION['messageToStack'] = $messageToStack;
    $this->add($class, $message, $type);
  }

  function reset() {
    $this->messages = array();
  }

  function output($class) {
    global $template, $current_page_base;

    $output = array();
	
    for ($i=0, $n=sizeof($this->messages); $i<1; $i++) {
      if ($this->messages[$i]['class'] == $class) {
        $output[] = $this->messages[$i];
      }
	 //echo $this->messages[$i]['class'];
    }

    // remove duplicates before displaying
//    $output = array_values(array_unique($output)); 

    require($template->get_template_dir('tpl_message_stack_default.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_message_stack_default.php');
  }

  function size($class) {
    $count = 0;

    for ($i=0, $n=sizeof($this->messages); $i<$n; $i++) {
      if ($this->messages[$i]['class'] == $class) {
        $count++;
      }
    }

    return $count;
  }
}
?>