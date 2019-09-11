<?php
require_once "../inc/init.inc.php";
extract($_POST);
extract($_GET);
// echo '<pre style="background:red;color:white;">';
// print_r($_POST);
// echo '</pre>';
//variables de msg erreur

$msglang='';

$msglang_level='';
$lang_modif='';
//----------2.RECUPERATION DES INFOS
if(isset($_GET['action']) && $_GET['action']=='modifier'&&($_GET['id'])){
$req = $bdd->prepare("SELECT*FROM langages WHERE id_lang= :id_lang");
$req->bindvalue('id_lang',$_GET['id']);
$req->execute();
//s'il y a qqchose je le recupere
if($req->rowCount()>0){
  $lang_modif = $req->fetch(PDO::FETCH_ASSOC);
}
}//------------fin de code de Recuperation -----------

//--------------1.verification du formulaire-----------------------------------------
if($_POST){
  if(empty($langage)||iconv_strlen($langage)<2 ||iconv_strlen($langage)>15){
    $msglang.='<span class="alert-warning text-danger">**entrez le nom du langage</span>';
  }

  if(empty($langLevel)||iconv_strlen($langLevel)<3 ||iconv_strlen($langLevel)>=30){
    $msglang_level.='<span class="alert-warning text-danger">**entrez le nom du niveau langage</span>';
  }
//on va modifier le contenu les infos & verif
  if(empty($msglangage) && empty($msgnewLang)&& empty($msglang_level))
  {
   $req=$bdd->prepare("REPLACE INTO langages VALUES (:id_lang,:langage,:langLevel)", array                   (':id_lang' =>$_POST['id_lang'],
        ':langage'=>$_POST['langage'],               
        ':langLevel' =>$_POST['langLevel']
                 ));
        $req->bindValue(':id_lang', $_POST['id_lang'],PDO::PARAM_INT);        
        $req->bindValue(':langage', $_POST['langage'],PDO::PARAM_STR);
        $req->bindValue(':langLevel',$_POST['langLevel'],PDO::PARAM_STR);         
        $req->execute() ;
        $successmsg = '<div class="alert alert-success">L\'enregistrement a bien été réalisé en BDD.</div>'; 
    }
}//FIN if($_POST)

?>






<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>from_langage</title>
  <!-- CDN BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--cdn fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
</head>
<body>
  <?php
if(isset($_GET['action']) && $_GET['action'] == 'modifier'){
?>
<h3 class="text-center text-warning">Formulaire de modification</h3>
<?php
}else{
 ?> 
  
  <h3 class="text-center text-primary">Ajoutez un nouveau langage </h3>
<?php
}
?> 
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>form_experience</title>
<!-- Lien BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Lien CSS perso -->
    <link rel="stylesheet" href="../css/style.css">
    <!--cdn fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

</head>
<body>

<div class="row">
<div class="col-md-12">
<div class="col-md-6">
<a href="gestionlangage.php"><i class="fas fa-arrow-circle-left fa-2x text-warning offset-8"></i></a>         
</div>

</div>
</div>
<div class="container">
  <form method='post'>
  
    <div class="form-group">       
      <input type="hidden"  name="id_lang" class="form-control" value="<?php  if (isset($_GET['action']) && $_GET['action'] == 'modifier' && isset($_GET['id'])){ echo $lang_modif['id_lang']; } else { echo ""; }?>">    
    </div>
     

    <div class="form-group">
      <label for="formGroupExampleInput" >langage</label>
<?= $msglang?>
      <input type="text" class="form-control"  name="langage" placeholder="langage" value="<?php  if (isset($_GET['action']) && $_GET['action'] == 'modifier' && isset($_GET['id']))
      { echo $lang_modif['langage']; } else { echo ""; }?>">    
    </div>
  
    <div class="form-group">
      <label for="formGroupExampleInput" >lang-level</label>
  <?= $msglang_level?>
      <input type="text" class="form-control" name="langLevel" id="formGroupExampleInput" placeholder="niveau acquis" value="<?php  if (isset($_GET['action']) && $_GET['action'] == 'modifier' && isset($_GET['id'])){ echo $lang_modif['langLevel']; } else { echo ""; }?>">    
    </div>
    <input type="submit" value="Envoyer">
  </form>

</div>
</body>
</html>