<?php
    include 'connection2.php';
    if(isset($_GET['id'])) {
        
        $id = $_GET['id'];
        $select = "SELECT name, directory FROM files WHERE id = $id";
        $query = mysqli_query($conn, $select);
        $row = mysqli_fetch_assoc($query);
        $file = "../" . $row['directory'] . "/" . $row['name'];
        
        $sql = "DELETE FROM files WHERE id = $id";
        $sql_query = mysqli_query($conn, $sql);
        
        if($sql_query) {
            if(file_exists($file)) {
                unlink($file);
            }
            echo 'success';
        }else {
            echo 'fail';
        }
    }
?>