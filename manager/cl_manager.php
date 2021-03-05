<?php
# Appelle le ficher 'cl_bdd.php'
require_once 'cl_bdd.php';

/* PHPMailer (PAS FINI)
// Import PHPMailer classes into the global namespace
// these must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'C:/wamp64/www/projet/projet_1/phpmailer/vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.example.com';                     // Set the SMTP server to send through
    $mail->SMTPauth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'user@example.com';                     // SMTP username
    $mail->Password   = 'secret';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
    $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    // Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'this is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'this is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
}
catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

# Fin PHP Mailer
*/

# Début classe Manager
class Manager{

# Connexion

  public function connexion($user) {
# Instancie la classe BDD
    $bdd = new BDD();
    #BDD : selectionne tous les emails et mot de passes disponibles dans la table user
    $req = $bdd->co_bdd()->prepare('SELECT * FROM user
      WHERE email = :email
      AND mdp = :mdp
    ');
    $req -> execute([
      'email' => $user->getEmail(),
      'mdp' => $user->getMdp()
    ]);
    $res = $req -> fetch();

    if ($res) {
      $_SESSION['nom'] = $res['nom'];
      $_SESSION['rang'] = $res['rang'];
      header("Location: ../vue/espace_client.php");
    }

# Erreur : Si l'un des deux champs sont vides.

    else if (empty($_POST['email']) || empty($_POST['mdp'])) {
      header("Location: ../index.php");
      throw new Exception ("Un ou plusieurs champs sont vides.");
    }

# Erreur : Si la saisie du mot de passe ou de l'e-mail est incorrecte.

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
    #BDD : selectionne tous les emails disponibles dans la table user
    $req = $bdd -> co_bdd()->prepare('SELECT email FROM user
      WHERE email = :email
    ');
    $req -> execute([
      'email' => $user->getEmail()
    ]);
    $res = $req -> fetchall();

# Erreur : Si un ou plusieurs champs sont vides.

    if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['mdp']) || empty($_POST['email'])) {
      header("Location: ../index.php");
      throw new Exception("Un ou plusieurs champs sont vides.");
    }

# Erreur : Si le compte existe dans la BDD.

    else if ($res) {
      header("Location: ../index.php");
      throw new Exception("Ce compte existe.");
    }

    else {
      #BDD : ajoute une ligne/un utilistateur dans la table user
      $req = $bdd -> co_bdd()->prepare('INSERT INTO user (email, mdp, nom, prenom, rang)
      VALUES (:email, :mdp, :nom, :prenom, :rang)
      ');
      $res2 = $req -> execute([
        'email' => $user->getEmail(),
        'mdp' => $user->getMdp(),
        'nom' => $user->getnom(),
        'prenom' => $user->getPrenom(),
        'rang' => $user->getRang()
       ]);

      if ($res2) {
        header("Location: ../vue/espace_client.php");
      }

# Erreur : Si un ou plusieurs champs sont vides.

      else if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['mdp']) || empty($_POST['email'])) {
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
    #BDD : selectionne tous les emails disponibles dans la table user
    $req = $bdd -> co_bdd()->prepare('SELECT email FROM user
      WHERE email = :email
    ');
    $req -> execute([
      'email' => $user
    ]);
    $res = $req->fetch();
    return $res;
  }

# Modification d'un compte

  public function modifier($user) {
    #Instancie la classe BDD
    $bdd = new BDD();
    #BDD : selectionne tous les emails disponibles dans la table user
    $req = $bdd -> co_bdd()->prepare('SELECT email FROM user
      WHERE email = :email
    ');
    $req -> execute([
      'email' => $user->getEmail()
    ]);
    $res = $req -> fetch();

# Erreur : Si un ou plusieurs champs sont vides.

    if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['mdp']) || empty($_POST['email'])) {
      header("Location: ../index.php");
      throw new Exception("Un ou plusieurs champs sont vides.");
    }

    else if ($res) {
      #BDD : met à jour tous les informations de l'utilisateur dans la table user
      $req = $bdd -> co_bdd()->prepare('UPDATE user
      SET email = :email,
          mdp = :mdp,
          nom = :nom,
          prenom = :prenom,
          datenaissance = :datenaissance,
      WHERE id = :id
      ');
      $res2 = $req -> execute([
        'id' => $res['id'],
        'email' => $user->getEmail(),
        'mdp' => $user->getMdp(),
        'nom' => $user->getnom(),
        'prenom' => $user->getPrenom(),
        'datenaissance' => $user->getDatenaissance()
      ]);

      if ($res2) {
        header("Location: ../vue/espace_client.php");
      }

# Erreur : Si un ou plusieurs champs sont vides.

      else if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['mdp']) || empty($_POST['email'])) {
        header("Location: ../vue/modifier.php");
        throw new Exception("Un ou plusieurs champs sont vides.");
      }

      else {
        header("Location: ../vue/modifier.php");
        throw new Exception("Modification échouée !");
      }
    }
  }

# Mot de passe oublié

