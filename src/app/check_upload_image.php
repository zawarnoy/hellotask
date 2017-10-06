<?php

define(MAX_IMAGE_SIZE, 2097152);
define(VALID_FORMATS, array(
	'image/jpeg',
	'image/png',
	'image/gif',));

function check_file_size()
{
	if ($_FILES['image']['size'] < MAX_IMAGE_SIZE) 
		return 1;
	else
		return 0;
}

function check_file_format()
{
	return in_array($_FILES['image']['type'], VALID_FORMATS);
}

function create_folder_by_id()
{
	if(!file_exists("../../cache/"))
		mkdir("../../cache/");
	$id = $_POST['id'];
	if(!file_exists("../../cache/".$_POST['id']))
		mkdir("../../cache/".$_POST['id']);
}

function upload_image()
{
	move_uploaded_file($_FILES["image"]["tmp_name"], "../../cache/".$_POST['id']."/".$_FILES["image"]["name"]);
}

function check_file_get_ok_status()
{
	create_folder_by_id();
	upload_image();

	$ok_status = array(
		status=>"ok", 
		path=>realpath("../../cache/".$_POST['id']."/".$_FILES["image"]["name"]),
		);
	return $ok_status;
}

function response_upload_image_information()
{
	$format_error = array(status=>"wrong image format");
	$size_error = array(status=>"wrong file size");

	if(check_file_format())
		if(check_file_size()){
			return check_file_get_ok_status();
		} else {
			return $size_error;
		}
	else
		return $format_error;
}