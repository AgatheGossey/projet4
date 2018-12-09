<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Se connecter</title>
    </head>

    <body>
        <form action="../controllers/connexionController.php" method="post">
            <p>
            <input type="pseudo" name="pseudo" />
            <input type="password" name="mot_de_passe" />
            <input type="submit" value="Valider" />
            </p>
        </form>
    </body>
</html>