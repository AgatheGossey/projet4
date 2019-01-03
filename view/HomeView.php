<?php $this->title = 'Bienvenue !'; ?>

<img id="img" src="./public/images/img.jpg" alt="Couverture du livre - Billet simple pour l'Alaska"/>

<div class="homeView container-fluid">
    <div class="container">
        <div class="row">
        
            <?php
            foreach($posts as $key => $post)
            if ($key < 2)
                { ?>
                    <article class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <h1 id= "titleArticleHomeView"> <?= $post->getTitle(); ?> </h1>
                    <p><?= substr($post->getContent(), 0, 350) . " ...";?>
                    <br/>
                    <em><a href="index.php?action=post&id=<?= $post->getId() ?>">Poursuivre la lecture</a></em></p>
                    </article>
                <?php } ?>

        </div>
    </div>
</div>










