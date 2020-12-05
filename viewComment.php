<?php
include 'db.php';
if(isset($_GET['id']))
{
    $rqst = $bdd->prepare('SELECT *, DATE_FORMAT(dateHeure, "%d/%m/%Y / %Hh%i") datH FROM commentaires WHERE idArticle = ?');
    $rqst->execute(array($_GET['id']));
    $comments = $rqst->fetch();
    while($comments)
    {
    ?>
        <center>
            <ul>
                <li>
                    <?php
                    echo $comments['pseudo'].' '.$comments['datH'].' :<br />'.$comments['commentaire'];
                    ?>
                </li>
            </ul>
        </center>
    <?php
    }
?>
        <center>
            <form action="Article.php?id=<?php echo $_GET['id'] ?>" method="post">
                Repondre : 
                <textarea style="width: 50%;" name="commentaire"></textarea>
                <input type="submit" name="addCom" value="Envoyer"/>
            </form>
        </center>
<?php
    $rqst->closeCursor();
}
else
{
    echo 'id non envoye';
}


while($articles)
{
?>
<div class="card" id="Playstation">
  <div class="card-header"><?= $articles['titre']?> <i style="background-color: #0c7ebd; color:white;" class="fab fa-playstation"></i>  <i style="background-color: #24A723; color:white;" class="fab fa-xbox"></i> 
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p><?= $articles['contenu']?></p>
    </blockquote>
  </div>
</div>
<?php
}