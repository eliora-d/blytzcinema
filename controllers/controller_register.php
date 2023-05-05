<?php

require_once '../helpers/session.php';
require_once '../helpers/function.php';

if(isset($_REQUEST['page'])) {
	if($_REQUEST['page'] === 'controller_register') {
		$username = $_REQUEST['register_username'];
		$email = $_REQUEST['register_email'];
		$password = $_REQUEST['register_password'];
		$gender = "";
		if(isset($_REQUEST['register_gender'])) {
			$gender = $_REQUEST['register_gender'];
        }
        $role = 'member';

		if($username === "" || $email === "" || $gender === "" || $password === "") {
			$error = "Fill in empty field";
      		redirect("../index.php?page=register&error=$error");
			return;
		}

		$usernamenospace = str_replace(' ', '', $username);
		// dd($username);
		$response = array('role'=>'member','username'=>$username,'email'=>$email,'password'=>$password,'gender'=>$gender);
		$fo = fopen('../uploads/jsons/users/'.$usernamenospace.'.json',"w");
		fwrite($fo, json_encode($response));
		fclose($fo);

		redirect('../index.php?page=home');
	}
}