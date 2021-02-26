<?php
class Utilisateur{
  private $nom, $mdp, $email, $prenom, $datenaissance, $rang;

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

  public function getDateNaissance() {
    return $this->datenaissance;
  }

  public function getRang() {
    return $this->rang;
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

  public function setDateNaissance($datenaissance) {
    if (is_string($datenaissance)) {
      $this->dateNaissance = $datenaissance;
    }
  }

  public function setrang($rang) {
    if (is_string($rang)) {
      $this->rang = $rang;
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
