<?php
require_once '../model/cl_utilisateur.php';
require_once '../manager/cl_manager.php';

try {
  $film = new Utilisateur([
    'FilmNom' => $_POST['FilmNom'],
    'FilmAut' => $_POST['FilmAut'],
    'FilmTh' => $_POST['FilmTh']
  ]);
  $manager = new Manager();
  $manager->ajoutFilm($film);
}
catch (Exception $e) {
  $_SESSION['erreur'] = 'Erreur : ' .$e->getMessage();
}

?>
