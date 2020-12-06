<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <link rel="icon" type="icon/ico" href="image/favicon.ico" />
    <title>Accueil</title>
  </head>
  <body>
    <header>
        <?php include 'bootstrap.php'; ?>
        <?php include 'navbar.php' ?>
        <?php include 'login.php' ?>
    </header>
    <div class="tab">
      <button style="background-color: #0c7ebd; color:white;" class="tablinks" onclick="console(event, 'Playstation')"><i class="fab fa-playstation"></i>  Playstation</button>
      <button style="background-color: #24A723; color:white;" class="tablinks" onclick="console(event, 'Xbox')"><i class="fab fa-xbox"></i>  Xbox</button>
      <button style="background-color: #D10018; color:white;" class="tablinks" onclick="console(event, 'Nintedo')"><i class="fas fa-gamepad"></i>  Nintedo</button>
      <button style="background-color: #1D1D1D; color:white;" class="tablinks" onclick="console(event, 'PC')"><i class="fas fa-desktop"></i>  PC</button>
    </div>
    <!-- Page content -->
    <div class="home">
      <h1>Nouveauté</h1> 
      <?php
      if(isset($_SESSION['pseudo']))
      {
      ?>
        <button class="button" onclick="location.href='ajoutArticle.php';"><span><i class="fas fa-plus"></i> Publier un article</span></button>
      <?php
      }
      else
      {
      ?>
        <button class="button" onclick="document.getElementById('id01').style.display='block'">
          <span><i class="fas fa-plus"></i> Publier un article</span>
        </button>
      <?php
      }
      if(isset($_GET['ajoutCom']))
      {
        echo '<p>Ajout du commentaire réussie</p>';
      }
      if(isset($_GET['erreurAjout']))
      {
        echo '<p>Erreur lors de l\'ajout</p>';
      }
      ?>
      <?php 
      require_once'Article.php'; 
      vue(); 
      ?>
    </div>
    <script>
                //* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
                    var dropdown = document.getElementsByClassName("dropdown-btn");
                    var i;

                    for (i = 0; i < dropdown.length; i++) {
                    dropdown[i].addEventListener("click", function() {
                        this.classList.toggle("active");
                        var dropdownContent = this.nextElementSibling;
                        if (dropdownContent.style.display === "block") {
                        dropdownContent.style.display = "none";
                        } else {
                        dropdownContent.style.display = "block";
                        }
                    });
                    }
                </script>
  </body>
</html>