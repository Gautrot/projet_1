<?php
require_once '../model/cl_utilisateur.php';
require_once '../model/cl_livre.php';
require_once '../model/cl_cd.php';
require_once '../model/cl_film.php';
require_once '../manager/cl_manager.php';

$liste = new Manager();
$resliv = $liste->listlivre();
$resfilm = $liste->listfilm();
$rescd = $liste->listcd();
?>

<!-- HTML -->
<!doctype html>
<html lang="en">
    <!-- Header -->
    <?php include('../include/header.php'); ?>
    <title>Contenu</title>
    <!-- Fin Header -->
    <body class="bg-dark">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Contenu -->
            <div id="content">
                <!-- Navbar -->
                <?php include('../include/navbar.php'); ?>
                <!-- Fin Navbar -->
                <!-- Tableau -->
                <!-- CD -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">CD</h6>
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
                                        <?php if ($_SESSION['rang'] == 'ADM') { echo '<th>Selection</th>';} ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($rescd as $value) {
                                      echo '<tr>
                                                <td>' .$value['cdnom']. '</td>
                                                <td>' .$value['cdaut']. '</td>
                                                <td>' .$value['cdth']. '</td>
                                                <form method="post" action="../traitement/tr_reserve.php">
                                                    <td><input class="btn btn-primary" type="submit" value="Réserver" /></td>
                                                </form>';
                                      if ($_SESSION['rang'] == 'ADM') {
                                        echo '<form method="post" action="modif_cd.php">
                                                  <td>
                                                      <input type="hidden" name="cd_modif" value="' .$value['cdnom']. '">
                                                      <input class="btn btn-primary" type="submit" value="Modifier" />
                                                  </td>
                                              </form>';
                                        }
                                      echo '</tr>';
                                    }
                                    if ($_SESSION['rang'] == 'ADM') {
                                      echo '<form method="post" action="../traitement/tr_ajout_cd.php">
                                                <tr>
                                                    <td><input type="text" name="cdnom" placeholder="Titre"></td>
                                                    <td><input type="text" name="cdaut" placeholder="Nom de l\'auteur"></td>
                                                    <td><input type="text" name="cdth" placeholder="Thème"></td>
                                                    <td></td>
                                                    <td><input class="btn btn-primary" type="submit" value="Ajouter" /></td>
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
                <!-- Films -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Films</h6>
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
                                        <?php if ($_SESSION['rang'] == 'ADM') { echo '<th>Selection</th>';} ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($resfilm as $value) {
                                      echo '<tr>
                                                <td>' .$value['filmnom']. '</td>
                                                <td>' .$value['filmaut']. '</td>
                                                <td>' .$value['filmth']. '</td>
                                                <form method="post" action="../traitement/tr_reserve.php">
                                                    <td><input class="btn btn-primary" type="submit" value="Réserver" /></td>
                                                </form>';
                                      if ($_SESSION['rang'] == 'ADM') {
                                        echo '<form method="post" action="modif_film.php">
                                                  <td>
                                                      <input type="hidden" name="film_modif" value="' .$value['filmnom']. '">
                                                      <input class="btn btn-primary" type="submit" value="Modifier" />
                                                  </td>
                                              </form>';
                                      }
                                      echo '</tr>';
                                    }
                                    if ($_SESSION['rang'] == 'ADM') {
                                      echo '<form method="post" action="../traitement/tr_ajout_film.php">
                                                <tr>
                                                    <td><input type="text" name="filmnom" placeholder="Titre"></td>
                                                    <td><input type="text" name="filmaut" placeholder="Nom de l\'auteur"></td>
                                                    <td><input type="text" name="filmth" placeholder="Thème"></td>
                                                    <td></td>
                                                    <td><input class="btn btn-primary" type="submit" value="Ajouter" /></td>
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
                                        <?php if ($_SESSION['rang'] == 'ADM') { echo '<th>Selection</th>';} ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($resliv as $value) {
                                      echo '<tr>
                                                <td>' .$value['livnom']. '</td>
                                                <td>' .$value['livaut']. '</td>
                                                <td>' .$value['livth']. '</td>
                                                <form method="post" action="../traitement/tr_reserve.php">
                                                    <td><input class="btn btn-primary" type="submit" value="Réserver" /></td>
                                                </form>';
                                      if ($_SESSION['rang'] == 'ADM') {
                                        echo '<form method="post" action="modif_liv.php">
                                                  <td>
                                                      <input type="hidden" name="liv_modif" value="' .$value['livnom']. '">
                                                      <input class="btn btn-primary" type="submit" value="Modifier" />
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
                                                    <td><input class="btn btn-primary" type="submit" value="Ajouter" /></td>
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
