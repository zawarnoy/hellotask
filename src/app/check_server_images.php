<?php


define(CHECKED_FOLDER, "../../cache/".$_GET['id']);

function checking_folder_existence()
{
	if(file_exists(CHECKED_FOLDER))
		return 1;
	else
		return 0;
}

function get_not_found()
{
	return array(
		status=>"not found",
		);
}

function get_url_timestamp($image)
{
	$url_timestamp = array(
		url=>realpath(CHECKED_FOLDER.'/'.$image),
		timestamp=>date('Y-n-j H:i:s', filectime(realpath(CHECKED_FOLDER.'/'.$image))),
		);
	//print_r($url_timestamp);
	return $url_timestamp;
}

function get_url_timestamp_by_id()
{
	$ok_response = array(
		status=>"ok",
		data => array(),
		);

	if($dir_with_images = opendir(CHECKED_FOLDER))
		while(($current_image = readdir($dir_with_images)) !== false){
			if ($current_image != "." && $current_image != "..")
            	array_push($ok_response['data'], get_url_timestamp($current_image));
		}
	
	return $ok_response;
}

function response_images_information_by_id()
{
	if(checking_folder_existence())
		return get_url_timestamp_by_id();
	else
		return get_not_found();
}