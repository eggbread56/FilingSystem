<?php
    if(isset($_POST['edit_user_submit']) && !empty($_POST['edit_user_submit'])) {
 
        $name = $_POST['name'];
        $id = $_POST['id'];
        $type = $_POST['user_type'];
        $username = $_POST['username'];
        
        $sql = "UPDATE users SET name = '$name', username = '$username', user_type_id = $type WHERE id = $id";
        $sql_query = mysqli_query($conn, $sql);
        if($sql_query) {
            header("location:index.php#admin/manage");
        }else {
            echo "SOMETHING WENT WRONG";
        }
    }

?>