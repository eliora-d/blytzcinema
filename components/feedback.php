<div class="form-content">
  <div class="form-container">
    <form method="POST" action="../controllers/controller_feedback.php">
      <p>Input Your Name</p>
      <input type="text" name="feedback_username" id="feedback_username" placeholder="Example" value="<?php
        if(isset($_SESSION['username'])) {
          echo $_SESSION['username'];
        }
      ?>">
      <br>
      <br>
      <p>Input Your Email</p>
      <input type="email" name="feedback_email" id="feedback_email" placeholder="example@mail.com" value="<?php
        if(isset($_SESSION['email'])) {
          echo $_SESSION['email'];
        }
      ?>">
      <br>
      <br>
      <div>
        <p class="genderp">Input Your Gender</p>
        <div>
          <input type="radio" name="feedback_gender" id="female" value="female">
          <label for="female">Female</label>
          <input type="radio" name="feedback_gender" id="male" value="male">
          <label for="male">Male</label>
        </div>
      </div>
      <br>
      <p>Input Your Feedback</p>            
      <textarea name="feedback_content" id="feedback_content" cols="30" rows="10"></textarea>
      <br>
      <br>
      <p class="error-message"><?php if(isset($_GET['error'])) echo get_error() ?></p>
      <br>
      <button name="page" value="controller_feedback">Give Feedback</button>
    </form>
  </div>
</div>