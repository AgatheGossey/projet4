<?php $this->title = "S'inscrire"; ?>

<h2 id="h2InscriptionView">Inscrivez-vous afin d'interagir avec les lecteurs et Jean Fortroche !</h2>

<div class="container-fluid">

    <div class="container">

        <div class="row">

            <form action="index.php?controller=inscription&action=register" method="POST">

                <p class ="form-group">
                    <label>Pseudo :</label>
                    <input type="text" class="form-control" id="user" name="user" required />
                </p>

                <p class ="form-group">
                    <label>Mot de passe : </label>
                    <input type="password" class="form-control" id="pass" name="pass" required />
                </p>

                <p class ="form-group">
                    <label>Retapez votre mot de passe :</label>
                    <input type="password" class="form-control" id="passCheck" name="passCheck" required />
                </p>

                <p class ="form-group">
                    <label>Email : </label>
                    <input type="text" class="form-control" id="email" name="email" required />
                </p>

                <?php
                
                    if (isset($_SESSION['errors'])) 
                    {
                        foreach ($_SESSION['errors'] as $error)
                    {
                ?>
                    <p> <?= $error ?> </p>
                <?php
                    }
                }
                
                ?>

                <p>
                    <button type="submit button" class="btn btn-success">S'inscrire</button>
                </p>

                <?php if (isset($successfulRegistration)) { ?>
                    <p><?= $successfulRegistration ?></p>
                <?php } ?>

            </form>

        </div>
    </div>
</div>






