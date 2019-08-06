<?php
extract($_POST);
extract($_GET);

echo '<pre>';
print_r($_POST);
echo '</pre>';
//-----requete de modification------------------

// Exo : requete update
if(isset($_GET['action']) && $_GET['action'] == 'modifié'){

 //else
    {        
        $data_insert = $bdd->prepare("UPDATE projets SET id_projet = :id_projet,titre_projet = :titre_projet,liens = :liens,contenu= :contenu, WHERE id_projet = $id_projet");
        $_GET['action'] = 'affichage';
        $validate .= "<div class='alert alert-success col-md-6 offset-md-3 text-center'>Le projet n° <strong>$id_projet</strong> a bien été modifié !!</div>"; 
    }
    
    foreach($_POST as $key => $value)
    {        if($key != 'etat') // on ejecte le champs 'hidden' du projet
        { $data_insert->bindValue(":$key", $value, PDO::PARAM_STR); } 
    }
    $data_insert->bindValue(":etat", $photo_bdd, PDO::PARAM_STR); 
    $data_insert->execute();
}


                           
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
    <title>ajout projet</title>
</head>
<body>

  <!-- <div class="description">
  
<div class="form-check form-check-inline"method="post">

  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Emploi">
  <label class="form-check-label" for="inlineRadio1">Emploi</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Formation">
  <label class="form-check-label" for="inlineRadio2">Formation</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" disabled>
  <label class="form-check-label" for="inlineRadio3">3 (disabled)</label>
</div> -->

                <!-- </div>


                </div> -->

    <!-- <div class="col-md-4 mb-3">
      <label for="validationTooltipUsername" name="Titre"></label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="Titre"></span>
        </div>
        <input type="text" class="form-control" name="Titre" placeholder="Titre" aria-describedby="validationTooltipUsernamePrepend">           
    </div>
  </div>
    <div class="col-md-4 mb-3">
      <label for="validationTooltipUsername" name="Liens"></label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="Liens"></span>
        </div>
        <input type="text" class="form-control" name="Liens" placeholder="liens" aria-describedby="validationTooltipUsernamePrepend">           
    </div>
  </div>

  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationTooltip03"></label>
      <input type="text" class="form-control" name="contenu" placeholder="contenu">      
  </div>
  </div> 
  


  <button class="btn btn-primary" type="submit">envoi</button>-->
<?php
if(isset($_GET['action']) && $_GET['action'] == 'modifier'){
  ?>
<h3 class="text-center text-warning">Formulaire de modification</h3>
<?php
}else {
  ?>
  <h3 class="text-center text-primary">Ajoutez un projet</h3>

<?php
}
?>

<form  method="post" class="container col-md-4">
  <div class="form-group">
    <label for="formGroupExampleInput">Titre</label>
    <input type="text" class="form-control" name="" placeholder="Example input">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput">description</label>
    <input type="text" class="form-control" name="" placeholder="Example input">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Lien</label>
    <input type="text" class="form-control" name="f" placeholder="Another input">
  </div>
</form>





</form>   
</body>
</html>