<div class="form-content">
    <div class="form-container">
        <form method="POST" action="../controllers/controller_register.php">
            <p>Username</p>
            <input type="text" name="register_username" id="register_username" placeholder="example">
            <br>
            <br>
            <p>Email</p>
            <input type="email" name="register_email" id="register_email" placeholder="example@mail.com">
            <br>
            <br>
            <div>
                <p class="genderp">Input Your Gender</p>
                <div>
                    <input type="radio" name="register_gender" id="female" value="female">
                    <label for="female">Female</label>
                    <input type="radio" name="register_gender" id="male" value="male">
                    <label for="male">Male</label>
                </div>
            </div>
            <br>
            <p>Password</p>
            <input type="password" name="register_password" id="register_password" placeholder="examplepasswd">
            <br>
            <br>
            <p class="error-message"><?php if(isset($_GET['error'])) echo get_error() ?></p>
            <br>
            <button name="page" value="controller_register">Register</button>
        </form>
    </div>
</div>