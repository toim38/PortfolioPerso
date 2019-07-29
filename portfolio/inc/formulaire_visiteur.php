<?php
require_once "../inc/init.inc.php";//$nomError="";
$preError="";
$nomError="";
$mailError="";

 $msgSuccess="";
 //verif FROM
extract($_POST);

if($_POST)
  {
    if(empty($contact_prenom) && iconv_strlen($contact_prenom)<3 && iconv_strlen($contact_prenom)>50)
      {
        $preError.='<small class="text-danger">saisi un prenom entre 3 et 20 caracteres</small>';
      }
    if(empty($contact_nom) && iconv_strlen($contact_nom)<3 && iconv_strlen($contact_nom)>50)
      {
        $nomError.='<small class="text-danger">saisi un nom entre 3 et 20 caracteres</small>';
      }   
    if(filter_var($contact_email, FILTER_VALIDATE_EMAIL))
     {
       $mailError .='<small class="text-danger">saisi un email valide</small>';
     }
    //inserer en BDD si pas d'erreur
    if(empty($nomError) && empty ($preError) && empty($mailError))
      {
    //je me connecte
        $bdd = new pdo(
          "mysql:host=localhost;dbname=portfolio",'root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));    
        
          $newVisiteur = $bdd->prepare("INSERT INTO contact(contact_nom,contact_prenom,contact_email,message) VALUES (:contact_nom,:contact_prenom,:contact_email,:message)");

    foreach($_POST as $key =>$value)
        {
          $newVisiteur->bindValue(":$key", $value, PDO::PARAM_STR);
        }       
  
          $newVisiteur->execute();
      } 
      $msgSuccess .='<div class="alert alert-success">visiteur bien enregistré</div>';
      echo '<pre>';echo var_dump($_POST);echo '</pre>'; 
  }
  //fin if($_POST)


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>formulaire contact</title>
</head>
<body>

<!-- formulaire -->
 <form action="" method="post">
  <div class="row">
    <div class="col">
      <input type="text" name="contact_nom" class="form-control" placeholder="nom">
    </div>
    <div class="col">
      <input type="text" name="contact_prenom" class="form-control" placeholder="prenom">
    </div>
  </div>
<br>
  <div class="row">
    <div class="col">
      <input type="mail" name="contact_email" class="form-control" placeholder="email">
    </div>
<br>
    <div class="form-group">
    
    <textarea class="form-control" name="message" id="exampleFormControlTextarea1" placeholder="message" rows="3"></textarea>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">enregistrer</button>
    </div>
  </div>
</form>
<!-- fin formulaire -->


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
   integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" 
integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<?php
require_once "../inc/footer.inc.php";
?>







