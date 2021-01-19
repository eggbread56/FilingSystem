<?php

    include_once 'connection2.php';
    $ftype_sql = "SELECT * FROM file_types";
    $ftype_query = mysqli_query($conn, $ftype_sql);
    $ftype_num_row = mysqli_num_rows($ftype_query);
    if($ftype_num_row > 0) {
        while($row = mysqli_fetch_assoc($ftype_query)) {
            echo "<option value='".$row['id']."'>";
            echo $row['name'];
            echo '</option>';
        }
    }else {
        echo "<option disabled>No File Type Available</option>";
    }
?>