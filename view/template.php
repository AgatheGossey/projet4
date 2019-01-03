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
        <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">

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

              <?php 
              if(isset($_SESSION['connected']) && $_SESSION['connected'] === true) {
              ?>
                <li><a href="index.php"><?= 'Bienvenue ' .ucfirst($_SESSION['username']) ?></a></li>
                <?php 
              } ?>
            
              <li><a href="index.php">Accueil</a></li>
              <li><a href="index.php?action=posts">Chapitres</a></li>

              <?php 
              if(isset($_SESSION['connected']) && $_SESSION['connected'] === true) {
              ?>
                <li><a href="index.php?controller=deconnection">Se déconnecter</a></li>

              <?php
              if(isset($_SESSION['username']) && $isAdmin) {
              ?>
                <li><a href="index.php?controller=post&action=postsAdmin">Panneau d'administration</a></li>

              <?php 
              }

              } else {
                ?> 
              <li><a href="index.php?controller=connection">Connexion</a></li>
              <li><a href="index.php?controller=inscription">Inscription</a></li>
              <?php } ?>
            </ul>
            <p id="jeanForteroche">Jean Forteroche</p>
          </div>
        </div>
      </nav>
      <?= $content ?>

      <footer class="page-footer">

          <a href="#" class="footerElement">Mentions légales</a>
          <div class="footerElement">© 2018 Copyright</div>

      </footer>
      
    </body>
    

    <!-- <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>  
</html>
      
