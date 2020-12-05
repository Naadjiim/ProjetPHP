<?php
session_start(); 

if(!isset($_SESSION['pseudo'])) {

  header('location: index.php');
}

else{
?>

<!DOCTYPE html>
<html>

<head>
  <?php include 'bootstrap.php' ?>
  <?php include 'navbar.php' ?>
  <?php include 'login.php' ?>
  <script src="https://cdn.tiny.cloud/1/7tbdaidhth9ngax0okbjf5rwrd69ikinx7powbblw82ya2gt/tinymce/5/tinymce.min.js"
    referrerpolicy="origin"></script>
</head>

<body>
  <h1><i class="fas fa-newspaper" style="margin-top: 5%;"></i>Ajouter un article</h1>


  <form action="Article.php" method="post" style="margin-top: 2%;">

  <div class="container" style="width: 45%; float: right;">
    <label for="uname"><b>Titre</b></label>
    <input type="text" placeholder="Entre un Titre" name="titre" required>

    <label class="container" style="background-color: #0c7ebd; color:white;">
  <input type="checkbox" checked="checked">
  <span class="checkmark"></span><i class="fab fa-playstation"></i>  Playstation
</label>

<label class="container" style="background-color: #24A723; color:white;">
  <input type="checkbox">
  <span class="checkmark"></span><i class="fab fa-xbox"></i>  Xbox
</label>

<label class="container" style="background-color: #D10018; color:white;">
  <input type="checkbox">
  <span class="checkmark"></span><i class="fas fa-gamepad"></i>  Nintedo
</label>

<label class="container" style="background-color: #1D1D1D; color:white;">
  <input type="checkbox">
  <span class="checkmark"></span><i class="fas fa-desktop"></i>  PC
</label>

  </div>

  
 

  <textarea style="width: 50%;" id="basic-example" name="contenu">
  </textarea>


  <button class="button" type="submit"><span><i class="fas fa-plus"></i> Publier</span></button>
  </form>

  
  <script>
    tinymce.init({
      selector: 'textarea#basic-example',
      height: 500,
      menubar: false,
      plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table paste code help wordcount'
      ],
      toolbar: 'undo redo | formatselect | ' +
        'bold italic backcolor | alignleft aligncenter ' +
        'alignright alignjustify | bullist numlist outdent indent | ' +
        'removeformat | help',
      content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });
  </script>
</body>

</html>
<?php }