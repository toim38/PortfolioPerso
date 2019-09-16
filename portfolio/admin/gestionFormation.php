<?php
require_once "../inc/init.inc.php";
extract($_GET);
extract($_POST);
$formation="";
$contenu ="";
$validation="";
// cette variable me permet d'afficher le résultat de ma boucle dans le HTML

//  3 - Je me connecte à la table projets
$resultat = $bdd->query("SELECT * FROM formations");

// 4 -JE récupère les infos de contenu dans ma table projet avec une boucle while
while($formation = $resultat->fetch(PDO::FETCH_ASSOC)){
    //j'affiche le résultat :
      $contenu .='<tr>';
      // $contenu .='<th scope="row">'.$formation['id_formation'].'</th>';
      $contenu .='<td>'.$formation['form_intitule'].'</td>';
      $contenu .='<td>'.$formation['form_annee'].'</td>';
      $contenu .='<td>'.$formation['form_niveau'].'</td>';
      $contenu .='<td><a href="form_formation.php?action=modifier&id='.$formation['id_formation'].'"><i class="far fa-edit text-warning"></i></a></td>';
      $contenu .='<td><a href="?action=supprimer&id='.$formation['id_formation'].'"><i class="fas fa-trash text-danger"></i></a></td>';
}
// -traitement pr la suppression-----------

if(isset($_GET['action'])&& $_GET['action'] =='supp' && isset($_GET['id']))
{    
    $supprimer=$bdd->prepare("DELETE  FROM formations WHERE id_formation = :id_formation");
    // $supp_prod = $bdd->prepare("DELETE FROM formations WHERE id_formation = :id_produit");
    $supprimer->bindValue(':id_formation', $id, PDO::PARAM_STR); // $id_formation fait reference à $_GET['id_formation'] (extract)
    $supprimer->execute();
 //$supprimer=$bdd->query("DELETE * FROM experiences WHERE id_xp = :id_xp"); //array(
         //':id_xp'=> $_GET['id']); 
    $validation .="<div class='alert alert-success col-md-6 offset-md-3 text-center'>la formation à bien été supprimé </div>";                   
  }  
  



    // <!-- ---traitement de modification------ -->


if(isset($_GET['action']) && $_GET['action'] == 'modifier'): 
 $modifier=$bdd->prepare("UPDATE * FROM formations WHERE id_formation = :id_formation");
    // $modifier = $bdd->prepare("UPDATE FROM formations WHERE id_formation = :id_formation");
    $modifier->bindValue(':id', $id, PDO::PARAM_STR); // $id_formation fait reference à $_GET['id_formation'] (extract)    $modifier->execute();
 //$supprimer=$bdd->query("DELETE * FROM formations WHERE id_formation = :id_formation"); //array(
         //':id_formation'=> $_GET['id']); 
    $validation .="<div class='alert alert-success col-md-6 offset-md-3 text-center'>l'experience professionnelle  à bien été modifié </div>";                                          
 endif;   
?>
<?php
if(isset($_GET['action']) && $_GET['action'] == 'modifier'&& isset($_GET['id'])){
  ?>
<h3 class="text-center text-warning">Form de modif formation</h3>
<?php
}
else {
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
<div class="row">
  <div class="col-12">
<a href="accueilAdmin.php"><i class="fas fa-arrow-circle-left fa-2x text-white offset-8"></i></a>
  </div>
</div>
<h1 class="text-center text-primary m-5">Gestion de formation</h1>
<div class="container">
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="#">Active</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../admin/form_formation.php">formulaire d'ajout de formation</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../curriculum vitae.php">cv</a>
  </li>
</ul>

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Intitulé</th>
      <th scope="col">Année</th>
      <th scope="col">Niveau acquis</th>
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