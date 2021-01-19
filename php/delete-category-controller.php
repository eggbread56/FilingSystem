<?php
    include 'connection2.php';
    if(isset($_GET['id'])) {
        
        $id = $_GET['id'];
        
        $select_sql = "SELECT name FROM file_types WHERE id = $id";
        $select_query = mysqli_query($conn, $select_sql);
        $select_row = mysqli_fetch_assoc($select_query);
        
        $sql = "DELETE FROM file_types WHERE id = $id";
        $sql_query = mysqli_query($conn, $sql);
        
        
        if($sql_query) {
            $path = "../file-storage/" . strtolower($select_row['name']);
                if(is_dir($path)) {
                    rmdir($path);
                }
            echo "success";
        }else {
            echo "fail";
        }
    }
?>