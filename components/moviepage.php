<p class="movie-header">MOVIES</p>
<div class="movies">
    <?php 
        if(!isset($_SESSION['role'])) {
            if($_SESSION['role'] !== 'member' || $_SESSION['role'] !== 'admin') {
                redirect('../index.php?page=login');
            }
            }

        foreach (glob('./uploads/jsons/movies/others/*.json') as $moviefile) {
            $fo = fopen($moviefile, "r");
            $moviejsoncontent = fread($fo, filesize($moviefile));
            fclose($fo);
            $moviecontent = json_decode($moviejsoncontent, true);
    ?>
    <form class="movie-page" method="GET" action="../index.php">
        <button class="movie-page-detail">
            <input type="hidden" name="page" value="movieothers">
            <input type="hidden" name="id" value="<?php echo $moviecontent['id'] ?>">
            <img src="<?= $moviecontent['image'] ?>" alt="" />
            <p><?= $moviecontent['title'] ?></p>
        </button>
    </form>
    <?php
        }
    ?>
</div>