<?php
require_once '../model/cl_utilisateur.php';
require_once '../manager/cl_manager.php';

try {
  $cd = new Utilisateur([
    'CdNom' => $_POST['CdNom'],
    'CdAut' => $_POST['CdAut'],
    'CdTh' => $_POST['CdTh']
  ]);
  $manager = new Manager();
  $manager->ajoutCd($cd);
}
catch (Exception $e) {
  $_SESSION['erreur'] = 'Erreur : ' .$e->getMessage();
}

?>
