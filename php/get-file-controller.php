<?php
    include 'connection2.php';
    if(isset($_POST['sem'])) {
        
        $sem = $_POST['sem'];
        $year = $_POST['year'];
        
        $file_arr = array();
        $label_arr = array();
        $data_arr = array();
        $months = array();
        
        if($sem == 2) {
            $months = ['January','February','March','April','May'];
        }else if($sem == 1){
            $months = ['August','September','October','Novembe','December'];
        }else if($sem == 3) {
            $months = ['June','July'];
        }
        
        $sql = "SELECT id, name FROM file_types";
        $query = mysqli_query($conn, $sql);
        
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($label_arr, $row['name']);
            $count_sql = "SELECT name, month FROM files WHERE file_type_id = " . $row['id'] . " AND year = $year";
            $count_query = mysqli_query($conn, $count_sql);
            $count = 0;
            while ($num_rows = mysqli_fetch_assoc($count_query)) {
                if(in_array($num_rows['month'],$months)) {
                    $count++;
                }
            }
            array_push($data_arr, $count);
        }
        array_push($file_arr, $label_arr);
        array_push($file_arr, $data_arr);
        echo json_encode($file_arr);
    }
?>