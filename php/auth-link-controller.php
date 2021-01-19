<?php
    $auth = "allowed";
    if(isset($_SESSION['id']) && !empty($_SESSION['id'])) {
       
        $id = $_SESSION['id'];
        $sql = "SELECT user_type_id FROM users WHERE id = $id";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($query);
        
        if($row['user_type_id'] != 1) {
            $auth = "restricted";
        }
    }
?>