<?php
require_once '../model/cl_cd.php';
require_once '../manager/cl_manager.php';

try {
  $cd = new cd([
    'cdnom' => $_POST['cdnom'],
    'cdaut' => $_POST['cdaut'],
    'cdth' => $_POST['cdth']
  ]);
  $manager = new Manager();
  $manager->ajoutcd($cd);
}
catch (Exception $e) {
  $_SESSION['erreur'] = 'Erreur : ' .$e->getMessage();
}

?>
