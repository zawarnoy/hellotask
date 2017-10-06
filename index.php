<?php


?>
<h1>GET</h1>
<form action="./src/app/check_all_data.php" method="GET" name="form1">
	<p>Token:
	<p><input name="token" type="text" size="20"></p>
	<p>Id:
	<p><input name="id" type="text" size="20">	
	<p><input name="submit_get" type="submit" value="send">
</form>

<h1>POST</h1>
<form enctype="multipart/form-data" action="./src/app/check_all_data.php" method="POST" name="form2">
	<p>Token:
	<p><input name="token" type="text" size="20">
	<p>Id:
	<p><input name="id" type="text" size="20">	
	<input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
	<p>Your image(JPEG, PNG, GIF):
	<p><input type="file" name="image" accept="image/jpeg,image/png,image/gif">
	<p><input name="submit_post" type="submit" value="send"></p>
</form>
