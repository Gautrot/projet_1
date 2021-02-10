<?php
# Appelle le ficher 'cl_bdd.php'
require_once 'cl_bdd.php';

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

# Début classe Manager
class Manager{

# Connexion

  public function connexion($user) {
# Instancie la classe BDD
    $bdd = new BDD();
    $req = $bdd->co_bdd()->prepare('SELECT email, mdp FROM user');
    $req -> execute([
      'email' => $user->getEmail(),
      'mdp' => $user->getMdp()
    ]);
    $res = $req -> fetch();

    if ($res) {
      $_SESSION['nom'] = $res['nom'];
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
    $req = $bdd -> co_bdd()->prepare('SELECT email FROM user');
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
      $req = $bdd -> co_bdd()->prepare('INSERT INTO user (email, mdp, nom, prenom)
      VALUES (:email, :mdp, :nom, :prenom)
      ');
      $res2 = $req -> execute([
        'email' => $user->getEmail(),
        'mdp' => $user->getMdp(),
        'nom' => $user->getNom(),
        'prenom' => $user->getPrenom()
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
/*
  public function recupSession($user){
    #Instancie la classe BDD
    $bdd = new BDD();
    $req = $bdd -> co_bdd()->prepare('SELECT * FROM user
      WHERE email = :email
    ');
    $req -> execute([]);
    $res = $req->fetch();
    return $res;
  }
*/
# Modification d'un compte

  public function modifier($user) {
    #Instancie la classe BDD
    $bdd = new BDD();
    $req = $bdd -> co_bdd()->prepare('SELECT email FROM user');
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
        header("Location: ../vue/edit.php");
        throw new Exception("Un ou plusieurs champs sont vides.");
      }

      else {
        header("Location: ../vue/edit.php");
        throw new Exception("Modification échouée !");
      }
    }
  }

# Fin classe Manager

}
?>
