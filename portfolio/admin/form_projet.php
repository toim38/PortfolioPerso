<?php
require_once "../inc/init.inc.php";
extract($_POST);
extract($_GET);

$msgTitre='';
$msgContenu='';
$msgliens='';
$successProjet='';
// echo '<pre style="background:black;color:white;">';
// print_r($_POST);
// echo '</pre>';
//-----requete de modification et ajout en bdd------------------

//---insertion en bdd
if($_POST){
  if(empty($titre_projet)||iconv_strlen($titre_projet)<2||iconv_strlen($titre_projet)>100){
    $msgTitre.='<span class=" alert-warning text-danger"> ** Saisissez un titre valide (100 caractère max)</span>';
  }  
  if(empty($contenu) ||iconv_strlen($contenu)>400){
    $msgContenu.='<span class="alert-warning text-danger"> ** La description de doit pas dépasser 400 caractères</span>';
  }  
  if(empty($liens) ||!filter_var($liens, FILTER_VALIDATE_URL)){
    $msgliens.='<span class="alert-warning text-danger"> ** Saisissez une url valide</span>';
  }  

//------------j'insert en bdd-------
if(empty($msgtitre)&& empty($msgContenu)&& empty($msgliens)){
  //------------on vient d'effectuer une protection contre inject°----
         foreach($_POST as $indice => $valeur){
            $_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
        } 

        $donnees=$bdd->prepare("REPLACE INTO projets VALUES (:id_projet, :titre_projet, :liens, :contenu)", array(
                ':id_projet' => $_POST['id_projet'],
                ':titre_projet' => $_POST['titre_projet'],
                ':liens' => $_POST['liens'],
                ':contenu' => $_POST['contenu'],
                
        ));
        $donnees->bindValue(':id_projet', $_POST['id_projet'],PDO::PARAM_STR);        
        $donnees->bindValue(':titre_projet', $_POST['titre_projet'],PDO::PARAM_STR);
        $donnees->bindValue(':liens',$_POST['liens'],PDO::PARAM_STR);
        $donnees->bindValue(':contenu', $_POST['contenu'],PDO::PARAM_STR); 
        $donnees->execute() ;   

        $successProjet .= '<div class="alert alert-success">L\'enregistrement a bien été réalisé en BDD.</div>';
    }// if(empty($msg)){

}


//-----fin if($_POST)

                           
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
  <?php echo $successProjet ?>
   <input type="hidden" name="id_projet">
  <div class="form-group">
    <label for="formGroupExampleInput">Titre</label>
    <?php echo $msgTitre;?>
    <input type="text" class="form-control" name="titre_projet" placeholder="">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput">description</label>
    <?php echo $msgContenu;?>
    <input type="text" class="form-control" name="contenu" placeholder="">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Lien</label>
    <?php echo $msgliens;?>
    <input type="text" class="form-control" name="liens" placeholder="">
  </div>
  <button type="submit" class="btn alert-primary">enregistrer</button>
</form>





</form>   
</body>
</html>