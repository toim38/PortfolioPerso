<?php
require_once "../inc/init.inc.php";





?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil Admin</title>
</head>


<body>
<h1 class="text-center text-primary m-5">Accueil Admin</h1>


<div class="card m-5" style="width: 18rem;X">
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
    <a href="gestionProjets.php">Gestion Projets</a>
    </li>
    <li class="list-group-item">
    <a href="gestionFormations.php">Gestion Formations</a>
    </li>
    <li class="list-group-item">
    <a href="gestionLangage.php">Gestion Languages</a>
    </li>
    <li class="list-group-item">
    <a href="gestionExperiences.php">Gestion Expériences</a>
    </li>
  </ul>
</div>

</body>
</html>