<?php
session_start();
if(isset($_SESSION['pseudo']))
{
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <link rel="icon" type="icon/ico" href="image/favicon.ico" />
    <script src="https://cdn.tiny.cloud/1/7tbdaidhth9ngax0okbjf5rwrd69ikinx7powbblw82ya2gt/tinymce/5/tinymce.min.js"
      referrerpolicy="origin">
    </script>
  </head>
  <body>
    <header>
      <?php include 'links.php'; ?>
      <?php include 'navbar.php'; ?>
      <?php include 'login.php'; ?>
    </header>
    <h1><i class="fas fa-newspaper" style="margin-top: 5%;"></i>Ajouter un article</h1>
    <form action="Article.php" method="post" style="margin-top: 2%;">
      <div class="container" style="width: 45%; float: right;">
        <label for="titre"><b>Titre</b></label>
        <input type="text" placeholder="Entrez un Titre" name="titre" required />

        <label class="container" style="background-color: #0c7ebd; color:white;">
          <input type="checkbox" name="play" value="play" />
          <span class="checkmark"></span><i class="fab fa-playstation"></i> Playstation
        </label>

        <label class="container" style="background-color: #24A723; color:white;">
          <input type="checkbox" name="xbox" value="xbox" />
          <span class="checkmark"></span><i class="fab fa-xbox"></i> Xbox
        </label>

        <label class="container" style="background-color: #D10018; color:white;">
          <input type="checkbox" name="nintendo" value="nintendo" />
          <span class="checkmark"></span><i class="fas fa-gamepad"></i> Nintendo
        </label>

        <label class="container" style="background-color: #1D1D1D; color:white;">
          <input type="checkbox" name="pc" value="pc" />
          <span class="checkmark"></span><i class="fas fa-desktop"></i> PC
        </label>
      </div>
      <textarea style="width: 50%;" id="basic-example" name="contenu">
      </textarea>
      <button class="button" type="submit" name="ajoutArticle">
        <span><i class="fas fa-plus"></i> Publier</span>
      </button>
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
<?php
}
else
{
  header('location: index.php');
}
