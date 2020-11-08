<?php
session_start();
include 'connexionBdd.php';
// Inscription
if(isset($_POST['signUp'], $_POST['email']))
{
    $rqst = $bdd->prepare('SELECT COUNT(*) FROM membres WHERE pseudo = ? OR email = ?');
    $rqst->execute(array($_POST['pseudo'], $_POST['email']));
    $emailOrPseudo = $rqst->fetch();
    $rqst->closeCursor(); 
    if(!($emailOrPseudo[0] == 0))
    {
        echo '<html><center>Adresse mail ou pseudo utilisée<br /></center></html>';
    }
    else
    {
        if($_POST['psw'] != $_POST['psw-repeat'])
        {
            echo '<html><center>Le mot de passe doit être le même que celui de la confirmation</html></center>';
        }
        else
        {
            $psw = password_hash($_POST['psw'], PASSWORD_DEFAULT);
            $rqst = $bdd->prepare('INSERT INTO membres (`pseudo`, `email`, `password`, `role`, `dateInscription`) 
                                    VALUES (:pseudo, :email, :password, :role, NOW())');
            $rqst->execute(array(
                'pseudo' => $_POST['pseudo'],
                'email' => $_POST['email'],
                'password' => $psw,
                'role' => 'membre'
            ));
            $rqst->closeCursor();
            // header('location: index.php');
            echo '<html><center>Inscription réussie</html></center>';
        }   
    }
    
}
// Connexion
if(isset($_POST['login'], $_POST['uname']))
{
	//  Récupération de l'utilisateur et de son mot de passe
	$rqst = $bdd->prepare('SELECT id, pseudo, email, password, role FROM membres WHERE pseudo = ?');
	$rqst->execute(array($_POST['uname']));
	$result = $rqst->fetch();
    $rqst->closeCursor();
    
	// Comparaison du pass envoyé via le formulaire avec la base
	$passCorrect = password_verify($_POST['psw'], $result['password']);
	if (!$result)
	{
		echo '<center>Mauvais identifiant ou mot de passe. <br /> <a href="index.php">Retour sur la page de connexion</a></p></center>';
	}
	else
	{
		if ($passCorrect && $result['role'] == 'admin') 
		{ 
			$_SESSION['id'] = $result['id'];
			// $_SESSION['prenom'] = $result['prenom'];
			$_SESSION['pseudo'] = $result['pseudo'];
			$_SESSION['role'] = $result['role'];
			if(isset($_POST['remember']))
			{
				$_SESSION['uname'] = $_POST['uname'];
				$_SESSION['psw'] = $result['psw'];
            }
            echo 'Connexion admin réussie<a href="deconnexion.php">Deco</a>';
		}
		elseif($passCorrect && $result['role'] == 'membre')
		{
			$_SESSION['id'] = $result['id'];        
			// $_SESSION['prenom'] = $result['prenom'];
			$_SESSION['pseudo'] = $result['pseudo'];   
			$_SESSION['role'] = $result['role'];   
			if(isset($_POST['remember'])) 
			{
				$_SESSION['uname'] = $_POST['uname'];
				$_SESSION['psw'] = $result['psw'];
            }
            echo 'Connexion membre réussie<a href="deconnexion.php">Deco</a>';
		}
		// elseif($passCorrect && $result['role'] === 'guest')
		// {
		// 	header('location: membres/espaceMembre.php');
		// }
		else
		{
			echo '<center><p>Mauvais identifiant ou mot de passe. <br /> <a href="connexion.php">Retour a la page de connexion</a></p></center>';
		}
	}
}
?>
