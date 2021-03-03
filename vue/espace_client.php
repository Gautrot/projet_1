<?php
require_once '../model/cl_utilisateur.php';
require_once '../manager/cl_manager.php';
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
                </div>
                <!-- Carouselle -->
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <a href="films.php">
                                <img src="../img/stock_film.jpg" class="img-fluid d-block w-100 rounded-lg" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Films</h5>
                                    <p>Liste de film disponibles en ce moment.</p>
                                </div>
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a href="livres.php">
                                <img src="../img/stock_livre.jpg" class="img-fluid d-block w-100 rounded-lg" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Livres</h5>
                                    <p>Liste de livre disponibles en ce moment.</p>
                                </div>
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a href="cd.php">
                                <img src="../img/stock_cd.jpg" class="img-fluid d-block w-100 rounded-lg" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>CDs</h5>
                                    <p>Liste de CD et disque disponibles en ce moment.</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Précédent</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Suivant</span>
                    </a>
                <!-- Fin Carouselle -->
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
