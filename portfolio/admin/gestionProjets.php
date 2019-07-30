<?php
// II - je m'occupe du traitement PHP
// 1 - CONNEXION BDD
require_once "../inc/init.inc.php";

extract($_POST);
extract($_GET);

$validate = "";

//------SUPPRESSION PRODUIT------------
if(isset($_GET['action'])&& $_GET['action']=='supprimer')
{
    //-----requet suppression 

    
    $supp_data=$bdd->prepare("DELETE FROM projets WHERE id_projet = :id_projet");
    $supp_data->bindValue(":id_projet",$id_projet,PDO::PARAM_INT);
    //id_projet fait reference à $_GET['id_projet'](extract)
    $supp_data->execute();
    $validate .= "<div class='alert alert-success col-md-6 offset-md-3 text-center'>Le produit n°<strong>$id_projet</strong>à bien été supprimé!!</div>";
}
// fin requete suppression


//------modification PRODUIT------------
if(isset($_GET['action'])&& $_GET['action']=='modifier')
{
    //-----requet modification

    
    $modif_data=$bdd->prepare("UPDATE  projets SET titre_projet = :titre_projet , liens = :liens ,contenu = :contenu WHERE id_projet = $id_projet");
    $modif_data->bindValue(":id_projet",$id_projet,PDO::PARAM_INT);
    //id_projet fait reference à $_GET['id_projet'](extract)
    $modif_data->execute();
    $validate .= "<div class='alert alert-success col-md-6 offset-md-3 text-center'>Le produit n°<strong>$id_projet</strong>à bien été modifié!!</div>";
}
// fin requete suppression


// 2 -variable d'affichage :
$contenu ="";// cette variable me permet d'afficher le résultat de ma boucle dans le HTML

//  3 - Je me connecte à la table projets
$resultat = $bdd->query("SELECT * FROM projets");

// 4 -JE récupère les infos de contenu dans ma table projet avec une boucle while
while($projet = $resultat->fetch(PDO::FETCH_ASSOC)){
    //j'affiche le résultat :
    $contenu .='<tr>';
      $contenu .='<th scope="row">'.$projet['id_projet'].'</th>';
      $contenu .='<td>'.$projet['titre_projet'].'</td>';
      $contenu .='<td>'.$projet['contenu'].'</td>';
      $contenu .='<td>'.$projet['liens'].'</td>';
      $contenu .='<td><a href="?action=modifier"><i class="far fa-edit text-warning"></i></td>';
      $contenu .='<td><a href="?action=supprimer"><i class="fas fa-trash text-danger"></i></a></td>';
    $contenu .='</tr>';
}

?>
<!-- I Je m'occupe de mon visuel : -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Lien fontawesome -->
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
       integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>gestionProjet</title>
</head>
<body>
<h1 class="text-center text-primary m-5">Gestion des projets</h1>
<div class="container">
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">n° du projet</th>
      <th scope="col">Titre</th>
      <th scope="col">Contenu</th>
      <th scope="col">Liens</th>
      <th colspan="2">Contenu</th>
    </tr>
  </thead>
  <tbody>
    
    <?= $contenu;?>
  </tbody>
</table>
</div>




</body>
</html>