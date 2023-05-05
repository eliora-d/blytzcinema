<?php

require_once '../helpers/function.php';
require_once '../helpers/session.php';


function error_msg($error_content) {
  redirect("../index.php?page=addmovie&error=$error_content");
  $errors[] = $error_content;
  return;
}

if(isset($_REQUEST['page'])) {
	if($_REQUEST['page'] === 'controller_addmovie') {
    $maxsize = 3000000;
    $acceptable = array(
      'image/jpeg',
      'image/jpg',
      'image/gif',
      'image/png',
    );

    $title = $_REQUEST['addmovie_title'];
    $rating = $_REQUEST['addmovie_rating'];
    $duration = $_REQUEST['addmovie_duration'];
    $synopsis = $_REQUEST['addmovie_synopsis'];

    $picture = null;
    if(isset($_FILES['addmovie_picture'])) {
      $picture = $_FILES['addmovie_picture'];
    }

    $ss = array();
    if(isset($_FILES['addmovie_ss'])) {
      $ss = $_FILES['addmovie_ss'];
    }

    if($title == "" || $rating == 0 || $rating == "" || $duration == 0 || $duration == "" || $synopsis == "") {
      error_msg('Empty field(s) must be filled');
    }
    
    // dd($_FILES);

    if($_FILES['addmovie_picture']['error'] == 4 || $_FILES['addmovie_ss']['error'][0] == 4) {
      error_msg('Please upload movie poster/screenshot(s)');
    }

    if(strlen($title) < 5) {
      error_msg('Title must be longer than equal to 5 characters');
    }

    if($rating > 5) {
      error_msg('Rating must not be higher than 5');
    }

    if($duration < 30 || $duration > 300) {
      error_msg('Movie Duration must not be less than 30 minutes or more than 300 minutes');
    }

    if(strlen($synopsis) < 30) {
      error_msg('Synopsis must not be longer than equal to 30 characters');
    }

    $titlenospace = str_replace(' ', '', $title);
    $parent_path_dir = "../uploads/images/movies/others/$titlenospace/";
    
    if(!is_dir($parent_path_dir)) {
      mkdir($parent_path_dir, 0777);
    }
    
    $picture_path_dir = "../uploads/images/movies/others/$titlenospace/poster/";
    $ss_path_dir = "../uploads/images/movies/others/$titlenospace/ss/";
    
    if(!is_dir($picture_path_dir)) {
      mkdir($picture_path_dir, 0777);
    }

    if(!is_dir($ss_path_dir)) {
      mkdir($ss_path_dir, 0777);
    }

    if($picture['size'] >= $maxsize) {
      error_msg('Picture size must not exceed 3MB');
    }

    foreach ($ss['size'] as $key) {
      if($key >= 900000) {
        error_msg('Picture size must not exceed 900KB');
      }
    }

    if(!in_array($picture['type'], $acceptable)) {
      error_msg('File extension must be image extension');
    }

    foreach ($ss['type'] as $key) {
      if(!in_array($key, $acceptable)) error_msg('File extension must be image extension');
    }

    $arraysize = count($ss["name"]);
    if($arraysize > 7) {
      error_msg('Uploaded screenshots must not be more than 7 screenshots');
    }

    if(count($errors) == 0) {
      list($foo, $fileextension) = explode("/", str_replace(' ', '', $picture['type']));
      move_uploaded_file($picture["tmp_name"], "$picture_path_dir$titlenospace.$fileextension");
      $responsepicture = "$picture_path_dir$titlenospace.$fileextension";

      $responsess = array();
      for ($i=0; $i < $arraysize; $i++) {
        list($foo, $fileextension) = explode("/", str_replace(' ', '', $ss['type'][$i]));
        move_uploaded_file($ss["tmp_name"][$i], "$ss_path_dir$titlenospace$i.$fileextension");
        $responsess[] = "$ss_path_dir$titlenospace$i.$fileextension";
      }

      $response = array('id'=>$titlenospace,'title'=>$title,'image'=>$responsepicture,'duration'=>$duration,'ss'=>$responsess,'synopsis'=>$synopsis,'rating'=>$rating); 
      $fp = fopen("../uploads/jsons/movies/others/$titlenospace.json", 'w');
      fwrite($fp, json_encode($response));
      fclose($fp);

      redirect('../index.php?page=home');
    }
	}
}