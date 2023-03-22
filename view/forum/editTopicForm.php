<?php

$categories = $result["data"]['categories'];
$topic = $result["data"]['topic'];
// $catid = $result["data"]['catgoryid'];



?>



<!-- get the user id loged in id = 1 fixed pour tester -->
<form action='index.php?ctrl=forum&action=modifyTopic&id=<?= $topic->getId() ?>' method="POST">


    <h2>Topic form edit </h2>


    <div class="form-group">
        <label for="sel1">Category:</label>
        <select class="form-control" id="sel1" name="category" require>
            <option value='<?= $topic->getCategory()->getId() ?>'><?= $topic->getCategory()->getId() ?> <?= $topic->getCategory()->getCategoryName() ?></option>

            <?php
            foreach ($categories as $obj) { ?>
                <option value='<?= $obj->getId() ?>'><?= $obj->getCategoryName() ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="title"><b>title</b></label>
        <input id="title" type="text" name="title" placeholder="title" required value='<?= $topic->getTitle() ?>' />
    </div>


    <div class="form-group">

        <!-- <label for="sujet"><b>sujet</b></label> -->
        <textarea id="sujet" type="text" cols="100" rows="5" name="sujet" placeholder="sujet" required> <?= $topic->getSujet() ?> </textarea>
    </div>

    <!-- locked -->

    <input class="btn btn-primary" type="submit" name="submit" value="Update">
</form>