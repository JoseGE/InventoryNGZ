<?php

require_once('core/AppConfig.php');
include(APP_VIEW_SECTION.'header/header.php');
if(isset($_GET['page'])) {
  $fileController = APP_CONTROLLER.$_GET['page'].'Controller.php';
  if(file_exists($fileController)) {
    include($fileController);
  } else {
    echo $fileController." Does not exist";
  }
  
}
include(APP_VIEW_SECTION.'footer/footer.php');