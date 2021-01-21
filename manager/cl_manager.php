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
      WHERE mail = :mail
      AND mdp = :mdp
    ');
    $req -> execute([
      'mail' => $a->getMail(),
      'mdp' => $a->getMdp()
    ]);
    $res = $req -> fetch();

    if ($res) {
      $_SESSION['mail'] = $res['mail'];
      header("Location: ../index.html");
    }

    else {
      echo 'Erreur.
            <form action="../vue/login.html" method="post">
              <input type="submit" value="Retour" />
            </form>';
    }
  }

#Déconnexion
  public function deconnexion($a) {
    session_destroy();
    header("Location: ../accueil.html");
  }

#Inscription
  public function inscription($a) {
    #Instancie la classe BDD
    $bdd = new BDD();
    $req = $bdd -> co_bdd()->prepare('SELECT * FROM user
      WHERE mail = :mail
      ');
    $req -> execute([
      'mail' => $a->getMail()
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
        'mail' => $a->getMail(),
        'mdp' => $a->getMdp(),
        'nom' => $a->getNom(),
        'prenom' => $a->getPrenom(),
       ]);

      if ($res2) {
        $_SESSION['mail'] = $a->getMail();
        echo 'Inscription réussie !
              <form action="../vue/espace_client.html" method="post">
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
  public function recupSession($a){
    #Instancie la classe BDD
    $bdd = new BDD();
    $req = $bdd -> co_bdd()->prepare('SELECT * FROM user
      WHERE mail = :mail
    ');
    $req -> execute([
      'mail' => $a
    ]);
    $res = $req->fetch();
    return $res;
  }

#Modification d'un compte
  public function modifier($a) {
    #Instancie la classe BDD
    $bdd = new BDD();
    $req = $bdd -> co_bdd()->prepare('SELECT * FROM user
      WHERE mail = :mail
    ');
    $req -> execute([
      'mail' => $a->getMail()
    ]);
    $res = $req -> fetch();

    if ($res) {
      $req = $bdd -> co_bdd()->prepare('UPDATE user
      SET mail = :mail,
          mdp = :mdp,
          nom = :nom,
          prenom = :prenom,
          dateNaissance = :dateNaissance
      WHERE id = :id
      ');
      $res2 = $req -> execute([
        'id' => $res['id'],
        'mail' => $a->getMail(),
        'mdp' => $a->getMdp(),
        'nom' => $a->getNom(),
        'prenom' => $a->getPrenom(),
        'dateNaissance' => $a->getDateNaissance(),
      ]);

      if ($res2) {
        echo 'Modification réussie !
              <form action="../vue/espace_client.html" method="post">
                <input type="submit" value="Suivant" />
              </form>';
      }

      else {
        echo 'Modification échouée !
              <form action="../vue/modifier.html" method="post">
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
