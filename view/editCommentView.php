<?php $this->title = 'Modifier un commentaire'; ?>

<p><a href="index.php">Retour à la liste des billets</a></p>

<h2>Modifier un commentaire :</h2>
 
 <form action="index.php?controller=Comment&amp;id=<?= $comment->getId() ?>" method="post">
     <div>
         <p>Auteur : <?=  $comment->getAuthor() ?></p>
         <label for="comment">Commentaire</label>
         <textarea id="comment" name="comment" required><?=  $comment->getComment() ?></textarea>
     </div>
     <div>
         <input type="submit" />
     </div>
 </form>