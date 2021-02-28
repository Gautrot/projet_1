<?php
require_once '../model/cl_utilisateur.php';
require_once '../manager/cl_manager.php';

if ($_POST['checkbox'] == 1) {
  try {
    $user = new Utilisateur([
      'email' => $_POST['email']
    ]);
    $manager = new Manager();
    $manager->supprAdmin($user);
  }
  catch (Exception $e) {
    $_SESSION['erreur'] = 'Erreur : ' .$e->getMessage();
  }
}
?>
