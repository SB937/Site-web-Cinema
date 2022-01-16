<?php
session_start();
?>
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
</head>

<body>
<nav class="navbar navbar-light navbar-expand-lg navigation-clean-button">
    <div class="container"><img src="assets/img/237930.jpg" style="width: 212px;height: 45.8px;"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav ml-auto">

                <li><button id="bouton9" onclick="window.location.href ='index.php'">Retour</button></li>
            </ul>
            <ul class="navbar-nav"></ul>
        </div>
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
//dsn
$dsn = 'mysql:host=localhost;dbname=miniprojet';
$user = 'root';
$password = '';

if (isset($_GET['email'])) {

    if ($_GET['email'] == 'silly@gmail.com') {
//connexion bdd
        try {
            $bdd = new PDO($dsn, $user, $password);
        } catch (Exception $e) {
            die('Erreur de connexion : ' . $e->getMessage());
        }
//requete SELECT

        $rep = $bdd->query('SELECT Internaute_idInternaute,Film_idFilm,nom,titre from noter inner join internaute on Internaute_idInternaute=idInternaute inner join film on Film_idFilm=idFilm where Internaute_idInternaute=3');

        while ($donnee = $rep->fetch()) {

            echo('Vous avez noter le film ' . $donnee['titre'] . '');
            echo '</br>';


        }
    }
     else if ($_GET['email'] == 'bilal@gmail.com') {
//connexion bdd
        try {
            $bdd = new PDO($dsn, $user, $password);
        } catch (Exception $e) {
            die('Erreur de connexion : ' . $e->getMessage());
        }
//requete SELECT

        $rep = $bdd->query('SELECT Internaute_idInternaute,Film_idFilm,nom,titre from noter inner join internaute on Internaute_idInternaute=idInternaute inner join film on Film_idFilm=idFilm where Internaute_idInternaute=6');

        while ($donnee = $rep->fetch()) {

            echo('Vous avez noter le film ' . $donnee['titre'] . '');
            echo '</br>';


        }
    }
    else if ($_GET['email'] == 'kais@kais.com') {
//connexion bdd
        try {
            $bdd = new PDO($dsn, $user, $password);
        } catch (Exception $e) {
            die('Erreur de connexion : ' . $e->getMessage());
        }
//requete SELECT

        $rep = $bdd->query('SELECT Internaute_idInternaute,Film_idFilm,nom,titre from noter inner join internaute on Internaute_idInternaute=idInternaute inner join film on Film_idFilm=idFilm where Internaute_idInternaute=5');

        while ($donnee = $rep->fetch()) {

            echo('Vous avez noter le film ' . $donnee['titre'] . '');
            echo '</br>';


        }
    }
}

?>