<?php
class Animal implements JsonSerializable {

  //attributes
  private $planet = 'Earth';
  private $age = 0;
  private $species = "unknown species";
  private $energy = 1;
  private $weight = 1;
  private $name = "";
  private $strength = 1;

  //---------------------------------------------
  public function getPlanet() {
      return $this->planet;
  }

  public function getAge() {
      return $this->age;
  }

  public function getSpecies() {
      return $this->species;
  }

  public function getWeight() {
      return $this->weight;
  }

  public function getEnergy() {
      return $this->energy;
  }

  public function getName() {
      return $this->name;
  }

  public function getStrength() {
      return $this->strength;
  }

  // --------------------------------------------
  public function setPlanet($v) {
      $this->planet = $v;
  }

  public function setAge($v) {
      $this->age = $v;
  }

  public function setSpecies($v){
      $this->species = $v;
  }

  public function setWeight($v) {
      $this->weight = $v;
  }

  public function setEnergy($v){
      $this->energy = $v;
  }

  public function setName($v){
      $this->name = $v;
  }

  public function setStrength($v){
      $this->strength = $v;
  }

  public function activity($a) {
    switch($a) {
      case "sleep":
        $w=-1;
        $e=3;
        break;
      case "sport":
        $w=-2;
        $e=2;
        break;
      case "dev":
        $w=1;
        $e=-2;
        break;
      case "tv":
        $w=3;
        $e=-1;
        break;
      default:
        $w=0;
        $e=-1;
        break;
    }
    $this->setWeight($this->weight+$w);
    $this->setEnergy($this->energy+$e);
  }




  public function beBorn() {
    //can access private properties
  }

  public function eat($f) {
    //can access private properties
    switch($f) {
      case "apple":
        $w=1;
        $e=2;
        break;
      case "meat":
        $w=2;
        $e=1;
        break;
      case "junkFood":
        $w=3;
        $e=-1;
        break;
      default:
        $w=1;
        $e=0;
        break;
    }
    $this->setWeight($this->weight+$w);
    $this->setEnergy($this->energy+$e);
  }

  public function move() {
    //can access private properties
  }

  public function manageWeight($w) {
    $this->weight += $w;
  }

  public function manageEnergy($e) {
    $this->energy += $e;
  }

  public function jsonSerialize() {
    return(get_object_vars($this));
  }

}
?>
