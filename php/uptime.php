<?php
	$str   = @file_get_contents('/proc/uptime');
	$num   = floatval($str);
	$secs  = (int)fmod($num, 60); $num = (int)($num / 60);
	$mins  = $num % 60;      $num = (int)($num / 60);
	$hours = $num % 24;      $num = (int)($num / 24);
	$days  = $num;
	
	$time = $days." days\n".$hours.":".$mins.":".$secs;

    echo $time;
?>
