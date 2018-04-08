<?php
$h = "HOLA";
echo "HOME";
require_once(APP_VIEW_PARTIAL.'menu.html');

class HomeController {
  
  function __construct(){
    echo "HOME instanciada";
  }
  
  public function hola($algo,$num) {
    echo "SALUDO ".$algo.$num;
  }
}
?>