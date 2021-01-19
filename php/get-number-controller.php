<?php
    include 'connection2.php';

    if(isset($_POST['sem'])) {
        
        $sem = $_POST['sem'];
        $year = $_POST['year'];
        
        $sql = "SELECT id, name FROM file_types";
        $query = mysqli_query($conn, $sql);
        $file_arr = array();
        while ($row = mysqli_fetch_assoc($query)) {
            $count_sql = "SELECT name FROM files WHERE file_type_id = " . $row['id'] . " AND year = $year";
            $count_query = mysqli_query($conn, $count_sql);
            $num_rows = 0;
            while ($num_rows = mysqli_fetch_assoc($count_query)) {
                
                
            }
            array_push($file_arr, $num_rows);
        }
        echo json_encode($file_arr);
    }
?>