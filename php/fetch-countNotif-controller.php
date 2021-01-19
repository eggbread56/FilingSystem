<?php 
    include_once 'connection2.php';
    $sql = "SELECT count(*) as count FROM notifications";
    $qry = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($qry);
    echo $row['count'];
?>