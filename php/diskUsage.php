<?php
    // Execute the command in shell
    $shellOutput = shell_exec('df -h /');
    // Remove the first line
    $shellOutput = preg_replace('/^.+\n/', '', $shellOutput);
    
    // Get disk usage percentage
    if (preg_match('/\S*[0-9]%/', $shellOutput, $matches))
        echo $matches[0];
    else
        echo "-";
?>
