<?php
class Utilisateur{
  private $nom, $mdp, $mail, $prenom;

  public function __construct($donnees){
    $this->hydrate($donnees);
  }

  public function getMail() {
    return $this->mail;
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
    return $this->prenom;
  }

  public function setMail($mail) {
    if (is_string($mail)) {
      $this->mail = $mail;
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

  public function setDateNaissance($date) {
    if (is_string($date)) {
      $this->date = $date;
    }
  }

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
