<?php
require_once '../model/cl_utilisateur.php';
require_once '../manager/cl_manager.php';

if ($_POST['mdp'] === $_POST['mdpconfirm']) {
  try {
    $user = new Utilisateur([
      'nom' => $_POST['nom'],
      'prenom' => $_POST['prenom'],
      'mdp' => $_POST['mdp'],
      'mail' => $_POST['mail'],
      'date_jour' => $_POST['date_jour'],
      'date_mois' => $_POST['date_mois'],
      'date_annee' => $_POST['date_annee']
    ]);
    $manager = new Manager();
    $manager->modifier($user);
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
