<?php
require_once '../model/cl_utilisateur.php';
require_once '../manager/cl_manager.php';

$a = new Utilisateur([
  'login' => $_POST['login']
]);
$b = new Manager();
$b->deconnexion($a);
?>
