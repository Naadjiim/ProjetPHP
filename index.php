<?php session_start(); ?>
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
      <button class="button" onclick="location.href='addArticle.php';"><span><i class="fas fa-plus"></i>   Publier un article</span></button>
      
      <div class="card mb-3 tabcontent" style="width: 100%;" id="Playstation" >
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="image/ps.jpg" class="card-img" alt="Image Playstation">
          </div>
          <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">PlayStation</h5>
                <p class="card-text">Exemple d'article sur la console</p>
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="card mb-3 tabcontent" style="width: 100%;" id="Xbox">
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="image/xbox.jpg" class="card-img" alt="Image Xbox">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Xbox</h5>
              <p class="card-text">Exemple d'article sur la console</p>
            </div>
          </div>
        </div>
      </div>

      <div class="card mb-3 tabcontent" style="width: 100%;" id="Nintedo">
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="image/nintendo.jpg" class="card-img" alt="Image Nintendo">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Nintendo</h5>
              <p class="card-text">Exemple d'article sur la console</p>
            </div>
          </div>
        </div>
      </div>

      <div class="card mb-3 tabcontent" style="width: 100%;" id="PC">
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="image/pc.jpg" class="card-img" alt="Image PC">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">PC</h5>
              <p class="card-text">Exemple d'article sur la console</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>