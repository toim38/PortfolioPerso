<?php
require_once "../inc/init.inc.php";

extract($_POST);
extract($_GET);

//--------declaration des variables-------------------
$msgAnnee1='';
$msgAnnee2='';
$msgPoste='';
$msgDescription='';
$msgEntreprise='';
$successmsg ='';

// echo '<pre style="background:red;color:white;">';
// print_r($_POST);
// echo '</pre>';

//----3/----recuperation des donnees pour bdd--------------
//---je recupére les infos de URL càd je verifie que 'action' existe ds mon URL et que cette act° est = 'à 'modifier'.et en + je m'assure que l URL a indice 'id'
if(isset($_GET['action']) && $_GET['action']=='modifier'&& ($_GET['id'])){
//si ttes les condit° sont remplies je me connecte à la table 'experiences'pr récupérer les infos 
$req=$bdd->prepare("SELECT * FROM experiences WHERE id_xp = :id_xp");
$req->bindValue(':id_xp',$_GET['id']);
$req->execute();
  //--si on trouve un resultat on manipule les donnees 
  if($req->rowCount()>0){
    $xp_modif=$req->fetch(PDO::FETCH_ASSOC);
  } 
}// fin if($req->rowCount>0)
//4//------------gestion des dates----------
//DATE DE DEBUT
$select_date = '';
$year = date('Y');
$century = $year - 50;
while($year >= $century){
    if(isset($_GET['action']) && $_GET['action'] == 'modifier' && isset($_GET['id']) && $_GET['id'] == $xp_modif['id_xp'] &&
        $xp_modif['annee-1'] == $year){
        $select_date .= '<option selected>' . $year . '</option>';
    }
    elseif ($_POST && isset($_POST['annee1']) && $_POST['annee1'] == $year ) {
        $select_date .= '<option selected>' . $year . '</option>';
    } else {
        $select_date .= '<option>' . $year . '</option>';
    }
    $year--;
}
//DATE DE FIN
$select_date2 = '';
$year2 = date('Y');
$century2 = $year2 - 50;
while($year2 >= $century2){
    if(isset($_GET['action']) && $_GET['action'] == 'modifier' && isset($_GET['id']) && $_GET['id'] == $xp_modif['id_xp'] &&
        $xp_modif['annee-2'] == $year2){
        $select_date2 .= '<option selected>' . $year2 . '</option>';
    }
    elseif ($_POST && isset($_POST['annee2']) && $_POST['annee2'] == $year ) {
        $select_date2 .= '<option selected>' . $year2 . '</option>';
    } else {
        $select_date2 .= '<option>' . $year2 . '</option>';
    }
    $year2--;
}
//--------------1 verification des champs du formulaire-----
if($_POST){
  if(empty($annee1) || !is_numeric($annee1) || strlen($annee1) < 4 || strlen($annee1) > 4){
 $msgAnnee1.='<span class="alert-warning text-danger">**entrez une date valide</span>';
  } 
  if(empty($annee2) || !is_numeric($annee2) || strlen($annee2) < 4 || strlen($annee2) > 4){
    $msgAnnee2.='<span class="alert-warning text-danger">**entrez une date valide</span>'; 
  }

  if(empty($poste) || iconv_strlen($poste) < 2 || iconv_strlen($poste) > 50){
     $msgPoste.='<span class="alert-warning text-danger">**poste occuppe</span>';
  }
 if(empty($description) || iconv_strlen($description) <2 ||iconv_strlen($description) > 101){
   $msgDescription.='<span class ="alert-warning text-danger">**contenu du poste occuppe</span>';
 }
 if(empty($entreprise) || iconv_strlen($entreprise)<2 || iconv_strlen($entreprise)>50){
   $msgEntreprise.='<span class= "alert-warning text-danger">**nom de l\'entreprise</span>';
 }
 //----------------2/inscription & modification---------------
//a: si pas msg erreur-> enregistrement
if(empty($msgAnnee1)&& empty($msgAnnee2)&& empty($msgPoste)&&empty($msgDescription)&& empty($msgEntreprise)){
//b: j'insert en base donnee
$req=$bdd->prepare("REPLACE INTO experiences VALUES (:id_xp, :annee1, :annee2, :poste, :description,:entreprises)", array                   (':id_xp' => $_POST['id_xp'],
                ':annee1'=> $_POST['annee1'],
                ':annee2'=> $_POST['annee2'],                
                ':poste' => $_POST['poste'],
                ':description' => $_POST['description'],
                ':entreprises' => $_POST['entreprise'], ));

        $req->bindValue(':id_xp', $_POST['id_xp'],PDO::PARAM_INT);        
        $req->bindValue(':annee1', $_POST['annee1'],PDO::PARAM_STR);
        $req->bindValue(':annee2', $_POST['annee2'],PDO::PARAM_STR);
        $req->bindValue(':poste', $_POST['poste'],PDO::PARAM_STR);
        $req->bindValue(':description', $_POST['description'],PDO::PARAM_STR); 
        $req->bindValue(':entreprises', $_POST['entreprise'],PDO::PARAM_STR); 
        $req->execute() ;
        $successmsg .= '<div class="alert alert-success">L\'enregistrement a bien été réalisé en BDD.</div>';
}// fin if(empty($msgAnnee1)&& empty($msgAnnee2)&& empty($msgPoste)&&empty($msgDescription)&& empty($msgEntreprise))

}// fin if($_POST)

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Touhami : gestion des expériences</title>
<!-- Lien BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Lien CSS perso -->
    <link rel="stylesheet" href="../css/style.css">
    <!--cdn fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
