<?php $title = "Message d'erreur"; ?>

<?php ob_start() ?>
<p>Une erreur est survenue : <?= $msgError ?></p>
<?php $contenu = ob_get_clean(); ?>

<?php require ('template.php'); ?>
