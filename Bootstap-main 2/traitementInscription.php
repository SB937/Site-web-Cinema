<?php
session_start();

$email=$_GET['email'];
$mdp=$_GET['mdp'];
$nom=$_GET['nom'];
//dsn
$dsn = 'mysql:host=localhost;dbname=miniprojet';
$user = 'root';
$password = '';
//connexion bdd
try {
    $bdd = new PDO($dsn, $user, $password);

//requete INSERT
    $queryStatement = $bdd->prepare('INSERT INTO internaute (nom,email,password) values (:nom,:email,:password)');
    $queryStatement->execute(array('nom' => $nom,'email' => $email, 'password' => $mdp)) or die(print_r($queryStatement->errorInfo()));

    $queryStatement->closeCursor();
}
catch(Exception $e)
{
    die('Erreur de connexion : '.$e->getMessage());
}

?>
