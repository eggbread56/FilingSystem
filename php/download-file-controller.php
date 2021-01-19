<?php
    if(isset($_GET['link'])) {
        include 'connection2.php';
        
        $link = $_GET['link'];
        $file = $_GET['file'];
        $uid = $_GET['uid'];
        $rid = $_GET['rid'];
        
        $sql = "SELECT file_requests.file_id as file_id, files.name as filename, file_type_id, file_types.name as file_type FROM file_requests LEFT JOIN files ON file_requests.file_id = files.id LEFT JOIN file_types ON files.file_type_id = file_types.id WHERE file_requests.id = $rid";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($query);
        
        $fid = $row['file_id'];
        $file_name = $row['filename'];
        $file_type = $row['file_type'];
        date_default_timezone_set('Asia/Manila');
        $date = date("Y-m-d H:i:s");
        
        $insert = "INSERT INTO downloaded (user_id, file_id, file_name, file_type, date) VALUES ($uid, $fid, '$file_name', '$file_type', '$date')";
        mysqli_query($conn, $insert);
        
        $delete = "DELETE FROM file_requests WHERE id = $rid";
        mysqli_query($conn, $delete);

        $dir = "../" . $link;
        $file = $dir . "/" . $file;

        if (file_exists($file)) {
            
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename='.basename($file));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            ob_clean();
            flush();
            readfile($file);
            exit;
        }
    } 
?>