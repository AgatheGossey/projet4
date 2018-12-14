<?php $title = 'Les commentaires'; ?>

<?php ob_start(); ?>

<p><a href="index.php">Retour à la liste des billets</a></p>

<div class="news">
    <h3><?= htmlspecialchars($post['title']) ?></h3>
    <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
</div>

<h2>Commentaires</h2>

<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" />
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<?php
while ($comment = $comments->fetch())
{
    // print_r($comment);
?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?> (<a href= "index.php?action=viewComment&amp;id=<?= $comment['id'] ?>">modifier</a>)</p>
<?php
}
        ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>