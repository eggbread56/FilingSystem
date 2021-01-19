<?php
    
    include_once 'connection2.php';

    $month = date('F');
    $day = date('d');
    $year = date('Y');

    $tsql = "SELECT * FROM files WHERE month = '$month' AND day = '$day' AND year = '$year'";
    $tquery = mysqli_query($conn, $tsql);
    $trows = 0;
    if($tquery) {
        $trows = mysqli_num_rows($tquery);   
    }
    echo $trows;
?>