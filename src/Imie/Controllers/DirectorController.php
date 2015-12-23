<?php
namespace Imie\Controllers;

session_start();

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

  public function formAction()
  {
    $this->render("directors/form", array("action" => "process",
    "director" => new DirectorDTO));
  }

  public function modFormAction()
  {
    if(isset($_GET["id"])){
      $dao = new DirectorDAO;
      $id = intval($_GET["id"]);
      $director = $dao->find($id);
      $this->render("directors/form", array("action" => "process",
      "director" => $director));
    }else{
      header("Location: index.php?ctrl=director&act=index");
    }
  }

  public function processAction()
  {
    if(isset($_POST["name"])&& !empty($_POST["name"])){
      $d =new DirectorDTO;
      $d->setName(strip_tags($_POST["name"]))->setId(intval($_POST["id"]));
      $dao = new DirectorDAO;
      if(-1 === intval($_POST["id"])){
        $dao->insert($d);
        $_SESSION["success"]= $d->getName()." à été ajouté à la BDD.";
      }else{
        $dao->update($d);
        $_SESSION["success"]= $d->getName()." à été modifié";
        header("Location: index.php?ctrl=director&act=index");
      }

    }else{
      $_SESSION["error"]= "Veuillez entrer un Nom, svp.";
    }
    header("Location: index.php?ctrl=director&act=form");
  }
}
;
