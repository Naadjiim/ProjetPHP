<?php session_start(); ?>
<html>

<head>

  <title>Profil</title>
  <link rel="stylesheet" href="css/profil.css">

  <?php include 'bootstrap.php' ?>
  <?php include 'navbar.php' ?>
</head>

<body>
<div class="card">
  <img src="image/avatar.png" alt="John" style="width:100%">
  <h1><?= $_SESSION['pseudo'] ?></h1>
  <p class="title"><?= $_SESSION['role'] ?></p>
  <a href="#"><i class="fa fa-dribbble"></i></a>
  <a href="#"><i class="fa fa-twitter"></i></a>
  <a href="#"><i class="fa fa-linkedin"></i></a>
  <a href="#"><i class="fa fa-facebook"></i></a>
  <p><button>Setting</button></p>
</div>
</body>

</html>