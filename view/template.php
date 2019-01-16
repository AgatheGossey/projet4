<!DOCTYPE html>

<html lang="fr">

  <head>

    <title><?= $title ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css?family=Karma" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <!-- STYLES -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./public/css/styles-small.css">
    <link rel="stylesheet" type="text/css" href="./public/css/styles-medium.css">
    <link rel="stylesheet" type="text/css" href="./public/css/styles-large.css">

    <!-- OPEN GRAPH -->
		<meta property="og:url" content= "http://projet4.agathegossey.fr"/> 
		<meta property="og:type" content= "Blog application" />
		<meta property="og:title" content= "Jean Forteroche - Billet simple pour l'Alaska"/>
		<meta property="og:description" content= "Retrouvez l'ouvrage en ligne de Jean Forteroche : Billet simple pour l\'Alaska"/>
		<meta property="og:image" content= "./images/openGraph.jpg"/>                

	   <!-- TWITTER CARDS -->
		<meta name="twitter:card" content= "sumarry_large_image"/>
		<meta name="twitter:site" content= "@jean_forteroche"/>
		<meta name="twitter:title" content= "Jean Forteroche - Billet simple pour l'Alaska"/>
		<meta name="twitter:description" content= "Retrouvez l'ouvrage en ligne de Jean Forteroche : Billet simple pour l\'Alaska"/>
		<meta name="twitter:image" content= "./images/openGraph.jpg"/>

    <!-- FAVICON -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./public/favicon//favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./public/favicon//favicon-16x16.png">
    <link rel="manifest" href="./public/favicon/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

  </head>
        
  <body>

    <!-- NAVIGATION -->

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <ul class="navbar-nav mr-auto ml-5">

        <?php if(isset($_SESSION['connected']) && $_SESSION['connected'] === true) { ?>
          <li class="nav-item"><a class="nav-link"><?=ucfirst($_SESSION['username']) ?></a></li>
        <?php }?>

        <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?action=posts">Chapitres</a></li>

        <?php if(isset($_SESSION['connected']) && $_SESSION['connected'] === true) { ?>

          <li class="nav-item"><a class="nav-link" href="index.php?controller=deconnection">Se déconnecter</a></li>
          <?php if(isset($_SESSION['username']) && $isAdmin) { ?>
            <li class="nav-item"><a class="nav-link" href="index.php?controller=post&action=postsAdmin">Gérer les articles</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?controller=comment&action=commentAdmin">Modérer les commentaires</a></li>
          <?php }

        } else { ?> 

          <li class="nav-item"><a class="nav-link" href="index.php?controller=connection">Connexion</a></li>
          <li class="nav-item"><a class="nav-link" href="index.php?controller=inscription">Inscription</a></li>
        
        <?php } ?>
      </ul>
      <div class="navbar-brand">Jean Forteroche</div>
    </div>
    </nav>

    <!-- CONTENT -->
    <?= $content ?>

    <!-- FOOTER -->
    <footer class="page-footer">
        <a href="#" class="footerElement">Mentions légales</a>
        <div class="footerElement">© 2018 Copyright</div>
    </footer>
    
    <!-- SCRIPT -->
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea.post' });</script> 
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script> 
          
  </body>

</html>
      
