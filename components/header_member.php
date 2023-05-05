<div class="header-container">
  <form class="profile" method="GET">
    <p class="profile-admin">Welcome, <?= $_SESSION['username']?></p>
    <hr style="border: 1px solid rgb(212, 161, 74);">
    <button class="profile-login" name="page" value="logout">Logout</button>
  </form>
  <form class="header" method="GET">
    <button name="page" value="home">
      <div></div>
    </button>
  </form>
  <form class="navbar" method="GET">
      <button class="navbar-menu navbar-left" name="page" value="home">Home</button>
      <button class="navbar-menu navbar-middle" name="page" value="feedback">Feedback</button>
      <button class="navbar-menu navbar-right" name="page" value="moviepage">Movie</button>
  </form>
</div>