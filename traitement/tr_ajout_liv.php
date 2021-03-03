<?php
require_once '../model/cl_livre.php';
require_once '../manager/cl_manager.php';

try {
  $livre = new Livre([
    'livnom' => $_POST['livnom'],
    'livaut' => $_POST['livaut'],
    'livth' => $_POST['livth']
  ]);
  $manager = new Manager();
  $manager->ajoutLiv($livre);
}
catch (Exception $e) {
  $_SESSION['erreur'] = 'Erreur : ' .$e->getMessage();
}
var_dump($livre);
var_dump($manager->ajoutliv($livre));
?>
