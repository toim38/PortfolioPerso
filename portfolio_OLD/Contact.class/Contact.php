<?php
class Contact
{
    // Je défini les variable que je vais manipuler:
    private $contact_prenom;
    private $contact_nom;
    private $contact_email;
    private $message;
    
    //Je créé la fonction qui me permettra d'insérer en BDD mes contacts
    public function contactAction($contact_prenom, $contact_nom, $contact_email, $message)
    {
        // Je procède à la protection des données saisies dans le formulaire
        $this->contact_prenom = strip_tags($contact_prenom);
        $this->contact_nom = strip_tags($contact_nom);
        $this->contact_email = strip_tags($contact_email);
        $this->message = strip_tags($message);
        
        // Je me connect à ma BDD;
        $bdd = new PDO('mysql:host=localhost;dbname=portfolio', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        
        //je procède à l'insertion
        $req = $bdd->prepare('INSERT INTO contact (contact_prenom, contact_nom, contact_email, message) VALUES (:contact_prenom, :contact_nom, :contact_email, :message)');

        $req->execute([
        ':contact_prenom' => $this->contact_prenom,
        ':contact_nom' => $this->contact_nom,
        ':contact_email' => $this->contact_email,
        ':message' => $this->message]);

        $req->closeCursor();

    }
}