  public function oublie($user) {

  }

# Liste les utilisateurs de la BDD

public function listUtilisateur(){
  #Instancie la classe BDD
  $bdd = new BDD();
  #BDD : selectionne tout ce qui est disponibles dans la table user
  $req = $bdd -> co_bdd()->prepare('SELECT * FROM user');
  $req -> execute([]);
  $rescd = $req->fetchall();
  return $rescd;
}

# Barre de recherche

public function recherche(){
  #Instancie la classe BDD
  $bdd = new BDD();
  #BDD : selectionne tous les noms disponibles dans les tables livre, cd, film
  $req = $bdd -> co_bdd()->prepare('SELECT * FROM livre, cd, film
    WHERE cdnom LIKE :cdnom
    OR livnom LIKE :livnom
    OR filmnom LIKE :filmnom
  ');
  $req -> execute([]);
  $re = $req->fetchall();
  header("Location: ../vue/recherche.php");
  return $re;
}

/*
----
Partie Administration
----
*/

# Ajout d'un utilisateur

  public function inscrAdmin($user) {
    #Instancie la classe BDD
    $bdd = new BDD();
    #BDD : selectionne tous les emails disponibles dans la table user
    $req = $bdd -> co_bdd()->prepare('SELECT email FROM user
      WHERE email = :email
    ');
    $req -> execute([
      'email' => $user->getEmail()
    ]);
    $res = $req -> fetchall();

# Erreur : Si un ou plusieurs champs sont vides.

    if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['mdp']) || empty($_POST['email'])) {
      header("Location: ../vue/tabl_utilisateur.php");
      throw new Exception("Un ou plusieurs champs sont vides.");
    }

# Erreur : Si le compte existe dans la BDD.

    else if ($res) {
      header("Location: ../vue/tabl_utilisateur.php");
      throw new Exception("Ce compte existe.");
    }

    else {
      #BDD : ajoute une ligne/un utilisateur dans la table user
      $req = $bdd -> co_bdd()->prepare('INSERT INTO user (email, datenaissance, mdp, nom, prenom, rang)
      VALUES (:email, :datenaissance, :mdp, :nom, :prenom, :rang)
      ');
      $res2 = $req -> execute([
        'email' => $user->getEmail(),
        'datenaissance' => $user->getDatenaissance(),
        'mdp' => $user->getMdp(),
        'nom' => $user->getnom(),
        'prenom' => $user->getPrenom(),
        'rang' => $user->getRang()
       ]);

      if ($res2) {
        header("Location: ../vue/tabl_utilisateur.php");
      }

# Erreur : Si un ou plusieurs champs sont vides.

      else if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['mdp']) || empty($_POST['email'])) {
        header("Location: ../vue/tabl_utilisateur.php");
        throw new Exception("Un ou plusieurs champs sont vides.");
      }

      else {
        header("Location: ../vue/tabl_utilisateur.php");
        throw new Exception("Inscription échouée !");
      }
    }
  }

