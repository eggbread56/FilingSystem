<?php
    if(isset($_POST['register_submit'])) {
        
        $admin_role = 0;
        $student_sql = "SELECT * FROM user_types WHERE description = 'Student'";
        $student_query = mysqli_query($conn, $student_sql);
        $student_row = mysqli_fetch_assoc($student_query);
        $role = $student_row['id'];
        if(isset($_POST['admin_role'])) {
            $admin_role = $_POST['admin_role'];
            $role = $_POST['user_type'];
        }
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password_confirmation = $_POST['password_confirmation'];
        
        if($password == $password_confirmation) {
            
            $password = md5($password);
            $sql = "INSERT INTO users (user_type_id, name, username, password) VALUES ($role, '$name', '$username', '$password')";
            $sql_query = mysqli_query($conn, $sql);
            if($sql_query) {
                console_log('Registration Successful');
                if($admin_role == 0) {
                    header('location:register.php?success=1');
                }else{
                    header('location:index.php?add_success=1#admin/manage');
                }
            }else {
                console_log('Registration Unsuccessful');
            }
        }else {
            
            console_log('Password and Confirm Password did not match');
        }
    }
?>