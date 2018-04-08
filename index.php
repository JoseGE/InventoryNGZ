<?php

require_once('core/AppConfig.php');
include(APP_VIEW_SECTION.'header/header.php');
// $controller = (isset($_GET['controller']) ? $_GET['controller'] : "IndexController";
// $method     = (isset($_GET['action1']) ? $_GET['action1'] : "IndexAction";
// $param      = (isset($_GET['action2']) ? $_GET['action2'] : "";
// $action3= (isset($_GET['action3']) ? $_GET['action3'] : "";
// if(isset($_GET['page'])) {
//   $fileController = APP_CONTROLLER.$_GET['page'].'Controller.php';
//   if(file_exists($fileController)) {
//     include($fileController);
//   } else {
//     echo $fileController." Does not exist";
//   }
  
// }


//MEJORAR 
if(isset($_GET['url'])) {
  $page = null;
  $url = explode('/',$_GET['url']);
  $controller = ucwords($url[0]).'Controller';
  unset($url[0]);
   if(file_exists(APP_CONTROLLER.$controller.'.php')){ // verifica que el archivo de controlador existe
       include(APP_CONTROLLER.$controller.'.php'); // se incluye la clase de controlador al index
        if(class_exists($controller,false)) { // verificamos si existe la clase llamada
          $page = new $controller();
        }
      }else {
         throw new Exception( "Class Controller ".$controller." not found in: ".__LINE__ ); 
      }
    if(count($url) > 1) { // en caso de que la ruta sea un controller/method/param realiza esto 
      $method = $url[1];
      unset($url[1]);
      if(is_a($page,$controller) && method_exists($page,$method)) { // verifica si el metodo que se require llamar esta en la clase instanciada antes
        $param = (count($url) > 0) ? implode(',',array_values($url)) : '';
        var_dump($param);
        $page->$method($param); // invocar metodo
         
      }
    }
    var_dump($url);

}
include(APP_VIEW_SECTION.'footer/footer.php');