<?php
function interauteEstConnecte()
{
    if(!isset($_session['visiteur']))
    {
        return false;
    }
    else{
        return true;
    }
    }
function internauteEstConnecteEtEstAdmin()
{
    if(internauteEstConnecte()&& $_SESSION['visiteur']['statut']==1)
    {
        return true;
    }
    else{
        return false;
    }
}
?>