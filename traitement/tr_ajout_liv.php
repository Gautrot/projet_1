<?php
require_once '../model/cl_utilisateur.php';
require_once '../manager/cl_manager.php';

try {
  $livre = new Utilisateur([
    'LivNom' => $_POST['LivNom'],
    'LivAut' => $_POST['LivAut'],
    'LivTh' => $_POST['LivTh']
  ]);
  $manager = new Manager();
  $manager->ajoutLiv($livre);
}
catch (Exception $e) {
  $_SESSION['erreur'] = 'Erreur : ' .$e->getMessage();
}

?>
