<!-- Navbar -->
<div class="d-flex flex-column">
    <nav class="navbar navbar-expand navbar-light bg-light topbar static-top shadow rounded-bottom">
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="../traitement/tr_recherche.php" method="get">
            <div class="input-group">
                <input type="search" name="recherche" class="form-control bg-light border border-primary small text-secondary" placeholder="Rechercher" aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <!-- Image -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                        <a href="../traitement/tr_recherche.php"></a>
                    </button>
                </div>
            </div>
        </form>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow d-sm-none show">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <!-- Image -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </a>
                <!-- Dropdown - Rechercher (Smartphone) -->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in show" aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search" action="../traitement/tr_recherche.php" method="get">
                        <div class="input-group">
                            <input type="search" name="recherche" class="form-control bg-light border-0 small" placeholder="Rechercher" aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <!-- Image -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>
            <!-- Accueil -->
            <li class="nav-item">
                <a class="nav-link" href="espace_client.php">Accueil<span class="sr-only">(current)</span></a>
            </li>
            <!-- Tous les contenus -->
            <li class="nav-item">
                <a class="nav-link" href="tableau.php" tabindex="-1" aria-disabled="true">Tous les contenus</a>
            </li>
            <!-- Oeuvres -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                    Œuvres
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                    <li><a class="dropdown-item" href="cd.php">CD</a></li>
                    <li><a class="dropdown-item" href="films.php">Films</a></li>
                    <li><a class="dropdown-item" href="livres.php">Livres</a></li>
                </ul>
            </li>
            <!-- Statistiques (Administration) -->
            <?php
            if ($_SESSION['rang'] == 'ADM') {
                echo '<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        Statistiques
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                        <li><a class="dropdown-item" href="tabl_utilisateur.php">Liste d\'utilisateurs</a></li>
                    </ul>
                </li>';
                }
            ?>
            <li class="nav-item">
                <a class="nav-link" href="contact.php" tabindex="-1" aria-disabled="true">Contacts</a>
            </li>
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600">Bienvenue</span>
                    <!-- Image -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    </svg>
                </a>
                <!-- Dropdown - Liste -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <form action="modifier.php" method="post">
                        <a class="dropdown-item" href="modifier.php">
                            <!-- Image -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="mb-1 mr-2" width="16" height="16" fill="currentColor" class="bi bi-gear-fill mr-2" viewBox="0 0 16 16">
                                <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
                            </svg>
                            Modifier
                        </a>
                    </form>
                    <hr>
                    <form action="../traitement/tr_deconnexion.php" method="post">
                        <a class="dropdown-item" href="../traitement/tr_deconnexion.php">
                            <!-- Image -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right mr-2" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                            </svg>
                            <input class="btn btn-danger" type="submit" value="Se déconnecter" />
                        </a>
                    </form>
                </div>
            </li>
        </ul>
    </nav>
<!-- Fin Navbar -->
