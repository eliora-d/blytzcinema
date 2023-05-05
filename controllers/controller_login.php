<?php

require_once '../helpers/session.php';
require_once '../helpers/function.php';

$GLOBALS['A'] = 'asd';

if(isset($_REQUEST['page'])) {
  if($_REQUEST['page'] === 'controller_login') {
    $email = $_REQUEST['login_email'];
    $password = $_REQUEST['login_password'];

    if($email === "" || $password === "") {
      $error = 'Fill Email/Password';
      redirect("../index.php?page=login&error=$error");
      return;
    }

    $result = 0;
    foreach(glob('../uploads/jsons/users/*.json') as $userfile) {
      $fo = fopen($userfile, "r");
      $usercontentjson = fread($fo, filesize($userfile));
      fclose($fo);
      $usercontent = json_decode($usercontentjson, true);
      if($usercontent['email'] === $email) {
        if($usercontent['password'] !== $password) {
          $error = 'Invalid Password';
          redirect("../index.php?page=login&error=$error");
          return;
        }
        
        $result += 1;
        break;
      }
    }
    
    if($result !== 1) {
      $error = 'Invalid Email';
      redirect("../index.php?page=login&error=$error");
      return;
    }
    
    if($result === 1) {
      session_regenerate_id();
      $_SESSION['role'] = $usercontent['role'];
      $_SESSION['username'] = $usercontent['username'];
      $_SESSION['email'] = $usercontent['email'];
      
      redirect('../index.php?page=home');
    }
  }
}