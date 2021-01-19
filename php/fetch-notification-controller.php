<?php
    include_once 'connection2.php';
    $notif_sql = "SELECT notifications.id, notifications.action, notifications.month, notifications.day, notifications.year, users.name, files.name as fname FROM notifications LEFT JOIN users on notifications.user_id = users.id LEFT JOIN files on notifications.file_id = files.id";
    $notif_query = mysqli_query($conn, $notif_sql);
    $notif_num_row = mysqli_num_rows($notif_query);
    if($notif_num_row == 0) {
        echo "<span class='badge badge-info' id='notif_number'>";
    }else {
        echo "<span class='badge badge-danger' id='notif_number'>";
    }
    echo $notif_num_row. "</span>

            <ul class='dropdown-menu scrollable-menu dropdown-menu-left pull-left' role='menu' aria-labelledby='dropdownMenu1' id='style-1'>";
    if($notif_num_row > 0) {
        echo "<li role='presentation' id='notif_header'>
                    <a class='dropdown-menu-header'>Notifications</a>
                </li>
                <ul class='timeline timeline-icons timeline-sm' id='notif_list' style='margin:10px;width:210px'>";
        while($row = mysqli_fetch_assoc($notif_query)) {
            echo "<li class='notif' data-id='".$row['id']."'>";
            echo "<a href='#files/request' style='text-decoration:none'>";
            echo $row['name'] . " is REQUESTING TO DOWNLOAD " . $row['fname'];
            $ext = substr($row['name'], strpos($row['name'], ".") + 1);
            if($ext == "pdf") {
                echo "<span class='timeline-icon'><i class='fa fa-file-pdf-o' style='color:red'></i></span>";
            }else {
                echo "<span class='timeline-icon'><i class='fa fa-file-word-o' style='color:blue'></i></span>";
            }
            echo "<span class='timeline-date'>".$row['month']." ".$row['day'].", ".$row['year']."</span>";
            echo "</a>";
            echo "</li>";
        }
        echo "</ul>";
    }else {
        echo "<li role='presentation'>
                    <a href='#' class='dropdown-menu-header' id='notif_header'>No Notifications</a>
                </li>";
    }
    echo "</ul>";
?>