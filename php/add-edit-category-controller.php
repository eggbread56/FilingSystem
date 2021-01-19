<?php
    if(isset($_POST['add_category_submit']) && !empty($_POST['add_category_submit'])) {
        
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $category = mysqli_real_escape_string($conn, $_POST['category']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        
        if($id == 0) {
            $sql = "INSERT INTO file_types (name, description) VALUES ('$category', '$description')";
            $sql_query = mysqli_query($conn, $sql);
            if($sql_query) {
                console_log('Add Category Successful');
                $directory = "file-storage/".strtolower($category)."";
                mkdir($directory);
                header('location:index.php#files/categories');
            }else {
                console_log('Add Category Unsuccessful');
            }
        }else {
            $select_sql = "SELECT name FROM file_types WHERE id = $id";
            $select_query = mysqli_query($conn, $select_sql);
            $select_row = mysqli_fetch_assoc($select_query);
            $old_category = "file-storage/".strtolower($select_row['name'])."";
            $new_category = "file-storage/".strtolower($category)."";
            $sql = "UPDATE file_types SET name = '$category', description = '$description' WHERE id = $id";
            $sql_query = mysqli_query($conn, $sql);
            if($sql_query) {
                console_log('Edit Category Successful');
                rename($old_category, $new_category);
                header('location:index.php#files/categories');
            }else {
                console_log('Edit Category Unsuccessful');
            }
        }
    }
?>