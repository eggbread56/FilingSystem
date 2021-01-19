<?php
    include 'connection2.php';
    if(isset($_GET['id'])) {
        
        $id = $_GET['id'];
        
        $sql = "DELETE FROM users WHERE id = $id";
        $sql_query = mysqli_query($conn, $sql);
        
        if($sql_query) {
            echo 'success';
        }else {
            echo 'fail';
        }
    }
?>