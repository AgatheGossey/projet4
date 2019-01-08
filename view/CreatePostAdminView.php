<?php $this->title = 'Créer un nouvel article'; ?>

<h3>Créer un nouvel article :</h3>

<form id="formAdminPostView" action="index.php?controller=post&amp;action=createPost" method="POST">

    <p class ="form-group">
        <label for="title">Titre</label>
        <input type="text" class="form-control" name="title" id="title">
    </p>

    <p> 
        <textarea class="post" name="content" cold="50" rows="30" id="content"></textarea>
    </p>

    <p>
        <button id="submitPost" type="submit button" class="btn btn-success">Publier</button>
    </p>
    
    <p id="redirectionLink">
        <a href="index.php?controller=post&amp;action=postsAdmin">Retour au panneau d'administration</a>
    </p>

</form>

