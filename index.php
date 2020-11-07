<html>

<head>

    <title>Jeux vidéo</title>

    <?php include 'bootstrap.php' ?>

</head>

<body>

<div class="form" >
    <h3 class="connexion">Connexion / Inscritpion</h3>
<form class="connexion" hidden>
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


<form class="connexion" >
  <div class="form-group">
    <label for="exampleInputEmail1">Pseudo</label>
    <input type="text" name="pseudo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Email</label>
    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
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
</div>
</body>

</html>