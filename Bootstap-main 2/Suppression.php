<?php
session_start();
 $id = $_GET['id'];

if($_GET['genre']=="film"){
//connexion bdd
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=cinema', 'root', '');
    } catch (Exception $e) {
        die('Erreur de connexion : ' . $e->getMessage());
    }
    //preparation de la requête avec les variables $_POST du formulaire
    $req = $bdd->prepare('DELETE FROM film WHERE (idFilm = ?);');
    $req->execute([$id]) or die(print_r($req->errorInfo()));
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if($_GET['genre']=="genre"){
//connexion bdd
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=cinema', 'root', '');
    } catch (Exception $e) {
        die('Erreur de connexion : ' . $e->getMessage());
    }
    //preparation de la requête avec les variables $_POST du formulaire
    $requete = $bdd->prepare('DELETE FROM film WHERE (Genre_idGenre = ?);');
    $requete->execute([$id]) or die(print_r($requete->errorInfo()));

    $req = $bdd->prepare('DELETE FROM genre WHERE (idGenre = ?);');
    $req->execute([$id]) or die(print_r($req->errorInfo()));
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if($_GET['genre']=="internautes"){
//connexion bdd
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=cinema', 'root', '');
    } catch (Exception $e) {
        die('Erreur de connexion : ' . $e->getMessage());
    }
    $req = $bdd->prepare('DELETE FROM internaute WHERE (idInternaute = ?);');
    $req->execute([$id]) or die(print_r($req->errorInfo()));
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if($_GET['genre']=="artiste"){
//connexion bdd
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=cinema', 'root', '');
    } catch (Exception $e) {
        die('Erreur de connexion : ' . $e->getMessage());
    }
    $req = $bdd->prepare('DELETE FROM film WHERE (Artiste_idRealisateur = ?);');
    $req->execute([$id]) or die(print_r($req->errorInfo()));

    $requete = $bdd->prepare('DELETE FROM artiste WHERE (idArtiste = ?);');
    $requete->execute([$id]) or die(print_r($requete->errorInfo()));

}
   header('Location: Admin.php');