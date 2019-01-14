<?php $this->title = "Se connecter"; ?>

<div class="container-fluid">
    <div class="container"
        <div class="row">

            <form id="formConnectionView" action="index.php?controller=connection&amp;action=logIn" method="POST">
                
                <p class ="form-group">
                    <label>Pseudo :</label>
                    <input type="text" class="form-control" id="user" name="user" required />
                </p>

                <p class ="form-group">
                    <label>Mot de passe : </label>
                    <input type="password" class="form-control" id="pass" name="pass" required />
                </p>

                <p class ="form-group">
                    <button type="submit button" class="btn btn-success">Se connecter</button>
                </p>
                
                <!-- display the message in case of connection error -->
                <?php if (isset( $_SESSION['errors']['connectionCheckError'])) { ?>
                    <p><?=  $_SESSION['errors']['connectionCheckError'] ?></p>
                <?php } ?>
                
            </form>

        </div>
    </div>
</div>



