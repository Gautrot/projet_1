<?php
require_once '../model/cl_utilisateur.php';
require_once '../manager/cl_manager.php';

try {
  #Instancie la classe Utilisateur
  $user = new Utilisateur([
    'email' => $_POST['email'],
    'mdp' => $_POST['mdp']
  ]);
  #Instancie la classe Manager
  $manager = new Manager();
  #Excecute la fonction deconnexion
  $manager->connexion($user);
}
#Envoi un message d'erreur en cas d'echec
catch (Exception $e) {
  $_SESSION['erreur'] = 'Erreur : ' .$e->getMessage();
}
?>
