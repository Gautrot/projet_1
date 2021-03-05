<?php
# PAS FINI

require_once '../model/cl_utilisateur.php';
require_once '../manager/cl_manager.php';

try {
}
#Envoi un message d'erreur en cas d'echec
catch (Exception $e) {
  $_SESSION['erreur'] = 'Erreur : ' .$e->getMessage();
}
?>
