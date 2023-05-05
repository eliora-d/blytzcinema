<?php
$movies = array();  
$id = $_GET['id'];
$title = "";
$image = "";
$duration = 0;
$synopsis = "";
$rating = 0;
$ss = array();

if(!isset($_SESSION['role'])) {
  if($_SESSION['role'] !== 'member') {
    redirect('../index.php?page=login');
  }
}

foreach (glob('./uploads/jsons/movies/others/*.json') as $moviefile) {
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
    $synopsis = $movie['synopsis'];
    $rating = $movie['rating'];
    $ss = $movie['ss'];
    break;
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
    <p>SCREENSHOTS</p>
  <img id="ss" src=<?= $ss[0] ?> alt="">
</div>
<script>
    var i = 1;
    var arr = [];
    $(document).ready(function(){
        <?php 
        foreach ($ss as $files) {
        ?>
            arr.push("<?= $files ?>");
        <?php
        }
        ?>
        nextSlide()
    })

    function nextSlide() {
        setTimeout(() => {    
            $('#ss').attr("src", arr[i++]);
            if (i == arr.length) i = 0
            nextSlide();
        }, 3000);
    }
</script>