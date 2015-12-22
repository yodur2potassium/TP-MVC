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
    $this->render('directors/list', array(
      'directors' => $directors
    ));
  }

  public function detailsAction()
  {
    if(isset($_GET["id"])){
      $dao = new DirectorDAO();
      $director = $dao->find($_GET["id"]);
      $this->render("directors/details", array("director" => $director));

    }
  }

  public function deleteAction()
  {
    if(isset($_GET["id"])){
      $dao = new DirectorDAO();
      $dao->delete($_GET["id"]);
    }
    header("Location: index.php?ctrl=director&act=index");
  }

  public function cloneAction()
  {
    if(isset($_GET["id"])){
      $dao = new DirectorDAO();
      $director =$dao->find($_GET["id"]);
      $dao->insert($director);
    }
    header("Location: index.php?ctrl=director&act=index");
  }
}











;
