<?php
require_once '../model/cl_utilisateur.php';
require_once '../model/cl_livre.php';
require_once '../manager/cl_manager.php';

$liste = new Manager();
$resliv = $liste->listLivre();
?>

<!-- HTML -->
<!doctype html>
<html lang="en">
    <!-- Header -->
    <?php include('../include/header.php'); ?>
    <title>Livres</title>
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
                    <h1>Livres</h1>
                    <p>Livres disponibles en ce moment.</p>
                </div>
                <!-- Tableau -->
                <!-- Livres -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Livres</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Titre</th>
                                        <th>Auteur</th>
                                        <th>Thème</th>
                                        <th style="width:50px">Réserver</th>
                                        <?php if ($_SESSION['rang'] == 'ADM') { echo '<th colspan="2">Selection</th>';} ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($resliv as $value) {
                                      echo '<tr>
                                                <td name="' .$value['livnom']. '">' .$value['livnom']. '</td>
                                                <td name="' .$value['livaut']. '">' .$value['livaut']. '</td>
                                                <td name="' .$value['livth']. '">' .$value['livth']. '</td>
                                                <form method="post" action="../traitement/tr_reserve.php">
                                                    <td><input class="btn btn-primary" type="submit" value="Réserver" /></td>
                                                </form>';
                                      if ($_SESSION['rang'] == 'ADM') {
                                        echo '<form method="post" action="modif_liv.php">
                                                  <td>
                                                      <input type="hidden" name="liv_modif" value="' .$value['livnom']. '">
                                                      <input class="btn btn-primary" type="submit" value="Modifier" />
                                                  </td>
                                              </form>
                                              <form method="post" action="suppr_liv.php">
                                                  <td>
                                                      <input type="hidden" name="liv_suppr" value="' .$value['livnom']. '">
                                                      <input class="btn btn-primary" type="submit" value="Supprimer" />
                                                  </td>
                                              </form>';
                                      }
                                      echo '</tr>';
                                    }
                                    if ($_SESSION['rang'] == 'ADM') {
                                      echo '<form method="post" action="../traitement/tr_ajout_liv.php">
                                                <tr>
                                                    <td><input type="text" name="livnom" placeholder="Titre"></td>
                                                    <td><input type="text" name="livaut" placeholder="Nom de l\'auteur"></td>
                                                    <td><input type="text" name="livth" placeholder="Thème"></td>
                                                    <td></td>
                                                    <td colspan="2"><input class="btn btn-primary" type="submit" value="Ajouter" /></td>
                                                </tr>
                                            </form>';
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
