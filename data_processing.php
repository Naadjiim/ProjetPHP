<?php
// Inscription
if(isset($_POST['signUp'], $_POST['email']))
{
	if(preg_match("/^([\w-\.]+)@((?:[\w]+\.)+)([a-zA-Z]{2,4})/i", $_POST['email']))
	{
       
    
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
    	        header('location: index.php');
    	        echo '<html><center>Inscription réussie</html></center>';
    	    }   
    	}
	}
}
// Connexion
if(isset($_POST['login'], $_POST['uname']))
{

		include 'bdd.php';
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
				session_start();
				$_SESSION['id'] = $result['id'];
				// $_SESSION['prenom'] = $result['prenom'];
				$_SESSION['pseudo'] = $result['pseudo'];
				$_SESSION['role'] = $result['role'];
				$_SESSION['email'] = $result['email'];
				$_SESSION['psw'] = $result['psw'];
			
			
				if(isset($_POST['remember']))
				{
					$_SESSION['pseudo'] = $_POST['uname'];
					$_SESSION['psw'] = $result['psw'];
    	        }
				header('location: index.php');
			}
			elseif($passCorrect && $result['role'] == 'membre')
			{
				$_SESSION['id'] = $result['id'];
				// $_SESSION['prenom'] = $result['prenom'];
				$_SESSION['pseudo'] = $result['pseudo'];
				$_SESSION['role'] = $result['role'];
				$_SESSION['email'] = $result['email'];
				$_SESSION['psw'] = $result['psw']; 
				if(isset($_POST['remember'])) 
				{
					$_SESSION['uname'] = $_POST['uname'];
					$_SESSION['psw'] = $result['psw'];
    	        }
				header('location: index.php');
			}
			else
			{
				echo '<center><p>Mauvais identifiant ou mot de passe. <br /> <a href="index.php">Retour a la page de connexion</a></p></center>';
			}
		}

}



// Modifier
if(isset($_POST['modifier'], $_POST['email']))
{
	if(preg_match("/^([\w-\.]+)@((?:[\w]+\.)+)([a-zA-Z]{2,4})/i", $_POST['email']))
	{
       
    
		require_once 'bdd.php';
		$rqst = $bdd->prepare('UPDATE `membres` SET email=? , pseudo= ? , password = ? WHERE id = ?');
    	$rqst->execute(array($_POST['email'], $_POST['pseudo'], $_POST['spsw'], $_POST['id']));
		$rqst->closeCursor(); 
		
	}
}

