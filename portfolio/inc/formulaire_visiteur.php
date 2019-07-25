<?php
require_once "../inc/init.inc.php";//$nomError="";
$preError="";
$posteError="";
$telError="";
$entrepError="";
 $msgSuccess="";
 //verif FROM
extract($_POST);

 if($_POST)
 {
if(empty($prenom)||iconv_strlen($prenom)<3||iconv_strlen($prenom)>50)
{
$preError.='<small class="text-danger">saisi un prenom entre 3 et 20 caracteres</small>';
}
if(empty($nom)||iconv_strlen($nom)<3||iconv_strlen($nom)>50)
{
$nomError.='<small class="text-danger">saisi un nom entre 3 et 20 caracteres</small>';
}

if(empty($_classe)||iconv_strlen($_classe)<4||iconv_strlen($_classe)>80)
{
$posteError.='<small class="text-danger">saisi un prenom entre 3 et 20 caracteres</small>';
}
if(empty($parents)||iconv_strlen($parents)<10||iconv_strlen($parents)>100)
{
$entrepError.='<small class="text-danger">il faut 10, min et 100 max/small>';
}
if(!preg_match('#¨[0-9](10)+$#',$telephone))
{
$telError .='<small class="text-danger">saisi un numero de telephone valide</small>';
}

 }
//fin if($_POST)

//inserer en BDD si pas d'erreur
if(empty($nomError) && empty ($preError) && empty($entrep) && empty($posteError) && empty($telError))
{
    //je me connecte
$bdd = new pdo(
    "mysql:host=localhost;dbname=portfolio",
    'root',
    '',
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    )
);
  $newVisiteur = $bdd->prepare("INSERT INTO visiteur (nom,prenom,poste,entreprise,telephone) VALUES (:nom,:prenom,:poste,:entreprise,:telephone)");
 foreach($_POST as $key =>$value){
     $newVisiteur-> bindvalue(":$key",$value,PDO::PARAM_STR);
 }
$newVisiteur->execute();
$msgSuccess .='<div class="alert alert-success">visiteur bien enregistré</div>';
 
}

echo '<pre>';echo var_dump($_POST);echo '</pre>'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>formulaire visiteur</title>
</head>
<body>
 <form>
  <div class="row">
    <div class="col">
      <input type="text" class="form-control" placeholder="nom">
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="prenom">
    </div>
  </div>
</form>

<form>
  <div class="row">
    <div class="col">
      <input type="text" class="form-control" placeholder="poste">
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="entreprise">
    </div>
  </div>
</form>
<form>
  <div class="row">
    <div class="col">
      <input type="text" class="form-control" placeholder="tel ou autres">
    </div>
    </form>
    <div class="form-group">
    <label for="exampleFormControlTextarea1">commentaires</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">enregistrer</button>
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