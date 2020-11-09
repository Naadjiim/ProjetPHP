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
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>
        
        <label>
          <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>

        <button type="submit" name="login">Login</button>
      </div>

      <div class="container" style="background-color:#2b2a2a">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <span class="psw">Forgot <a href="resetPassword.php">password?</a></span>
      </div>
    </form>
  </div>



  <div id="id02" class="modal">
    <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
    <form class="modal-content animate" action="data_processing.php" method="post">
      <div class="container">
        <h1>Sign Up</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>
        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" required>

        <label for="pseudo"><b>Pseudo</b></label>
        <input type="text" placeholder="Enter pseudo" name="pseudo" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>

        <label for="psw-repeat"><b>Repeat Password</b></label>
        <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
        
        <label>
          <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
        </label>


        <div class="clearfix">
          <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
          <button type="submit" class="signupbtn" name="signUp">Sign Up</button>
        </div>
      </div>
    </form>
  </div>

</body>

</html>