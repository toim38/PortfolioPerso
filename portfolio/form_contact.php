<?php
require_once "inc/init.inc.php";
// variable d'affichage de message erreur;
$preError="";
$nomError="";
$mailError="";
// variable d'affichage de message succes;
$msgSuccess="";

extract($_POST);
// echo '<pre>';echo var_dump($_POST);echo '</pre>'; 

//verification des champs du formulaire
if($_POST)
  {
    if(empty($contact_prenom) || iconv_strlen($contact_prenom)<3 || iconv_strlen($contact_prenom)>50)    
        { 
          $preError.='<small class="text-danger">saisi un prenom entre 3 et 20 caracteres</small>'; 
         } 
    if(empty($contact_nom) || iconv_strlen($contact_nom)<3 || iconv_strlen($contact_nom)>50)      
       { 
         $nomError.='<small class="text-danger">saisi un nom entre 3 et 20 caracteres</small>'; 
        }

    if(!filter_var($contact_email, FILTER_VALIDATE_EMAIL))     
      { 
        $mailError .='<small class="text-danger">saisi un email valide</small>'; 
      }

    if(empty($message)|| iconv_strlen($message)>255)     
      { 
        $mailError .='<small class="text-danger">saisi un texte de 255 maxi pour être valide</small>';
      }
    //inserer en BDD si pas d'erreur
    if(empty($nomError) && empty ($preError) && empty($mailError))         
        { 
          $newVisiteur = $bdd->prepare("INSERT INTO contact(contact_nom,contact_prenom,contact_email,message) VALUES (:contact_nom,:contact_prenom,:contact_email,:message)");
          $newVisiteur->bindvalue(':contact_nom', $contact_nom, PDO::PARAM_STR);
          $newVisiteur->bindvalue(':contact_prenom', $contact_prenom, PDO::PARAM_STR);
          $newVisiteur->bindvalue(':contact_email', $contact_email, PDO::PARAM_STR);
          $newVisiteur->bindvalue(':message', $message, PDO::PARAM_STR);  
          $newVisiteur->execute();
          $msgSuccess .='<div class="alert alert-success">Votre message a bien été envoyé</div>'; 
          
          // $_SESSION['success'] = 1;
          // $headers  = 'MIME-Version: 1.0' . "\r\n";
          // $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
          // $headers .= 'FROM:' . htmlspecialchars($_POST['contact_email']);
          // $to = 'eltzarou@laposte.net'; // Insérer votre adresse email ICI
          // $subject = 'Message envoyé par ' . htmlspecialchars($_POST['contact_nom']) .' - <i>' . htmlspecialchars($_POST['contact_email']) .'</i>';
          // $message_content;
        } 
  }
  //fin if($_POST)

  //liens avec boite mail-perso

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
<div class="container mt-5">
<!-- formulaire -->
 <form action="" method="post">
 <?php echo $msgSuccess; ?>
  <div class="row">
    <div class="col-md-4">
      <?php echo $nomError; ?>
      <input type="text" name="contact_nom" class="form-control" placeholder="nom">
    </div>
    <div class="col-md-4">
      <?php echo  $preError; ?>
      <input type="text" name="contact_prenom" class="form-control" placeholder="prenom">
    </div>  
    <div class="col-md-6">
      <?php echo  $mailError; ?>
      <input type="mail" name="contact_email" class="form-control" placeholder="email">
    </div>
</div>

    <div class="form-group">    
<?php echo  $mailError; ?>
      <textarea class="form-control" name="message" id="exampleFormControlTextarea1" placeholder="message" rows="6"></textarea>
    </div>
                                <div class="clear"></div>

  
  <div class="form-group row">
    <div class="col-sm-6">
      <button type="submit" class="btn btn-primary">enregistrer</button>
    </div>    
  </div>
  
</form>
<!-- fin formulaire -->


<?php
  $message='';
  ?>



</div>
</div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
   integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" 
integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<?php
require_once "inc/footer.inc.php";
?>







