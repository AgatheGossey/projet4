<?php $this->title = "Gérer les articles"; ?>

  <a role="button" class="btn btn-success" href="index.php?controller=post&amp;action=createPost"><i class="far fa-edit"></i></br>Ecrire un article</a></button>

<?php foreach ($posts as $post) { ?>
    <article class="col-xs-12 col-sm-12 col-md-10 col-lg-5 article">
        <h1><?= $post->getTitle(); ?></h1>
        <p><?= $post->getContent(); ?></p>
    </article>
    
    <div id="postActions">
        <a href= "index.php?controller=Post&amp;action=editPost&amp;id=<?= $post->getId() ?>">Modifier</a>
        <a href= "index.php?controller=Post&amp;action=deletePost&amp;id=<?= $post->getId() ?>">Supprimer</a>
    </div>

<?php } ?>

<nav id="paginationNav">
    <ul class="pagination">
        <?php for ($i=1; $i<=$pageTotales;$i++) { ?>
            <li class="page-item <?php if ($currentPage === $i) { echo 'active'; } ?>">
                <a class="page-link" href="index.php?action=postsAdmin&amp;page=<?= $i ?>"><?= $i ?></a>
            </li>
        <?php } ?>
    </ul>
</nav>
