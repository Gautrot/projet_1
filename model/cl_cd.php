<?php
class Cd{
  private $cdnom, $cdaut, $cdth;

  public function __construct($donnees){
    $this->hydrate($donnees);
  }

# Getters

  public function getCdnom() {
    return $this->cdnom;
  }

  public function getCdaut() {
    return $this->cdaut;
  }

  public function getCdth() {
    return $this->cdth;
  }


# Setters

  public function setCdnom($cdnom) {
    if (is_string($cdnom)) {
      $this->cdnom = $cdnom;
    }
  }

  public function setCdaut($cdaut) {
    if (is_string($cdaut)) {
      $this->cdaut = $cdaut;
    }
  }

  public function setCdth($cdth) {
    if (is_string($cdth)) {
      $this->cdth = $cdth;
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
