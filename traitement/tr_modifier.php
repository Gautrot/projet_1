<?php
require_once '../model/cl_utilisateur.php';
require_once '../manager/cl_manager.php';

if ($_POST['mdp'] === $_POST['mdpconfirm']) {
  try {
    #Instancie la classe Utilisateur
    $user = new Utilisateur([
      'nom' => $_POST['nom'],
      'prenom' => $_POST['prenom'],
      'mdp' => $_POST['mdp'],
      'email' => $_POST['email'],
      'datenaissance' => $_POST['datenaissance']
    ]);
    #Instancie la classe Manager
    $manager = new Manager();
    #Excecute la fonction modifier
    $manager->modifier($user);
  }
  #Envoi un message d'erreur en cas d'echec
  catch (Exception $e) {
    $_SESSION['erreur'] = 'Erreur : ' .$e->getMessage();
  }
}

else {
  header("Location: ../espace_client.php");
  echo 'Erreur : Les mots de passes ne sont pas identiques.';
}
?>
