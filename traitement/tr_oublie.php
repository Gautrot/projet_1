<?php
require_once '../model/cl_utilisateur.php';
require_once '../manager/cl_manager.php';

try {
}
catch (Exception $e) {
  $_SESSION['erreur'] = 'Erreur : ' .$e->getMessage();
}
?>
