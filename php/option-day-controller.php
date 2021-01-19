<?php
    $today_month = (int)date('m');
    $today_year = (int)date('Y');
    $days = (int)cal_days_in_month(CAL_GREGORIAN, $today_month, $today_year);
    $temp_days = $days;
    while($days <= $temp_days && $days > 0) {
        echo "<option value=\"" . $days . "\">" . $days . "</option>";
        $days--;
    }
?>