<?php
class Utilisateur{
  private $nom, $mdp, $email, $prenom, $datenaissance, $rang;
  private $cdnom, $cdaut, $cdth, $livnom, $livaut, $livth, $filmnom, $filmaut, $filmth;

  public function __construct($donnees){
    $this->hydrate($donnees);
  }

# Getters

  public function getEmail() {
    return $this->email;
  }

  public function getMdp() {
    return $this->mdp;
  }

  public function getNom() {
    return $this->nom;
  }

  public function getPrenom() {
    return $this->prenom;
  }

  public function getDatenaissance() {
    return $this->datenaissance;
  }

  public function getRang() {
    return $this->rang;
  }

  public function getLivnom() {
    return $this->livnom;
  }

  public function getLivaut() {
    return $this->livaut;
  }

  public function getLivth() {
    return $this->livth;
  }

  public function getCdnom() {
    return $this->cdnom;
  }

  public function getCdaut() {
    return $this->cdaut;
  }

  public function getCdth() {
    return $this->cdth;
  }

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

  public function setEmail($email) {
    if (is_string($email)) {
      $this->email = $email;
    }
  }

  public function setMdp($mdp) {
    if (is_string($mdp)) {
      $this->mdp = $mdp;
    }
  }

  public function setNom($nom) {
    if (is_string($nom)) {
      $this->nom = $nom;
    }
  }

  public function setPrenom($prenom) {
    if (is_string($prenom)) {
      $this->prenom = $prenom;
    }
  }

  public function setDatenaissance($datenaissance) {
    if (is_string($datenaissance)) {
      $this->datenaissance = $datenaissance;
    }
  }

  public function setRang($rang) {
    if (is_string($rang)) {
      $this->rang = $rang;
    }
  }

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
