<?php

session_start();

if(!isset($_REQUEST['page'])) {
  $_REQUEST['page'] = 'home';
}

if(isset($_COOKIE['login'])) {
  $_SESSION['role'] = $_COOKIE['role'];
  $_SESSION['username'] = $_COOKIE['username'];
}