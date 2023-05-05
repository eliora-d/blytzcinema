<?php
$feedbacks = array();   
$id = $_GET['id'];
$username = "";
$email = "";
$content = 0;
$gender = "";

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
    $feedbacks[] = $feedbackcontent;
}

foreach($feedbacks as $feedback) {
  if($feedback['id'] === $id) {
    $username = $feedback['username'];
    $email = $feedback['email'];
    $content = $feedback['content'];
    $gender = $feedback['gender'];
  }
}

?>

<div class="feedback-info">
    <div>
        <p class="feedback-info-header">Username</p>
        <p class="feedback-info-detail"><?= $username ?></p>
    </div>
    <div>
        <p class="feedback-info-header">Email</p>
        <p class="feedback-info-detail"><?= $email ?></p>
    </div>
    <div>
        <p class="feedback-info-header">Content</p>
        <p class="feedback-info-detail"><?= $content ?></p>
    </div>
    <div>
        <p class="feedback-info-header">Gender</p>
        <p class="feedback-info-detail"><?= $gender ?></p>
    </div>
</div>