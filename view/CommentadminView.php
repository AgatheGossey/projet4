<?php $this->title = "Modérer les commentaires"; ?>

<table class="table">

    <thead class="thead-dark">

        <tr>
            <th scope="col">Auteur</th>
            <th scope="col">Commentaire</th>
            <th scope="col">Lien vers l'article</th>
            <th scope="col">Nombre de signalements</th>
            <th scope="col">Supprimer</th>
            <th scope="col">Approuver</th>
        </tr>

    </thead>
    
    <tbody>

        <?php foreach ($comments as $comment) { ?>

            <tr id="lineTable">
                <td><?= $comment->getAuthor() ?></td>
                <td><?= $comment->getComment() ?></td>
                <td>
                    <a href="index.php?action=post&amp;id=<?= $comment->getPostId() ?>">
                        <i class="fas fa-link"></i>
                    </a>
                </td>
                <td><?= $comment->getReport() ?></td>
                <td>
                    <a href= "index.php?controller=Comment&amp;action=deleteComment&amp;fromAdminPanel=true&amp;id=<?= $comment->getId() ?>">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
                <td>
                    <a href= "index.php?controller=Comment&amp;action=approveComment&amp;fromAdminPanel=true&amp;id=<?= $comment->getId() ?>">
                        <i class="fas fa-check"></i>
                    </a>
                </td>
            </tr>

        <?php } ?>

    </tbody>

</table>

    



