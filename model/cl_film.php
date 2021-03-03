<?php
class Film{
  private $filmnom, $filmaut, $filmth;

  public function __construct($donnees){
    $this->hydrate($donnees);
  }

# Getters

  public function getFilmnom() {
    return $this->filmnom;
  }

  public function getFilmaut() {
    return $this->filmaut;
  }

  public function getFilmth() {
    return $this->filmth;
  }

# Setters

  public function setFilmnom($filmnom) {
    if (is_string($filmnom)) {
      $this->filmnom = $filmnom;
    }
  }

  public function setFilmaut($filmaut) {
    if (is_string($filmaut)) {
      $this->filmaut = $filmaut;
    }
  }

  public function setFilmth($filmth) {
    if (is_string($filmth)) {
      $this->filmth = $filmth;
    }
  }

# Hydratation

  public function hydrate(array $res) {
    foreach ($res as $key => $value) {
      $method = 'set'.ucfirst($key);
      if (method_exists($this, $method)) {
        $this->$method($value);
      }
    }
  }
}
?>
