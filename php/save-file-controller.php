<?php
    if(isset($_POST['type_id']) && !empty($_POST['type_id'])) {
        
        include 'connection2.php';

        $filename = $_POST['file_name'];
        $file_type = $_POST['type_id'];
        $month = $_POST['month'];
        $day = $_POST['day'];
        $year = $_POST['year'];
        
        $select_category = "SELECT name FROM file_types WHERE id = $file_type";
        $select_query = mysqli_query($conn, $select_category);
        $select_row = mysqli_fetch_assoc($select_query);
        
        $directory_temp = "file-storage/temp";
        $target_file_temp = "../" .$directory_temp . "/" . $filename;
        
        $directory = "file-storage/". strtolower($select_row['name']);
        $target_file = "../" .$directory . "/" . $filename;
        
        if (!file_exists($target_file)) {
            
            if(copy($target_file_temp, $target_file)) {
                $sql = "INSERT INTO files (name, file_type_id, directory, month, day, year) VALUES ('$filename', '$file_type','$directory','$month','$day','$year')";
                $query = mysqli_query($conn, $sql);

                if($query) {

                    echo "success";
                }else {
                    echo "DB fail";
                }
                
            }else {
                echo "upload fail";
            }
        }else {
            echo "existed";
        }
        unlink($target_file_temp);
    }
?>