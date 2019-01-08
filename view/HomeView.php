<?php $this->title = 'Bienvenue !'; ?>

<div id="homeView">

    <img id="img" src="./public/images/img.jpg" alt="Couverture du livre - Billet simple pour l'Alaska"/>

    <div class="container-fluid" id="homeViewChapters">
        <div class="container">
            <div class="row">
            
                <?php foreach($posts as $key => $post)
                // display only the first two article
                if ($key < 2) { ?> 
                    <article class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <h1> <?= $post->getTitle(); ?> </h1>
                        <p>
                            <!-- display only the first 350 characters of the article -->
                            <?= substr($post->getContent(), 0, 350) . " ...";?> 
                            <br/>
                            <a href="index.php?action=post&amp;id=<?= $post->getId() ?>">Poursuivre la lecture</a>
                        </p>
                    </article>
                <?php } ?>

            </div>
        </div>
    </div>

</div>










