<div class="form-content">
    <div class="form-container">
        <form method="POST" action="../controllers/controller_login.php">
            <p>Email</p>
            <input type="email" name="login_email" id="login_email" placeholder="example@mail.com">
            <br>
            <br>
            <p>Password</p>
            <input type="password" name="login_password" id="login_password" placeholder="examplepasswd">
            <br>
            <br>
            <p class="error-message"><?php if(isset($_GET['error'])) echo get_error() ?></p>
            <br>
            <button name="page" value="controller_login">Login</button>
        </form>
    </div>
</div>