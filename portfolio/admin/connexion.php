<?php

  require_once "../inc/init.inc.php";
  /*$prenom="";
  $nom="";
  $email="";
  $mdp="";
  */
  $preError="";
  $nomError="";
  $posteError="";
  $mdpError="";
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

    if(empty($_email)||iconv_strlen($_email)<4||iconv_strlen($_email)>80)
    {
      $posteError.='<small class="text-danger">saisi un prenom entre 3 et 20 caracteres</small>';
    }
    if(empty($mdp)||iconv_strlen($mdp)<10||iconv_strlen($mdp)>100)
    {
      $mdpError.='<small class="text-danger">il faut 10, min et 100 max/small>';
    }
 }
//fin if($_POST)

//inserer en BDD si pas d'erreur

if(empty ($nomError) && empty ($preError) && empty($emailError) && empty ($mdpError))
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
  $newAdministrateur = $bdd->prepare("INSERT INTO administrateur (nom, prenom, email, mdp) VALUES (:nom,:prenom,:email,:mdp)");
 foreach($_POST as $key =>$value){
     $newAdministrateur->bindvalue(":$key", $value, PDO::PARAM_STR);
                                  }
$newAdministrateur->execute();
$msgSuccess .='<div class="alert alert-success">Administrateur bien reconnu</div>';
 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="/css/style.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>connexion admin</title>
</head>
<body>
<div class="alert alert-dark" role="alert">
    <h1 class="text-center">CONNEXION ADMIN</h1>
</div>
    <form method="post">
  <div class="row">
    <div class="col">
      <input type="text" class="form-control" placeholder="nom" name="nom">
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="prenom">
    </div>
  </div>
</form>

<form method="post">
  <div class="form-group">
    <label for="exampleInputEmail1"></label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1"></label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  
<div class="form-group">
    <label for="exampleFormControlTextarea1">COMMENTAIRE</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>



  <button type="submit" class="btn btn-primary">ENREGISTRER</button>
</form>
<?php 
require_once "../inc/footer.inc.php";
?>

</body>
</html>