<?php
    // Execute the command in shell
    $shellOutput = shell_exec('uptime');
  
    // Get disk usage percentage
    if (preg_match_all('/[0-9]*\.[0-9]*/', $shellOutput, $matches))
        echo $matches[0][0];
    else
        echo "-";
?>
