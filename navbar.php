<?php include 'bootstrap.php'; ?>
<div class="navbar" id="navbar">
  <a class="active" href="index.php"><i class="fa fa-fw fa-home"></i> Accueil</a>
    <?php
    if(isset($_SESSION['pseudo']))
    {

      ?>
      <a href="profil.php"><i class="fa fa-fw fa-user"></i><?= $_SESSION['pseudo'] ?></a>
    <?php
    }
    else
    {
    ?>
      <a href="#" onclick="document.getElementById('id02').style.display='block'" style="width:auto;"> Inscription</a>
      <a href="#" onclick="document.getElementById('id01').style.display='block'" style="width:auto;"><i></i> Connexion</a>
    <?php
    }
    ?>
</div>


