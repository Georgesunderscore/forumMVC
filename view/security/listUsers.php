<?php

$users = $result["data"]['users'];

?>

<h1>list users</h1>

<div class="navbaritem navbartabitem nav-right ">
    <a href="index.php?ctrl=security&action=register">add +</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>User Email</th>
            <th>Date Creation</th>
        </tr>
    </thead>
    <tbody>


        <?php
        foreach ($users as $user) {

        ?>

            <tr>
                <td>
                    <div><?= $user->getEmail() ?>
                </td>
                <td>
                    <div><?= $topic->getDateInscription() ?>
                </td>

                <td>

                    <div class="navbaritem navbartabitem nav-left ">
                        <--! todo -->

                            <a href="index.php?ctrl=security&action=editUserForm&id=<?= $user->getId() ?>">edit<--! todo --> </a>
                    </div>
                    <div class="navbaritem navbartabitem nav-left ">
                        <--! todo -->
                            <a href="index.php?ctrl=security&action=listTopicsByUser&id=<?= $user->getId() ?>">>> <--! todo --></a>
                    </div>


                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>

</table>