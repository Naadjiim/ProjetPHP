<html>

<head>
  <link rel="stylesheet" href="css/index.css">
  <title>Jeux vidéo</title>
  <?php include 'bootstrap.php' ?>
</head>

<body>

  <div id="id01" class="modal">
    
    <form class="modal-content animate" action="data_processing.php" method="post">
      <div class="imgcontainer">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        <img src="image/avatar.png" alt="Avatar" class="avatar">
      </div>

      <div class="container">
        <label for="uname"><b>Pseudo</b></label>
        <input type="text" placeholder="Entrez un pseudo" name="uname" required>

        <label for="psw"><b>Mot de passe</b></label>
        <input type="password" placeholder="Entrez un mot de passe" name="psw" required>
        
        <label>
          <input type="checkbox" checked="checked" name="remember"> Se souvenir de moi
        </label>

        <button type="submit" name="login">Connexion</button>
      </div>

      <div class="container" style="background-color:#2b2a2a">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Annuler</button>
        <span class="psw"><a href="resetPassword.php">Mot de passe oublié</a></span>
      </div>
    </form>
  </div>



  <div id="id02" class="modal">
    <form class="modal-content animate" action="data_processing.php" method="post">
      <div class="container">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>

        <h1>Inscritpion</h1>
        <hr>
        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Entrez une adresse Email" name="email" required>

        <label for="pseudo"><b>Pseudo</b></label>
        <input type="text" placeholder="Entrez un pseudo" name="pseudo" required>

        <label for="psw"><b>Mot de passe</b></label>
        <input type="password" placeholder="Entrez un mot de passe" name="psw" required>

        <label for="psw-repeat"><b>Confirmer le mot de me passe</b></label>
        <input type="password" placeholder="Confirmez votre mot de passe" name="psw-repeat" required>
        
        <label>
          <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Se souvenir de moi
        </label>


        <div class="clearfix">
          <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Annuler</button>
          <button type="submit" class="signupbtn" name="signUp">Inscritpion</button>
        </div>
      </div>
    </form>
  </div>

</body>

</html>