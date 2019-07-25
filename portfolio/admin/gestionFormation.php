<?php
require_once "../inc/init.inc.php";

$contenu ="";// cette variable me permet d'afficher le résultat de ma boucle dans le HTML

//  3 - Je me connecte à la table projets
$resultat = $bdd->query("SELECT * FROM formations");

// 4 -JE récupère les infos de contenu dans ma table projet avec une boucle while
while($formation = $resultat->fetch(PDO::FETCH_ASSOC)){
    //j'affiche le résultat :
    $contenu .='<tr>';
      $contenu .='<th scope="row">'.$formation['id_formation'].'</th>';
      $contenu .='<td>'.$formation['form_intitule'].'</td>';
      $contenu .='<td>'.$formation['form_annee'].'</td>';
      $contenu .='<td>'.$formation['form_niveau'].'</td>';
      $contenu .='<td><i class="far fa-edit text-warning"></i></td>';
      $contenu .='<td><i class="fas fa-trash text-danger"></i></td>';
    $contenu .='</tr>';
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="/css/style.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>gestionFormation</title>
</head>
<body>
<h1 class="text-center text-primary m-5">Gestion de formation</h1>
<div class="container">
<table class="table table-striped table-dark">
  <thead>
    
    <caption>Gestion formation</caption>
    <tr>
        <th scope="col">n°id</th>
        <th scope="col">intitulé</th>
        <th scope="col">année</th>
        <th scope="col">niveau acquis</th>
        <th scope="col">Contenu</th>
    </tr>
    <tr>
        <th scope="row">1</th>
        <td>technicien hygiéniste</td>
        <td>2005</td>
        <td>4</td>
        <td>certiphyto/certibiocide</td>
        <td></td>
    </tr>  
        
   
    <tr>
        <th scope="row">3</th>
        <td>developpeur-integrateur web junior</td>
        <td>2018</td>
        <td>3</td>
        <td>langage HTML.CSS.PHP.AJAX.SYMFONY.JAVASRIPT</td>
        <td></td>
    </tr>
<tr>
        <th scope="row">2</th>
        <td>Assistant utilisateur micro-informatique</td>
        <td>2001</td>
        <td>4</td>
        <td>technicien de maintenance informatique</td>
        <td></td>
        
        

    </tr>





</table>

 </thead>
  <tbody>
    
    <?= $contenu;?>
  </tbody>
</table>
</div>
</body>
</html>