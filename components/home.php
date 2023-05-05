<div class="about">
  <div class="about-picture"></div>
  <div class="about-content">
    <div class="about-text">
      Along with the demands of the times, Blytz Megaplex has conducted a number of improvements and innovations. This movie network spread across several major cities throughout the archipelago and most of them located in shopping centers with Hollywood and Indonesian movies as the main menu, equipped with Dolby Digital and THX sound system.
    </div>            
    <hr>
    <div class="about-partner">
      <div>OUR PARTNERS</div>
      <div>
        <img class="about-partner-img" src="../assets/images/imax.png" alt="" srcset="">
        <img class="about-partner-img" src="../assets/images/dolby_atmos.png" alt="">
      </div>
    </div>
  </div>
</div>
<div class="now-showing">
  <div class="now-showing-header">NOW SHOWING</div>
  <div class="now-showing-content">  
    <?php
      foreach(glob('./uploads/jsons/movies/now_showings/*.json') as $file) {
        // $file yg di-glob itu pathnya, makanya bisa dimasukin di fopen
        // $moviename buat nanti show ke page movie
        $fo = fopen($file, "r");
        list($foobar, $foo, $bar, $baz, $qux, $quux) = explode('/', $file);
        list($moviename, $quuz) = explode('.', $quux); 
        $now_showing = fread($fo, filesize($file));
        fclose($fo);
        $temp = json_decode($now_showing, true);
    ?>
      <a class="movie-href" href="../index.php?page=moviedetail&id=<?= $temp['id']?>">
        <img src=<?= $temp['image']?> class="movie-poster"></img>
      </a>
    <?php
      }
    ?>
  </div>
</div>