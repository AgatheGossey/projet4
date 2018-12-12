<?php
    if (isset($_POST['mot_de_passe']) AND $_POST['mot_de_passe'] ==  "motdepasse") 
    {
        header('Location: ../views/admin.php');
    }
    else 
    {
        echo '<p>Mot de passe incorrect</p>';
    }
?>
    
