<?php
    include 'connection2.php';
    if(isset($_POST['id'])) {
        
        $id = $_POST['id'];
        $sql = "DELETE FROM notifications WHERE id = $id";
        $sql_query = mysqli_query($conn, $sql);
        
        if($sql_query) {
            echo 'success';
        }else {
            echo 'fail';
        }
    }
?>