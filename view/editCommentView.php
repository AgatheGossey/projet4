<?php $this->title = 'Modifier un commentaire'; ?>

<p><a href="index.php">Retour à la liste des billets</a></p>

<h2>Modifier un commentaire :</h2>
 
 <form action="index.php?action=editComment&amp;id=<?= $comment['id'] ?>" method="post">
     <div>
         <p>Auteur : <?= $comment['author'] ?></p>
         <label for="comment">Commentaire</label><br />
         <textarea id="comment" name="comment"><?= $comment['comment'] ?></textarea>
     </div>
     <div>
         <input type="submit" />
     </div>
 </form>
  
  
