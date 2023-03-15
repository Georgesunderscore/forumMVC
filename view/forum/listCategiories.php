<?php

$categories = $result["data"]['categories'];

?>

<h1>liste categories</h1>
<table>
    <thead>
        <tr>
            <th>Nom</th>
        </tr>
    </thead>
    <tbody>


        <?php
        foreach ($categories as $category) {

        ?>
            <tr>
                <td>
                    <p><?= $category->getCategoryName() ?>
                    <div class="navbaritem nav-right ">
                        <a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?= $category->getId() ?>">List Topics by cat <?= $category->getId() ?></a>

                    </div>
                    </p>

                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>

</table>