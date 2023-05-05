<div class="form-content">
  <div class="form-container">
    <form method="POST" action="../controllers/controller_addmovie.php" enctype="multipart/form-data">
      <p>Input Movie Title</p>
      <input type="text" name="addmovie_title">
      <br>
      <br>        
      <p>Input Movie Rating</p>
      <input type="number" name="addmovie_rating">
      <br>
      <br>
      <p>Input Movie Duration</p>
      <input type="number" name="addmovie_duration">
      <br>
      <br>
      <p>Input Movie Synopsis</p>            
      <textarea name="addmovie_synopsis" cols="30" rows="10"></textarea>
      <br>
      <br>
      <p>Input Movie Poster</p>            
      <input type="file" name="addmovie_picture">
      <br>
      <br>
      <p>Input Movie Screenshots</p>            
      <input type="file" name="addmovie_ss[]" multiple>
      <br>
      <br>
      <p class="error-message"><?php if(isset($_GET['error'])) echo get_error() ?></p>
      <br>
      <button name="page" value="controller_addmovie">Add Movie</button>
    </form>
  </div>
</div>