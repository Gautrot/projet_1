<?php
require_once '../model/cl_utilisateur.php';
require_once '../manager/cl_manager.php';

try {
  $user = new Utilisateur([
    'nom' => $_POST['nom'],
    'prenom' => $_POST['prenom'],
    'dateNaissance' => $_POST['dateNaissance'],
    'email' => $_POST['email'],
    'rang' => $_POST['rang']
  ]);
  $manager = new Manager();
  $manager->inscrAdmin($user);
}
catch (Exception $e) {
  $_SESSION['erreur'] = 'Erreur : ' .$e->getMessage();
}

?>
