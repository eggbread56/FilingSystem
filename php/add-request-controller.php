<?php

    if(isset($_POST['id']) && !empty($_POST['id'])) {
        
        include 'connection2.php';
        $id = $_POST['id'];
        $uid = $_POST['uid'];
        $month = date('F');
        $day = date('d');
        $year = date('Y');
        
        $notif_sql = "INSERT INTO notifications (user_id, file_id, action, month, day, year) VALUES ($uid, $id, 'REQUEST DOWNLOAD', '$month', $day, $year)";
        $notif_sql_query = mysqli_query($conn, $notif_sql);
        
        $sql = "INSERT INTO file_requests (file_id, user_id, month, day, year, status) VALUES ($id, $uid, '$month', $day, $year, 0)";
        $sql_query = mysqli_query($conn, $sql);
        if($sql_query) {
            echo "success";
        }else {
            echo "fail";
        }
    }
?>