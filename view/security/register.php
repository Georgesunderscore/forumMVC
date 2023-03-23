<?php
$rolesList = ["role1"=> "membre","role2" => "ROLE_ADMIN","role3" => "bannie"];
?>
<div class="register-div">

    <form id="register-form" action="index.php?ctrl=security&action=addUser" method="POST"
          enctype= "multipart/form-data" >
        <div class="container-padding">
            <h1>Sign Up</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>

            <div class="form-group">
                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email">
            </div>

            <div class="form-group">
                <label for="pseudo"><b>Name :</b></label>
                <input id="pseudo" type="text" name="pseudo" placeholder="Pseudoyme" />
            </div>



            <div class="form-group">
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw">
            </div>

            <div class="form-group">
                <label for="psw-repeat"><b>Repeat Password</b></label>
                <input type="password" placeholder="Repeat Password" name="psw-repeat">
            </div>


            <!-- visible for adminlist fix for roles #}-->
            <!-- <div class="form-group">
                <label>if admin visible Role :</label>
                <input name="role" value="membre" readonly hidden />
            </div> -->

            <div class="form-group">
                <label for="sel1">Role:</label>
                <select class="form-control" id="sel1" name="role" require>
                    <option value="">Selectionner</option>
                    <?php
                    foreach ($rolesList as $obj => $val) { ?>
                        <option value='<?= $val ?>'><?= $val ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label>Profile Image :</label>
                <input type="file" name="file" placeholder="Profile Image" />
            </div>

            <div class="form-group">

                <label>
                    <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me</label>
            </div>


            <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

            <div class="clearfix">
                <button type="button" class="cancelbtn" action="./index.php">Cancel</button>
                <input class="signupbtn" type="submit" name="submit" value="Sign Up">

            </div>
        </div>
    </form>

</div>