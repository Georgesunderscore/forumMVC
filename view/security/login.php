<div class="login-div">

    <div class="imgcontainer">
        <img src="./public/img/img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <form id="login-form" action="index.php?ctrl=security&action=authentification" method="POST">
        <h2>Login form</h2>


        <div class="form-group">
            <label for="email"><b>email</b></label>
            <input id="email" type="mail" name="email" placeholder="Email" required />
        </div>

        <div class="form-group">
            <label for="psw"><b>Password</b></label>
            <input id="psw" type="password" placeholder="Enter Password" name="password" required>
        </div>



        <input class="signinbtn" type="submit" name="submitlogin" value="Login">


        <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
    </form>
</div>