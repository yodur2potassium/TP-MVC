<?php
namespace Imie\Controllers;

session_start();

use Imie\Models\ProgramDAO;
use Imie\Models\ProgramDTO;

class ProgramController extends Controller{

  // Show all persons
  public function indexAction(){
    $dao = new ProgramDAO();
    $programs = $dao->findAll();
    // First argument : the view ;
    // Second argument : associative array. key is the name
    // of the variable, value is it's value
    $this->render('programs/list', array(
      'programs' => $programs));
  }
}

?>
