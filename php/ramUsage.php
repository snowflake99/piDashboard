<?php
    // Execute the command in shell
    $shellOutput = shell_exec('free -mh /');
    // Remove the first 2 line
	$shellOutput = implode("\n", array_slice(explode("\n", $shellOutput), 2));
    
    // Get disk usage percentage
    if (preg_match_all('/\S*[0-9]*[BKMGT]/', $shellOutput, $matches))
        echo $matches[0][1];
    else
        echo "-";
?>
