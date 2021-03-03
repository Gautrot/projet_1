<?php
require_once '../model/cl_film.php';
require_once '../manager/cl_manager.php';

try {
  $film = new Film([
    'filmnom' => $_POST['filmnom'],
    'filmaut' => $_POST['filmaut'],
    'filmth' => $_POST['filmth']
  ]);
  $manager = new Manager();
  $manager->modiffilm($film);
}
catch (Exception $e) {
  $_SESSION['erreur'] = 'Erreur : ' .$e->getMessage();
}
var_dump($film);
var_dump($_POST);
var_dump($manager->modiffilm($film));
?>
