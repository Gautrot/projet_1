<?php
class Utilisateur{
  private $login, $password, $email, $id;

  public function __construct($donnees){
    $this->hydrate($donnees);
  }

  public function getLogin() {
    return $this->login;
  }

  public function getPassword() {
    return $this->password;
  }

  public function getEmail() {
    return $this->email;
  }

  public function getId() {
    return $this->id;
  }

  public function setLogin($login) {
    if (is_string($login)) {
      $this->login = $login;
    }
  }

  public function setPassword($password) {
    if (is_string($password)) {
      $this->password = $password;
    }
  }

  public function setEmail($email) {
    if (is_string($email)) {
      $this->email = $email;
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
