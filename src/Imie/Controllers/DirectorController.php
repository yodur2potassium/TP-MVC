<?php
namespace Imie\Controllers;

use Imie\Models\DirectorDAO;
use Imie\Models\DirectorDTO;

class DirectorController extends Controller{

  // Show all persons
  public function indexAction(){
    $dao = new DirectorDAO();
    $directors = $dao->findAll();
    // First argument : the view ;
    // Second argument : associative array. key is the name
    // of the variable, value is it's value
    $this->render('directors', array(
      'directors' => $directors
    ));
  }

}











;
