<?php
// Inscription
if(isset($_POST['inscription'], $_POST['email']))
{
	// if(preg_match("/^([\w-\.]+)@((?:[\w]+\.)+)([a-zA-Z]{2,4})/i", $_POST['email']))
	// {
		require_once 'bdd.php';
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
    	        echo '<html><center>Le mot de passe doit être le même que celui de la confirmation</center></html>';
    	    }
    	    else
    	    {
    	        $rqst = $bdd->prepare('INSERT INTO membres (`pseudo`, `email`, `password`, `role`, `dateInscription`) 
    	            VALUES (:pseudo, :email, :password, :role, NOW())');
    	        $rqst->execute(array(
    	            'pseudo' => $_POST['pseudo'],
    	            'email' => $_POST['email'],
    	            'password' => password_hash($_POST['psw'], PASSWORD_DEFAULT),
    	            'role' => 'membre'
    	        ));
    	        $rqst->closeCursor();
    	        header('location: index.php');
    	    }   
    	}
	// }
}
// Connexion
if(isset($_POST['connexion'], $_POST['pseudo']))
{
		require_once 'bdd.php';
		$rqst = $bdd->prepare('SELECT id, pseudo, email, password, role FROM membres WHERE pseudo = ?');
		$rqst->execute(array($_POST['pseudo']));
		$result = $rqst->fetch();
    	$rqst->closeCursor();
		$passCorrect = password_verify($_POST['psw'], $result['password']);
		if (!$result)
		{
			echo '<center>Mauvais identifiant ou mot de passe. <br /> <a href="index.php">Retour sur la page de connexion</a></p></center>';
		}
		else
		{
			if ($passCorrect && $result['role'] == 'admin') 
			{
				session_start();
				$_SESSION['id'] = $result['id'];
				$_SESSION['pseudo'] = $result['pseudo'];
				$_SESSION['role'] = $result['role'];
				$_SESSION['email'] = $result['email'];
				$_SESSION['psw'] = $_POST['psw'];
				header('location: index.php');
			}
			elseif($passCorrect && $result['role'] == 'membre')
			{
				session_start();
				$_SESSION['id'] = $result['id'];
				$_SESSION['pseudo'] = $result['pseudo'];
				$_SESSION['role'] = $result['role'];
				$_SESSION['email'] = $result['email'];
				$_SESSION['psw'] = $_POST['psw']; 
				header('location: index.php');
			}
			else
			{
				header('location: index.php');
			}
		}

}
// Modifier les paramètres du compte
if(isset($_POST['modifier'], $_POST['email']))
{
	if(preg_match("/^([\w-\.]+)@((?:[\w]+\.)+)([a-zA-Z]{2,4})/i", $_POST['email']))
	{
		$password = password_hash($_POST['spsw'], PASSWORD_DEFAULT);
		require_once 'bdd.php';
		$rqst = $bdd->prepare('UPDATE `membres` SET email=? , pseudo= ? , password = ? WHERE id = ?');
    	$rqst->execute(array($_POST['email'], $_POST['pseudo'], $password, $_POST['id']));
		$rqst->closeCursor(); 
		
	}
}
// Supprimer le compte
if(isset($_GET['idMembre']))
{
	require_once 'bdd.php';
	$rqst = $bdd->prepare('DELETE FROM `membres` WHERE id = ? && role = "membre"');
	$rqst->execute(array($_GET['idMembre']));
	$rqst->closeCursor();
	header('location: Utilisateurs.php');
}

