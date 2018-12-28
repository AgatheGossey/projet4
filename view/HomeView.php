<?php $this->title = 'Mon blog'; ?>

<?php
foreach ($posts as $post)
{
?>
            <h1> <?= $post->getTitle(); ?> </h1>
            <p><?= $post->getContent();?>
            <br/>
            <em><a href="index.php?action=post&id=<?= $post->getId() ?>">Commentaires</a></em>;</p>

<?php
} 

?>
