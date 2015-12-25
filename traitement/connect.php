<?php
	session_start();
	include('../variables.php');
	$db = connectDB();
	if(!isset($_POST['mail']) || !isset($_POST['pass'])){
		die("ERROR: post variables not set");
	}
	$mail = htmlspecialchars($_POST['mail']);
	$pass = md5(htmlspecialchars($_POST['pass']));
	$query_str = "SELECT COUNT(*) FROM `users` WHERE `mail`='$mail' AND `password`='$pass';";
	if($res = $db->query($query_str)){
		if ($res->fetchColumn() == 1) {
			foreach ($db->query("SELECT * FROM `users` WHERE `mail`='$mail' AND `password`='$pass';") as $row){
				//une fois seulement
				$userArray['name'] = $row['name'];
				$userArray['lastName'] = $row['lastName'];
				$userArray['subDate'] = $row['subDate'];
				$_SESSION['user'] = $userArray;
				$_SESSION['isConnected'] = true;
			}
			
			echo("success");
		}else{
			die("Mauvais mail ou mot de passe.");
		}
	}else{
		die("Impossible d'effectuer la requete.");
	}
?>