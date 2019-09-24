<?php
require_once "../inc/init.inc.php";

extract ($_POST);
extract($_GET);
//---------je me connecte à la table--------------
$resultat=$bdd->query("SELECT*FROM contact");
$admin=$resultat->fetch(PDO::FETCH_ASSOC);

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
    <title>formulaire d'ajout du visiteur</title>
</head>
<body id="contact">
<form>
  <div class="form-row" methode="post" action="">   
  <div class="form-group">
    <label for="inputName">Appelation</label>
    <input type="text" class="form-control"  name="Nom" id="inputNom" >
  </div>
<div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" name="email">
    </div>    
  </div>
  <div class="form-group">
    <label for="inputAddress">Address </label>
    <input type="text" class="form-control" id="inputAddress" name="adresse">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputPoste">Poste</label>
      <input type="text" class="form-control" id="inputPoste" name="poste">
    </div>
    <div class="form-group col-md-4">
      <label for="inputRdv" name="rdv">Rdv</label>
      <select id="inputRdv" class="form-control">        
      </select>
    </div>
    
  </div>
  
  <button type="submit" class="btn btn-primary">Envoi</button>
</form>
    
</body>
</html>