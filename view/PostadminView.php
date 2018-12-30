<?php $this->title = "Modérer l'article"; ?>

<div class="news">
    <h3><?= $post->getTitle() ?></h3>
    <p><?= $post->getContent() ?></p>
</div>
<a href= "index.php?controller=Post&amp;action=editPost&amp;id=<?= $post->getId() ?>">Modifier article</a>

<a href= "index.php?controller=Post&amp;action=deletePost&amp;id=<?= $post->getId() ?>">supprimer l'article</a>
