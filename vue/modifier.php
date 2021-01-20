<?php
require_once '../model/cl_utilisateur.php';
require_once '../manager/cl_manager.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>../vue/modifier.php</title>
  </head>
  <body>
    <form action="../traitement/tr_modifier.php" method="post">
      <table>
        <th>Nom
        <th>Mot de passe
        <th>Email
        <tr>
<?php
        $manager = new Manager();
        $valeur = $manager->recupSession($_SESSION['login']);
        echo '<td><input type="text" name="login" value="' .$valeur['login']. '"/>
              <td><input type="text" name="password" value="' .$valeur['password']. '"/>
              <td><input type="text" name="email" value="' .$valeur['email']. '"/>';
?>
      </table>
      <input type="submit" value="Valider" />
    </form>
  </body>
</html>
