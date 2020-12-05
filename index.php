<?php session_start();

include 'db.php';
$rqst = $bdd->prepare('SELECT *, DATE_FORMAT(dateHeure, "%d/%m/%Y / %Hh%i") datH FROM articles ORDER BY id DESC');
    $rqst->execute();
    $articles = $rqst->fetch();

?>


<!DOCTYPE html>
<html>
  <head>
    <title>Accueil</title>
    <?php include 'bootstrap.php'; ?>
    <?php include 'navbar.php' ?>
    <?php include 'login.php' ?>
  </head>
  <body>
    <div class="tab">
      <button style="background-color: #0c7ebd; color:white;" class="tablinks" onclick="console(event, 'Playstation')"><i class="fab fa-playstation"></i>  Playstation</button>
      <button style="background-color: #24A723; color:white;" class="tablinks" onclick="console(event, 'Xbox')"><i class="fab fa-xbox"></i>  Xbox</button>
      <button style="background-color: #D10018; color:white;" class="tablinks" onclick="console(event, 'Nintedo')"><i class="fas fa-gamepad"></i>  Nintedo</button>
      <button style="background-color: #1D1D1D; color:white;" class="tablinks" onclick="console(event, 'PC')"><i class="fas fa-desktop"></i>  PC</button>
    </div>

    <!-- Page content -->
    <div class="home">

      <h1>News</h1> 

      <?php
      if(isset($_SESSION['pseudo']))
    {
      ?>

      <button class="button" onclick="location.href='addArticle.php';"><span><i class="fas fa-plus"></i> Publier un article</span></button>
      <?php
    }

?>
<div class="card" id="Playstation">
  <div class="card-header"><?= $articles['titre']?> <i style="background-color: #0c7ebd; color:white;" class="fab fa-playstation"></i>  <i style="background-color: #24A723; color:white;" class="fab fa-xbox"></i> 
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p><?= $articles['contenu']?></p>
    </blockquote>
  </div>
</div>


    </div>
  </body>
</html>