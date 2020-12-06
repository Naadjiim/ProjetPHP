<?php
// Modification du compte && preg_match("/^([\w-\.]+)@((?:[\w]+\.)+)([a-zA-Z]{2,4})/i", $_POST['email'])
if(isset($_POST['modifier']))
{
    if($_POST['psw'] != $_POST['psw-repeat'])
    {
        header('location: profil.php?diffPsw');
    }
    else
    {
        session_start();
        require_once 'bdd.php';
        // $rqst = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
        // $rqst->execute(array($_SESSION['id']));
        // $rqst = $rqst->fetch();              
        // $rqst->closeCursor(); 
        $rqst = $bdd->prepare('UPDATE `membres` SET `pseudo` = ?, email = ?, `password` = ? WHERE id = ?');
        $rqst->execute(array($_POST['email'], $_POST['pseudo'], password_hash($_POST['psw'], PASSWORD_DEFAULT), $_SESSION['id']));
        $rqst->closeCursor();
        header('location: deconnexion.php');
    }
}

// if(password_verify($_POST['psw'] == $info['password'])){} else{ echo 'Mot de passe actuel incorrect' };
if(isset($_GET['erreurPsw']))
{
    echo '<p>Mot de passe actuelle incorrect</p>';
}
if(isset($_GET['diffPsw']))
{
    echo '<p>Mot de passe différent</p>';
}

?>