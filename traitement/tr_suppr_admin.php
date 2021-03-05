<?php
require_once '../model/cl_utilisateur.php';
require_once '../manager/cl_manager.php';
$liste = new Manager();
$res = $liste->listUtilisateur();

foreach ($res as $value) {
  try {
    #Instancie la classe Utilisateur
    $user = new Utilisateur([
      $value['id'] => $_POST['id']
    ]);
    #Instancie la classe Manager
    $manager = new Manager();
    #Excecute la fonction supprAdmin
    $manager->supprAdmin($user);
  }
  #Envoi un message d'erreur en cas d'echec
  catch (Exception $e) {
    $_SESSION['erreur'] = 'Erreur : ' .$e->getMessage();
  }
}
var_dump($user);
?>
