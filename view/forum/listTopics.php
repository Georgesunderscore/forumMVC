<?php

$topics = $result["data"]['topics'];

?>

<h1>liste list topics</h1>
<?php
if (App\Session::isAdmin() || App\Session::isMembre()) {
?>

    <div class="navbaritem navbartabitem nav-right ">
        <a href="index.php?ctrl=forum&action=topicForm">add +</a>
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
        foreach ($topics as $topic) {

        ?>

            <tr>
                <td>
                    <div><?= $topic->getTitle() ?>
                </td>
                <td>
                    <div><?= $topic->getDateCreation() ?>
                </td>

                <td>
                    <?php
                    if (App\Session::isAdmin()) {
                    ?>
                        <div class="navbaritem navbartabitem nav-left ">
                            <a href="index.php?ctrl=forum&action=editTopicForm&id=<?= $topic->getId() ?>">edit</a>
                        </div>

                        <div class="navbaritem navbartabitem nav-left ">
                            <a href="index.php?ctrl=forum&action=closeOpenTopic&id=<?= $topic->getId() ?>">
                                <?= ($topic->getLocked() == '0' ? 'Close' : 'Open') ?>

                            </a>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="navbaritem navbartabitem nav-left ">
                        <a href="index.php?ctrl=forum&action=listPostsByTopic&id=<?= $topic->getId() ?>">>></a>
                    </div>


                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>

</table>