<?php $this->title = 'Modifier un commentaire'; ?>

<div class="container-fluid">

    <div class="container">

        <h2>Modifier un commentaire :</h2>
        
        <form action="index.php?controller=Comment&amp;id=<?= $comment->getId() ?>" method="post">

            <p>Auteur : <span id="elementInBold"><?=  $comment->getAuthor() ?></span></p>

                <label for="comment">Commentaire</label>
                <textarea type="text" class="form-control"  id="comment" name="comment" required><?=  $comment->getComment() ?></textarea>

            <p>
                <button id="submitPost" type="submit button" class="btn btn-success">Editer</button>
            </p>
            
        </form>

    </div>
    
</div>