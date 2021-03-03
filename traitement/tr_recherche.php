<?php
require_once '../model/cl_livre.php';
require_once '../model/cl_cd.php';
require_once '../model/cl_film.php';
require_once '../manager/cl_manager.php';

try {
  $livre = new Livre([
    'livnom' => $_POST['livnom']
  ]);
  $manager = new Manager();
  $manager->recherche($livre);
}
catch (Exception $e) {
}

try {
  $cd = new Cd([
    'cdnom' => $_POST['cdnom']
  ]);
  $manager = new Manager();
  $manager->recherche($cd);
}
catch (Exception $e) {
}

try {
  $film = new Film([
    'filmnom' => $_POST['filmnom']
  ]);
  $manager = new Manager();
  $manager->recherche($film);
}
catch (Exception $e) {
}

var_dump($livre);
var_dump($cd);
var_dump($film);
var_dump($manager->recherche($livre));
var_dump($manager->recherche($cd));
var_dump($manager->recherche($film));
?>
