<?php
session_start();
?>
    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/html">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Home - Brand</title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
        <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
        <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
        <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
        <link rel="stylesheet" href="assets/css/smoothproducts.css">
        <link rel="stylesheet" href="assets/css/untitled.css">
    </head>

    <body style="padding: 0px;margin: 0px;height: 824px;width: 1201px;">
    <nav class="navbar navbar-light navbar-expand-lg navigation-clean-button">

            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ml-auto">
                    <li><button id="bouton10" onclick="window.location.href ='index.php'">Retour</button></li>
                </ul>
                <ul class="navbar-nav"></ul>
            </div>

    </nav>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/smoothproducts.min.js"></script>
    <script src="assets/js/theme.js"></script>

    </body>

    </html>



<?php
echo('Vous avez bien noter le film ' . $_GET['titre'] . '');
echo '</br>';

try {
    $bdd = new PDO('mysql:host=localhost;dbname=miniprojet', 'root', '');
} catch (Exception $e) {
    die('Erreur de connexion : ' . $e->getMessage());
}
$Internaute=$_SESSION['idInternaute'];
$Film=$_GET['id'];

$rep = $bdd->query('INSERT INTO noter (`Internaute_idInternaute`, `Film_idFilm`) VALUES ('.$Internaute.','.$Film.' );');
?>