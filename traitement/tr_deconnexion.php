<?php
require_once '../model/cl_utilisateur.php';
require_once '../manager/cl_manager.php';

#Instancie la classe Utilisateur
$a = new Utilisateur([
  'email' => $_POST['email']
]);
#Instancie la classe Manager
$b = new Manager();
#Excecute la fonction deconnexion
$b->deconnexion($a);
?>
