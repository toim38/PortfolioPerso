<?php
require_once "init.inc.php"
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CDN BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--cdn fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <!-- CSS PERSO -->
    <link rel="stylesheet" href="css/style.css">
    <title>ACCUEIL</title>
</head>
<header class="container-fluid">
  <div class="alert bg-white" role="alert"> 
    <h1 class="text-center">PORTFOLIO <br><em>ZAROUEL <a href="admin/connexion.php" id="admin">Touhami</a></em></h1>
    <h3>DEVELOPPEUR INTEGRATEUR WEB junior</h3>
  </div>
    <nav class="navbar navbar-expand-lg navbar-primary bg-white">
     
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link text-dark" href="<?=URL?>index.php">index<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link text-dark" href="<?=URL?>curriculum vitae.php">curriculum vitae<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="<?=URL?>projets.php">Projets</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="<?=URL?>aptitude.php">Aptitude</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link text-dark" href="<?=URL?>form_contact.php">Contact</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link text-dark" href="<?=URL?>gestionExperiences.php">Evolution professionnelle</a>
          </li>



            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="https://lepoles.org">LePoleS</a>
              <a class="dropdown-item" href="https://www.solidarite-internationale-vitrysurseine.com/">Solidarité Internationale</a>
              <a class="dropdown-item" href="http://alef-vitry.fr/">ALEF</a>
            </div>
          </li>
          </ul>
        </div>
       
    </nav>
  </header><!-- FIN HEADER --> 
  
    