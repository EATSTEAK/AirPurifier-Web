<?php
	$file = fopen("/home/pi/AirPurifier/queue.txt", "w") or die("false");
    fwrite($file, $_POST["power"]."\n");
	fclose($file);
	echo "true";
?>