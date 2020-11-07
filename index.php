<html>

<head>

  <title>Jeux vidéo</title>

  <?php include 'bootstrap.php' ?>

</head>

<body style="background-image: url('image/background.jpg');">
<h1 class="connexion" >Connexion</h1>
    <h1 class="connexion" >Inscritpion</h1>

    <button type="button" onclick="connexion()" class="btn btn-primary">Connexion</button>
    <button type="button" onclick="inscription()" class="btn btn-success">Inscritpion</button>
  <div class="form" id="connexion">

    <form class="connexion" >
      <div class="form-group">
        <label for="exampleInputEmail1">Pseudo</label>
        <input type="text" name="pseudo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
      </div>
      <button type="submit" class="btn btn-dark">Connexion</button>
    </form>
    </div>

    <div class="form" id="inscription">
    <form class="connexion">
      <div class="form-group">
        <label for="exampleInputEmail1">Pseudo</label>
        <input type="text" name="pseudo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>

      <div class="form-group">
        <label for="exampleFormControlInput1">Email</label>
        <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
          placeholder="name@example.com">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Nom</label>
        <input type="text" name="nom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Prenom</label>
        <input type="text" name="prenom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>

      <div class="form-group">
        <label for="exampleInputPassword1">Mot de passe</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
      </div>

      <div class="form-group">
        <label for="exampleInputPassword1">Confirler le mot de passe</label>
        <input type="password" name="cpassword" class="form-control" id="exampleInputPassword1">
      </div>
      <button type="submit" class="btn btn-dark">Inscritpion</button>
    </form>
  
</body>

</html>