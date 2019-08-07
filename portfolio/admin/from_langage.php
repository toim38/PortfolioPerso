<?php
extract($_POST);
extract($_GET);

echo '<pre>';
print_r($_POST);
echo '</pre>';

if($_POST){



}
                           
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
    <title>ajout langage</title>
</head>
<body>
  <div class="description">
<div class="form-check form-check-inline" methode="post">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="FRONT">
  <label class="form-check-label" for="inlineRadio1">FRONT</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="BACK">
  <label class="form-check-label" for="inlineRadio2">BACK</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" disabled>
  <label class="form-check-label" for="inlineRadio3">3 (disabled)</label>
</div>
                </div>            

    <div class="col-md-4 mb-3">
      <label for="validationTooltipUsername" name="nouveau langage"></label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="nouveau Langage"></span>
        </div>
        <input type="text" class="form-control" name="nouveau langage" placeholder="nouveau langage" aria-describedby="validationTooltipUsernamePrepend">           
    </div>
  </div>


  <button class="btn btn-primary" type="submit">envoi</button>
</form>   
</body>
</html>