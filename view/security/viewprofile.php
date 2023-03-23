<?php
use App\Session;
$user = Session::getUser();
// $topics = for


?>
<article>
<div class="login-div">


    <section id="profile-form" class="profile-form" action="index.php?ctrl=security&action=">
        <!-- <h2>Profile <?= $user->getProfileimgurl()?></h2> -->
        <h2>Profile <?= $user->getPseudonyme()?></h2>
        <img class="img-rounded" width="200" height="200" src='<?= $user->getProfileimgurl()?>' width='300px'>
        
        <br>



        <div class="form-group">
            <label for="email"><b><?= $user->getEmail()?></b></label>

        </div>

    </section>
</div>
</article>