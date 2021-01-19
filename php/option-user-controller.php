<?php

    include_once 'connection2.php';
    $utype_sql = "SELECT * FROM user_types";
    $utype_query = mysqli_query($conn, $utype_sql);
    $utype_num_row = mysqli_num_rows($utype_query);
    if($utype_num_row > 0) {
        while($row = mysqli_fetch_assoc($utype_query)) {
            echo "<option value='".$row['id']."'>";
            echo $row['description'];
            echo '</option>';
        }
    }else {
        echo "<option disabled>No User Type Available</option>";
    }
?>