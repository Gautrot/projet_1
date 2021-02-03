<?php
require_once '../model/cl_utilisateur.php';
require_once '../manager/cl_manager.php';

$a = new Utilisateur([
  'mail' => $_POST['mail']
]);
$b = new Manager();
$b->deconnexion($a);
?>
