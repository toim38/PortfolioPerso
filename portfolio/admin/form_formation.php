<?php
require_once "../inc/init.inc.php";
extract($_POST);
echo '<pre>';
print_r($_POST);
echo'</pre>';
//------variables d'affichage des  errreurs----------------
$msgTitre='';
$msgNiveau='';
$msgAnnee='';
$formation_modifier='';
//-------modification--------


// 1 -  Je récupère les infos pour la modification
if(isset($_GET['action']) && $_GET['action'] == 'modifier' && ($_GET['id'])){
    //Je me connect à ma table formation
    $req = $bdd->prepare("SELECT * FROM formations WHERE id_formation = :id_formation");
    $req->bindParam(':id_formation', $_GET['id']);
    $req->execute();
    // Si je trouve un résultat alors ee récupère les infos en BDD pour les afficher dans le formulaire de modification
    if($req->rowCount()> 0){
        $formation_update = $req->fetch(PDO::FETCH_ASSOC);
    }
}// FIN if(isset($_GET['action']) && $_GET['action'] == 'update' && ($_GET['id']))

$select_date = '';
$year = date('Y');
$century = $year - 10;

while($year >= $century){
    if(isset($_GET['action']) && $_GET['action'] == 'modifier' && isset($_GET['id_formation']) && $_GET['id_formation'] ==  $formation_update['id_formation'] && $formation_update['form_annee'] == $year){
        $select_date .= '<option selected>' . $year . '</option>';
    }
    elseif ($_POST && isset($_POST['form_annee']) && $_POST['form_annee'] == $year ) {
        $select_date .= '<option selected>' . $year . '</option>';
    } else {
        $select_date .= '<option>' . $year . '</option>';
    }
    $year--;
}

// Je contrôle et j'insert en BDD
$select_date = '';
$year = date('Y');
$century = $year - 10;

while($year >= $century){
    if(isset($_GET['action']) && $_GET['action'] == 'modifier' && isset($_GET['id_formation']) && $_GET['id_formation'] ==  $formation_update['id_formation'] && $formation_update['form_annee'] == $year){
        $select_date .= '<option selected>' . $year . '</option>';
    }
    elseif ($_POST && isset($_POST['form_annee']) && $_POST['form_annee'] == $year ) {
        $select_date .= '<option selected>' . $year . '</option>';
    } else {
        $select_date .= '<option>' . $year . '</option>';
    }
    $year--;
}
  
  // SI je n'ai aucun message d'erreur, je procède à l'insertion des données dans ma BDD
  if(empty($msgTitre) && empty($msgNiveau) && empty($msgAnnee)){

    $donnees=$bdd->prepare("REPLACE INTO formations VALUES (:id_formation,:form_annee,:form_intitule,:form_niveau)", array(
      ':id_formation' => $_POST['id_formation'],
      ':form_annee' => $_POST['form_annee'],                
      ':form_intitule' => $_POST['form_intitule'],
      ':form_niveau' => $_POST['form_niveau']
    ));
    $donnees->bindValue(':id_formation', $_POST['id_formation'],PDO::PARAM_STR);        
    $donnees->bindValue(':form_annee',$_POST['form_annee'],PDO::PARAM_INT);        
    $donnees->bindValue(':form_intitule', $_POST['form_intitule'],PDO::PARAM_STR);
    $donnees->bindValue(':form_niveau',$_POST['form_niveau'],PDO::PARAM_INT);
    $donnees->execute() ;   
    
    $successFormation = '<div class="alert alert-success">L\'enregistrement a bien été réalisé en BDD.</div>';                           
    
  }// FIN  if(empty($msgLangage) && empty($msgLang_level) && empty($msgnewLang))
        
}//FIN if($_POST)

?>
<!----------on fait le visuel------------->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Touhami :  gestion des Formations</title>
    <!-- Lien BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Lien CSS perso -->
    <link rel="stylesheet" href="../css/style.css">
    <!--cdn fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
</head>
<form method="post" class="container">
<input type="hidden" class="form-control"  name="id_formation">
  <div class="form-group">
  <? echo $msgTitre.=""?>
    <label for="exampleInputEmail1">intitule</label>
    <input type="text" class="form-control"  name="form_intitule"   placeholder="intitule" value="<?php  if (isset($_GET['action']) && $_GET['action'] == 'modifier' && isset($_GET['id_formation'])){ echo $formation_modifier['form_intitule']; } else { echo ""; }?>">
    
  </div>
  
  <div class="form-group">
  <? echo $msgNiveau.=""?>
    <label for="exampleInputEmail1">niveau</label>
    <input type="text" class="form-control"  name="form_niveau" aria-describedby="emailHelp" placeholder="niveau"value="<?php  if (isset($_GET['action']) && $_GET['action'] == 'modifier' && isset($_GET['id_formation'])){ echo $formation_modifier['form_niveau']; } else { echo ""; }?>">
    
  </div>
  <div class="form-group">
  <? echo $msgAnnee.=""?>
    <label for="exampleInputPassword1">annee</label>
    <select name="form_annee" id="" value="<?php  if (isset($_GET['action']) && $_GET['action'] == 'modifier' && isset($_GET['id_formation'])){ echo $formation_modifier['form_annee']; } else { echo ""; }?>">><?php echo $select_date; ?></select>
  </div><button type="submit" class="btn btn-primary">enregistrer</button>
</form>