<?php
// Ajout d'article 
session_start();
if(isset($_POST['ajoutArticle'], $_SESSION['pseudo']))
{
    $consoles =['ps'=>$_POST['play'], 'xb'=>$_POST['xbox'], 'ntd'=>$_POST['nintendo'], 'pc'=>$_POST['pc']];
    $consJson = json_encode($consoles);
    require_once 'bdd.php';
    $rqst = $bdd->prepare('INSERT INTO `articles`(`titre`, `contenu`, `console`, `pseudo`,  `dateHeure`) 
        VALUES (?, ?, ?, ?, NOW())');
    $rqst->execute(array($_POST['titre'], $_POST['contenu'], $consJson, $_SESSION['pseudo']));
    $rqst->closeCursor();
    header('location: index.php');
} 
if(isset($_POST['envoyer'], $_POST['idArticle']))
{
    require_once 'bdd.php';
    $rqst = $bdd->prepare('INSERT INTO `commentaires`(`commentaire`, `pseudo`, `idArticle`, `dateHeure`) 
        VALUES (?, ?, ?, NOW())');
    $rqst->execute(array($_POST['commentaire'], $_SESSION['pseudo'], $_POST['idArticle']));
    $rqst->closeCursor();
    header('location: index.php');
}
// Affichage d'articles
function vue()
{
    require_once 'bdd.php';
    $rqstArticle = $bdd->prepare('SELECT *, DATE_FORMAT(dateHeure, "%d/%m/%Y / %H:%i") datH FROM articles ORDER BY id DESC');
    $rqstArticle->execute();
    while($articles = $rqstArticle->fetch())
    {
        $consoles = json_decode($articles['console']);
?>
        <div class="card" style="margin-bottom: 2%;">
            <div class="card-header" style="font-size: 30px;">
                <?php 
                echo '<center>'.$articles['titre'].' | <b>'.$articles['pseudo'].'</b> | '.$articles['datH'].'</center>';
                
                if($consoles->ps == "play")
                {
                ?>
                    <i style="background-color: #0c7ebd; color:white;" class="fab fa-playstation"></i>  
                <?php
                }
                if($consoles->xb == "xbox")
                {
                ?>
                    <i style="background-color: #24A723; color:white;" class="fab fa-xbox"></i> 
                <?php
                }
                if($consoles->ntd == "nintendo")
                {
                ?>
                <i style="background-color: #D10018; color:white;" class="fas fa-gamepad"></i> 
                <?php
                }
                if($consoles->pc == "pc")
                {
                ?>
                    <i style="background-color: #1D1D1D; color:white;" class="fas fa-desktop"></i>
                <?php
                }
                ?>
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p><?= $articles['contenu'] ?></p>
                </blockquote>
            </div>
            <button class="dropdown-btn">Commentaire<i class="fa fa-caret-down"></i></button>
            <div class="dropdown-container">
                <h3><?= $coms['pseudo'];?></h3>
                <p> <?= $coms['datH'];?></p>
                <p><?= $coms['commentaire'];?></p>
                <form action="Article.php" method="post">
                    <textarea name="commentaire" cols="100%" rows="3"></textarea>
                    <input type="text" value=<?= $articles['id']; ?> name="idArticle" hidden />
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
    $rqstArticle->closeCursor();
    // $rqstCom->closeCursor(); 
 
}
