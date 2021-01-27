<?php
#Appelle le ficher 'cl_bdd.php'
require_once 'cl_bdd.php';

#Début classe Manager
class Manager{

#Connexion
  public function connexion($user) {
    #Instancie la classe BDD
    $bdd = new BDD();
    $req = $bdd->co_bdd()->prepare('SELECT * FROM user
      WHERE mail = :mail
      AND mdp = :mdp
    ');
    $req -> execute([
      'mail' => $user->getMail(),
      'mdp' => $user->getMdp()
    ]);
    $res = $req -> fetch();

    if ($res) {
      $_SESSION['nom'] = $res['nom'];
      header("Location: ../vue/espace_client.php");
    }

    else {
      echo 'Erreur.
            <form action="../vue/login.html" method="post">
              <input type="submit" value="Retour" />
            </form>';
    }
  }

#Déconnexion
  public function deconnexion($user) {
    session_destroy();
    header("Location: ../index.html");
  }

#Inscription
  public function inscription($user) {
    #Instancie la classe BDD
    $bdd = new BDD();
    $req = $bdd -> co_bdd()->prepare('SELECT * FROM user
      WHERE mail = :mail
      ');
    $req -> execute([
      'pseudo' => $user->getPseudo()
    ]);
    $res = $req -> fetchall();

    if ($res) {
      echo 'Erreur. Ce compte existe.
            <form action="../vue/register.html" method="post">
              <input type="submit" value="Retour" />
            </form>';
    }

    else {
      $req = $bdd -> co_bdd()->prepare('INSERT INTO user (mail, mdp, nom, prenom)
      VALUES (:mail, :mdp, :nom, :prenom)
      ');
      $res2 = $req -> execute([
        'mail' => $user->getMail(),
        'mdp' => $user->getMdp(),
        'nom' => $user->getNom(),
        'prenom' => $user->getPrenom()
       ]);

      if ($res2) {
        $_SESSION['pseudo'] = $user->getPseudo();
        echo 'Inscription réussie !
              <form action="../vue/espace_client.php" method="post">
                <input type="submit" value="Suivant" />
              </form>';
      }

      else {
        echo 'Inscription échouée !
              <form action="../vue/register.html" method="post">
                <input type="submit" value="Retour" />
              </form>';
      }
    }
  }

#Récupération d'un compte
  public function recupSession($user){
    #Instancie la classe BDD
    $bdd = new BDD();
    $req = $bdd -> co_bdd()->prepare('SELECT * FROM user
      WHERE nom = :nom
    ');
    $req -> execute([
      'nom' => $user
    ]);
    $res = $req->fetch();
    return $res;
  }

#Modification d'un compte
  public function modifier($user) {
    #Instancie la classe BDD
    $bdd = new BDD();
    $req = $bdd -> co_bdd()->prepare('SELECT * FROM user
      WHERE pseudo = :pseudo
    ');
    $req -> execute([
      'pseudo' => $user->getPseudo()
    ]);
    $res = $req -> fetch();

    if ($res) {
      $req = $bdd -> co_bdd()->prepare('UPDATE user
      SET mail = :mail,
          mdp = :mdp,
          nom = :nom,
          prenom = :prenom
      WHERE id = :id
      ');
      $res2 = $req -> execute([
        'id' => $res['id'],
        'mail' => $user->getMail(),
        'mdp' => $user->getMdp(),
        'nom' => $user->getNom(),
        'prenom' => $user->getPrenom()
      ]);

      if ($res2) {
        echo 'Modification réussie !
              <form action="../vue/espace_client.php" method="post">
                <input type="submit" value="Suivant" />
              </form>';
      }

      else {
        echo 'Modification échouée !
              <form action="../vue/edit.html" method="post">
                <input type="submit" value="Retour" />
              </form>';
      }
    }

    else {
      echo 'Erreur. L\'utilisateur n\'existe pas.
      <form action="../vue/edit.html" method="post">
        <input type="submit" value="Retour" />
      </form>';
    }
  }
#Fin classe Manager
}
?>
