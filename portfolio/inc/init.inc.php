<?php
$bdd = new PDO('mysql:host=localhost;dbname=portfolio', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
//-----------session-------------------
session_start();

//--------------------chemin------------------------

define("URL","http://localhost/portfolio/");
//------------------failles XSS---------------
foreach($_POST as $key =>$value)
{
    $_POST[$key] = strip_tags(trim($value));
}
//---------------GET-------------

foreach($_GET as $key => $value)
{
    $_GET[$key] = strip_tags(trim($value));
}
//-------------inclusion--------------
require_once("fonction.inc.php");
?>