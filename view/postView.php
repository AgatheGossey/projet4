<?php $this->title = 'Les commentaires'; ?>


<p><a href="index.php">Retour à la liste des billets</a></p>
<div class="news">
    <h3><?= htmlspecialchars($post['title']) ?></h3>
    <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
</div>

<h2>Laissez un commentaire :</h2>

<form action="index.php?controller=Comment&action=addComment&amp;id=<?= $post['id'] ?>" method="POST">
    <div>
        <label for="author">Auteur</label><br/>
        <input type="text" id="author" name="author"/>
    </div>
    <div>
        <label for="comment">Commentaire</label><br/>
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit"/>
    </div>
</form>

<?php
foreach ($comments as $comment)
{
?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?> 
        (<a href= "index.php?controller=Comment&amp;id=<?= $comment['id'] ?>">modifier</a>) 
        (<a href= "index.php?controller=Comment&amp;action=deleteComment&amp;id=<?= $comment['id'] ?>">supprimer</a>) </p>
  
        <?php if (isset($deleteComment)) { ?>
        <p><?= $deleteComment ?></p>
    <?php } ?>
    </p>


    
<?php
}

?>


