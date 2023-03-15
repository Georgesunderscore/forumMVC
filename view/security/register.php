<div class="register-div">

    <form id="register-form" action="index.php?ctrl=security&action=addUser" method="post" enctype="multipart/form-data">
        <div class="container-padding">
            <h1>Sign Up</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>

            <div class="form-group">
                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" required>
            </div>

            <div class="form-group">
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>
            </div>

            <div class="form-group">
                <label for="psw-repeat"><b>Repeat Password</b></label>
                <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
            </div>

            <div class="form-group">
                <label>Pseudonyme :</label>
                <input type="text" name="pseudo" />
            </div>

            <!-- visible for adminlist fix for roles #}-->
            <div class="form-group">
                <label>Role :</label>
                <input name="role" value="membre" readonly hidden />
            </div>

            <div class="form-group">
                <label>Profile Image :</label>
                <input type="file" name="image" placeholder="Profile Image" required />
            </div>

            <div class="form-group">

                <label>
                    <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me</label>
            </div>


            <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

            <div class="clearfix">
                <button type="button" class="cancelbtn" action="index.php">Cancel</button>
                <button type="submit" class="signupbtn">Sign Up</button>
            </div>
        </div>
    </form>

</div>