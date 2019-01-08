<?php $this->title = 'Les commentaires'; ?>


<article class="col-xs-12 col-sm-8 col-md-4 col-lg-5 article">
    <h1><?= $post->getTitle() ?></h1>
    <p><?= $post->getContent() ?></p>
    <p id="redirectionLink"><a href="index.php?action=posts">Retour à la liste des chapitres</a></p>
</article>

<article class="col-xs-12 col-sm-8 col-md-4 col-lg-5 article">

    <h1 id="h1PostView">Commentaires :</h1>

    <?php foreach ($comments as $comment) { ?>

        <div id="postingComments">
            <p>Pseudo : <span id="getAuthor"><?= $comment->getAuthor() ?></span></p>
            <p><?= nl2br($comment->getComment()) ?></p>
        </div>

        <div id="commentActions">
            <?php if(isset($_SESSION['connected']) && $_SESSION['connected']) { ?>
                    <a class="btn" role="button" href= "index.php?controller=Comment&amp;action=reportComment&amp;id=<?= $comment->getId() ?>">Signaler</a></button>
            <?php }

            if(isset($_SESSION['username']) && $_SESSION['username'] === $comment->getAuthor()) { ?>
                <a class="btn" role="button" href= "index.php?controller=Comment&amp;id=<?= $comment->getId() ?>">Modifier</a>
                <a class="btn" role="button" href= "index.php?controller=Comment&amp;action=deleteComment&amp;id=<?= $comment->getId() ?>">Supprimer</a>
            <?php } ?>
        </div>

        <?php if (isset($deleteComment)) { ?>
            <p><?= $deleteComment ?></p>
        <?php } 
        } ?>

     <?php if(isset($_SESSION['connected']) && $_SESSION['connected']) { ?>

        <h3>Poster un commentaire :</h3>
        <p> Votre pseudo : <span id="getAuthor"><?= $_SESSION['username']?></span></p>

        <form id="formPostView" action="index.php?controller=Comment&amp;action=addComment&amp;id=<?= $post->getId() ?>" method="POST">                 
            <p>
                <label for="comment"></label>
                <textarea type="text" class="form-control" id="comment" name="comment" required></textarea>
            </p>
            <p>
                <button type="submit button" class="btn btn-success">Poster</button>
            </p>
        </form>

    <?php }  else { ?>
        <p id="linkToLogIn"><a href= "index.php?controller=connection" id="logIn">Connectez-vous</a> pour laissez un commentaire</p>
    <?php } ?>

</article>


