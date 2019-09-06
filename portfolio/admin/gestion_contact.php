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
$resultat = $bdd->query("SELECT * FROM contact");

// 4/ -JE récupère les infos de contenu dans ma table projet avec une boucle while
while($contact = $resultat->fetch(PDO::FETCH_ASSOC))
{
    //j'affiche le résultat :
    $contenu .='<tr>';
      // $contenu .='<th scope="row">'.$projet['id_projet'].'</th>';
      $contenu .='<td>'.$contact['contact_nom'].'</td>';
      $contenu .='<td>'.$contact['contact_prenom'].'</td>';
      $contenu .='<td>'.$contact['contact_email'].'</td>';
      $contenu .='<td>'.$contact['message'].'</td>';
      $contenu .='<td><a href="?action=supprimer&id='.$contact['id_contact'].'"><i class="fas fa-trash text-danger"></i></a></td>';
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
<h1 class="text-center text-primary m-5">Gestion des contacts</h1>
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link " href="../admin/gestionProjets.php">Gestion projets</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../admin/gestionFormation.php">Gestion formations</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../admin/gestionLangage.php.">Gestion languages</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../gestionExperiences.php.">Gestion expériences</a>
  </li>
</ul>
<div class="container">
<table class="table table-striped table-dark mt-5">
  <thead>
    <tr>
      <!-- <th scope="col">n° du projet</th> -->
      <th colspan="2">Contact</th>
      <th scope="col">email</th>
      <th scope="col">message</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    
    <?= $contenu;?>
  </tbody>
</table>
</div>




</body>
</html>