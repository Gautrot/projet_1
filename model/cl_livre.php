<?php
class Livre{
  private $livnom, $livaut, $livth;

  public function __construct($donnees){
    $this->hydrate($donnees);
  }

# Getters

  public function getLivnom() {
    return $this->livnom;
  }

  public function getLivaut() {
    return $this->livaut;
  }

  public function getLivth() {
    return $this->livth;
  }

# Setters

  public function setLivnom($livnom) {
    if (is_string($livnom)) {
      $this->livnom = $livnom;
    }
  }

  public function setLivaut($livaut) {
    if (is_string($livaut)) {
      $this->livaut = $livaut;
    }
  }

  public function setLivth($livth) {
    if (is_string($livth)) {
      $this->livth = $livth;
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
