<?php
    session_start();

    // Execute the command in shell
    $shellOutput = shell_exec('cat /proc/stat | grep \'^cpu \'');

    $total = 0;

    if (preg_match_all('/[0-9]+/', $shellOutput, $matches)) {
        $idle = $matches[0][3];
        $prev_total = $prev_idle = 0;

        if (isset($_SESSION['prev_total'])) $prev_total = $_SESSION['prev_total'];
        if (isset($_SESSION['prev_idle'])) $prev_idle = $_SESSION['prev_idle'];

        for ($idx = 0; $idx < 4; $idx++)
            $total += $matches[0][$idx];
        
        $diff_idle = $idle - $prev_idle;
        $diff_total = $total - $prev_total;
        $diff_usage = (1000*($diff_total - $diff_idle)/$diff_total+5)/10;

        $_SESSION['prev_total'] = $total;
        $_SESSION['prev_idle'] = $idle;

        echo ceil($diff_usage).'%';
    } else {
        echo "-";
    }
?>
