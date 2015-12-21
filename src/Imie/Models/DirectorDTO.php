<?php
namespace Imie\Models;

use DateTime;

class DirectorDTO{
  private $id = -1; // int
  private $name; // string


  public function setId($id){
    $this->id = $id;
    return $this;
  }

  public function getId(){
    return $this->id;
  }

  public function setName($name){
    $this->name = $name;
    return $this;
  }

  public function getName(){
    return $this->name;
  }


  // Ok with $_POST in parameter
  // Input's name must be equivalent to the object attributes
  public function hydrate($donnees){
    foreach ($donnees as $key => $value){
      // On récupère le nom du setter correspondant à l'attribut.
      $method = 'set'.ucfirst($key);
      // Si le setter correspondant existe.
      if (method_exists($this, $method)) {
        // On appelle le setter.
        $this->$method($value);
      }
    }
    return $this;
  }

  // Ok to hydrate with SQL data
  public function hydrateSQL($res){
    $this->setId($res['nom_realisateur']);

    return $this;
  }

  public function __toString(){
    return  "[firstName] : " . $this->name . "<br/>" .
            "[ID] : " . $this->id . "<br/>";
  }

}