# Suppresion d'un utilisateur

  public function supprAdmin($user) {
    #Instancie la classe BDD
    $bdd = new BDD();
    #BDD : selectionne toutes les informations disponibles dans la table user
    $req = $bdd -> co_bdd()->prepare('SELECT * FROM user');
    $req -> execute([
      'id' => $user->getId()
    ]);
    $res = $req -> fetch();

    if ($res) {
      #BDD : supprime une ligne/un utilisateur correspondant à son ID dans la table user
      $req = $bdd -> co_bdd()->prepare('DELETE FROM user
        WHERE id = :id
      ');
      //session_destroy();
      header("Location: ../vue/tabl_utilisateur.php");
    }
  }


/*
----
Livre
----
*/

# Liste les livres de la BDD

public function listLivre(){
  #Instancie la classe BDD
  $bdd = new BDD();
  #BDD : selectionne toutes les informations disponibles dans la table livre
  $req = $bdd -> co_bdd()->prepare('SELECT * FROM livre');
  $req -> execute([]);
  $resliv = $req->fetchall();
  return $resliv;
}

# Ajout d'un livre

  public function ajoutLiv($livre) {
    #Instancie la classe BDD
    $bdd = new BDD();
    #BDD : selectionne toutes les informations disponibles dans la table livre
    $req = $bdd -> co_bdd()->prepare('SELECT * FROM livre
      WHERE livnom = :livnom
    ');
    $req -> execute([
      'livnom' => $livre->getLivnom()
    ]);
    $res = $req -> fetchall();

# Erreur : Si un ou plusieurs champs sont vides.

    if (empty($_POST['livnom']) || empty($_POST['livaut']) || empty($_POST['livth'])) {
      header("Location: ../vue/tableau.php");
      throw new Exception("Un ou plusieurs champs sont vides.");
    }

# Erreur : Si le livre existe dans la BDD.

    else if ($res) {
      header("Location: ../vue/tableau.php");
      throw new Exception("Ce livre existe.");
    }

    else {
      #BDD : ajoute une ligne/un livre dans la table livre
      $req = $bdd -> co_bdd()->prepare('INSERT INTO livre (livnom, livaut, livth)
        VALUES (:livnom, :livaut, :livth)
      ');
      $res2 = $req -> execute([
        'livnom' => $livre->getLivnom(),
        'livaut' => $livre->getLivaut(),
        'livth' => $livre->getLivth()
       ]);

      if ($res2) {
        header("Location: ../vue/tableau.php");
      }

# Erreur : Si un ou plusieurs champs sont vides.

      else if (empty($_POST['livnom']) || empty($_POST['livaut']) || empty($_POST['livth'])) {
        header("Location: ../vue/tableau.php");
        throw new Exception("Un ou plusieurs champs sont vides.");
      }

      else {
        header("Location: ../vue/tableau.php");
        throw new Exception("Ajout échouée !");
      }
    }
  }

# Modification d'un livre

  public function modifLiv($livre) {
    #Instancie la classe BDD
    $bdd = new BDD();
    #BDD : selectionne toutes les informations disponibles dans la table livre
    $req = $bdd -> co_bdd()->prepare('SELECT * FROM livre
      WHERE livnom = :livnom
    ');
    $req -> execute([
      'livnom' => $livre->getLivnom()
    ]);
    $res = $req -> fetch();

# Erreur : Si un ou plusieurs champs sont vides.

    if (empty($_POST['livnom']) || empty($_POST['livaut']) || empty($_POST['livth'])) {
      header("Location: ../vue/modif_liv.php");
      throw new Exception("Un ou plusieurs champs sont vides.");
    }

    else if ($res) {
      #BDD : met à jour une ligne/un livre dans la table livre
      $req = $bdd -> co_bdd()->prepare('UPDATE livre
      SET livnom = :livnom,
          livaut = :livaut,
          livth = :livth
      WHERE refliv = :refliv
      ');
      $res2 = $req -> execute([
        'refliv' => $livre->getRefliv(),
        'livnom' => $livre->getLivnom(),
        'livaut' => $livre->getLivaut(),
        'livth' => $livre->getLivth()
      ]);

      if ($res2) {
        header("Location: ../vue/livres.php");
      }

# Erreur : Si un ou plusieurs champs sont vides.

      else if (empty($_POST['livnom']) || empty($_POST['livaut']) || empty($_POST['livth'])) {
        header("Location: ../vue/modif_liv.php");
        throw new Exception("Un ou plusieurs champs sont vides.");
      }

      else {
        header("Location: ../vue/modif_liv.php");
        throw new Exception("Modification échouée !");
      }
    }
  }

/*
----
CD
----
*/

# Liste les cd de la BDD

public function listCD(){
  #Instancie la classe BDD
  $bdd = new BDD();
  #BDD : selectionne toutes les informations disponibles dans la table cd
  $req = $bdd -> co_bdd()->prepare('SELECT * FROM cd');
  $req -> execute([]);
  $rescd = $req->fetchall();
  return $rescd;
}

# Ajout d'un cd

  public function ajoutCd($cd) {
    #Instancie la classe BDD
    $bdd = new BDD();
    #BDD : selectionne toutes les informations disponibles dans la table cd
    $req = $bdd -> co_bdd()->prepare('SELECT * FROM cd
      WHERE cdnom = :cdnom
    ');
    $req -> execute([
      'cdnom' => $cd->getCdnom()
    ]);
    $res = $req -> fetchall();

# Erreur : Si un ou plusieurs champs sont vides.

    if (empty($_POST['cdnom']) || empty($_POST['cdaut']) || empty($_POST['cdth'])) {
      header("Location: ../vue/tableau.php");
      throw new Exception("Un ou plusieurs champs sont vides.");
    }

# Erreur : Si le cd existe dans la BDD.

    else if ($res) {
      header("Location: ../vue/tableau.php");
      throw new Exception("Ce CD existe.");
    }

    else {
      #BDD : ajoute une ligne/un cd dans la table cd
      $req = $bdd -> co_bdd()->prepare('INSERT INTO cd (cdnom, cdaut, cdth)
        VALUES (:cdnom, :cdaut, :cdth)
      ');
      $res2 = $req -> execute([
        'cdnom' => $cd->getCdnom(),
        'cdaut' => $cd->getCdaut(),
        'cdth' => $cd->getCdth()
       ]);

      if ($res2) {
        header("Location: ../vue/tableau.php");
      }

# Erreur : Si un ou plusieurs champs sont vides.

      else if (empty($_POST['cdnom']) || empty($_POST['cdaut']) || empty($_POST['cdth'])) {
        header("Location: ../vue/tableau.php");
        throw new Exception("Un ou plusieurs champs sont vides.");
      }

      else {
        header("Location: ../vue/tableau.php");
        throw new Exception("Ajout échouée !");
      }
    }
  }

# Modification d'un cd

  public function modifCd($cd) {
    #Instancie la classe BDD
    $bdd = new BDD();
    #BDD : selectionne toutes les informations disponibles dans la table cd
    $req = $bdd -> co_bdd()->prepare('SELECT * FROM cd
      WHERE cdnom = :cdnom
    ');
    $req -> execute([
      'cdnom' => $cd->getCdnom()
    ]);
    $res = $req -> fetch();

# Erreur : Si un ou plusieurs champs sont vides.

    if (empty($_POST['cdnom']) || empty($_POST['cdaut']) || empty($_POST['cdth'])) {
      header("Location: ../vue/modif_cd.php");
      throw new Exception("Un ou plusieurs champs sont vides.");
    }

    else if ($res) {
      #BDD : met à jour une ligne/un cd dans la table cd
      $req = $bdd -> co_bdd()->prepare('UPDATE cd
      SET cdnom = :cdnom,
          cdaut = :cdaut,
          cdth = :cdth
      WHERE refcd = :refcd
      ');
      $res2 = $req -> execute([
        'refcd' => $cd->getRefcd(),
        'cdnom' => $cd->getCdnom(),
        'cdaut' => $cd->getCdaut(),
        'cdth' => $cd->getCdth()
      ]);

      if ($res2) {
        header("Location: ../vue/cdres.php");
      }

# Erreur : Si un ou plusieurs champs sont vides.

      else if (empty($_POST['cdnom']) || empty($_POST['cdaut']) || empty($_POST['cdth'])) {
        header("Location: ../vue/modif_cd.php");
        throw new Exception("Un ou plusieurs champs sont vides.");
      }

      else {
        header("Location: ../vue/modif_cd.php");
        throw new Exception("Modification échouée !");
      }
    }
  }

/*
----
Film
----
*/

# Liste les films de la BDD

public function listFilm(){
  #Instancie la classe BDD
  $bdd = new BDD();
  #BDD : selectionne toutes les informations disponibles dans la table film
  $req = $bdd -> co_bdd()->prepare('SELECT * FROM film');
  $req -> execute([]);
  $resfilm = $req->fetchall();
  return $resfilm;
}

# Ajout d'un film

  public function ajoutFilm($film) {
    #Instancie la classe BDD
    $bdd = new BDD();
    #BDD : selectionne toutes les informations disponibles dans la table film
    $req = $bdd -> co_bdd()->prepare('SELECT * FROM film
      WHERE filmnom = :filmnom
    ');
    $req -> execute([
      'filmnom' => $film->getFilmnom()
    ]);
    $res = $req -> fetchall();

# Erreur : Si un ou plusieurs champs sont vides.

    if (empty($_POST['filmnom']) || empty($_POST['filmaut']) || empty($_POST['filmth'])) {
      header("Location: ../vue/tableau.php");
      throw new Exception("Un ou plusieurs champs sont vides.");
    }

# Erreur : Si le film existe dans la BDD.

    else if ($res) {
      header("Location: ../vue/tableau.php");
      throw new Exception("Ce film existe.");
    }

    else {
      #BDD : ajoute une ligne/un film dans la table film
      $req = $bdd -> co_bdd()->prepare('INSERT INTO film (filmnom, filmaut, filmth)
        VALUES (:filmnom, :filmaut, :filmth)
      ');
      $res2 = $req -> execute([
        'filmnom' => $film->getFilmnom(),
        'filmaut' => $film->getFilmaut(),
        'filmth' => $film->getFilmth()
       ]);

      if ($res2) {
        header("Location: ../vue/tableau.php");
      }

# Erreur : Si un ou plusieurs champs sont vides.

      else if (empty($_POST['filmnom']) || empty($_POST['filmaut']) || empty($_POST['filmth'])) {
        header("Location: ../vue/tableau.php");
        throw new Exception("Un ou plusieurs champs sont vides.");
      }

      else {
        header("Location: ../vue/tableau.php");
        throw new Exception("Ajout échouée !");
      }
    }
  }

# Modification d'un cd

  public function modifFilm($film) {
    #Instancie la classe BDD
    $bdd = new BDD();
    #BDD : selectionne toutes les informations disponibles dans la table film
    $req = $bdd -> co_bdd()->prepare('SELECT * FROM film
      WHERE filmnom = :filmnom
    ');
    $req -> execute([
      'filmnom' => $film->getFilmnom()
    ]);
    $res = $req -> fetch();

# Erreur : Si un ou plusieurs champs sont vides.

    if (empty($_POST['filmnom']) || empty($_POST['filmaut']) || empty($_POST['filmth'])) {
      header("Location: ../vue/modif_film.php");
      throw new Exception("Un ou plusieurs champs sont vides.");
    }

    else if ($res) {
      #BDD : met à jour une ligne/un film dans la table film
      $req = $bdd -> co_bdd()->prepare('UPDATE film
      SET filmnom = :filmnom,
          filmaut = :filmaut,
          filmth = :filmth
      WHERE reffilm = :reffilm
      ');
      $res2 = $req -> execute([
        'reffilm' => $film->getReffilm(),
        'filmnom' => $film->getFilmnom(),
        'filmaut' => $film->getFilmaut(),
        'filmth' => $film->getFilmth()
      ]);

      if ($res2) {
        header("Location: ../vue/filmres.php");
      }

# Erreur : Si un ou plusieurs champs sont vides.

      else if (empty($_POST['filmnom']) || empty($_POST['filmaut']) || empty($_POST['filmth'])) {
        header("Location: ../vue/modif_film.php");
        throw new Exception("Un ou plusieurs champs sont vides.");
      }

      else {
        header("Location: ../vue/modif_film.php");
        throw new Exception("Modification échouée !");
      }
    }
  }

# Fin classe Manager

}
?>
