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
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    echo '<table>
    <tr>
        <th>IMAGE</th>
        <th>TITRE</th>
        <th>GENRE</th>
        <th>RÉALISATEUR</th>
        <th>DATE DE SORTIE</th>
        <th>RESUME</th>
        <th>VOULEZ-VOUS NOTER CE FILM</th>

        
        
    </tr>';

    try {
        $bdd = new PDO('mysql:host=localhost;dbname=miniprojet', 'root', '');
    } catch (Exception $e) {
        die('Erreur de connexion : ' . $e->getMessage());
    }
    $rep = $bdd->query('SELECT * FROM film INNER JOIN genre ON Genre_idGenre = genre.idGenre INNER JOIN artiste ON film.Artiste_idRealisateur=artiste.idArtiste WHERE idFilm='.$id.';');
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
         echo '<th><a href="creationnote.php?titre=' . $donnee['titre'] . '&id=' . $donnee['idFilm'] . '">OUI</a></th>';
         echo '<th><a href="index.php">NON</a></th>';
        echo '</tr>';
    }
    echo '</table>';

}