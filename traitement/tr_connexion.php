<?php
require_once '../model/cl_utilisateur.php';
require_once '../manager/cl_manager.php';

if (empty($_POST['mail']) || empty($_POST['mdp'])) {
  echo 'Erreur. Un ou plusieurs champs sont vides.
        <form action="../vue/login.html" method="post">
          <input type="submit" value="Retour" />
        </form>';
}

else {
  $a = new Utilisateur([
    'mail' => $_POST['mail'],
    'mdp' => $_POST['mdp']
  ]);
  $b = new Manager();
  $b->connexion($a);
}
?>
