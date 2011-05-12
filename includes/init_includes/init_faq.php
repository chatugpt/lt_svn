<?php
/**
 * Faq-Manager 
   Modification (http://www.imaginacolombia.com)

 */

// include the list of extra open-operations files
  if ($za_dir = @dir(DIR_WS_INCLUDES . 'open-operations')) {
    while ($zv_file = $za_dir->read()) {
      if (strstr($zv_file, '.php')) {
        require(DIR_WS_INCLUDES . 'open-operations/' . $zv_file);
      }
    }
  }
  ?>