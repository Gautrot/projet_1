<?php
require_once '../model/cl_utilisateur.php';
require_once '../manager/cl_manager.php';

if (empty($_POST['login']) || empty($_POST['password'])) {
  echo 'Erreur. Un ou plusieurs champs sont vides.
        <form action="../vue/connexion.php" method="post">
          <input type="submit" value="Retour" />
        </form>';
}

else {
  $a = new Utilisateur([
    'login' => $_POST['login'],
    'password' => $_POST['password']
  ]);
  $b = new Manager();
  $b->connexion($a);
}
?>
