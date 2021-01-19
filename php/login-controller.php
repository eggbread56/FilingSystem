<?php
    if(isset($_POST['login_submit'])) {
        
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = md5($password);
        
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $sql_query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($sql_query);
        $num_rows = mysqli_num_rows($sql_query);
        if($num_rows > 0) {
            console_log('Login Successful');
            session_start();
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['fragment'] = "";
            $_SESSION['location'] = "";
            $_SESSION['view_file'] = "";
            $_SESSION['role'] = $row['user_type_id'];
            if($row['user_type_id'] == 1) {
                header('location:index.php');
            }else {
                header('location:index.php#files/manage');
            }
        }else {
            console_log('Login Unsuccessful');
            header('location:login.php?fail=1');
        }
    }
?>