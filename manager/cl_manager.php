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
      WHERE pseudo = :pseudo
      AND mdp = :mdp
    ');
    $req -> execute([
      'pseudo' => $a->getPseudo(),
      'mdp' => $a->getMdp()
    ]);
    $res = $req -> fetch();

    if ($res) {
      $_SESSION['pseudo'] = $res['pseudo'];
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
      WHERE pseudo = :pseudo
      ');
    $req -> execute([
      'pseudo' => $a->getPseudo()
    ]);
    $res = $req -> fetchall();

    if ($res) {
      echo 'Erreur. Ce compte existe.
            <form action="../vue/inscription.php" method="post">
              <input type="submit" value="Retour" />
            </form>';
    }

    else {
      $req = $bdd -> co_bdd()->prepare('INSERT INTO user (pseudo, mail, mdp, nom, prenom)
      VALUES (:pseudo, :mail, :mdp, :nom, :prenom)
      ');
      $res2 = $req -> execute([
        'pseudo' => $a->getPseudo(),
        'mail' => $a->getMail()
        'mdp' => $a->getMdp(),
        'nom' => $a->getNom()
        'prenom' => $a->getPrenom()
       ]);

      if ($res2) {
        $_SESSION['pseudo'] = $a->getPseudo();
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
      WHERE pseudo = :pseudo
    ');
    $req -> execute([
      'pseudo' => $a
    ]);
    $res = $req->fetch();
    return $res;
  }

#Modification d'un compte
  public function modifier($a) {
    #Instancie la classe BDD
    $bdd = new BDD();
    $req = $bdd -> co_bdd()->prepare('SELECT * FROM user
      WHERE pseudo = :pseudo
    ');
    $req -> execute([
      'pseudo' => $a->getPseudo()
    ]);
    $res = $req -> fetch();

    if ($res) {
      $req = $bdd -> co_bdd()->prepare('UPDATE user
      SET pseudo = :pseudo,
          mail = :mail,
          mdp = :mdp,
          nom = :nom,
          prenom = :prenom
      WHERE id = :id
      ');
      $res2 = $req -> execute([
        'id' => $res['id'],
        'pseudo' => $a->getPseudo(),
        'mail' => $a->getMail()
        'mdp' => $a->getMdp(),
        'nom' => $a->getNom()
        'prenom' => $a->getPrenom()
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
