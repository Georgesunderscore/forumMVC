


<?php

$posts = $result["data"]['posts'];

?>

<h1>liste list posts</h1>
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