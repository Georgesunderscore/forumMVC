<?php

$categories = $result["data"]['categories'];



?>



<!-- get the user id loged in id = 1 fixed pour tester -->
<!-- <form id="topic-form" action="index.php?ctrl=forum&action=addTopic&id=1" method="POST"> -->



<form action="index.php?ctrl=forum&action=addTopic" method="POST">

    <h2>Topic form add </h2>


    <div class="form-group">
        <label for="sel1">Category:</label>
        <select class="form-control" id="sel1" name="category" require>
            <option value=''>Select...</option>

            <?php
            foreach ($categories as $obj) { ?>
                <option value='<?= $obj->getId() ?>'><?= $obj->getCategoryName() ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="title"><b>title</b></label>
        <input id="title" type="text" name="title" placeholder="title" required value='' />
    </div>
    <div class="form-group">

        <!-- <label for="sujet"><b>sujet</b></label> -->
        <textarea id="sujet" type="text" cols="100" rows="5" name="sujet" placeholder="sujet" required> </textarea>
    </div>
    <input class="btn btn-primary" type="submit" name="submit" value="Ajouter">
</form>