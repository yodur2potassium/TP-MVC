<?php
namespace Imie\Models;
/**
 *
 */
class ProgramDTO
{
private $id;
private $director;
private $directorId;
private $type;
private $length;
private $name;

// Setters
public function setId($id)
{
  $this->id = $id;
  return $this;
}
public function setDirector(DirectorDTO $director)
{
  $this->director = $director;
  return $this;
}
public function setDirectorId($id)
{
  $this->directorId = $id;
  return $this;
}

public function setType($type)
{
  $this->type = $type;
  return $this;
}
public function setLength($length)
{
  $this->length = $length;
  return $this;
}
public function setName($name)
{
  $this->name = $name;
  return $this;
}

// Getters
public function getId()
{
  return $this->id;
}
public function getDirector()
{
  return $this->director;
}
public function getDirectorId()
{
  return $this->directorId;
}

public function getType()
{
  return $this->type;
}
public function getLength()
{
  return $this->length;
}
public function getName()
{
  return $this->name;
}
// Hydraters

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
public function hydrateSQL($res)
{
  $this->setId($res["programme_id"])
    ->setType($res["type_id"])
    ->setDirectorId($res["realisateur_id"])
    ->setLength($res["duree"])
    ->setName($res["nom_programme"]);
  return $this;
}
}


 ?>
