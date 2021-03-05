<?php
require_once '../model/cl_utilisateur.php';
require_once '../manager/cl_manager.php';

try {
  #Instancie la classe Utilisateur
  $user = new Utilisateur([
    'nom' => $_POST['nom'],
    'prenom' => $_POST['prenom'],
    'datenaissance' => $_POST['datenaissance'],
    'email' => $_POST['email'],
    'mdp' => $_POST['mdp'],
    'rang' => $_POST['rang']
  ]);
  #Instancie la classe Manager
  $manager = new Manager();
  #Excecute la fonction inscrAdmin
  $manager->inscrAdmin($user);
}
#Envoi un message d'erreur en cas d'echec
catch (Exception $e) {
  $_SESSION['erreur'] = 'Erreur : ' .$e->getMessage();
}

?>
