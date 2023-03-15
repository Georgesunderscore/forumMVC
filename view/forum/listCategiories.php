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
                    <p><?= $category->getCategoryName() ?></p>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>

</table>