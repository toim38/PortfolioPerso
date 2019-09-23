<?php
// II - je m'occupe du traitement PHP
// 1 - CONNEXION BDD
require_once "../inc/init.inc.php";
if(isset($_GET['action']) && $_GET['action'] == 'deconnexion')
 {
    session_destroy();
    header('Location:../index.php');
    echo "<pre>";var_dump($admin);echo "</pre>";
}
extract($_POST);
extract($_GET);
$id_contact='';
$validate = '';
$contenu ='';
// cette variable me permet d'afficher le résultat de ma boucle dans le HTML
//  3/ - Je me connecte à la table contact
$resultat = $bdd->query("SELECT * FROM contact");
// 4/ -JE récupère les infos de contenu dans ma table contact avec une boucle while
while($contact = $resultat->fetch(PDO::FETCH_ASSOC))
{
    //j'affiche le résultat :
    $contenu .='<tr>';      
    // $contenu .='<th scope="row">'.$projet['id_projet'].'</th>';

      $contenu .='<td>'.$contact['id_contact'].'</td>';
      $contenu .='<td>'.$contact['contact_nom'].'</td>';
      $contenu .='<td>'.$contact['contact_prenom'].'</td>';
      $contenu .='<td>'.$contact['contact_email'].'</td>';
      $contenu .='<td>'.$contact['message'].'</td>';
      $contenu .='<td><a href="?action=supprimer&id='.$contact['id_contact'].'"><i class="fas fa-trash text-danger"></i></a></td>';
    $contenu .='</tr>';
}

//------SUPPRESSION PROJET------------
if(isset($action) && $action =='supprimer' && isset($id_contact)){
  $delete = $bdd->prepare("DELETE FROM contact WHERE id_contact = :id_contact");
  $delete->bindParam(':id_contact',$id,PDO::PARAM_INT);
  $delete->execute();
}
// fin requete suppression





//------modification PRODUIT------------
   
   
$modifier=$bdd->prepare("UPDATE * FROM contact WHERE  id_contact = $id_contact, contact_nom = :contact_nom ,contact_prenom = :contact_prenom,contact_email = :contact_email,message=:message ");    
//id_contact fait reference à $_GET['id_contact'](extract)    
// fin requete MODIFICATION*/
// 2/ -variable d'affichage :

?>
<?php
  if(isset($_GET['action']) && $_GET['action'] == 'modifier'&& isset($_GET['id'])){
    ?>
<h3 class="text-center text-warning">Form de modif contact</h3>
<?php
  }
  else {
    ?>
<h3 class="text-center text-primary">voir et si necessaire retirer un contact</h3>
<?php
  }
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
       
    <title>Touhami : gestion des contacts</title>
</head>
<body>
<div class="row">
  <div class="col-md-6 mb-3">
    <a href="accueilAdmin.php"><i class="fas fa-arrow-circle-left fa-2x text-white offset-8"></i></a>         
  </div>
  </div>
<!-- <h1 class="text-center text-primary m-5">Gestion des contacts</h1>
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
</ul> -->
<div class="container">
<table class="table table-striped table-dark mt-5">
  <thead>
    <tr>
      <!-- <th scope="col">n° du projet</th> -->
      <th colspan="col">projet</th>
      <th scope="col">nom</th>
      <th scope="col">prenom</th>
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

<button class="btn btn-lg btn-outline-danger rounded offset-10 mt-5" type="button text"><a href="?action=deconnexion" role="button">Deconnexion</a></button>   
    </div>


</body>
</html>