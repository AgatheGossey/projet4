<?php $title = "Se connecter"; ?>


<form action="index.php?controller=connection&action=logIn" method="POST">
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
    <?php if (isset($error)) { ?>
        <p><?= $error ?></p>
    <?php } ?>
</form>




