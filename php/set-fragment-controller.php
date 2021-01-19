<?php
    session_start();
    if(isset($_GET['fragment'])) {
        $_SESSION['fragment'] = $_GET['fragment'];
        $_SESSION['location'] = $_GET['loc'];
        $path = $_GET['addrs'];
        header("location:../index.php#".$path."");
    }
?>