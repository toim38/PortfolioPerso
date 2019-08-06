<?php
require_once "../inc/init.inc.php";





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