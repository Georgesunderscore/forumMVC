<?php
use App\Session;

$topics = $result["data"]['topics'];
// var_dump($topics);
// $topics = for
// $topics = array_filter( $topics, function( $v ) { return $v->getLocked()!=0; } );



?>

<h1>liste list topics</h1>
<?php
//  && App\Session::getUser()->getRole()!="bannie"
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
            <th>Auteur</th>
        </tr>
    </thead>
    <tbody>


        <?php
        foreach ($topics as $topic) {
            if(Session::isAdmin() || ($topic->getLocked()!=1 && !Session::isAdmin())){

            
        ?>

            <tr>
                <td>
                    <div><?= $topic->getTitle() ?>
                </td>
                <td>
                    <div><?= $topic->getDateCreation() ?>
                </td>
                <td>
                    <div><?= $topic->getUser()->getPseudonyme() ?>
                </td>

                <td>
                    <?php
                // if($sujet->getMembre()->getId() == $_SESSION["user"]->getId()){

                    if (Session::isAdmin() || 
                    (Session::isMembre() && Session::isAuteur($topic->getUser()) ) ) {
                    ?>
                        <div class="navbaritem navbartabitem nav-left ">
                            <a href="index.php?ctrl=forum&action=editTopicForm&id=<?= $topic->getId() ?>">edit</a>
                        </div>

                        <div class="navbaritem navbartabitem nav-left <?= ($topic->getLocked() == '0' ? 'closebtn' : 'openbtn') ?> ">
                            <a href="index.php?ctrl=forum&action=closeOpenTopic&id=<?= $topic->getId() ?>">
                                <?= ($topic->getLocked() == '0' ? 'Close Topic' : 'Open Topic') ?>

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
    }
        ?>
    </tbody>

</table>