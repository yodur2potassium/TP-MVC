<?php
namespace Imie\Controllers;

class Router{

  public function dispatch(){
    $flag = false;

    if(isset($_GET['ctrl'], $_GET['act'])){

      $ctrlName = "Imie\\Controllers\\" .ucfirst($_GET['ctrl']) . 'Controller';

      if(class_exists($ctrlName)){
        $ctrl = new $ctrlName();

        $actName = $_GET['act'] . 'Action';

        if(method_exists($ctrl, $actName)){
          $ctrl->$actName();
          $flag = true;
        }
      }
    }

    if(!$flag){
      $controller = new DefaultController();
      $controller->indexAction();
      echo "Bump";
    }

  }

}
