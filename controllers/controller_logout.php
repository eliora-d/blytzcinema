<?php 

require_once '../helpers/function.php'; 

session_start();
session_destroy();

session_start();
session_regenerate_id();

redirect('../index.php?page=home');