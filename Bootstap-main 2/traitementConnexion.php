<?php
session_start();

//dsn
$dsn = 'mysql:host=localhost;dbname=miniprojet';
$user = 'root';
$password = '';
//connexion bdd
try{
    $bdd = new PDO($dsn, $user, $password);

//requete SELECT
    $queryStatement = $bdd->prepare('SELECT * FROM internaute WHERE  email=:email and password=:password');
    $queryStatement->execute(array('email' => $_POST['email'], 'password' => $_POST['password']));
    $donnee = $queryStatement->fetch();
// si le client existe en BDD
    switch($donnee['admin']){

        case '1' 	:	//Redirection vers admin.php
            $_SESSION['admin']=1;
            $_SESSION['donnee'] = $donnee;
            header('Location: Admin.php');
            break;

        case '0'		:	//Redirection vers index.php
            $_SESSION['admin']=0;
            $_SESSION['donnee'] = $donnee;
            header('Location: Index.php');
            break;

        default			:	//Redirection vers index.php
            header('Location: pp.html');
            break;
    }

    $queryStatement->closeCursor();
}


catch(Exception $e)
{
    die('Erreur de connexion : '.$e->getMessage());
}
?>
