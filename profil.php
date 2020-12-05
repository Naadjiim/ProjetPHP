<?php session_start(); ?>
<html>

<head>

  <title>Profil</title>
  <link rel="stylesheet" href="css/profil.css">
  <link rel="stylesheet" href="css/index.css">
  <?php include 'navbar.php' ?>
  <?php include 'bootstrap.php' ?>

</head>

<body>
<div class="profil">
  <img src="image/avatar.png" alt="John" style="width:10%">
  <h1><?= $_SESSION['pseudo'] ?></h1>
  <p class="title"><?= $_SESSION['role'] ?></p>

  <p><button onclick="document.getElementById('id03').style.display='block'">Setting</button></p>
</div>


<div id="id03" class="modal">
    <form class="modal-content animate" action="data_processing.php" method="post">
      <div class="container">
      <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>

        <h1>Vos informations</h1>
        <hr>

        
        <label for="email"><b>Email</b></label>
        <input type="text" value=<?= $_SESSION['email']; ?> name="email" required>

        <label for="pseudo"><b>Pseudo</b></label>
        <input type="text" value=<?= $_SESSION['pseudo']; ?> name="pseudo" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" value=<?= $_SESSION['psw']; ?> name="psw" required>
        <input type="text" value=<?= $_SESSION['id'] ?> name="id" hidden>

        <div class="clearfix">
          <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Cancel</button>
          <button type="submit" class="signupbtn" name="modifier">Modifier mes informations</button>
        </div>
      </div>
    </form>
  </div>
</body>

</html>