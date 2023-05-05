<?php
$movies = array();  
$id = $_GET['id'];
$title = "";
$image = "";
$duration = 0;
$trailer = "";
$synopsis = "";
$rating = 0;

if(!isset($_SESSION['role'])) {
  if($_SESSION['role'] !== 'member') {
    redirect('../index.php?page=login');
  }
}

foreach (glob('./uploads/jsons/movies/now_showings/*.json') as $moviefile) {
    $fo = fopen($moviefile, "r");
    $moviejsoncontent = fread($fo, filesize($moviefile));
    fclose($fo);
    $moviecontent = json_decode($moviejsoncontent, true);
    $movies[] = $moviecontent;
}

foreach($movies as $movie) {
  if($movie['id'] === $id) {
    $title = $movie['title'];
    $image = $movie['image'];
    $duration = $movie['duration'];
    $trailer = $movie['trailer'];
    $synopsis = $movie['synopsis'];
    $rating = $movie['rating'];
  }
}

?>

<div class="movie-detail">
  <img src="<?= $image?>" alt="Image not found">
  <div class="movie-detail-info">
    <div>
      <p class="movie-info-header">Title</p>
      <p class="movie-info-detail"><?= $title ?></p>
    </div>
    <div>
      <p class="movie-info-header">Rating</p>
      <p class="movie-info-detail"><?= $rating ?>/5</p>
    </div>
    <div>
      <p class="movie-info-header">Duration</p>
      <p class="movie-info-detail"><?= $duration ?> minutes</p>
    </div>
    <div>
      <p class="movie-info-header">Synopsis</p>
      <p class="movie-info-detail"><?= $synopsis ?></p>
    </div>
  </div>
</div>
<div class="movie-video">
  <p>WATCH TRAILER</p>
  <video controls>
    <source src="<?= $trailer ?>"/>
    Video tag not supported
  </video>
</div>