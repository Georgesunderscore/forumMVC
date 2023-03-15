<div class="login-div">
    <div>Login Div.</div>

    <div class="imgcontainer">
        <img src="./public/img/img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <form id="login-form" action="index.php?ctrl=security&action=login" method="post">
        <h2>Login form</h2>


        <div class="form-group">
            <label for="email"><b>email</b></label>
            <input id="email" type="mail" name="email" placeholder="Email" required />
        </div>

        <div class="form-group">
            <label for="psw"><b>Password</b></label>
            <input id="psw" type="password" placeholder="Enter Password" name="password" required>
        </div>

        <button type="submit">Login</button>

        <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
    </form>
</div>