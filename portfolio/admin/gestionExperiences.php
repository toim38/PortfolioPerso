<?php
require_once "../inc/init.inc.php";
extract($_GET);
extract($_POST);
//variables affichage
$contenu="";
$validation="";
//--je me connecte à ma table experience
$donnees=$bdd->query("SELECT * FROM experiences");
 //---je recupére les infos de ma table experience en faisant une boucle
 while($xp=$donnees->fetch(PDO::FETCH_ASSOC)){
$contenu.='<div class="card m-3" style="width: 18rem;">';
        $contenu.='<div class="card-body">';
            $contenu.='<h5 class="card-title">'.$xp['poste'].'</h5>';
            $contenu.='<p class="card-text">'.$xp['description'].'</p>';
        $contenu.='</div>';

        $contenu.='<ul class="list-group list-group-flush">';
    $contenu.='<li class="list-group-item">'.$xp['annee-1'].' - '.$xp['annee-2'].'</li>';
    $contenu.='<li class="list-group-item"> entreprise : '.$xp['entreprises'].'</li>';    
  $contenu.='</ul>';

        $contenu.='<div class="card-body">';
        $contenu.='<a href="?action=modif&id='.$xp['id_xp'].'" class="card-link"><i class="fas fa-pen-square text-warning fa-2x"></i></a>';
        $contenu.='<a href="?action=supp&id='.$xp['id_xp'].'" class="card-link"><i class="fas fa-trash-alt text-danger fa-2x"></i></a>';
        $contenu.='</div>';

    $contenu.='</div>';
                                            }
//traitement pour la suppression    

if(isset($_GET['action'])&& $_GET['action'] =='supp'){
    
    $supprimer=$bdd->prepare("DELETE  FROM experiences WHERE id_xp = :id_xp");
    // $supp_prod = $bdd->prepare("DELETE FROM produit WHERE id_produit = :id_produit");
    $supprimer->bindValue(':id_xp', $id, PDO::PARAM_STR); // $id_produit fait reference à $_GET['id_produit'] (extract)
    $supprimer->execute();
 //$supprimer=$bdd->query("DELETE * FROM experiences WHERE id_xp = :id_xp"); //array(
         //':id_xp'=> $_GET['id']); 
    $validation .="<div class='alert alert-success col-md-6 offset-md-3 text-center'>l'experience professionnelle  à bien été supprimé </div>";                                          
    }  
    
    //---traitement de modification------

if(isset($_GET['action'])&& $_GET['action'] =='modif'):
    
    $modifier=$bdd->prepare("UPDATE * FROM experiences WHERE id = :id");
    // $supp_prod = $bdd->prepare("UPDATE FROM experiences WHERE id_xp = :id_xp");
    $modifier->bindValue(':id', $id, PDO::PARAM_STR); // $id_xp fait reference à $_GET['id_xp'] (extract)    $modifier->execute();
 //$supprimer=$bdd->query("DELETE * FROM experiences WHERE id_xp = :id_xp"); //array(
         //':id_xp'=> $_GET['id']); 
    $validation .="<div class='alert alert-success col-md-6 offset-md-3 text-center'>l'experience professionnelle  à bien été modifié </div>";                                          
 endif; 
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
    <title>Document</title>
</head>
<body>
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="#">Active</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../admin/form_experience.php">formulaire d'ajout</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../curriculum vitae.php">cv</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
  </li>
</ul>
<div class="row">
    <?php echo $contenu;?>
</div><!-- FIN .row-->

 
