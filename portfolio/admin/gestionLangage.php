<?php
require_once "../inc/init.inc.php";
extract($_POST);
extract($_GET);
if(isset($_GET['action']) && $_GET['action'] == 'deconnexion')
 {
    session_destroy();
    header('Location:../index.php');
    echo "<pre>";var_dump($admin);echo "</pre>";
}
$contenu ="";// cette variable me permet d'afficher le résultat de ma boucle dans le HTML
$langage ="";
$validation="";
//  3 - Je me connecte à la table projets
$resultat = $bdd->query("SELECT * FROM langages");

// 4 -JE récupère les infos de contenu dans ma table langage avec une boucle while
while($langage = $resultat->fetch(PDO::FETCH_ASSOC))
{
    //j'affiche le résultat :
      $contenu .='<tr>';
      // $contenu .='<th scope="row">'.$langage['id_lang'].'</th>';
      $contenu .='<td>'. $langage['id_lang'].'</td>';
      $contenu .='<td>'. $langage['langage'].'</td>';
      $contenu .='<td>'. $langage['langLevel'].'</td>';
      $contenu.='<td><a href="form_langage.php?action=modifier&id='.$langage['id_lang'].'" class="card-link"><i class="fas fa-pen-square text-warning fa-2x"></i></a></td>';
      $contenu.='<td><a href="?action=supp&id='.$langage['id_lang'].'" class="card-link"><i class="fas fa-trash-alt text-danger fa-2x"></i></a></td>';
      $contenu .='</tr>';
}
if(isset($_GET['action'])&& $_GET['action'] =='supp')
{    
    $supprimer=$bdd->prepare("DELETE  FROM langages WHERE id_lang = :id_lang");
    // $supp_prod = $bdd->prepare("DELETE FROM langages WHERE id_lang = :id_lang");
    $supprimer->bindValue(':id_lang', $id, PDO::PARAM_STR); // $id_lang fait reference à $_GET['id_lang'] (extract)
    $supprimer->execute();
 //$supprimer=$bdd->query("DELETE * FROM langages WHERE id_lang = :id_lang"); //array(
         //':id_lang'=> $_GET['id']); 
    $validation .="<div class='alert alert-success col-md-6 offset-md-3 text-center'>le langage à bien été supprimé </div>";                              }  
    
    //---traitement de modification------

if(isset($_GET['action'])&& $_GET['action'] =='modifier'):
    
    $modifier=$bdd->prepare("UPDATE * FROM langages WHERE id = :id");
    // $supp_prod = $bdd->prepare("UPDATE FROM experiences WHERE id_lang = :id_lang");
    $modifier->bindValue(':id', $id, PDO::PARAM_STR); // $id_lang fait reference à $_GET['id_lang'] (extract)    $modifier->execute();
 //$supprimer=$bdd->query("DELETE * FROM langages WHERE id_lang = :id_lang"); //array(
         //':id_lang'=> $_GET['id']); 
    $validation .="<div class='alert alert-success col-md-6 offset-md-3 text-center'>le langage   à bien été modifié </div>";                                          
 endif; 
?>
<?php
if(isset($_GET['action']) && $_GET['action'] == 'modifier'){
  ?>
<h3 class="text-center text-warning">Form de modif </h3>
<?php
}
else {
  ?>
  <h3 class="text-center text-primary">Ajoutez une experience</h3>
<?php
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--cdn fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <title>gestion Langages</title>
</head>
<body>
  <h1 class="text-center text-primary m-5" >Gestion de langages</h1>
<div class="row">
  <div class="col-md-6 mb-3">
    <a href="accueilAdmin.php"><i class="fas fa-arrow-circle-left fa-2x text-white offset-8"></i></a>         
  </div>
  <div class="col-md-6 mb-3">
    <a href="form_langage.php"  class="btn btn-outline-info">Ajout</a>         
  </div>
</div>

<div class="container">
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="#">Active</a>
  </li>  
</ul>
<table class="table table-striped table-dark" methode="post" >
  <thead class="listeLangages">
    <tr>
      <th scope="col">N°</th>
      <th scope="col">Langage</th>
      <th scope="col">Niveau</th>
      <th colspan="2">Action</th> 
    </tr>
  </thead>
  <tbody>
    
    <?= $contenu;?>
  </tbody>
</table>
<button class="btn btn-lg btn-outline-danger rounded offset-10 mt-5" type="button text"><a href="?action=deconnexion" role="button">Deconnexion</a></button>   
    </div>
</div>

 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" 
integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
