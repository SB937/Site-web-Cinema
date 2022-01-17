<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>essai</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
    <link rel="stylesheet" href="assets/css/p.css">
</head>

<body>
<nav class="navbar navbar-light navbar-expand-lg navigation-clean-button">
    <div class="container"><img src="assets/img/237930.jpg" style="width: 212px;height: 45.8px;"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1">
        </div>
    </div>
</nav>
<a href="Admin.php">Retour</a>
</body>
</html>


<?php
if($_GET['action']==="film"){echo '<div>
    <form action="Ajout.php?action=film" method="post">
        <table>
            <tr>
                <td><label>Titre</label></td> <td><input type="text" name="titre"/></td>
            </tr>
            <tr>
                <td><label>Annee</label></td> <td><input type="text" name="annee"/></td>
            </tr>
            <tr>
                <td><label>Image</label></td> <td><input type="text" name="image"/></td>
            </tr>
            <tr>
                <td><label>Genre</label></td>
                <td ><select name="genre">';


    try{
        $bdd = new PDO('mysql:host=localhost;dbname=miniprojet','root','');
    }
    catch(Exception $e){
        die('Erreur de connexion : '.$e->getMessage());}
    $rep = $bdd->query('SELECT * FROM genre;');
    while($donnee = $rep->fetch())
    {
        echo('<option name="genre" value="'.$donnee['idGenre'].'">'.$donnee['libelle'].'</option>');
    }
    echo'</select></td>
            </tr>

            <tr>
                <td><label>Artiste</label></td>
                <td ><select name="artiste">';

    try{
        $bdd = new PDO('mysql:host=localhost;dbname=miniprojet','root','');
    }
    catch(Exception $e){
        die('Erreur de connexion : '.$e->getMessage());}
    $rep = $bdd->query('SELECT * FROM artiste;');
    while($donnee = $rep->fetch())
    {
        echo('<option name="artiste" value="'.$donnee['idArtiste'].'">'.$donnee['prenom'].' '.$donnee['nom'].'</option>');
    }
    echo'</select></td>
            </tr>
                <td><input type="button" value="Ajouter" onclick="this.form.submit()"></td>
            </tr>
        </table>
    </form>
</div></body></html>';
    if(isset($_POST['titre'])&&isset($_POST['annee'])){
        $titre=$_POST['titre'];
        $annee=$_POST['annee'];
        $Artiste=$_POST['artiste'];;
        $Genre=$_POST['genre'];
        $Image=$_POST['image'];

            try {
                $bdd = new PDO('mysql:host=localhost;dbname=miniprojet', 'root', '');
            } catch (Exception $e) {
                die('Erreur de connexion : ' . $e->getMessage());
            }
//preparation de la requête avec les variables $_POST du formulaire
            $req = $bdd->prepare('INSERT INTO film (titre, annee, Artiste_idRealisateur, Genre_idGenre,Image) VALUES (?,?, ?,?,?);');
            $req->execute([$titre,$annee,$Artiste,$Genre,$Image]) or die(print_r($req->errorInfo()));
            header('Location: Admin.php');
        }
}

if($_GET['action']==="genre"){echo'
<div>
    <form action="Ajout.php?action=genre" method="post">
        <table>
            <tr>
                <td><label>Libelle</label></td>
                <td ><input name="libelle"></td>
            </tr>
                <td><input type="button" value="Ajouter" onclick="this.form.submit()"></td>
            </tr>
        </table>
    </form>
</div></body></html>';
if(isset($_POST['libelle'])){
        $libelle=$_POST['libelle'];
            try {
                $bdd = new PDO('mysql:host=localhost;dbname=miniprojet', 'root', '');
            } catch (Exception $e) {
                die('Erreur de connexion : ' . $e->getMessage());
            }
//preparation de la requête avec les variables $_POST du formulaire
            $req = $bdd->prepare('INSERT INTO genre (libelle) VALUES (?);');
            $req->execute([$libelle]) or die(print_r($req->errorInfo()));
            header('Location: Admin.php');}
}

?>