<?php

namespace Imie\Models;

use PDO;

class DirectorDAO{
  private $pdo;

  // You must give this DAO a PDO object
  public function __construct(){
    $this->pdo = MyPdo::getPdo();
  }

  // insert a DirectorDTO in database
  public function insert(DirectorDTO $p){
    $stmt = $this->pdo->prepare("INSERT INTO realisateur (nom_realisateur) VALUES (?);");
    // bind values of the object
    $stmt->bindValue(1, $p->getName());
    // execute statement
    $stmt->execute();
    // set the new Id
    $p->setId(intval($this->pdo->lastInsertId()));

    return $p;
  }

  // update one DirectorDTO in database
  public function update(DirectorDTO $p){
    // if id = -1, there is nothing to do
    if (-1 === $p->getid()) return;
    $rqt = "UPDATE realisateur SET nom_realisateur = ? WHERE realisateur_id = ?;";
    $stmt = $this->pdo->prepare($rqt);
    // bind values to the request
    $stmt->bindValue(1, $p->getName());
    $stmt->bindValue(2, $p->getId());
    // execute the request
    $stmt->execute();

  }

  // delete one DirectorDTO in database
  public function delete($id){
    // if id = -1, there is nothing to do
    if (-1 === $id) return;

    $rqt = "DELETE FROM realisateur WHERE realisateur_id = ?;";
    $stmt =$this->pdo->prepare($rqt);

    $stmt->bindValue(1, $id);

    $stmt->execute();
  }

  // delete one DirectorDTO in database
  public function deleteAll(){
    $rqt = "DELETE FROM realisateur;";
    $stmt =$this->pdo->prepare($rqt);

    $stmt->execute();
  }

  // get one DirectorDTO in database by his id
  public function find($id){
    $id = (int)$id;
    $p = false;

    $stmt = $this->pdo->prepare('SELECT realisateur_id, nom_realisateur FROM realisateur WHERE realisateur_id = ?;');
    $stmt->bindValue(1, $id);

    $stmt->execute();
    // Only one result, and it's an array
    // return only the association array with option FETCH_ASSOC
    $res = $stmt->fetch(PDO::FETCH_ASSOC);

    // $res can be null
    if($res){
      $p = new DirectorDTO();
      $p->hydrateSQL($res);
    }

    return $p;
  }

  // Find All person in database, return an array of DirectorDTO
  public function findAll(){
    // we will return this array
    $directors = [];

    $stmt = $this->pdo->prepare('SELECT realisateur_id, nom_realisateur FROM realisateur ORDER BY nom_realisateur;');

    $stmt->execute();
    // get All
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // parse each $results (it's an array)
    foreach ($results as $res) {
      // new Director instance
      $p = new DirectorDTO();
      $p->hydrateSQL($res);
      // add it to our array
      $directors[] = $p;
    }

    return $directors;
  }
}
