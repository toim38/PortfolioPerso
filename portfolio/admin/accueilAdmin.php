<?php
require_once "../inc/init.inc.php";
if(isset($_POST['connexion'])) {
                                  if(empty($_POST['pseudo'])) {
                                              echo "Le champ Pseudo est vide.";
    }                                                                   else {
        // on vérifie maintenant si le champ "Mot de passe" n'est pas vide"
if(empty($_POST['mdp'])) {
            echo "Le champ Mot de passe est vide.";
        } else {
            // les champs sont bien posté et pas vide, on sécurise les données entrées par le membre:
            $Pseudo = htmlentities($_POST['pseudo'], ENT_QUOTES, "ISO-8859-1"); // le htmlentities() passera les guillemets en entités HTML, ce qui empêchera les injections SQL
            $MotDePasse = htmlentities($_POST['mdp'], ENT_QUOTES,


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil Admin</title>
</head>


<body>
<h1 class="text-center text-primary alert alert-warning m-5">Accueil Admin</h1>
<div class="row">
  <a href="?action=deconnexion" class="btn btn-danger offset-md-10">Déconnexion</a>
</div>
<section class="tabledesmatieres" >

<div class=" container card m-10" style="width: 28rem;X">
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
    <a href="gestionProjets.php">Gestion Projets</a>
    </li>
    <li class="list-group-item">
    <a href="gestionFormation.php">Gestion Formation</a>
    </li>
    <li class="list-group-item">
    <a href="gestionLangage.php">Gestion Languages</a>
    </li>
    <li class="list-group-item">
    <a href="gestionExperiences.php">Gestion Expériences</a>
    </li>
    <li class="list-group-item">
    <a href="gestion_contact.php">Gestion Contact</a>
    </li>
  </ul>
</div>
</section>
</body>
</html>