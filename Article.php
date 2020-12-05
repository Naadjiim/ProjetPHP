<?php
include 'db.php';
session_start();
if(isset($_SESSION['pseudo']))
{
    
        $consoles = implode('/', $_POST['console']);
        $rqst = $bdd->prepare('INSERT INTO `articles`(`titre`, `contenu`, `dateHeure`) 
                                VALUES (:titre, :contenu, NOW())');
        $rqst->execute(array(
            'titre' => $_POST['titre'],
            'contenu' => $_POST['contenu']
        ));
        $rqst->closeCursor();
        echo 'Ajout de l\'article réussie';
    if(isset($_POST['addCom']) && isset($_GET['id']))
    {
        $rqst = $bdd->prepare('INSERT INTO `commentaires`(`commentaire`, `pseudo`, `idArticle`, `dateHeure`) 
                                VALUES (:commentaire, :pseudo, :id, NOW())');
        $rqst->execute(array(
            'commentaire' => $_POST['commentaire'],
            'pseudo' => $_SESSION['pseudo'],
            'id' => $_GET['id']
        ));
        $rqst->closeCursor();
        echo 'Ajout du commentaire réussie';
    }
    else
    {
        echo 'Formulaire non envoyée';
    }
}
else
{
    echo 'Session not declared';
}