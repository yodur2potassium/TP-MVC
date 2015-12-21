<?php
namespace Imie\Models;

use DateTime;

class PersonDTO{
  private $id = -1; // int
  private $firstName; // string
  private $lastName; // string
  private $city; // string
  private $birthDate; // DateTime

  public function __construct(){
    $this->birthDate = new DateTime();
  }

  public function setId($id){
    $this->id = $id;
    return $this;
  }

  public function getId(){
    return $this->id;
  }

  public function setFirstName($firstName){
    $this->firstName = $firstName;
    return $this;
  }

  public function getFirstName(){
    return $this->firstName;
  }

  public function setLastName($lastName){
    $this->lastName = $lastName;
    return $this;
  }

  public function getLastName(){
    return $this->lastName;
  }

  public function getCity(){
    return $this->city;
  }

  public function setCity($city){
    $this->city = $city;
    return $this;
  }

  public function getBirthDate(){
    return $this->birthDate;
  }

  // return the birth date in SQL format : 1985-02-24
  public function getBirthDateSQL(){
    return $this->birthDate->format('Y-m-d');
  }

  // return the birth date in FR format : 24-02-1985
  public function getBirthDateFR(){
    return $this->birthDate->format('d-m-Y');
  }

  // set birthDate (DateTime given)
  public function setBirthDateDT(DateTime $date){
    $this->birthDate = $date;
    return $this;
  }

  // set birthDate (String in SQL format given)
  public function setBirthDateSQL($birthDate){
    if(!$this->birthDate = DateTime::createFromFormat('Y-m-d', $birthDate)){
      $this->birthDate = new DateTime();
    }
    return $this;
  }

  // set birthDate (String in FR format given)
  public function setBirthDate($birthDate){
    if(!$this->birthDate = DateTime::createFromFormat('d-m-Y', $birthDate)){
      $this->birthDate = new DateTime();
    }
    // Equivalent to :
    // $this->birthDate = DateTime::createFromFormat('d-m-Y', $birthDate);
    // if(!$this->birthDate){
    //   $this->birthDate = new DateTime();
    // }

    return $this;
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
    $this->setId($res['personne_id'])
      ->setLastName($res['nom'])
      ->setFirstName($res['prenom'])
      ->setCity($res['ville'])
      ->setBirthDateSQL($res['date_naissance']);

    return $this;
  }

  public function __toString(){
    return  "[firstName] : " . $this->firstName . "<br/>" .
            "[lastName] : " . $this->lastName . "<br/>" .
            "[city] : " . $this->city . "<br/>" .
            "[birthDate] : " . $this->getBirthDateFR() . "<br/>";
  }

}
