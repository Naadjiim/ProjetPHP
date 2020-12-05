<?php
// Ajout d'article
    session_start();
if(isset($_POST['ajoutArticle']))
{
 
    require_once 'bdd.php';
    $rqst = $bdd->prepare('INSERT INTO `articles`(`titre`, `contenu`, `console`, `pseudo`,  `dateHeure`) 
                           VALUES (:titre, :contenu, :console, :pseudo, NOW())');
    $rqst->execute(array(
      'titre' => $_POST['titre'],
            'contenu' => $_POST['contenu'],
            'console' => array($_POST['play'], $_POST['xbox'], $_POST['nintendo'], $_POST['PC']),
            'pseudo' => $_SESSION['pseudo']
    ));
    $rqst->closeCursor();
    header('location: index.php?ajoutArticle');
} 
if(isset($_POST['envoyer']) && isset($_GET['idArticle']))
{
    $rqst = $bdd->prepare('INSERT INTO `commentaires`(`commentaire`, `pseudo`, `idArticle`, `dateHeure`) 
                            VALUES (:commentaire, :pseudo, :id, NOW())');
    $rqst->execute(array(
        'commentaire' => $_POST['commentaire'],
        'pseudo' => $_SESSION['pseudo'],
        'id' => $_POST['idArticle']
    ));
    $rqst->closeCursor();
    header('location: index.php#'.$_POST['idArticle']);
}
// Affichage d'articles
function vue()
{
    require_once'bdd.php';
    $rqst = $bdd->query('SELECT *, DATE_FORMAT(dateHeure, "%d/%m/%Y / %H:%i") datH FROM articles ORDER BY id DESC');
    while($articles = $rqst->fetch())
    {
       
        ?>
            <div class="card" style="margin-bottom: 2%;">
        <?php
  
        ?>
        <div class="card-header" style="font-size: 30px;">
            <?php 
            echo $articles['titre'].' | <b>'.$articles['pseudo'].'</b> | ';
            if($articles['console'] == "Playstation")
            {
            ?>
                <i style="background-color: #0c7ebd; color:white;" class="fab fa-playstation"></i>  
            <?php
            }
            if($articles['console'] == "Xbox")
            {
            ?>
                <i style="background-color: #24A723; color:white;" class="fab fa-xbox"></i> 
            <?php
            }
            if($articles['console'] == "Nintendo")
            {
            ?>
            <i style="background-color: #24A723; color:white;" class="fab fa-nintendo"></i> 
            <?php
            }
            if($articles['console'] == "PC")
            {
            ?>
                <i style="background-color: #24A723; color:white;" class="fab fa-pc"></i>
            <?php
            }
            ?>
            <?= '<p>'.$articles['datH'].'</p>'; ?>
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p><?= $articles['contenu'] ?></p>
            </blockquote>
        </div>
        <button class="dropdown-btn">Commentaire<i class="fa fa-caret-down"></i></button>
        <div class="dropdown-container">
            <h3>Mon pseudo</h3><p> 05/12/2020 22h00</p>
            <p>Mon commentaire</p>

            <h3>Mon pseudo</h3><p> 05/12/2020 22h00</p>
            <p>Mon commentaire</p>
            <form action="Article.php">
                <textarea name="commentaire" cols="160" rows="3"></textarea>
                <input type="text" value=<?= $articles['idArticle']; ?> name="id" hidden>
                <button type="submit" name="envoyer">Envoyer</button>
            </form>
        </div>
        </div>

        <script>
        //* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>
<?php      
        
    }
    $rqst->closeCursor(); 
}
