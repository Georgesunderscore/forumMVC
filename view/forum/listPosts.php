


<?php

$posts = $result["data"]['posts'];
$topic = $result["data"]['topic'];


?>

<h1>liste list posts pour le sujet <?= $topic->getTitle()?></h1>
<h2>Sujet : <?= $topic->getSujet()?></h2>
<table class="table">
    <thead>
        <tr>
            <th>Message</th>
            <th>Date Creation</th>
        </tr>
    </thead>
    <tbody>

        <?php
        if($posts!= null){
            foreach ($posts as $post) {
        ?>
            <tr>
                <td>
                    <div ><?= $post->getMessage() ?>
                </td>
                <td>
                    <div ><?= $post->getDateCreation() ?>
                </td>
                
                <td>

                </td>
            </tr>
        <?php
            }
        }else{
            ?>
            <tr>
                <td>
                    <div >empty list <div/>
                </td>
        <?php
        }
        ?>
    </tbody>

</table>