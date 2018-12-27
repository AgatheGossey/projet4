<?php $this->title = 'Les commentaires'; ?>


<p><a href="index.php">Retour à la liste des billets</a></p>
<div class="news">
    <h3><?= htmlspecialchars($post['title']) ?></h3>
    <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
</div>

<h2>Commentaires</h2>

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
        (<a href= "index.php?controller=Comment&action=deleteComment&amp;id=<?= $comment['id'] ?>">supprimer</a>) </p>
        (<a href= "index.php?controller=Post&amp;action=editPost&amp;id=<?= $post['id'] ?>">modifier article</a>) 
        (<a href= "index.php?controller=Post&amp;action=deletePost&amp;id=<?= $post['id'] ?>">supprimer l'article</a>) 

    </p>


    <a href="index.php?controller=post&action=createPost">Créer un nouvel article</a></li>
<?php
}

?>


