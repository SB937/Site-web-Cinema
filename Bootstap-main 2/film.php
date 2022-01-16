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
        <link rel="stylesheet" href="assets/css/p.css">
    </head>

    <body>
    <nav class="navbar navbar-light navbar-expand-lg navigation-clean-button">
        <div class="container"><img src="assets/img/237930.jpg" style="width: 212px;height: 45.8px;"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="navbar-nav ml-auto">
                        <li><button id="bouton1" onclick="window.location.href = 'film.php?genre=ALL'" >ALL</button></li>
                        <li><button id="bouton2" onclick="window.location.href = 'film.php?genre=ACTION'" >ACTION</button></li>
                        <li><button id="bouton3" onclick="window.location.href = 'film.php?genre=COMEDIE'" >COMEDIE</button></li>
                        <li><button id="bouton4" onclick="window.location.href = 'film.php?genre=DRAMATIQUE'" >DRAMATIQUE</button></li>
                        <li><button id="bouton5" onclick="window.location.href = 'film.php?genre=FICTION'" >FICTION</button></li>
                        <li><button id="bouton6" onclick="window.location.href = 'film.php?genre=GUERRE'" >GUERRE</button></li>
                        <li><button id="bouton7" onclick="window.location.href = 'film.php?genre=HORREUR'" >HORREUR</button></li>
                        <li><button id="bouton8" onclick="window.location.href = 'film.php?genre=THRILLER'" >THRILLER</button></li>
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

//Requete pour afficher les films
if (isset($_GET['genre'])) {
    $genre = $_GET['genre'];

    if ($_GET['genre'] == 'ALL') {

        echo '<table>
    <tr> 
        <th>IMAGE</th>
        <th>TITRE</th>
        <th>GENRE</th>
        <th>RÉALISATEUR</th>
        <th>DATE DE SORTIE</th>
        <th>RESUME</th>
        
        
       
    </tr>';

        try {
            $bdd = new PDO('mysql:host=localhost;dbname=miniprojet', 'root', '');
        } catch (Exception $e) {
            die('Erreur de connexion : ' . $e->getMessage());
        }
        $rep = $bdd->query('SELECT * FROM film INNER JOIN genre ON Genre_idGenre = genre.idGenre INNER JOIN artiste ON film.Artiste_idRealisateur=artiste.idArtiste;');
        while ($donnee = $rep->fetch()) {
            echo '<td><img class="fit-picture" src="';
            echo ($donnee['Image']);
            echo'"  width="50" height="50" ></td>';
            echo '<td>' . $donnee['titre'] . '</td>';
            echo '<td>' . $donnee['libelle'] . '</td>';
            echo '<td>' . $donnee['prenom'] . " " . $donnee['nom'] . '</td>';
            echo '<td>' . $donnee['annee'] . '</td>';
            echo '<td>' . utf8_encode($donnee['resume']) . '</td>';

            echo '</tr>';
        }
        echo '</table>';

    }

    elseif ($_GET['genre'] == 'ACTION') {

        echo '<table>
    <tr>
        <th>TITRE</th>
        <th>GENRE</th>
        <th>RÉALISATEUR</th>
        <th>DATE DE SORTIE</th>
        <th>RESUME</th>
    </tr>';

        try {
            $bdd = new PDO('mysql:host=localhost;dbname=miniprojet', 'root', '');
        } catch (Exception $e) {
            die('Erreur de connexion : ' . $e->getMessage());
        }
        $rep = $bdd->query('SELECT * FROM film INNER JOIN genre ON Genre_idGenre = genre.idGenre INNER JOIN artiste ON film.Artiste_idRealisateur=artiste.idArtiste WHERE idGenre=1;');
        while ($donnee = $rep->fetch()) {
            echo '<tr>';
            echo '<td><img class="fit-picture" src="';
            echo ($donnee['Image']);
            echo'"  width="50" height="50" ></td>';
            echo '<td>' . $donnee['titre'] . '</td>';
            echo '<td>' . $donnee['libelle'] . '</td>';
            echo '<td>' . $donnee['prenom'] . " " . $donnee['nom'] . '</td>';
            echo '<td>' . $donnee['annee'] . '</td>';
            echo '<td>' . utf8_encode($donnee['resume']) . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    elseif ($_GET['genre'] == 'COMEDIE') {

        echo '<table>
    <tr>
        <th>TITRE</th>
        <th>GENRE</th>
        <th>RÉALISATEUR</th>
        <th>DATE DE SORTIE</th>
        <th>RESUME</th>
    </tr>';

        try {
            $bdd = new PDO('mysql:host=localhost;dbname=miniprojet', 'root', '');
        } catch (Exception $e) {
            die('Erreur de connexion : ' . $e->getMessage());
        }
        $rep = $bdd->query('SELECT * FROM film INNER JOIN genre ON Genre_idGenre = genre.idGenre INNER JOIN artiste ON film.Artiste_idRealisateur=artiste.idArtiste WHERE idGenre=4;');
        while ($donnee = $rep->fetch()) {
            echo '<tr>';
            echo '<td><img class="fit-picture" src="';
            echo ($donnee['Image']);
            echo'"  width="50" height="50" ></td>';
            echo '<td>' . $donnee['titre'] . '</td>';
            echo '<td>' . $donnee['libelle'] . '</td>';
            echo '<td>' . $donnee['prenom'] . " " . $donnee['nom'] . '</td>';
            echo '<td>' . $donnee['annee'] . '</td>';
            echo '<td>' . utf8_encode($donnee['resume']) . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }

    elseif ($_GET['genre'] == 'DRAMATIQUE') {

        echo "Des films seront ajouter a cette categorie tres prochainement" ."<br>". "Cordialement La Direction";
    }
    elseif ($_GET['genre'] == 'FICTION') {

        echo "Des films seront ajouter a cette categorie tres prochainement" ."<br>". "Cordialement La Direction";
    }
    elseif ($_GET['genre'] == 'GUERRE') {

        echo "Des films seront ajouter a cette categorie tres prochainement" ."<br>". "Cordialement La Direction";
    }
    elseif ($_GET['genre'] == 'HORREUR') {

        echo '<table>
    <tr>
        <th>TITRE</th>
        <th>GENRE</th>
        <th>RÉALISATEUR</th>
        <th>DATE DE SORTIE</th>
        <th>RESUME</th>
    </tr>';

        try {
            $bdd = new PDO('mysql:host=localhost;dbname=miniprojet', 'root', '');
        } catch (Exception $e) {
            die('Erreur de connexion : ' . $e->getMessage());
        }
        $rep = $bdd->query('SELECT * FROM film INNER JOIN genre ON Genre_idGenre = genre.idGenre INNER JOIN artiste ON film.Artiste_idRealisateur=artiste.idArtiste WHERE idGenre=3;');
        while ($donnee = $rep->fetch()) {
            echo '<tr>';
            echo '<td><img class="fit-picture" src="';
            echo ($donnee['Image']);
            echo'"  width="50" height="50" ></td>';
            echo '<td>' . $donnee['titre'] . '</td>';
            echo '<td>' . $donnee['libelle'] . '</td>';
            echo '<td>' . $donnee['prenom'] . " " . $donnee['nom'] . '</td>';
            echo '<td>' . $donnee['annee'] . '</td>';
            echo '<td>' . utf8_encode($donnee['resume']) . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    elseif ($_GET['genre'] == 'THRILLER') {

        echo "Des films seront ajouter a cette categorie tres prochainement" ."<br>". "Cordialement La Direction";
    }
}

?>

