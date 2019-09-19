<?php
require_once "inc/init.inc.php";
require_once "inc/header.inc.php";


extract($_GET);
extract($_POST);
//variables affichage
$contenu="";
$validation="";
$xp='';
//--je me connecte à ma table experience
$donnees=$bdd->query("SELECT * FROM experiences ORDER BY id_xp DESC");
 //---je recupére les infos de ma table experience en faisant une boucle
 while($xp=$donnees->fetch(PDO::FETCH_ASSOC)){
        $contenu.='<div class=" col-md-4  card m-3 " style="width: 18rem;">';
        $contenu.='<div class="card-body zindex">';
        $contenu.='<h5 class="card-title">'.$xp['poste'].'</h5>';
        $contenu.='<p class="card-text">'.$xp['description'].'</p>';
        $contenu.='</div>';
        $contenu.='<ul class="list-group list-group-flush">';
        $contenu.='<li class="list-group-item">'.$xp['annee-1'].' - '.$xp['annee-2'].'</li>';
        $contenu.='<li class="list-group-item"> entreprise :'.$xp['entreprises'].'</li>';    
        $contenu.='</ul>';
        $contenu.='<div class="card-body">';
        // $contenu.='<a href="form_experience.php?action=modifier&id='.$xp['id_xp'].'" class="card-link"><i class="fas fa-pen-square text-warning fa-2x"></i></a>';
        // $contenu.='<a href="?action=supp&id='.$xp['id_xp'].'" class="card-link"><i class="fas fa-trash-alt text-danger fa-2x"></i></a>';
        $contenu.='</div>';
        $contenu.='</div>';
      
                                            }

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
    <title>Experiences</title>
</head>
 


 

<body>
<!-- <ul class="nav nav-tabs mb-3">
  <li class="nav-item">
    <a class="nav-link active" href="accueilAdmin.php">Retour accueil admin</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="form_experience.php" tabindex="-1" aria-disabled="true">Ajouter une expérience</a>
  </li>
</ul>
<div class="row">

</div> -->

<div class="col-md-12 " >

  
  <!--<img src="photo/landscape.jpg" bg-color="rgba"alt="">-->
  <div class="row">
    <a href="index.php"><i class="fas fa-arrow-circle-left fa-2x text-info offset-8">Accueil</i></a>
  </div>
  <div class="container">
  <div class="row">
    <?php echo $contenu;?>
  </div>
  </div>
  </div><!-- FIN .row-->
</div>
  <?php
require_once "inc/footer.inc.php"
?>