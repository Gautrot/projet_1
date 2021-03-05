<?php
# PAS FINI

require_once '../model/cl_livre.php';
require_once '../model/cl_cd.php';
require_once '../model/cl_film.php';
require_once '../manager/cl_manager.php';

try {
  $livre = new Livre([
    'livnom' => $_GET['livnom']
  ]);
  $manager = new Manager();
  $manager->recherche($livre);
}
#Envoi un message d'erreur en cas d'echec
catch (Exception $e) {
}

try {
  $cd = new Cd([
    'cdnom' => $_GET['cdnom']
  ]);
  $manager = new Manager();
  $manager->recherche($cd);
}
#Envoi un message d'erreur en cas d'echec
catch (Exception $e) {
}

try {
  $film = new Film([
    'filmnom' => $_GET['filmnom']
  ]);
  $manager = new Manager();
  $manager->recherche($film);
}
#Envoi un message d'erreur en cas d'echec
catch (Exception $e) {
}

var_dump($livre);
var_dump($cd);
var_dump($film);
var_dump($manager->recherche($livre));
var_dump($manager->recherche($cd));
var_dump($manager->recherche($film));
?>
