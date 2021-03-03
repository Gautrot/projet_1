<?php
require_once '../model/cl_utilisateur.php';
require_once '../model/cl_cd.php';
require_once '../manager/cl_manager.php';

$liste = new Manager();
$rescd = $liste->listcd();
?>

<!-- HTML -->
<!doctype html>
<html lang="en">
    <!-- Header -->
    <?php include('../include/header.php'); ?>
    <!-- Fin Header -->
    <body class="bg-dark">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Contenu -->
            <div id="content">
                <!-- Navbar -->
                <?php include('../include/navbar.php'); ?>
                <!-- Fin Navbar -->
                <div class="text-center text-light">
                    <h1>Modification</h1>
                    <p>Modifier les CD disponibles en ce moment.</p>
                </div>
                <!-- Tableau -->
                <!-- cdres -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Titre</th>
                                        <th>Auteur</th>
                                        <th>Thème</th>
                                        <th>Valider</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($rescd as $value) {
                                      echo '<tr>
                                                <form method="post" action="../traitement/tr_modif_cd.php">
                                                    <td><input type="text" name="cdnom" value="' .$value['cdnom']. '"/></td>
                                                    <td><input type="text" name="cdaut" value="' .$value['cdaut']. '"/></td>
                                                    <td><input type="text" name="cdth" value="' .$value['cdth']. '"/></td>
                                                    <td><input class="btn btn-primary" type="submit" value="Valider" /></td>
                                                </form>
                                            </tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <p class="text-danger form-text text-center">
                        <?php
                        if (isset($_SESSION['erreur'])) {
                          echo $_SESSION['erreur'];
                        }
                        ?>
                    </p>
                </div>
                <!-- Fin Tableau -->
            </div>
            <!-- Fin Contenu -->
            <!-- Footer -->
            <?php include('../include/footer.php'); ?>
            <!-- Fin Footer -->
        </div>
        <!-- Fin Content Wrapper -->
        <!-- JS -->
        <?php include('../include/javascript.php'); ?>
        <!-- Fin JS -->
    </body>
</html>
