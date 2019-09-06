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
      $contenu .='<td><a href="form_formation.php?action=modifier&id='.$formation['id_formation'].'"><i class="far fa-edit text-warning"></i></a></td>';
      $contenu .='<td><a href="?action=supprimer&id='.$formation['id_formation'].'"><i class="fas fa-trash text-danger"></i></a></td>';
}
?>
<?php
if(isset($_GET['action']) && $_GET['action'] == 'modifier'){
?>
<h3 class="text-center text-warning">Form de modif formation</h3>
<?php
}else {
?>
  <h3 class="text-center text-primary">Ajoutez une formation</h3>

<?php
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>gestionFormation</title>
    <!-- Lien BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Lien CSS perso -->
    <link rel="stylesheet" href="../css/style.css">
    <!--cdn fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
</head>
<body>
<h1 class="text-center text-primary m-5">Gestion de formation</h1>
<div class="container">
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="#">Active</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../admin/form_experience.php">formulaire d'ajout de form</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../curriculum vitae.php">cv</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
  </li>
</ul>

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Intitulé</th>
      <th scope="col">Année</th>
      <th scope="col">Niveau acquis</th>
      <th scope="col">Contenu</th>
      <th colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
<?php echo $contenu;?>
    </tr>
  </tbody>
</table>

</div>
</body>
</html>