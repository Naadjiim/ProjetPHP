<?php
// Modification du compte
if(isset($_POST['modifier']) && preg_match("/^([\w-\.]+)@((?:[\w]+\.)+)([a-zA-Z]{2,4})/i", $_POST['email']))
{
    if($_POST['psw'] != $_POST['psw-repeat'])
    {
        header('location: profil.php?diffPsw');
    }
    else
    {
        session_start();
        require_once 'bdd.php';
        $pass = password_hash($_POST['psw'], PASSWORD_DEFAULT);
        $rqst = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
        $rqst->execute(array($_SESSION['id']));
        $rq = $rqst->fetch();              
        $rqst->closeCursor(); 
        $rqst = $bdd->prepare('UPDATE `membres` SET `pseudo` = :pseudo, `email` = :email, `password` = :password 
            WHERE id = :id');
        $rqst->execute(array(
            'id' => $_SESSION['id'], 
            'pseudo' => $_POST['pseudo'], 
            'email' => $_POST['email'], 
            'password' => $pass
        ));
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