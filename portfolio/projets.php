<?php
require_once "inc/init.inc.php";
require_once "inc/header.inc.php";
extract($_GET);
extract($_POST);
//variables affichage
$contenu="";
$validation="";
$projet='';
//--je me connecte à ma table projets
$req=$bdd->prepare("SELECT * FROM projets WHERE id_projet =:id_projet");
$req->bindParam(':id_projet',$_GET['id']);
$req->execute();
  //--si on trouve un resultat on manipule les donnees 
  if($req->rowCount()>0){
    $projet_modif=$req->fetch(PDO::FETCH_ASSOC);
  } 
// fin if($req->rowCount>0)

 //---je recupére les infos de ma table experience en faisant une boucle
 while($projet=$req->fetch(PDO::FETCH_ASSOC)){
        $contenu.='<div class=" col-md-4  card m-3 " style="width: 18rem;">';
        $contenu.='<div class="card-body zindex">';
        $contenu.='<h5 class="card-title">'.$projet['titre'].'</h5>';
        $contenu.='<p class="card-text">'.$projet['liens'].'</p>';
        $contenu.='<p class="card-text">'.$projet['contenu'].'</p>';
        $contenu.='</div>';
        $contenu.='<ul class="list-group list-group-flush">';
        $contenu.='<li class="list-group-item">'.$projet['annee-1'].' - '.$projet['annee-2'].'</li>';         
        $contenu.='</ul>';
        $contenu.='<div class="card-body">';
        // $contenu.='<a href="form_experience.php?action=modifier&id='.$xp['id_xp'].'" class="card-link"><i class="fas fa-pen-square text-warning fa-2x"></i></a>';
        // $contenu.='<a href="?action=supp&id='.$xp['id_xp'].'" class="card-link"><i class="fas fa-trash-alt text-danger fa-2x"></i></a>';
        $contenu.='</div>';
        $contenu.='</div>';
      
                                            }

?>


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--cdn fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <!-- CSS PERSO -->
    <link rel="stylesheet" href="css/style.css">
<main class="container">
<div class="row">
<a href="index.php"><i class="fas fa-arrow-circle-left fa-2x text-info offset-8">Accueil</i></a>
</div>
<div class="row">
<div class="col md-4">
  <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    REALISATIONS
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="/PortfolioPerso/portfolio/aptitude.php">Formation</a>
    <a class="dropdown-item" href="/PortfolioPerso/portfolio/photo/success.jpg">Destination</a>
    <a class="dropdown-item" href="">CV</a>
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    LOISIRS  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="https://www.equitation-paris.com/planning-tarifs-cheval">equitation</a>
    <a class="dropdown-item" href="https://www.grimper.com/site-escalade-fontainebleau">varrappe</a>
    </div>
  </div>
</div> </div>
<div class="row">
    <div class="col-md-10 ">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="photo/monde_numerique.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="photo/equipe-1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="photo/fenetre-orientale.jpg" class="d-block w-100" alt="...">
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
 <?php echo $contenu;?>    
</div>
</main>
<?php
require_once "inc/footer.inc.php";
