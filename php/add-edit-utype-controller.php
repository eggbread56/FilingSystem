<?php
    if(isset($_POST['add_user_type_submit']) && !empty($_POST['add_user_type_submit'])) {
        
        $id = mysqli_real_escape_string($conn, $_POST['uid']);
        $utype = mysqli_real_escape_string($conn, $_POST['user-type']);
        
        if($id == 0) {
            $sql = "INSERT INTO user_types (description) VALUES ('$utype')";
            $sql_query = mysqli_query($conn, $sql);
            if($sql_query) {
                console_log('Add User Type Successful');
                header('location:index.php#admin/user-types');
            }else {
                console_log('Add User Type Unsuccessful');
            }
        }else {
            $sql = "UPDATE user_types SET description = '$utype' WHERE id = $id";
            $sql_query = mysqli_query($conn, $sql);
            if($sql_query) {
                console_log('Edit User Type Successful');
                header('location:index.php#admin/user-types');
            }else {
                console_log('Edit User Type Unsuccessful');
            }
        }
    }
?>