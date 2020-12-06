  <body>
      <?php include 'links.php' ?>
    <div id="id01" class="modal">
      <form class="modal-content animate" action="data_processing.php" method="post">
        <div class="imgcontainer">
          <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
          <img src="image/avatar.png" alt="Avatar" class="avatar">
        </div>

        <div class="container">
          <label for="pseudo"><b>Pseudo</b></label>
          <input type="text" placeholder="Entrez un pseudo" name="pseudo" id="pseudo" required>

          <label for="psw"><b>Mot de passe</b></label>
          <input type="password" placeholder="Entrez un mot de passe" name="psw" id="psw" required>
          <button type="submit" name="connexion">Connexion</button>
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

          <h1>Inscription</h1>
          <hr>
          <label for="email"><b>Email</b></label>
          <input type="text" placeholder="Entrez une adresse Email" name="email" id="email" required /><br />

          <label for="pseudo"><b>Pseudo</b></label>
          <input type="text" placeholder="Entrez un pseudo" name="pseudo" required />

          <label for="psw"><b>Mot de passe</b></label>
          <input type="password" placeholder="Entrez un mot de passe" name="psw" id="id" required>

          <label for="psw-repeat"><b>Confirmer le mot de me passe</b></label>
          <input type="password" placeholder="Confirmez votre mot de passe" name="psw-repeat" id="psw-repeat" required>
          <div class="clearfix">
          <button type="submit" class="signupbtn" name="inscription">Inscription</button>
          <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Annuler</button>
          </div>
        </div>
      </form>
    </div>
  </body>
