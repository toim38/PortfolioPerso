<?php
require_once "inc/init.inc.php";

?>



<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projets</title>
</head>
<body>
<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    REALISATIONS
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="http://lepoles.org/">Formation</a>
    <a class="dropdown-item" href="https://www.linkedin.com/jobs/search?keywords=
    D%C3%A9veloppement%20web&location=Paris%2C%20%C3%8Ele-de-France%2C%20France&trk=
    *guest_job_search_jobs-search-bar_search-submit&redirect=false&position=1&pageNum=0">Destination</a>
    <a class="dropdown-item" href="https://unpained-checkers.000webhostapp.com/">CV</a>
  </div>
</div>

<div class="row">
    <div class="col-md-10 ">
<div id="carouselExampleControls "  class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="photo/fenetre-orientale.jpg" class="d-block w-50" style="height:80vh;"alt="travail d'équipe">
        </div>
        <div class="carousel-item">
            <img src="photo/Recommendation IT Guidelines.jpg" class="d-block w-50" style="height:80vh;"alt="réussite">
        </div>
        <div class="carousel-item">
            <img src="photo/equipe-1.jpg" class="d-block w-50" style="height:80vh;"alt="ouverture">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
</div>
</div>
<div class="container mt-3">
</div>
<?php
require_once "inc/footer.inc.php";
