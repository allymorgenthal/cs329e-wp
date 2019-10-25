<?php
	$register_file = "register.txt";
	$handle = fopen($register_file, 'w');
	$data = fread($handle, filesize($register_file));
	echo ($data);
?>