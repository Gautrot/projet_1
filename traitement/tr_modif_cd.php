<?php
require_once '../model/cl_cd.php';
require_once '../manager/cl_manager.php';

try {
  #Instancie la classe Cd
  $cd = new Cd([
    'cdnom' => $_POST['cdnom'],
    'cdaut' => $_POST['cdaut'],
    'cdth' => $_POST['cdth']
  ]);
  #Instancie la classe Manager
  $manager = new Manager();
  #Excecute la fonction modifCd
  $manager->modifCd($cd);
}
#Envoi un message d'erreur en cas d'echec
catch (Exception $e) {
  $_SESSION['erreur'] = 'Erreur : ' .$e->getMessage();
}

?>
