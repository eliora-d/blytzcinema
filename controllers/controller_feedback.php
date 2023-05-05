<?php

require_once '../helpers/session.php';
require_once '../helpers/function.php';

if(isset($_REQUEST['page'])) {
	if($_REQUEST['page'] === 'controller_feedback') {
		$username = $_REQUEST['feedback_username'];
		$email = $_REQUEST['feedback_email'];
		$content = $_REQUEST['feedback_content'];
		$gender = "";
		if(isset($_REQUEST['feedback_gender'])) {
			$gender = $_REQUEST['feedback_gender'];
		}

		if($username === "" || $email === "" || $gender === "" || $content === "") {
			$error = "Fill in empty field";
      		redirect("../index.php?page=feedback&error=$error");
			return;
		}

		$id = str_replace(' ', '', $username);
		// dd($username);
		$response = array('id'=>$id,'username'=>$username,'email'=>$email,'content'=>$content,'gender'=>$gender);
		$fo = fopen('../uploads/jsons/feedbacks/'.$id.'.json',"w");
		fwrite($fo, json_encode($response));
		fclose($fo);

		redirect('../index.php?page=home');
	}
}