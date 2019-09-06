<?php
Class contact{

    
    
    private $contact_nom;
    public function setContactNom($arg)
    { 
        $this->nom = $arg;        
    }
    public function getContactNom()
    {
       return $this->prenom;        
    }

    private $contact_prenom;
    public function setContacPrenom($arg)
    {        
        $this->prenom = $arg;
    } 
    public function getContactPrenom()
    {      
         return $this->prenom ;         
    }
    private $contact_email;
    public function setContactMail($arg)
    {        
         $this->prenom = $arg;        
    }
    public function getContactMail()
    {  
        return $this->prenom ;        
    }
    private $message;
    public function setContactMessage($arg)
    {
      $this->prenom = $arg;        
    }
    public function getContactMessage()
    {      
         return $this->message ;         
    }
    

}//FIN Class contact
