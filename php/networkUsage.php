<?php
    session_start();
    $interface=$_GET['networkInterface'];
	$intervalSec=$_GET['intervalSec'];
     
    $rx = @file_get_contents("/sys/class/net/$interface/statistics/rx_bytes"); 
    $tx = @file_get_contents("/sys/class/net/$interface/statistics/tx_bytes"); 
	
	
	if (isset($_SESSION['prev_rx']) &&
	    isset($_SESSION['prev_tx']))	{
		$rkbps = (($rx - $_SESSION['prev_rx'])/1024) / $intervalSec;
		$tkbps = (($tx - $_SESSION['prev_tx'])/1024) / $intervalSec;
		
		if ($rkbps > 1024) {
			$rxRate = ceil($rkbps / 1024);
			$rxunit = "mbps";
		} else {
			$rxRate = ceil($rkbps);
			$rxunit = "kbps";
		}
		
		if ($tkbps > 1024) {
			$txRate = ceil($tkbps / 1024);
			$txunit = "mbps";
		} else {
			$txRate = ceil($tkbps);
			$txunit = "kbps";
		}		
	} else {
		$rxRate = "0"; $rxunit = "kbps";
		$txRate = "0"; $txunit = "kbps";
	}
	
	$_SESSION['prev_rx'] = $rx;
	$_SESSION['prev_tx'] = $tx;
	
	echo "Rx ".$rxRate.$rxunit."\n"."Tx ".$txRate.$txunit;
?>