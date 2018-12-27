<?php $this->title = "Modérer l'article"; ?>

<div class="news">
    <h3><?= htmlspecialchars($post['title']) ?></h3>
    <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
</div>
<a href= "index.php?controller=Post&amp;action=editPost&amp;id=<?= $post['id'] ?>">Modifier article</a>

<a href= "index.php?controller=Post&amp;action=deletePost&amp;id=<?= $post['id'] ?>">supprimer l'article</a>
