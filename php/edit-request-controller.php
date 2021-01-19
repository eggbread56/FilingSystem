<?php
    if(isset($_POST['id']) && !empty($_POST['id'])) {
        
        include 'connection2.php';
        $value = $_POST['value'];
        $id = $_POST['id'];
        
        $sql = "UPDATE file_requests SET status = $value WHERE id = $id";
        $sql_query = mysqli_query($conn, $sql);
        if($sql_query) {
            echo "success";
        }else {
            echo "fail";
        }
    }

?>