<?php include 'bootstrap.php' ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="home.php">Jeux vidéo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Console
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Xbox</a>
                    <a class="dropdown-item" href="#">Playstation</a>
                    <a class="dropdown-item" href="#">Nintendo</a>
                    <a class="dropdown-item" href="#">PC</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Jeux
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Tout les jeux</a>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Aventure</a>
                    <a class="dropdown-item" href="#">RPG</a>
                    <a class="dropdown-item" href="#">FPS</a>
                    <a class="dropdown-item" href="#">Multijoueur</a>
                    <a class="dropdown-item" href="#">Infiltration</a>
                    </div>

            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Forum
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Sortie</a>
                    <a class="dropdown-item" href="#">LOL</a>
                    <a class="dropdown-item" href="#">Call of</a>
                    <a class="dropdown-item" href="#">Fortnite</a>
                    <a class="dropdown-item" href="#">Console</a>

                </div>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="index.php">Sign in/ Sign up</a>
            </li>


        </ul>
        <li class="nav-item dropdown" class="form-inline my-2 my-lg-0">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Mon pseudo
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Profil</a>
                    <a class="dropdown-item" href="#">Déconnexion</a>
                </div>
        </li>
    </div>


    
</nav>

<div class="navs">
<ul class="nav flex-column">
  <li class="nav-item">
    <a class="nav-link active" href="#">Active</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
  </li>
</ul>
</div>