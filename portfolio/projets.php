<?php
  
require_once "inc/init.inc.php";
require_once "inc/header.inc.php";

?>
<main class="container">
  <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    REALISATIONS
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="photo/version lullia">Formation</a>
    <a class="dropdown-item" href="photo/TP_Eshop">Destination</a>
    <a class="dropdown-item" href="https://unpained-checkers.000webhostapp.com/">CV</a>
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    LOISIRS  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="https://www.equitation-paris.com/planning-tarifs-cheval">equitation</a>
    <a class="dropdown-item" href="https://www.grimper.com/site-escalade-fontainebleau">varrappe</a>
    
  </div>
</div> 
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="photo/fantasy-2531877_1280.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="photo/equipe-1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="photo/success.jpg" class="d-block w-100" alt="...">
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
</main>
<?php
require_once "inc/footer.inc.php";
