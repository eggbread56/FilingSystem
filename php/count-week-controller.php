<?php
    
    include_once 'connection2.php';
    $month = date('F');
    $year = date('Y');
    $monday = date( 'd', strtotime( 'monday this week' ) );
    $sunday = date( 'd', strtotime( 'sunday this week' ) );
    
    $tsql = "SELECT * FROM files WHERE month = '$month' AND day >= '$monday' AND day <= '$sunday' AND year = '$year'";
    $tquery = mysqli_query($conn, $tsql);
    $trows = 0;
    if($tquery) {
        $trows = mysqli_num_rows($tquery);   
    }
    echo $trows;
?>