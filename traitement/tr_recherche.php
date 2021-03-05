<?php
# PAS FINI

require_once '../model/cl_livre.php';
require_once '../model/cl_cd.php';
require_once '../model/cl_film.php';
require_once '../manager/cl_manager.php';

try {
  #Instancie la classe Livre
  $livre = new Livre([
    'recherche' => $_GET['recherche']
  ]);
  #Instancie la classe Cd
  $cd = new Cd([
    'recherche' => $_GET['recherche']
  ]);
  #Instancie la classe Film
  $film = new Film([
    'recherche' => $_GET['recherche']
  ]);
  #Instancie la classe Manager
  $manager = new Manager();
  #Excecute la fonction recherche
  $manager->recherche($livre);
  $manager->recherche($cd);
  $manager->recherche($film);
}
#Envoi un message d'erreur en cas d'echec
catch (Exception $e) {
}
?>
