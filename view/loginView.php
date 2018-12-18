<?php $title = "Message d'erreur"; ?>

<?php ob_start() ?>

<form action="../index.php?action=logProcess" method="POST">
    <p>
        <label>Pseudo:</label>
        <input type="text" id="user" name="user" />
    </p>
    <p>
        <label>Mot de passe: </label>
        <input type="password" id="pass" name="pass" />
    </p>
    <p>
        <input type="submit" id="btn" value="Login" />
    </p>

</form>




<?php $contenu = ob_get_clean(); ?>

<?php require ('template.php'); ?>
