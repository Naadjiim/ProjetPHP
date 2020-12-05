<?php
// Modification du compte
if(isset($_POST['modifier']))
{
    if($_POST['psw'] != $_POST['psw-repeat'])
    {
        header('location: index.php?diffPsw');
    }
    else
    {
        include 'bdd.php';
        //  Récupération de l'utilisateur et de son mot de passe
        $passCorrect = password_verify($_POST['psw'], $result['password']);
        if (!$passCorrect)
        {
            header('location: index.php?erreurPsw');
        }
        else
        {
            $rqst = $bdd->prepare('UPDATE pseudo, email, password VALUES(:pseudo, :email, :password) 
                FROM membres WHERE id = ?');
            $rqst->execute(array($_POST['id'],
                'pseudo' => $_POST['pseudo'],
                'email' => $_POST['email'],
                'password' => password_hash($_POST['psw'], PASSWORD_DEFAULT)
            ));
            $rqst->closeCursor();
            header('location: profil.php');
        }
    }
}
if(isset($_GET['erreurPsw']))
{
    echo '<p>Mot de passe actuelle incorrect</p>';
}
if(isset($_GET['diffPsw']))
{
    echo '<p>Mot de passe différent</p>';
}

?>