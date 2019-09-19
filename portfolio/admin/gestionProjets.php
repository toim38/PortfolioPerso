

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
  if(isset($_GET['action']) && $_GET['action'] == 'deconnexion')
   {
      session_destroy();
      header('Location:../index.php');
      echo "<pre>";var_dump($admin);echo "</pre>";
  }
  $validate = '';
  $contenu ='';
  $projet='';
  $id_projet='';
  $projets='';
  $liens='';
  $titre_projet='';
  
  // cette variable me permet d'afficher le résultat de ma boucle dans le HTML
  //  3/ - Je me connecte à la table projets
    $resultat = $bdd->query("SELECT * FROM projets");
  // $resultat = $bdd->query("INSERT INTO projets (id,titre,liens,contenu) VALUES (:id, :titre, :liens, :contenu)");
  
  $resultat = $bdd->prepare ("INSERT INTO projets (id_projet,titre_projet, liens, contenu) VALUES (:id_projet, :titre_projet,  :liens, :contenu)");
  $resultat-> bindValue(':id_projet', $id_projet, PDO::PARAM_INT );
  $resultat -> bindValue(':liens', $liens , PDO::PARAM_STR );
  $resultat -> bindValue(':titre_projet' , $titre_projet  , PDO::PARAM_STR);
  $resultat -> bindValue(':contenu', $contenu, PDO::PARAM_STR );
  
  $resultat -> execute();
  
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
  while($projets = $resultat->fetch(PDO::FETCH_ASSOC))
  {
      //j'affiche le résultat :
      $contenu .='<tr>';
         $contenu .='<th scope="row">'.$projets['id_projet'].'</th>';
        $contenu .='<td>'.$projets['titre_projet'].'</td>';
        $contenu .='<td>'.$projets['liens'].'</td>';
        $contenu .='<td>'.$projets['contenu'].'</td>';
        $contenu .='<td><a href="form_projet.php?action=modifier&id='.$projets['id_projet'].'"><i class="far fa-edit text-warning"></i></td>';
        $contenu .='<td><a href="?action=supprimer&id='.$projets['id_projet'].'"><i class="fas fa-trash text-danger"></i></a></td>';
      $contenu .='</tr>';
  }
  
  //------modification PRODUIT------------
     
     if(isset($_GET['action']) && $_GET['action'] =='modifier'):
      
      $modifier=$bdd->prepare("UPDATE * FROM projets WHERE id_projet = :id_projet");
      // $supp_prod = $bdd->prepare("UPDATE FROM experiences WHERE id_xp = :id_xp");
      $modifier->bindValue(':id', $id, PDO::PARAM_STR); // $id_xp fait reference à $_GET['id_xp'] (extract)    $modifier->execute();
   //$supprimer=$bdd->query("DELETE * FROM experiences WHERE id_xp = :id_xp"); //array(
           //':id_xp'=> $_GET['id']); 
      $validation .="<div class='alert alert-success col-md-6 offset-md-3 text-center'>l'experience professionnelle  à bien été modifié </div>";                                          
   endif; 
  
  ?>
<!-- I Je m'occupe de mon visuel : -->
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Lien fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Touhami : gestion des projets</title>
  </head>
  <body>
    <div class="row">
      <div class="col-12">
        <a href="accueilAdmin.php"><i class="fas fa-arrow-circle-left fa-2x text-white offset-8"></i></a> 
      </div>
    </div>
    <h1 class="text-center text-primary m-5">Gestion des projets</h1>
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" href="#">Active</a>
      </li>
      <?php
        if(isset($_GET['action']) && $_GET['action'] == 'modifier'&& isset($_GET['id'])){
          ?>
      <h3 class="text-center text-warning">Form de modif projet</h3>
      <?php
        }
        else {
          ?>
      <h3 class="text-center text-primary">Ajoutez un projet</h3>
      <?php
        }
        ?>
      <!-- <li class="nav-item">
        <a class="nav-link" href="../admin/form_projet.php">formulaire d'ajout</a>
        </li> -->
    </ul>
    <div class="container">
      <table class="table table-striped table-dark">
        <thead>
          <tr>
            <th scope="col">n° du projet</th>
            <th scope="col">Titre</th>
            <th scope="col">Contenu</th>
            <th scope="col">Liens</th>
            <th colspan="2">Action</th>
          </tr>
        </thead>
        <li class="nav-item">
          <a class="nav-link" href="form_projet.php" tabindex="-1" aria-disabled="true">Ajouter un projet</a>
        </li>
        <tbody>    
          <?= $contenu;?>
        </tbody>
      </table>
      <button class="btn btn-lg btn-outline-danger rounded offset-10 mt-5" type="button text"><a href="?action=deconnexion" role="button">Deconnexion</a></button>   
    </div>
    </div>
  </body>
</html>

