<?php
    $months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    foreach ($months as $month) {
        echo "<option value=\"" . $month . "\">" . $month . "</option>";
    }
?>