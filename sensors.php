<?php
    if(file_exists("/home/pi/AirPurifier/sensors.txt")) {
        $file = fopen("/home/pi/AirPurifier/sensors.txt", "r") or die("false");
        if(filesize("/home/pi/AirPurifier/sensors.txt") > 0) {
            echo fread($file, filesize("/home/pi/AirPurifier/sensors.txt"));
        } else {
            echo "noupdate";
        }
        fclose($myfile);
    }
?>