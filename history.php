<?php
    if(file_exists("/home/pi/AirPurifier/history.txt")) {
        $file = fopen("/home/pi/AirPurifier/history.txt", "r") or die("false");
        if(filesize("/home/pi/AirPurifier/history.txt") > 0) {
            echo fread($file, filesize("/home/pi/AirPurifier/history.txt"));
        } else {
            echo "noupdate";
        }
        fclose($myfile);
    }
?>