<?php $this->title = 'Chapitres'; ?>

<?php foreach ($posts as $post) { ?>
    <article class="col-xs-12 col-sm-8 col-md-4 col-lg-5 article">
        <h1> <?= $post->getTitle(); ?> </h1>
        <p><?= substr($post->getContent(), 0, 350)  . " ...";?> <em><a href="index.php?action=post&amp;id=<?= $post->getId() ?>">Lire le chapitre</a></em></p>
    </article>
<?php } ?>

<nav id="paginationNav">
    <ul class="pagination">
        <?php for ($i=1; $i<=$pageTotales;$i++) { ?>
            <li class="page-item <?php if ($currentPage === $i) { echo 'active'; } ?>">
                <a class="page-link" href="index.php?action=posts&amp;page=<?= $i ?>"><?= $i ?></a>
            </li>
        <?php } ?>
    </ul>
</nav>
