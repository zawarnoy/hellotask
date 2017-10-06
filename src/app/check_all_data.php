<?php

include('check_token.php');
include('check_upload_image.php');
include('check_server_images.php');

if(response_token_information() == '')
{
	if($_SERVER["REQUEST_METHOD"] == "GET")
	{
		echo '<pre>'.json_encode(response_images_information_by_id());
	} elseif($_SERVER["REQUEST_METHOD"] == "POST")
	{
		echo '<pre>'.json_encode(response_upload_image_information());
	}
} else {
	echo response_token_information();
}

