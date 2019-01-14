<?php $this->title = "Modérer les commentaires"; ?>

<div id="commentsCards">
    <?php foreach ($comments as $comment) { ?>
        <div class="card">
            <div class="card-body">
                <p><span id="elementInBold">Auteur :</span> <?= $comment->getAuthor() ?></p>
                <p><span id="elementInBold">Commentaire :</span> <?= $comment->getComment() ?></p>
                <p><span id="elementInBold">Nombre de signalements :</span> <?= $comment->getReport() ?></p>
                <p><a href="index.php?action=post&amp;id=<?= $comment->getPostId() ?>">Lien vers l'article</a></p>
                <a href="index.php?controller=Comment&amp;action=deleteComment&amp;fromAdminPanel=true&amp;id=<?= $comment->getId() ?>">
                    <button type="button" class="btn btn-danger">Supprimer</button>
                </a>
                <a href="index.php?controller=Comment&amp;action=approveComment&amp;fromAdminPanel=true&amp;id=<?= $comment->getId() ?>">
                    <button type="button" class="btn btn-success">Approuver</button>
                </a>
            </div>
        </div>
    <?php } ?>
</div>



