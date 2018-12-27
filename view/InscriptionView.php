<?php $title = "S'inscrire"; ?>


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
    
        <?php
            // if(isset($_POST['password']) && isset($_POST['passCheck']) && $_POST['password'] != $_POST['passCheck'])
            // {
            //     echo "Les mots de passe ne sont pas identiques";
            // }
        ?>

    <p>
        <label>Email : </label>
        <input type = "text" id="email" name="email" />
    </p>
        <?php
        // if(isset($_POST['email']) && !preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email']))
        // {	
		// 		echo "Cet email n'est pas valide";
		// }
		?>

    <p>
        <input type="submit" value="S'inscrire" />
    </p>

    <?php if (isset($successfulRegistration)) { ?>
        <p><?= $successfulRegistration ?></p>
    <?php } ?>

</form>




