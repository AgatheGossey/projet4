<?php $this->title = 'Modifier un commentaire'; ?>

<h2>Modifier un commentaire :</h2>
 
 <form action="index.php?controller=Comment&amp;id=<?= $comment->getId() ?>" method="post">

    <p>Auteur : <?=  $comment->getAuthor() ?></p>

    <p class ="form-group">
        <label for="comment">Commentaire</label>
        <textarea id="comment" name="comment" required><?=  $comment->getComment() ?></textarea>
    </p>

    <p>
        <button id="submitPost" type="submit button" class="btn btn-success">Editer</button>
    </p>
    
 </form>