<?php
    // Execute the command in shell
    $shellOutput = shell_exec('df -h /');
    // Remove the first line
	$shellOutput = implode("\n", array_slice(explode("\n", $shellOutput), 1));
    
    // Get disk usage percentage
    if (preg_match('/\S*[0-9]%/', $shellOutput, $matches))
        echo $matches[0];
    else
        echo "-";
?>
