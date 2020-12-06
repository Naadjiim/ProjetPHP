<?php
// Inscription
if(isset($_POST['inscription'], $_POST['email']))
{
	require_once 'bdd.php';
	// Pseudo
    $rqst = $bdd->prepare('SELECT COUNT(*) FROM membres WHERE pseudo = ?');
    $rqst->execute(array($_POST['pseudo']));
    $pseudo = $rqst->fetch();
	$rqst->closeCursor();
	// Email
	$rqst = $bdd->prepare('SELECT COUNT(*) FROM membres WHERE email = ?');
	$rqst->execute(array(htmlspecialchars($_POST['email'])));
	$email = $rqst->fetch(); 
	$rqst->closeCursor();
    if(!($pseudo[0] == 0))
    {
    	header('location: index.php?pseudoUtil');
	}
	elseif(!($email[0] == 0))
    {
    	header('location: index.php?emailUtil');
	}
    else
    {
    	if($_POST['psw'] != $_POST['psw-repeat'])
    	{
    	    header('location: index.php?diffPsw');
    	}
    	else
    	{
    	    $rqst = $bdd->prepare('INSERT INTO membres (`pseudo`, `email`, `password`, `role`, `dateInscription`) 
    	        VALUES (:pseudo, :email, :password, :role, NOW())');
    	    $rqst->execute(array(
    	        'pseudo' => htmlspecialchars($_POST['pseudo']),
    	        'email' => htmlspecialchars($_POST['email']),
    	        'password' => password_hash($_POST['psw'], PASSWORD_DEFAULT),
    	        'role' => 'membre'
    	    ));
    	    $rqst->closeCursor();
    	    header('location: index.php');
    	}   
    }
}
// Connexion
if(isset($_POST['connexion'], $_POST['pseudo']))
{
	require_once 'bdd.php';
	$rqst = $bdd->prepare('SELECT id, pseudo, email, password, role FROM membres WHERE pseudo = ?');
	$rqst->execute(array(htmlspecialchars($_POST['pseudo'])));
	$result = $rqst->fetch();
    $rqst->closeCursor();
	$passCorrect = password_verify($_POST['psw'], $result['password']);
	if (!$result)
	{
		header('location: index.php?incorrect');
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
			header('location: index.php?incorrect');
		}
	}
}
// Modifier les paramètres du compte
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
        $rqst = $bdd->prepare('UPDATE `membres` SET `pseudo` = ?, email = ?, `password` = ? WHERE id = ?');
        $rqst->execute(array(
			htmlspecialchars($_POST['pseudo']),
			htmlspecialchars($_POST['email']), 
			password_hash($_POST['psw'], PASSWORD_DEFAULT), 
			$_SESSION['id']
		));
        $rqst->closeCursor();
        header('location: deconnexion.php');
    }
}
// Supprimer le compte
if(isset($_GET['idMembre']))
{
	require_once 'bdd.php';
	$rqst = $bdd->prepare('DELETE FROM `membres` WHERE id = ? && role = "membre"');
	$rqst->execute(array(htmlspecialchars($_GET['idMembre'])));
	$rqst->closeCursor();
	header('location: profil.php');
}