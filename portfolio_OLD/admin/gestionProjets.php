<?php
// II - je m'occupe du traitement PHP
// 1 - CONNEXION BDD
require_once "../inc/init.inc.php";

extract($_POST);
extract($_GET);

$validate = '';
$contenu ='';
// cette variable me permet d'afficher le résultat de ma boucle dans le HTML
//------SUPPRESSION PROJET------------
if(isset($action) && $action =='supprimer' && isset($id)){

  $delete = $bdd->prepare("DELETE FROM projets WHERE id_projet = :id_projet");
  $delete->bindValue(':id_projet',$id,PDO::PARAM_INT);
  $delete->execute();
}


// fin requete suppression

//  3/ - Je me connecte à la table projets
$resultat = $bdd->query("SELECT * FROM projets");

// 4/ -JE récupère les infos de contenu dans ma table projet avec une boucle while
while($projet = $resultat->fetch(PDO::FETCH_ASSOC))
{
    //j'affiche le résultat :
    $contenu .='<tr>';
      // $contenu .='<th scope="row">'.$projet['id_projet'].'</th>';
      $contenu .='<td>'.$projet['titre_projet'].'</td>';
      $contenu .='<td>'.$projet['liens'].'</td>';
      $contenu .='<td>'.$projet['contenu'].'</td>';
      $contenu .='<td><a href="form_projet.php?action=modifier&id='.$projet['id_projet'].'"><i class="far fa-edit text-warning"></i></td>';
      $contenu .='<td><a href="?action=supprimer&id='.$projet['id_projet'].'"><i class="fas fa-trash text-danger"></i></a></td>';
    $contenu .='</tr>';
}

//------modification PRODUIT------------
   
   
/*("UPDATE  projets SET titre_projet = :titre_projet , liens = :liens ,contenu = :contenu WHERE id_projet = $id_projet");    
//id_projet fait reference à $_GET['id_projet'](extract)    
// fin requete MODIFICATION*/
// 2/ -variable d'affichage :

?>

<!-- I Je m'occupe de mon visuel : -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Lien fontawesome -->
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
       integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
       
    <title>gestionProjet</title>
</head>
<body>
<h1 class="text-center text-primary m-5">Gestion des projets</h1>
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="#">Active</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../admin/form_projet.php">formulaire d'ajout</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../curriculum vitae.php">cv</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
  </li>
</ul>
<div class="container">
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <!-- <th scope="col">n° du projet</th> -->
      <th scope="col">Titre</th>
      <th scope="col">Contenu</th>
      <th scope="col">Liens</th>
      <th colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
    
    <?= $contenu;?>
  </tbody>
</table>
</div>




</body>
</html>