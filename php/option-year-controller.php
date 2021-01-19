<?php
    $year = (int)date('Y');
    $temp_year = $year;
    while($year >= ($temp_year - 10)) {
        echo "<option value=\"" . $year . "\">" . $year . "</option>";
        $year--;
    }
?>