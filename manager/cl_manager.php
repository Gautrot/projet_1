<?php
# Appelle le ficher 'cl_bdd.php'
require_once 'cl_bdd.php';

/*
# PHPMailer
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
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
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
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
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

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

# Si l'un des deux champs sont vides.

    else if (empty($_POST['email']) || empty($_POST['mdp'])) {
      header("Location: ../index.php");
      throw new Exception ("Un ou plusieurs champs sont vides.");
    }

# Si la saisie du mot de passe ou de l'e-mail est incorrecte.

    else {
      header("Location: ../index.php");
      throw new Exception ("L'e-mail ou le mot de passe est incorrecte ou n'existe pas.");
    }
  var_dump($user);
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
    $req = $bdd -> co_bdd()->prepare('SELECT email FROM user
      WHERE email = :email
    ');
    $req -> execute([
      'email' => $user->getEmail()
    ]);
    $res = $req -> fetchall();

# Si un ou plusieurs champs sont vides.

    if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['mdp']) || empty($_POST['email'])) {
      header("Location: ../index.php");
      throw new Exception("Un ou plusieurs champs sont vides.");
    }

# Si le compte existe dans la BDD.

    else if ($res) {
      header("Location: ../index.php");
      throw new Exception("Ce compte existe.");
    }

    else {
      $req = $bdd -> co_bdd()->prepare('INSERT INTO user (email, mdp, nom, prenom, rang)
      VALUES (:email, :mdp, :nom, :prenom, :rang)
      ');
      $res2 = $req -> execute([
        'email' => $user->getEmail(),
        'mdp' => $user->getMdp(),
        'nom' => $user->getNom(),
        'prenom' => $user->getPrenom(),
        'rang' => $user->getRang()
       ]);

      if ($res2) {
        header("Location: ../vue/espace_client.php");
      }

# Si un ou plusieurs champs sont vides.

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
    $req = $bdd -> co_bdd()->prepare('SELECT email FROM user
      WHERE email = :email
    ');
    $req -> execute([
      'email' => $user->getEmail()
    ]);
    $res = $req -> fetch();

# Si un ou plusieurs champs sont vides.

    if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['mdp']) || empty($_POST['email'])) {
      header("Location: ../index.php");
      throw new Exception("Un ou plusieurs champs sont vides.");
    }

    else if ($res) {
      $req = $bdd -> co_bdd()->prepare('UPDATE user
      SET email = :email,
          mdp = :mdp,
          nom = :nom,
          prenom = :prenom,
          dateNaissance = :dateNaissance,
      WHERE id = :id
      ');
      $res2 = $req -> execute([
        'id' => $res['id'],
        'email' => $user->getEmail(),
        'mdp' => $user->getMdp(),
        'nom' => $user->getNom(),
        'prenom' => $user->getPrenom(),
        'dateNaissance' => $user->getDateNaissance()
      ]);

      if ($res2) {
        header("Location: ../vue/espace_client.php");
      }

# Si un ou plusieurs champs sont vides.

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

# Liste les livres de la BDD

public function listLivre(){
  #Instancie la classe BDD
  $bdd = new BDD();
  $req = $bdd -> co_bdd()->prepare('SELECT * FROM livre');
  $req -> execute([]);
  $resliv = $req->fetchall();
  return $resliv;
}

# Liste les films de la BDD

public function listFilm(){
  #Instancie la classe BDD
  $bdd = new BDD();
  $req = $bdd -> co_bdd()->prepare('SELECT * FROM film');
  $req -> execute([]);
  $resfilm = $req->fetchall();
  return $resfilm;
}

# Liste les cd de la BDD

public function listCD(){
  #Instancie la classe BDD
  $bdd = new BDD();
  $req = $bdd -> co_bdd()->prepare('SELECT * FROM cd');
  $req -> execute([]);
  $rescd = $req->fetchall();
  return $rescd;
}

# Liste les utilisateurs de la BDD

public function listUtilisateur(){
  #Instancie la classe BDD
  $bdd = new BDD();
  $req = $bdd -> co_bdd()->prepare('SELECT * FROM user');
  $req -> execute([]);
  $rescd = $req->fetchall();
  return $rescd;
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
    $req = $bdd -> co_bdd()->prepare('SELECT email FROM user
      WHERE email = :email
    ');
    $req -> execute([
      'email' => $user->getEmail()
    ]);
    $res = $req -> fetchall();

# Si un ou plusieurs champs sont vides.

    if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['email'])) {
      header("Location: ../vue/tabl_utilisateur.php");
      throw new Exception("Un ou plusieurs champs sont vides.");
    }

# Si le compte existe dans la BDD.

    else if ($res) {
      header("Location: ../vue/tabl_utilisateur.php");
      throw new Exception("Ce compte existe.");
    }

    else {
      $req = $bdd -> co_bdd()->prepare('INSERT INTO user (email, dateNaissance, nom, prenom, rang)
      VALUES (:email, :dateNaissance, :nom, :prenom, :rang)
      ');
      $res2 = $req -> execute([
        'email' => $user->getEmail(),
        'dateNaissance' => $user->getDateNaissance(),
        'mdp' => $user->getmdp(),
        'nom' => $user->getNom(),
        'prenom' => $user->getPrenom(),
        'rang' => $user->getRang()
       ]);

      if ($res2) {
        header("Location: ../vue/tabl_utilisateur.php");
      }

# Si un ou plusieurs champs sont vides.

      else if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['email'])) {
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
    $req = $bdd -> co_bdd()->prepare('SELECT email FROM user
      WHERE email = :email
    ');
    $req -> execute([
      'email' => $user->getEmail()
    ]);
    $res = $req -> fetchall();

    if ($res) {
      $req = $bdd -> co_bdd()->prepare('DELETE FROM user
        WHERE email = :email
      ');
      header("Location: ../vue/tabl_utilisateur.php");
    }
  }

  # Fin classe Manager

}
?>
