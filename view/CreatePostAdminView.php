<?php $this->title = 'Créer un nouvel article'; ?>

<h2>Créer un nouvel article :</h2>

<form id="formAdminPostView" action="index.php?controller=post&amp;action=createPost" method="POST">

    <p class ="form-group">
        <label for="title">Titre</label>
        <input type="text" class="form-control" name="title" id="title">
    </p>

    <p> 
        <textarea class="post" name="content" rows="30" id="content"></textarea>
    </p>

    <p>
        <button id="submitPost" type="submit" class="btn btn-success">Publier</button>
    </p>
    
    <p id="redirectionLink">
        <a href="index.php?controller=post&amp;action=postsAdmin">Retour au panneau d'administration</a>
    </p>

</form>

