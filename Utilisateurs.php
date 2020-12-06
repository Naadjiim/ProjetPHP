<?php
session_start();
if($_SESSION['role'] == 'admin' )
{
    // if(isset($_POST['add']))
    // {
    //     require_once 'bdd.php';
    //     $rqst = $bdd->prepare('UPDATE `membres` SET `pseudo` = :pseudo, `email` = :email, `password` = :password 
    //         WHERE id = :id');
    //     $rqst->execute(array(
    //         'id' => $_POST['id'],
    //         'pseudo' => $_POST['pseudo'],
    //         'email' => $_POST['email'],
    //         'password' => password_hash($_POST['psw'])
    //     ));
    // }
    function vue()
    {
        require_once 'bdd.php';
        $rqst = $bdd->prepare('SELECT *,DATE_FORMAT(dateInscription, "%d/%m/%Y %H:%i") date FROM `membres` WHERE role = "membre"');
        $rqst->execute();
        while($listes = $rqst->fetch())
        {
            echo $listes['pseudo'].' '.$listes['email'].' '.$listes['date'].'<a href="data_processing.php?idMembre='.$listes['id'].'">Supprimer</a><br />';
        }
        $rqst->closeCursor();
    }
    vue();
}
else
{
    header('location: index.php');
}
?>