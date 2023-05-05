<p class="show-feedback-header">FEEDBACK</p>
<?php 
    if(!isset($_SESSION['role'])) {
        if($_SESSION['role'] !== 'admin') {
            redirect('../index.php?page=login');
        }
    }

    foreach (glob('./uploads/jsons/feedbacks/*.json') as $feedbackfile) {
        $fo = fopen($feedbackfile, "r");
        $feedbackjsoncontent = fread($fo, filesize($feedbackfile));
        fclose($fo);
        $feedbackcontent = json_decode($feedbackjsoncontent, true);
?>
<form class="show-feedback" method="GET" action="../index.php">
    <button>
        <input type="hidden" name="page" value="showfeedbackdetail">
        <input type="hidden" name="id" value="<?=$feedbackcontent['id'] ?>">
        <p><?= $feedbackcontent['id'] ?></p>
    </button>
</form>
<?php
    }
?>