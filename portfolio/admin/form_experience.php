<?php
extract($_POST);
extract($_GET);

echo '<pre>';
print_r($_POST);
echo '</pre>';

if($_POST){



}// FIN if($_POST)
//------------on connecte l'admin-------------
// if(!isset($_GET['experience'])): 

// $resultat = $bdd->prepare("SELECT * FROM experience WHERE emploi= :emploi");
                    // $resultat->bindValue(':emploi', $_GET['experience'], PDO::PARAM_STR);
                    // $resultat->execute();

                // elseif :

                    // sinon, il n ya pas de catégorie dans l' URL ( onglet boutique), on selectionne/affiche tous les produits
                    // $resultat = $bdd->prepare("SELECT * FROM emploi");
                    // $resultat->execute();

                // else :
                    // sinon, il n ya pas de catégorie dans l' URL ( onglet boutique), on selectionne/affiche tous les produits
                    // $resultat = $bdd->prepare("SELECT * FROM formation");
                    // $resultat->execute();


                // while ($emploi, $formation= $resultat->fetch(PDO::FETCH_ASSOC)) :
                

// $resultat = $bdd->prepare("SELECT * FROM experience WHERE formation= :formation");
                    // $resultat->bindValue(':formation', $_GET['experience'], PDO::PARAM_STR);
                    // $resultat->execute();

                
                // endif;
                           
                        ?>                  



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ajout experience</title>
</head>
<body>
  <div class="description">

<div class="form-check form-check-inline" method="post">
  <input class="form-check-input" type="radio" name="formation" id="inlineRadio1" >
  <label class="form-check-label" for="inlineRadio1">Formation</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="emploi" id="inlineRadio2" >
  <label class="form-check-label" for="inlineRadio2">Emploi</label>
</div>
                </div>



<!-- <form class="needs-validation" method="post">
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationTooltip01"></label>
      <input type="text" class="form-control" name="emploi" placeholder="emploi">              
      </div>
    </div>

    <div class="col-md-4 mb-3">
      <label for="validationTooltip02"></label>
      <input type="text" class="form-control" name="formation" placeholder="formation">
      <div class="valid-tooltip">        
      </div>
    </div>-->

    <div class="col-md-4 mb-3">
      <label for="validationTooltipUsername" name="année1"></label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="année1"></span>
        </div>
        <input type="text" class="form-control" name="année1" placeholder="date" aria-describedby="validationTooltipUsernamePrepend">           
    </div>
  </div>
    <div class="col-md-4 mb-3">
      <label for="validationTooltipUsername" name="année2"></label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="année2"></span>
        </div>
        <input type="text" class="form-control" name="année2" placeholder="date" aria-describedby="validationTooltipUsernamePrepend">           
    </div>
  </div>

  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationTooltip03"></label>
      <input type="text" class="form-control" name="poste" placeholder="poste">      
  </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationTooltip03"></label>
      <input type="text" class="form-control" name="entreprise" placeholder="entreprise">      
  </div>
  </div>


  <button class="btn btn-primary" type="submit">envoi</button>
</form>   
</body>
</html>