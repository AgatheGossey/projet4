<?php
    if (isset($_POST['mot_de_passe']) AND $_POST['mot_de_passe'] ==  "kangourou") 
    {
        header('Location: ../views/administration.php');
    }
    else 
    {
        echo '<p>Mot de passe incorrect</p>';
    }
?>
    
