<?php
session_start();
// Ajout d'article 
if(isset($_POST['ajoutArticle'], $_SESSION['pseudo']))
{
    $consoles =['ps'=>$_POST['play'], 'xb'=>$_POST['xbox'], 'ntd'=>$_POST['nintendo'], 'pc'=>$_POST['pc']];
    $consJson = json_encode($consoles);
    require_once 'bdd.php';
    $rqst = $bdd->prepare('INSERT INTO `articles`(`titre`, `contenu`, `console`, `pseudo`,  `dateHeure`) 
        VALUES (?, ?, ?, ?, NOW())');
    $rqst->execute(array(htmlspecialchars($_POST['titre']), $_POST['contenu'], $consJson, $_SESSION['pseudo']));
    $rqst->closeCursor();
    header('location: index.php');
}
// Ajout de commentaire
if(isset($_POST['envoyer'], $_POST['idArticle']))
{
    require_once 'bdd.php';
    $rqst = $bdd->prepare('INSERT INTO `commentaires`(`commentaire`, `pseudo`, `idArticle`, `dateHeure`) 
        VALUES (?, ?, ?, NOW())');
    $rqst->execute(array(htmlspecialchars(
        $_POST['commentaire']),
        $_SESSION['pseudo'], 
        htmlspecialchars($_POST['idArticle'])
    ));
    $rqst->closeCursor();
    header('location: index.php');
}
// Suppression d'article
if($_SESSION['role'] == 'admin' && isset($_GET['idArticle']))
{
    require_once 'bdd.php';
    $rqst = $bdd->prepare('DELETE FROM articles WHERE id = ?');
    $rqst->execute(array(htmlspecialchars($_GET['idArticle'])));
    $rqst->closeCursor();
    header('location: index.php');
}
// Suppression de commentaire
if($_SESSION['role'] == 'admin' && isset($_GET['idCom']))
{
    require_once 'bdd.php';
    $rqst = $bdd->prepare('DELETE FROM commentaires WHERE id = ?');
    $rqst->execute(array(htmlspecialchars($_GET['idCom'])));
    $rqst->closeCursor();
    header('location: index.php');
}
// Affichage d'articles et des commentaires
function vue()
{
    require_once 'bdd.php';
    $rqstArticle = $bdd->prepare('SELECT *, DATE_FORMAT(dateHeure, "%d/%m/%Y %H:%i") datH FROM articles ORDER BY id DESC');
    $rqstArticle->execute();
    include 'links.php';
    while($articles = $rqstArticle->fetch())
    {
        $consoles = json_decode($articles['console']);
?>
        <div class="card" style="margin-top: 100px;">
            <div class="card-header" style="font-size: 20px;">
                    <?= $articles['titre'].' | <b>'.$articles['pseudo'].'</b> | '.$articles['datH']; ?>
                    <?php 
                    if($_SESSION['role'] == 'admin')
                    {
                    ?>
                        <a href="Article.php?idArticle=<?= $articles['id']; ?>">
                            <i style="color: #2b2b2b;" class="fas fa-trash"></i>
                        </a>
                    <?php
                    }
                    ?>
                <?php
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
                    <?= $articles['contenu'] ?>
                </blockquote>
            </div>
            <button class="dropdown-btn">Commentaires<i class="fa fa-caret-down"></i></button>
            <div class="dropdown-container">
                <?php
                $rqstCom = $bdd->prepare('SELECT *, DATE_FORMAT(dateHeure, "%d/%m/%Y / %H:%i") datH FROM commentaires WHERE idArticle = ?');
                $rqstCom->execute(array(htmlspecialchars($articles['id'])));
                while($coms = $rqstCom->fetch())
                {
                ?>
                    <h3>
                        <?php 
                        echo '<b>'.$coms['pseudo'].'</b> | '.$coms['datH'];
                        if($_SESSION['role'] == 'admin')
                        {
                        ?>
                            <a href="Article.php?idCom=<?= $coms['id']; ?>" >
                                <i style="color: white;" class="fas fa-trash"></i>
                            </a>
                        <?php
                        }
                        ?>
                    </h3>
                    <p><?= $coms['commentaire'];?></p>
                <?php
                }
                $rqstCom->closeCursor(); 
                if(isset($_SESSION['pseudo']))
                {
                ?>
                    <form action="Article.php" method="post">
                        <textarea name="commentaire" cols="30" rows="3"></textarea>
                        <input type="text" value=<?= $articles['id']; ?> name="idArticle" hidden />
                        <button type="submit" name="envoyer">Envoyer</button>
                    </form>
                <?php
                }
                ?>
            </div>
        </div>
<?php       
    }
    $rqstArticle->closeCursor();
}
