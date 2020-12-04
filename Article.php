<?php
include 'db.php';
session_start();
if(isset($_SESSION['pseudo']))
{
    if(isset($_POST['addArticle']))
    {
        $consoles = implode('/', $_POST['console']);
        $rqst = $bdd->prepare('INSERT INTO `articles`(`titre`, `contenu`, `console`, `pseudo`, `dateHeure`) 
                                VALUES (:titre, :contenu, :console, :pseudo, NOW())');
        $rqst->execute(array(
            'titre' => $_POST['titre'],
            'contenu' => $_POST['contenu'],
            'console' => $consoles,
            'pseudo' => $_SESSION['pseudo']
        ));
        $rqst->closeCursor();
        echo 'Ajout de l\'article réussie';
    }
    elseif(isset($_POST['addCom']) && isset($_GET['id']))
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