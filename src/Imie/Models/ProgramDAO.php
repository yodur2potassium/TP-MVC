<?php
namespace Imie\Models;

use  PDO;

/**
 *
 */
class ProgramDAO
{
  private $pdo;

  function __construct()
  {
    $this->pdo = MyPdo::getPdo();
  }

  public function findAll()
  {
    $programs = [];
    //SQL request of all columns, return an associtive array
    $stmt = $this->pdo->prepare("SELECT programme_id, realisateur_id, type_id, duree,
      nom_programme FROM programme");
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //go through the array and hydrate
    foreach ($results as $result) {
      $p = new ProgramDTO;
      $p->hydrateSQL($result);
      $programs[] = $p;
    }
    //return an array of objects
    return $programs;
  }
}

 ?>
