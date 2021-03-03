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
  $manager->ajoutFilm($film);
}
catch (Exception $e) {
  $_SESSION['erreur'] = 'Erreur : ' .$e->getMessage();
}

?>
