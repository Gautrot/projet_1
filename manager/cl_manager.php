<?php
#Appelle le ficher 'cl_bdd.php'
require_once 'cl_bdd.php';

#Début classe Manager
class Manager{

# Connexion

  public function connexion($user) {
# Instancie la classe BDD
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

# Si l'un des deux champs sont vides.

    else if (empty($_POST['mail']) || empty($_POST['mdp'])) {
      header("Location: ../index.php");
      throw new Exception ("Un ou plusieurs champs sont vides.");
    }

# Si la saisie du mot de passe ou de l'e-mail est incorrecte.

    else {
      header("Location: ../index.php");
      throw new Exception ("L'e-mail ou le mot de passe est incorrecte ou n'existe pas.");
    }
  }

# Déconnexion

  public function deconnexion($user) {
    session_destroy();
    header("Location: ../index.php");
  }

# Inscription

  public function inscription($user) {
    #Instancie la classe BDD
    $bdd = new BDD();
    $req = $bdd -> co_bdd()->prepare('SELECT * FROM user
      WHERE mail = :mail
      ');
    $req -> execute([
      'mail' => $user->getMail()
    ]);
    $res = $req -> fetchall();

# Si un ou plusieurs champs sont vides.

    if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['mdp']) || empty($_POST['mail'])) {
      header("Location: ../index.php");
      throw new Exception("Un ou plusieurs champs sont vides.");
    }

# Si le compte existe dans la BDD.

    else if ($res) {
      header("Location: ../index.php");
      throw new Exception("Ce compte existe.");
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
        $_SESSION['nom'] = $user->getNom();
        header("Location: ../vue/espace_client.php");
      }

# Si un ou plusieurs champs sont vides.

      else if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['mdp']) || empty($_POST['mail'])) {
        header("Location: ../index.php");
        throw new Exception("Un ou plusieurs champs sont vides.");
      }

      else {
        header("Location: ../index.php");
        throw new Exception("Inscription échouée !");
      }
    }
  }

# Récupération d'un compte

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

# Modification d'un compte

  public function modifier($user) {
    #Instancie la classe BDD
    $bdd = new BDD();
    $req = $bdd -> co_bdd()->prepare('SELECT * FROM user
      WHERE mail = :mail
    ');
    $req -> execute([
      'mail' => $user->getMail()
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
        $_SESSION['nom'] = $user->getNom();
        header("Location: ../vue/espace_client.php");
      }

      else {
        throw new Exception("Modification échouée !");
      }
    }

    else {
      throw new Exception ("L'utilisateur n'existe pas.");
    }
  }

# Fin classe Manager

}
?>