</head>

<body>
<!-- J'adapte le titre du formulaire selon l'action (ajout ou modification) -->
<?php
if(isset($_GET['action']) && $_GET['action'] == 'modifier'){
?>
<h3 class="text-center text-warning">Formulaire de modification</h3>
<?php
}else{
  ?>
  <h3 class="text-center text-primary">Ajoutez une nouvelle expérience !</h3>
  <?php
}
?>
<div class="row">
  <div class="col-12">
<a href="gestionExperiences.php"><i class="fas fa-arrow-circle-left fa-2x text-white offset-8"></i></a>
  </div>
</div>

<div class="container">
  <form method='post'>
  <?= $successmsg;?>
    <div class="form-group">
      <input type="hidden"  name="id_xp" class="form-control" value="<?php  if (isset($_GET['action']) && $_GET['action'] == 'modifier' && isset($_GET['id'])){ echo $xp_modif['id_xp']; } else { echo ""; }?>">
    </div>

     <div class="row">
    <div class="col">
    <label>Début</label>
      <select name="annee1">
        <option value="<?php  if (isset($_GET['action']) && $_GET['action'] == 'modifier' && isset($_GET['id'])){ echo  $xp_modif['annee-1']; } else { echo ""; }?>"><?= $msgAnnee1;?></option>
        <?=  $select_date;?>
     
      </select>
    </div>
    <div class="col">
      <label>Fin</label>
      <select name="annee2">
        <option value="<?php  if (isset($_GET['action']) && $_GET['action'] == 'modifier' && isset($_GET['id'])){ echo  $xp_modif['annee-2']; } else { echo ""; }?>"><?= $msgAnnee2;?></option>
         <?=  $select_date2;?>
      </select>
    </div>
  </div>

    <div class="form-group">
      <label for="poste">poste</label>
      <?=$msgPoste ?>
      <input type="text" class="form-control"  name="poste" placeholder="poste" value="<?php  if (isset($_GET['action']) && $_GET['action'] == 'modifier' && isset($_GET['id'])){ echo  $xp_modif['poste']; } else { echo ""; }?>">
    </div>

    <div class="form-group">
      <label for="description">description</label>
      <?=$msgDescription?>
      <textarea name="description" class="form-control" id="description" placeholder="example textarea">
      <?php  if (isset($_GET['action']) && $_GET['action'] == 'modifier' && isset($_GET['id'])){ echo  $xp_modif['description']; } else { echo ""; }?>
      </textarea>
    </div>
  
    <div class="form-group">
      <label for="entreprise" >entreprise</label>
      <?=$msgEntreprise?>
      <input type="text" class="form-control" name="entreprise" id="entreprise" placeholder="appellation" value="<?php if (isset($_GET['action']) && $_GET['action'] == 'modifier' && isset($_GET['id'])){ echo  $xp_modif['entreprises']; } else { echo ""; }?>">
    </div>
    <input type="submit" value="Envoyer">
  </form>
</div>
</body>
</html>
