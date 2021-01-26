<?php
#Appelle le ficher 'cl_bdd.php'
require_once 'cl_bdd.php';

#Début classe Manager
class Manager{

#Connexion
  public function connexion($a) {
    #Instancie la classe BDD
    $bdd = new BDD();
    $req = $bdd -> co_bdd()->prepare('SELECT * FROM user
      WHERE login = :login
      AND password = :password
    ');
    $req -> execute([
      'login' => $a->getLogin(),
      'password' => $a->getPassword()
    ]);
    $res = $req -> fetch();

    if ($res) {
      $_SESSION['login'] = $res['login'];
      header("Location: ../vue/espace_client.php");
    }

    else {
      echo 'Erreur.
            <form action="../vue/connexion.php" method="post">
              <input type="submit" value="Retour" />
            </form>';
    }
  }

#Déconnexion
  public function deconnexion($a) {
    session_destroy();
    header("Location: ../accueil.php");
  }

#Inscription
  public function inscription($a) {
    #Instancie la classe BDD
    $bdd = new BDD();
    $req = $bdd -> co_bdd()->prepare('SELECT * FROM user
      WHERE login = :login
      ');
    $req -> execute([
      'login' => $a->getLogin()
    ]);
    $res = $req -> fetchall();

    if ($res) {
      echo 'Erreur. Ce compte existe.
            <form action="../vue/inscription.php" method="post">
              <input type="submit" value="Retour" />
            </form>';
    }

    else {
      $req = $bdd -> co_bdd()->prepare('INSERT INTO user (login, password, email)
      VALUES (:login, :password, :email)
      ');
      $res2 = $req -> execute([
        'login' => $a->getLogin(),
        'password' => $a->getPassword(),
        'email' => $a->getEmail()
       ]);

      if ($res2) {
        $_SESSION['login'] = $a->getLogin();
        echo 'Inscription réussie !
              <form action="../vue/espace_client.php" method="post">
                <input type="submit" value="Suivant" />
              </form>';
      }

      else {
        echo 'Inscription échouée !
              <form action="../vue/inscription.php" method="post">
                <input type="submit" value="Retour" />
              </form>';
      }
    }
  }

#Récupération d'un compte
  public function recupSession($a){
    #Instancie la classe BDD
    $bdd = new BDD();
    $req = $bdd -> co_bdd()->prepare('SELECT * FROM user
      WHERE login = :login
    ');
    $req -> execute([
      'login' => $a
    ]);
    $res = $req->fetch();
    return $res;
  }

#Modification d'un compte
  public function modifier($a) {
    #Instancie la classe BDD
    $bdd = new BDD();
    $req = $bdd -> co_bdd()->prepare('SELECT * FROM user
      WHERE login = :login
    ');
    $req -> execute([
      'login' => $a->getLogin()
    ]);
    $res = $req -> fetch();

    if ($res) {
      $req = $bdd -> co_bdd()->prepare('UPDATE user
      SET login = :login,
          password = :password,
          email = :email
      WHERE id = :id
      ');
      $res2 = $req -> execute([
        'id' => $res['id'],
        'login' => $a->getLogin(),
        'password' => $a->getPassword(),
        'email' => $a->getEmail()
      ]);

      if ($res2) {
        echo 'Modification réussie !
              <form action="../vue/espace_client.php" method="post">
                <input type="submit" value="Suivant" />
              </form>';
      }

      else {
        echo 'Modification échouée !
              <form action="../vue/modifier.php" method="post">
                <input type="submit" value="Retour" />
              </form>';
      }
    }

    else {
      echo "Erreur. L'utilisateur n'existe pas.";
    }
  }
#Fin classe Manager
}
?>
