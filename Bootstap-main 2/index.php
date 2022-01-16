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
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="index.php"><img src="assets/img/237930.jpg" style="width: 415px;height: 115px;padding: -7px;margin: -24px;"></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="film.php">Film</a></li>
                    <li class="nav-item"><?php $email=$_SESSION['email']; echo '<a  class="nav-link active" href="notes.php?email='.$email.'">Notes</a>';?>
                    <li class="nav-item"><?php  $email= $_SESSION['email']; echo($email)  ;?></li>
                    <li class="nav-item"><?php echo "<img src='image/deconnexion.jpg' width=50 height=50  onclick='destroySession()'/>";?></li>
                    <li class="nav-item"><a class="nav-link active" href="propos.html">A propos </a></li>

                </ul>
                <ul class="navbar-nav"></ul>
            </div>
        </div>
    </nav>
    <section>
        <div id="promo" style="width: 1200px;height: 120px;"></div>
    </section>
    <div class="container">
        <h1>Cinéma</h1>
    </div>
    <div class="container">
        <h1 id="affiche" style="height: 41px;width: 930px;margin: 2px;padding: 0px;">Film à l'affiche</h1>
    </div>
    <button id=" image1" onclick="window.location.href = 'notif.php?id=6'" ><img src="assets/img/007.jpg" style="padding: 14px;"></button>
    <button id=" image1" onclick="window.location.href = 'notif.php?id=2'"><img src="assets/img/fast.jpg" style="padding: 14px;"></button>
    <button id=" image1" onclick="window.location.href = 'notif.php?id=1'"><img src="assets/img/venom.jpg" style="padding: 14px;"></button>
    <button id=" image1" onclick="window.location.href = 'notif.php?id=5'"><img src="assets/img/spider.jpg" style="padding: 14px;"></button>
    <button id=" image1" onclick="window.location.href = 'notif.php?id=11'"><img src="assets/img/clifford.jpg" style="padding: 14px;"></button>
    <div class="container">
        <h1 id="top">Top films de l'année 2021</h1>
    </div>
        <button id=" image1" onclick="window.location.href = 'notif.php?id=10'">><img src="assets/img/sos.jpg" style="padding: 14px;"></button>
        <button id=" image1" onclick="window.location.href = 'notif.php?id=7'"><img src="assets/img/resient.jpg" style="padding: 14px;"></button>
        <button id=" image1" onclick="window.location.href = 'notif.php?id=4'"><img src="assets/img/escape.jpg" style="padding: 14px;"></button>
        <button id=" image1" onclick="window.location.href = 'notif.php?id=3'"><img src="assets/img/candy.jpg" style="padding: 14px;"></button>
        <button id=" image1" onclick="window.location.href = 'notif.php?id=9'"><img src="assets/img/bac%20nord.jpg" style="padding: 14px;"></button>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/smoothproducts.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script>

        function destroySession(){
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    location.href='login.html';
                }
            };
            xmlhttp.open("GET", "destroySession.php?", true);
            xmlhttp.send();
        }
    </script>
</body>

</html>


