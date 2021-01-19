<?php
    include 'connection2.php';
    if(isset($_GET['id'])) {
        
        $id = $_GET['id'];
        
        $sql = "SELECT name, user_type_id, username, id FROM users WHERE id = $id";
        $sql_query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($sql_query);
        
        echo json_encode($row);
    }
?>