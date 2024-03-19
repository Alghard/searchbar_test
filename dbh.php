<?php 

$host = "localhost";      //adresse de mon serveur
$user = "root";         //login
$password = "";             //mdp  
$db = "jonis";          //Nom de la base de donnée que je veux interroger

// $conn = mysqli_connect($server,$username,$password,$dbname); //Ouvre une connexion a mySQL avec pour paramètre mes infos de BDD //!! OUTDATED


$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";      // 

try {
	$pdo = new PDO($dsn, $user, $password);

	if ($pdo) {
		// echo "Connected to the $db database successfully!";
	}
} catch (PDOException $e) {
	echo $e->getMessage();
}