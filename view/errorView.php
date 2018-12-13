<?php $title = "Message d'erreur"; ?>

<?php ob_start(); ?>
<h1>Message d'erreur : </h1>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>