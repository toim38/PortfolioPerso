<?php

  require_once "../inc/init.inc.php";
//je créer des variables avec les names 
extract($_POST);

// je me connecte à ma table user 
$resultat=$bdd->query("SELECT*FROM user");

$admin=$resultat->fetch(PDO::FETCH_ASSOC);

/*
verification des champs de mon formulaire.
1/verication que les champs ne soient pas vides
2/verification de l'email & mdp
3/donnée comme celles de la bdd

*/

 if($_POST)
  {
    if(empty($uemail)|| !filter_var($uemail, FILTER_VALIDATE_EMAIL) || $uemail != $admin['uemail'] && !isset($_POST['umdp']) || password_verify($_POST['umdp'], $admin['umdp']) && $admin['statut']!= 1)
    {
      /*si je rentre ds la condition if-> redidect° vers la page d'accueil    */
      header('location:https://www.DuckDuckGo.com');
    }else{
//si je ne rentre pas ds la condition du if -> redirect° espace admin
      header('location:accueilAdmin.php');
    }

 }
//fin if($_POST)

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
    <title>connexion admin</title>
</head>
<body>
<div class="alert alert-dark" role="alert">
    <h1 class="text-center">CONNEXION ADMIN</h1>
</div>
<div class="container m-5 mx-auto">
<form method="post" action="">
  <div class="form-group">
    <label for="exampleInputEmail1"></label>
    <input type="text" class="form-control m-2" name="uemail" aria-describedby="emailHelp" placeholder="Enter email">    
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1"></label>
    <input type="password" class="form-control m-2" name="umdp" placeholder="Password">
  </div>
  
  <button type="submit" class="btn btn-primary m-3">ENREGISTRER</button>
</form>
</div>




<?php 
require_once "../inc/footer.inc.php";
?>