<?php
/*

if (isset($_GET['image'])) {
    $image = $_GET['image'];

    if ($_GET['image'] == 'A') {

        echo '<table>
    <tr>
        <th>TITRE</th>
        <th>GENRE</th>
        <th>RÉALISATEUR</th>
        <th>DATE DE SORTIE</th>
        <th>RESUME</th>
        <th>Voulez-vous noter ce film</th>
        <th><a href="creationnote.php">OUI</a></th>
        <th><a href="index.php">NON</a></th>
        
        
    </tr>';

        try {
            $bdd = new PDO('mysql:host=localhost;dbname=miniprojet', 'root', '');
        } catch (Exception $e) {
            die('Erreur de connexion : ' . $e->getMessage());
        }
        $rep = $bdd->query('SELECT * FROM film INNER JOIN genre ON Genre_idGenre = genre.idGenre INNER JOIN artiste ON film.Artiste_idRealisateur=artiste.idArtiste WHERE idFilm=6;');
        while ($donnee = $rep->fetch()) {
            echo '<tr>';
            echo '<td>' . $donnee['titre'] . '</td>';
            echo '<td>' . $donnee['libelle'] . '</td>';
            echo '<td>' . $donnee['prenom'] . " " . $donnee['nom'] . '</td>';
            echo '<td>' . $donnee['annee'] . '</td>';
            echo '<td>' . utf8_encode($donnee['resume']) . '</td>';
            echo '</tr>';
        }
        echo '</table>';

    }
    elseif ($_GET['image'] == 'B') {

        echo '<table>
    <tr>
        <th>TITRE</th>
        <th>GENRE</th>
        <th>RÉALISATEUR</th>
        <th>DATE DE SORTIE</th>
        <th>RESUME</th>
        <th>Voulez-vous noter ce film</th>
        <th><a href="creationnote.php">OUI</a></th>
        <th><a href="index.php">NON</a></th>
    </tr>';

        try {
            $bdd = new PDO('mysql:host=localhost;dbname=miniprojet', 'root', '');
        } catch (Exception $e) {
            die('Erreur de connexion : ' . $e->getMessage());
        }
        $rep = $bdd->query('SELECT * FROM film INNER JOIN genre ON Genre_idGenre = genre.idGenre INNER JOIN artiste ON film.Artiste_idRealisateur=artiste.idArtiste WHERE idFilm=2;');
        while ($donnee = $rep->fetch()) {
            echo '<tr>';
            echo '<td>' . $donnee['titre'] . '</td>';
            echo '<td>' . $donnee['libelle'] . '</td>';
            echo '<td>' . $donnee['prenom'] . " " . $donnee['nom'] . '</td>';
            echo '<td>' . $donnee['annee'] . '</td>';
            echo '<td>' . utf8_encode($donnee['resume']) . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    elseif ($_GET['image'] == 'C') {

        echo '<table>
    <tr>
        <th>TITRE</th>
        <th>GENRE</th>
        <th>RÉALISATEUR</th>
        <th>DATE DE SORTIE</th>
        <th>RESUME</th>
        <th>Voulez-vous noter ce film</th>
        <th><a href="creationnote.php">OUI</a></th>
        <th><a href="index.php">NON</a></th>
    </tr>';

        try {
            $bdd = new PDO('mysql:host=localhost;dbname=miniprojet', 'root', '');
        } catch (Exception $e) {
            die('Erreur de connexion : ' . $e->getMessage());
        }
        $rep = $bdd->query('SELECT * FROM film INNER JOIN genre ON Genre_idGenre = genre.idGenre INNER JOIN artiste ON film.Artiste_idRealisateur=artiste.idArtiste WHERE idFilm=1;');
        while ($donnee = $rep->fetch()) {
            echo '<tr>';
            echo '<td>' . $donnee['titre'] . '</td>';
            echo '<td>' . $donnee['libelle'] . '</td>';
            echo '<td>' . $donnee['prenom'] . " " . $donnee['nom'] . '</td>';
            echo '<td>' . $donnee['annee'] . '</td>';
            echo '<td>' . utf8_encode($donnee['resume']) . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    elseif ($_GET['image'] == 'D') {

        echo '<table>
    <tr>
        <th>TITRE</th>
        <th>GENRE</th>
        <th>RÉALISATEUR</th>
        <th>DATE DE SORTIE</th>
        <th>RESUME</th>
        <th>Voulez-vous noter ce film</th>
        <th><a href="creationnote.php">OUI</a></th>
        <th><a href="index.php">NON</a></th>
    </tr>';

        try {
            $bdd = new PDO('mysql:host=localhost;dbname=miniprojet', 'root', '');
        } catch (Exception $e) {
            die('Erreur de connexion : ' . $e->getMessage());
        }
        $rep = $bdd->query('SELECT * FROM film INNER JOIN genre ON Genre_idGenre = genre.idGenre INNER JOIN artiste ON film.Artiste_idRealisateur=artiste.idArtiste WHERE idFilm=5;');
        while ($donnee = $rep->fetch()) {
            echo '<tr>';
            echo '<td>' . $donnee['titre'] . '</td>';
            echo '<td>' . $donnee['libelle'] . '</td>';
            echo '<td>' . $donnee['prenom'] . " " . $donnee['nom'] . '</td>';
            echo '<td>' . $donnee['annee'] . '</td>';
            echo '<td>' . utf8_encode($donnee['resume']) . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    elseif ($_GET['image'] == 'E') {

        echo '<table>
    <tr>
        <th>TITRE</th>
        <th>GENRE</th>
        <th>RÉALISATEUR</th>
        <th>DATE DE SORTIE</th>
        <th>RESUME</th>
        <th>Voulez-vous noter ce film</th>
        <th><a href="creationnote.php">OUI</a></th>
        <th><a href="index.php">NON</a></th>
    </tr>';

        try {
            $bdd = new PDO('mysql:host=localhost;dbname=miniprojet', 'root', '');
        } catch (Exception $e) {
            die('Erreur de connexion : ' . $e->getMessage());
        }
        $rep = $bdd->query('SELECT * FROM film INNER JOIN genre ON Genre_idGenre = genre.idGenre INNER JOIN artiste ON film.Artiste_idRealisateur=artiste.idArtiste WHERE idFilm=8;');
        while ($donnee = $rep->fetch()) {
            echo '<tr>';
            echo '<td>' . $donnee['titre'] . '</td>';
            echo '<td>' . $donnee['libelle'] . '</td>';
            echo '<td>' . $donnee['prenom'] . " " . $donnee['nom'] . '</td>';
            echo '<td>' . $donnee['annee'] . '</td>';
            echo '<td>' . utf8_encode($donnee['resume']) . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    elseif ($_GET['image'] == 'F') {

        echo '<table>
    <tr>
        <th>TITRE</th>
        <th>GENRE</th>
        <th>RÉALISATEUR</th>
        <th>DATE DE SORTIE</th>
        <th>RESUME</th>
        <th>Voulez-vous noter ce film</th>
        <th><a href="creationnote.php">OUI</a></th>
        <th><a href="index.php">NON</a></th>
    </tr>';

        try {
            $bdd = new PDO('mysql:host=localhost;dbname=miniprojet', 'root', '');
        } catch (Exception $e) {
            die('Erreur de connexion : ' . $e->getMessage());
        }
        $rep = $bdd->query('SELECT * FROM film INNER JOIN genre ON Genre_idGenre = genre.idGenre INNER JOIN artiste ON film.Artiste_idRealisateur=artiste.idArtiste WHERE idFilm=10;');
        while ($donnee = $rep->fetch()) {
            echo '<tr>';
            echo '<td>' . $donnee['titre'] . '</td>';
            echo '<td>' . $donnee['libelle'] . '</td>';
            echo '<td>' . $donnee['prenom'] . " " . $donnee['nom'] . '</td>';
            echo '<td>' . $donnee['annee'] . '</td>';
            echo '<td>' . utf8_encode($donnee['resume']) . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    elseif ($_GET['image'] == 'G') {

        echo '<table>
    <tr>
        <th>TITRE</th>
        <th>GENRE</th>
        <th>RÉALISATEUR</th>
        <th>DATE DE SORTIE</th>
        <th>RESUME</th>
        <th>Voulez-vous noter ce film</th>
        <th><a href="creationnote.php">OUI</a></th>
        <th><a href="index.php">NON</a></th>
    </tr>';

        try {
            $bdd = new PDO('mysql:host=localhost;dbname=miniprojet', 'root', '');
        } catch (Exception $e) {
            die('Erreur de connexion : ' . $e->getMessage());
        }
        $rep = $bdd->query('SELECT * FROM film INNER JOIN genre ON Genre_idGenre = genre.idGenre INNER JOIN artiste ON film.Artiste_idRealisateur=artiste.idArtiste WHERE idFilm=7;');
        while ($donnee = $rep->fetch()) {
            echo '<tr>';
            echo '<td>' . $donnee['titre'] . '</td>';
            echo '<td>' . $donnee['libelle'] . '</td>';
            echo '<td>' . $donnee['prenom'] . " " . $donnee['nom'] . '</td>';
            echo '<td>' . $donnee['annee'] . '</td>';
            echo '<td>' . utf8_encode($donnee['resume']) . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    elseif ($_GET['image'] == 'H') {

        echo '<table>
    <tr>
        <th>TITRE</th>
        <th>GENRE</th>
        <th>RÉALISATEUR</th>
        <th>DATE DE SORTIE</th>
        <th>RESUME</th>
        <th>Voulez-vous noter ce film</th>
        <th><a href="creationnote.php">OUI</a></th>
        <th><a href="index.php">NON</a></th>
    </tr>';

        try {
            $bdd = new PDO('mysql:host=localhost;dbname=miniprojet', 'root', '');
        } catch (Exception $e) {
            die('Erreur de connexion : ' . $e->getMessage());
        }
        $rep = $bdd->query('SELECT * FROM film INNER JOIN genre ON Genre_idGenre = genre.idGenre INNER JOIN artiste ON film.Artiste_idRealisateur=artiste.idArtiste WHERE idFilm=4;');
        while ($donnee = $rep->fetch()) {
            echo '<tr>';
            echo '<td>' . $donnee['titre'] . '</td>';
            echo '<td>' . $donnee['libelle'] . '</td>';
            echo '<td>' . $donnee['prenom'] . " " . $donnee['nom'] . '</td>';
            echo '<td>' . $donnee['annee'] . '</td>';
            echo '<td>' . utf8_encode($donnee['resume']) . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    elseif ($_GET['image'] == 'I') {

        echo '<table>
    <tr>
        <th>TITRE</th>
        <th>GENRE</th>
        <th>RÉALISATEUR</th>
        <th>DATE DE SORTIE</th>
        <th>RESUME</th>
        <th>Voulez-vous noter ce film</th>
        <th><a href="creationnote.php">OUI</a></th>
        <th><a href="index.php">NON</a></th>
    </tr>';

        try {
            $bdd = new PDO('mysql:host=localhost;dbname=miniprojet', 'root', '');
        } catch (Exception $e) {
            die('Erreur de connexion : ' . $e->getMessage());
        }
        $rep = $bdd->query('SELECT * FROM film INNER JOIN genre ON Genre_idGenre = genre.idGenre INNER JOIN artiste ON film.Artiste_idRealisateur=artiste.idArtiste WHERE idFilm=3;');
        while ($donnee = $rep->fetch()) {
            echo '<tr>';
            echo '<td>' . $donnee['titre'] . '</td>';
            echo '<td>' . $donnee['libelle'] . '</td>';
            echo '<td>' . $donnee['prenom'] . " " . $donnee['nom'] . '</td>';
            echo '<td>' . $donnee['annee'] . '</td>';
            echo '<td>' . utf8_encode($donnee['resume']) . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    elseif ($_GET['image'] == 'J') {

        echo '<table>
    <tr>
        <th>TITRE</th>
        <th>GENRE</th>
        <th>RÉALISATEUR</th>
        <th>DATE DE SORTIE</th>
        <th>RESUME</th>
        <th>Voulez-vous noter ce film</th>
        <th><a href="creationnote.php">OUI</a></th>
        <th><a href="index.php">NON</a></th>
    </tr>';

        try {
            $bdd = new PDO('mysql:host=localhost;dbname=miniprojet', 'root', '');
        } catch (Exception $e) {
            die('Erreur de connexion : ' . $e->getMessage());
        }
        $rep = $bdd->query('SELECT * FROM film INNER JOIN genre ON Genre_idGenre = genre.idGenre INNER JOIN artiste ON film.Artiste_idRealisateur=artiste.idArtiste WHERE idFilm=9;');
        while ($donnee = $rep->fetch()) {
            echo '<tr>';
            echo '<td>' . $donnee['titre'] . '</td>';
            echo '<td>' . $donnee['libelle'] . '</td>';
            echo '<td>' . $donnee['prenom'] . " " . $donnee['nom'] . '</td>';
            echo '<td>' . $donnee['annee'] . '</td>';
            echo '<td>' . utf8_encode($donnee['resume']) . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
}
*/
?>