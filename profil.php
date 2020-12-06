<?php 
session_start(); 
if(isset($_SESSION['pseudo']))
{
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="icon/ico" href="image/favicon.ico" />
    <title>Profil</title>
    <link rel="stylesheet" href="css/profil.css">
    <link rel="stylesheet" href="css/index.css">
  </head>
  <body>
    <header>
      <?php include 'navbar.php' ?>
      <?php include 'bootstrap.php' ?>
    </header>
    <div class="profil">
      <img src="image/avatar.png" alt="John" style="width:10%" />
      <?php
      if(isset($_GET['diffPsw']))
      {
        echo '<p style="color: red;">Mot de passe différent</p>';
      }
      ?>
      <h1><?= $_SESSION['pseudo']; ?></h1>
      <p class="title"><?= $_SESSION['role']; ?></p>
      <button onclick="document.getElementById('id03').style.display='block'">Setting</button><br>
      <?php
      if($_SESSION['role'] == 'admin')
      {
      ?>
      <button onclick="document.getElementById('id04').style.display='block'"><i class="fa fa-fw fa-user"></i>
        Listes des utilisateurs
      </button>
      <?php
      }
      ?>
    </div>
    <div id="id03" class="modal">
        <form class="modal-content animate" action="data_processing.php" method="post">
          <div class="container">
          <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
            <h1>
              Vos informations    
            </h1>
            <hr>
            <label for="email"><b>Email</b></label>
            <input type="text" value=<?= $_SESSION['email']; ?> name="email" required />
            <label for="pseudo"><b>Pseudo</b></label>
            <input type="text" value=<?= $_SESSION['pseudo']; ?> name="pseudo" required />
            <label for="psw"><b>Nouveau mot de passe :</b></label>
            <input type="password" value=<?= $_SESSION['psw']; ?> name="psw" required />
            <label for="psw"><b>Confirmation du mot de passe :</b></label>
            <input type="password" value=<?= $_SESSION['psw']; ?> name="psw-repeat" required />
            <div class="clearfix">
              <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Cancel</button>
              <button type="submit" class="signupbtn" name="modifier">Modifier mes informations</button>
            </div>
          </div>
        </form>
      </div>
      <?php
      if($_SESSION['role'] == 'admin')
      {
      ?>
      <div id="id04" class="modal">
        <form class="modal-content animate" action="data_processing.php" method="post">
          <div class="container">
            <span onclick="document.getElementById('id04').style.display='none'" class="close" title="Close Modal">&times;</span>
            <h1>Utilisateurs</h1>
            <hr>
            <?php
            require_once 'bdd.php';
            $rqst = $bdd->prepare('SELECT *,DATE_FORMAT(dateInscription, "%d/%m/%Y %H:%i") date FROM `membres` WHERE role = "membre"');
            $rqst->execute();
            while($listes = $rqst->fetch())
            {
              echo $listes['pseudo'].' '.$listes['email'].' '.$listes['date'].'<a href="data_processing.php?idMembre='.
                $listes['id'].'"><i style="color: #2b2b2b;" class="fas fa-trash"></i></a><br />';
            }
            $rqst->closeCursor();
            ?>
          </div>
        </form>
      </div> 
      <?php
      }
      ?>  
  </body>
</html>
<?php
}
else
{
  header('location: index.php');
}