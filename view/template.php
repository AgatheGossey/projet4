
<!DOCTYPE html>
<html lang="fr">
    <head>

        <title><?= $title ?></title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- FONT -->
        <link href="https://fonts.googleapis.com/css?family=Karma" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Major+Mono+Display" rel="stylesheet">


        <!-- STYLES -->
        <link href="./public/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="./public/css/styles-small.css">
        <link rel="stylesheet" type="text/css" href="./public/css/styles-medium.css">
        <link rel="stylesheet" type="text/css" href="./public/css/styles-large.css">
        <link rel="stylesheet" type="text/css" href="./public/css/styles-extra-large.css">

    </head>
        
    <body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
              <div class="container">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                </div>
            
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav">
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="#">Chapitres</a></li>
                    <li><a href="#">Connexion</a></li>
                    <li><a href="#">Inscription</a></li>
                  </ul>
                  <p id="jeanForteroche">Jean Forteroche</p>
                </div>
              </div>
            </nav>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>  

        <?= $content ?>
    </body>
</html>

    <body>
      
