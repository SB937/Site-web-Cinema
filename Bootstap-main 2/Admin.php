<?php
session_start();
if(isset($_SESSION['admin'])){
    if ($_SESSION['admin'] == 0 ) {
        header('location:Index.php');
    }}
else
    header('location:Index.php');
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
            <tr>
                <th ><button onclick="Menu_film()">Lire film<a href="Ajout.php?action=film"><button>Ajout film</button></a></th>
                <th ><button onclick="Menu_genre()">Lire genre<a href="Ajout.php?action=genre"><button>Ajout genre</button></a></th>
                <th ><button onclick="Menu_internautes()">Internautes</button></th>
                <th><button onclick="window.location.href='login.html'">Déconnexion</button></th>
            </tr>
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
echo'<table id="table_film" style="display: none">
    <tr>
        <th>TITRE</th>
        <th>GENRE</th>
        <th>RÉALISATEUR</th>
        <th>DATE DE SORTIE</th>
        <th>RESUME</th>
    </tr>';

try{
    $bdd = new PDO('mysql:host=localhost;dbname=miniprojet','root','');
}
catch(Exception $e){
    die('Erreur de connexion : '.$e->getMessage());}
$rep = $bdd->query('SELECT * FROM miniprojet.film INNER JOIN miniprojet.genre ON film.Genre_idGenre = genre.idGenre INNER JOIN miniprojet.artiste ON film.Artiste_idRealisateur=artiste.idArtiste;');
while($donnee = $rep->fetch())
{
    echo '<tr>';
    echo '<td>'.$donnee['titre'].'</td>';
    echo '<td>'.$donnee['libelle'].'</td>';
    echo '<td>'.$donnee['prenom']." ".$donnee['nom'].'</td>';
    echo '<td>'.$donnee['annee'].'</td>';
    echo '<td>'.utf8_encode($donnee['resume']).'</td>';
    echo '<td><a href="Suppression.php?id='.$donnee['idFilm'].'&genre=film"><button >Supprimer</button></a></td>';
    echo '</tr>';
}
echo'</table>';

//Requete pour afficher les genres
echo'<table id="table_genre" style="display: none">
    <tr>
        <th>LIBELLE</th>
    </tr>';

try{
    $bdd = new PDO('mysql:host=localhost;dbname=miniprojet','root','');
}
catch(Exception $e){
    die('Erreur de connexion : '.$e->getMessage());}
$rep = $bdd->query('SELECT * FROM miniprojet.genre;');
while($donnee = $rep->fetch())
{
    echo '<tr>';
    echo '<td>'.$donnee['libelle'].'</td>';
    echo '<td><a href="Suppression.php?id='.$donnee['idGenre'].'&genre=genre"><button>Supprimer</button></a></td>';
    echo '</tr>';
}
echo'</table>';

//Requete pour afficher les internautes
echo'<table id="table_internautes" style="display: none">
    <tr>
        <th>NOM</th>
        <th>EMAIL</th>
        <th>ADMIN</th>
    </tr>';

try{
    $bdd = new PDO('mysql:host=localhost;dbname=miniprojet','root','');
}
catch(Exception $e){
    die('Erreur de connexion : '.$e->getMessage());}
$rep = $bdd->query('SELECT * FROM miniprojet.internaute;');
while($donnee = $rep->fetch())
{
    echo '<tr>';
    echo '<td>'.$donnee['nom'].'</td>';
    echo '<td>'.$donnee['email'].'</td>';
    echo '<td>'.$donnee['admin'].'</td>';
    echo '<td><a href="Suppression.php?id='.$donnee['idInternaute'].'&genre=internautes"><button>Supprimer</button></a></td>';
    echo '</tr>';
}
echo'</table>';

?>
<script>
    function Menu_film() {
        document.getElementById("table_film").setAttribute("style","display:block");
        document.getElementById("table_artiste").setAttribute("style","display:none");
        document.getElementById("table_genre").setAttribute("style","display:none");
        document.getElementById("table_internautes").setAttribute("style","display:none");
    }
    function Menu_artiste() {
        document.getElementById("table_artiste").setAttribute("style","display:block");
        document.getElementById("table_film").setAttribute("style","display:none");
        document.getElementById("table_genre").setAttribute("style","display:none");
        document.getElementById("table_internautes").setAttribute("style","display:none");
    }
    function Menu_genre() {
        document.getElementById("table_genre").setAttribute("style","display:block");
        document.getElementById("table_film").setAttribute("style","display:none");
        document.getElementById("table_artiste").setAttribute("style","display:none");
        document.getElementById("table_internautes").setAttribute("style","display:none");
    }
    function Menu_internautes() {
        document.getElementById("table_internautes").setAttribute("style", "display:block");
        document.getElementById("table_film").setAttribute("style", "display:none");
        document.getElementById("table_artiste").setAttribute("style", "display:none");
        document.getElementById("table_genre").setAttribute("style", "display:none");
    }

</script>
</body>
