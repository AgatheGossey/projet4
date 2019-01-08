<?php $this->title = "Se connecter"; ?>

<div class="container-fluid">
    <div class="container"
        <div class="row">

            <form id="formConnectionView" action="index.php?controller=connection&action=logIn" method="POST">
                <p>
                    <label>Pseudo :</label>
                    <input type="text" class="form-control" id="user" name="user" required />
                </p>
                <p>
                    <label>Mot de passe : </label>
                    <input type="password" class="form-control" id="pass" name="pass" required />
                </p>
                <p>
                    <button type="submit button" class="btn btn-success">Se connecter</button>
                </p>
                <?php if (isset( $_SESSION['errors']['connectionCheckError'])) { ?>
                    <p><?=  $_SESSION['errors']['connectionCheckError'] ?></p>
                <?php } ?>
                
            </form>

        </div>
    </div>
</div>



