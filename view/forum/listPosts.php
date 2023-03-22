<?php

$posts = $result["data"]['posts'];
$topic = $result["data"]['topic'];


?>

<h1>liste list posts pour le sujet <?= $topic->getTitle() ?></h1>
<h2>Sujet : <?= $topic->getSujet() ?></h2>

<?php
if (App\Session::isAdmin() || App\Session::isMembre()) {
?>

    <div class="navbaritem navbartabitem nav-right ">
        <a href="index.php?ctrl=forum&action=postForm"><--! todo --> add +</a>
    </div>

<?php
}
?>


<table class="table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Date Creation</th>
        </tr>
        
    </thead>
    <tbody>


        <?php
        if ($posts != null) {
            foreach ($posts as $post) {
        ?>

                <tr>
                    <td>
                        <div><?= $post->getTitle() ?>
                    </td>
                    <td>
                        <div><?= $post->getDateCreation() ?>
                    </td>

                    <td>
                        <?php
                        if (App\Session::isAdmin()) {
                        ?>
                            <div class="navbaritem navbartabitem nav-left ">
                                <a href="index.php?ctrl=forum&action=editPostForm&id=<?= $post->getId() ?>">edit <--! todo --></a>
                            </div>
                    <?php
                        }
                    }
                    ?>



                    </td>
                </tr>
            <?php
        }
            ?>
    </tbody>

</table>