<?php

$categories = $result["data"]['categories'];

?>

<h1>liste categories</h1>
<table class="table">
    <thead>
        <tr>
            <th>Category Name</th>
        </tr>
    </thead>
    <tbody>


        <?php
        foreach ($categories as $category) {

        ?>
            <tr>
                <td>
                    <div ><?= $category->getCategoryName() ?>
                </td>
                <td>

                <div class="navbaritem navbartabitem nav-left ">
                        <a href="index.php?ctrl=forum&action=editCategory&id=<?= $category->getId() ?>">edit</a>
                        
                    </div>

                <div class="navbaritem navbartabitem nav-right ">
                        <a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?= $category->getId() ?>">>></a>

                    </div>
                    


                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>

</table>