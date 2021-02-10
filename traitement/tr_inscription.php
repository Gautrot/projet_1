<?php
require_once '../model/cl_utilisateur.php';
require_once '../manager/cl_manager.php';

if ($_POST['mdp'] === $_POST['mdpconfirm']) {
  try {
    $user = new Utilisateur([
      'nom' => $_POST['nom'],
      'prenom' => $_POST['prenom'],
      'mdp' => $_POST['mdp'],
      'email' => $_POST['email']
    ]);
    $manager = new Manager();
    $manager->inscription($user);
  }
  catch (Exception $e) {
    $_SESSION['erreur'] = 'Erreur : ' .$e->getMessage();
  }
}

else {
  header("Location: ../index.php");
  echo 'Erreur : Les mots de passes ne sont pas identiques.';
}

?>
