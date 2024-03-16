<?php 

$server = "localhost";      //adresse de mon serveur
$username = "root";         //login
$password = "";             //mdp  
$dbname = "jonis";          //Nom de la base de donnée que je veux interroger

$conn = mysqli_connect($server,$username,$password,$dbname); //Ouvre une connexion a mySQL avec pour paramètre mes infos de BDD
