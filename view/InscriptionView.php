<?php $this->title = "S'inscrire"; ?>


<form action="index.php?controller=inscription&action=register" method="POST">

    <p>
        <label>Pseudo :</label>
        <input type="text" id="user" name="user" />
    </p>

    <p>
        <label>Mot de passe : </label>
        <input type="password" id="pass" name="pass" />
    </p>

    <p>
        <label>Retapez votre mot de passe :</label>
        <input type="password" id="passCheck" name="passCheck" />
    </p>

    <p>
        <label>Email : </label>
        <input type = "text" id="email" name="email" />
    </p>

    <p>
        <input type="submit" value="S'inscrire" />
    </p>

    <?php if (isset($successfulRegistration)) { ?>
        <p><?= $successfulRegistration ?></p>
    <?php } ?>

</form>




