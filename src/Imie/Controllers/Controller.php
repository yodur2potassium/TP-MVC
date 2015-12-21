<?php

namespace Imie\Controllers;


abstract class Controller{

  public function render($view, $params = false){
    $path = _VIEWPATH_ . $view . ".php";

    if(file_exists($path)){
      if($params){
        foreach ($params as $key => $value) {
          $$key = $value;
        }
      }

      include_once $path;
    }
    else{
      echo "La vue n'existe pas.";
    }
  }


}
