<?php
require_once '../model/cl_film.php';
require_once '../manager/cl_manager.php';

try {
  #Instancie la classe Film
  $film = new Film([
    'filmnom' => $_POST['filmnom'],
    'filmaut' => $_POST['filmaut'],
    'filmth' => $_POST['filmth']
  ]);
  #Instancie la classe Manager
  $manager = new Manager();
  #Excecute la fonction ajoutFilm
  $manager->ajoutFilm($film);
}
#Envoi un message d'erreur en cas d'echec
catch (Exception $e) {
  $_SESSION['erreur'] = 'Erreur : ' .$e->getMessage();
}

?>
