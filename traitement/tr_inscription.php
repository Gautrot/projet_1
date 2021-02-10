<?php
require_once '../model/cl_utilisateur.php';
require_once '../manager/cl_manager.php';

try {
  $user = new Utilisateur([
    'nom' => $_POST['nom'],
    'prenom' => $_POST['prenom'],
    'mdp' => $_POST['mdp'],
    'mdpconfirm' => $_POST['mdpconfirm'],
    'mail' => $_POST['mail']
  ]);
  $manager = new Manager();
  $manager->inscription($user);
}
catch (Exception $e) {
  $_SESSION['erreur'] = 'Erreur : ' .$e->getMessage();
}
?>
