<?php
require_once '../model/cl_cd.php';
require_once '../manager/cl_manager.php';

try {
  $cd = new CD([
    'cdnom' => $_POST['cdnom'],
    'cdaut' => $_POST['cdaut'],
    'cdth' => $_POST['cdth']
  ]);
  $manager = new Manager();
  $manager->modifCd($cd);
}
catch (Exception $e) {
  $_SESSION['erreur'] = 'Erreur : ' .$e->getMessage();
}
var_dump($cd);
var_dump($_POST);
var_dump($manager->modifcd($cd));
?>
