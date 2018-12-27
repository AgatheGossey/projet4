<?php $this->title = 'Créer un nouvel article'; ?>

<form action="index.php?controller=post&action=createPost" method="POST">

    <h3>Créer un nouvel article :</h3>

    <label for="title">Titre</label>
    <input type="text" name="title" id="title">

    <textarea name="content" cold="50" rows="30" id="content"></textarea>

    <input type="submit" value="Publier"/>

</form>