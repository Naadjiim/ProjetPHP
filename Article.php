<?php
// Ajout d'article
    session_start();
if(!isset($_POST['ajoutArticle']))
{

    $array = [$_POST['play'], $_POST['xbox'], $_POST['nintendo'], $_POST['PC'] ];
 
    require_once 'bdd.php';
    $rqst = $bdd->prepare('INSERT INTO `articles`(`titre`, `contenu`, `console`, `pseudo`,  `dateHeure`) 
                           VALUES (:titre, :contenu, :console, :pseudo, NOW())');
    $rqst->execute(array(
      'titre' => $_POST['titre'],
            'contenu' => $_POST['contenu'],
            'console' => $array,
            'pseudo' => $_SESSION['pseudo']
    ));
    $rqst->closeCursor();
    header('location: index.php?ajoutArticle');
} 
if(isset($_POST['addCom']) && isset($_GET['idArticle']))
{
    $rqst = $bdd->prepare('INSERT INTO `commentaires`(`commentaire`, `pseudo`, `idArticle`, `dateHeure`) 
                            VALUES (:commentaire, :pseudo, :id, NOW())');
    $rqst->execute(array(
        'commentaire' => $_POST['commentaire'],
        'pseudo' => $_SESSION['pseudo'],
        'id' => $_GET['idArticle']
    ));
    $rqst->closeCursor();
    header('location: index.php#'.$_GET['id']);
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
        <div class="card-header" style=" font-size: 30px;">
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
        </div>
<?php      
        
    }
    $rqst->closeCursor(); 
}
