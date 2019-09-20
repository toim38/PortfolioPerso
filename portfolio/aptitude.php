<?php
require_once "inc/init.inc.php";
require_once "inc/header.inc.php";
// declaration des variables
$langage="";
$niveau="";
$validation="";
$contenu ="";
$req="";
$projet="";
// connexion bdd
$donnees=$bdd->query("SELECT * FROM langages ");
 //---je recupére les infos de ma table langage en faisant une boucle
 while($langage=$donnees->fetch(PDO::FETCH_ASSOC)){
        $contenu.='<div class=" col-md-4 card mt-5 m-3" style="width: 18rem;">';
        $contenu.='<div class="card-body zindex">';
        $contenu.='<h5 class="card-title">'.$langage['langage'].'</h5>';        
        $contenu.='<p class="card-text">'.$langage['langLevel'].'</p>';
        // $contenu.='<p class="card-text">'.$langage['n°'].'</p>';
        $contenu.='</div>';        
        $contenu.='<div class="card-body">';
        $contenu.='</div>';
        $contenu.='</div>';      
  }
$donnees=$bdd->query("SELECT * FROM projets ");
 if($donnees->rowCount() == 0){
        $msg = '<h3 class="text-center"><i class="fas fa-cogs"></i>en cours de realisation</h3>';
    }
 //---je recupére les infos de ma table langage en faisant une boucle
 while($projet=$donnees->fetch(PDO::FETCH_ASSOC)){
        $req.='<div class=" col-md-4 card mt-5 m-3" style="width: 18rem;">';
        $req.='<div class="card-body zindex">';
        $req.='<h5 class="card-title">'.$projet['titre_projet'].'</h5>';        
        $req.='<p class="card-text">'.$projet['liens'].'</p>';
        $req.='<p class="card-text">'.$projet['contenu'].'</p>';        
        // $contenu.='<p class="card-text">'.$langage['n°'].'</p>';
        $req.='</div>';        
        $req.='<div class="card-body">';
        $req.='</div>';
        $req.='</div>';      
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
    <link rel="stylesheet" href="css/style.css">
    <title>Aptitudes</title>
</head>

<div class="container">
  <h3 class="text-center m-5">TECHNOLOGIE :</h3>
  <div class="row">
    <?php echo $contenu;?>  

  </div>
  <h3 class="text-center">PROJETS :</h3>
  <div class="row">

<?php 
<'pre'>;
  echo $req;
  </'pre'>;
  // echo $msg;
?>

  </div>
</div>
<?php
require_once "inc/footer.inc.php"
?>