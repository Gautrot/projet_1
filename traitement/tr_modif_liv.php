<?php
require_once '../model/cl_livre.php';
require_once '../manager/cl_manager.php';

try {
  #Instancie la classe Livre
  $livre = new Livre([
    'livnom' => $_POST['livnom'],
    'livaut' => $_POST['livaut'],
    'livth' => $_POST['livth']
  ]);
  #Instancie la classe Manager
  $manager = new Manager();
  #Excecute la fonction modifLiv
  $manager->modifLiv($livre);
}
#Envoi un message d'erreur en cas d'echec
catch (Exception $e) {
  $_SESSION['erreur'] = 'Erreur : ' .$e->getMessage();
}

?>
