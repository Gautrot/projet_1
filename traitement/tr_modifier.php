<?php
require_once '../model/cl_utilisateur.php';
require_once '../manager/cl_manager.php';

if (empty($_POST['login']) || empty($_POST['password']) || empty($_POST['email'])) {
  echo 'Erreur. Un ou plusieurs champs sont vides.
        <form action="../vue/modifier.php" method="post">
          <input type="submit" value="Retour" />
        </form>';
}

else {
  $a = new Utilisateur([
    'login' => $_POST['login'],
    'password' => $_POST['password'],
    'email' => $_POST['email']
  ]);
  $b = new Manager();
  $b->modifier($a);
}
?>
