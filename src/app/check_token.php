<?php

define(TOKEN, "secret");

function check_token($token)
{
	if($token == TOKEN)
	{
		return 1;
	} else {
		return 0;
	}
}

function check_token_get()
{
	return check_token($_GET['token']);
}		

function check_token_post()
{
	return check_token($_POST['token']);
}

function encode_data($checking_result)
{	
	$error_status = json_encode(array(status=>"token error"));
	//$ok_status = json_encode(array(status=>"ok"));
	if($checking_result)
		return '';
	else
		return $error_status;

}

function response_token_information()
{
	if(isset($_GET["token"]))
		return encode_data(check_token_get());
	elseif(isset($_POST["token"])) 
		return encode_data(check_token_post());
}


