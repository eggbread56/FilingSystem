<?php
    include_once 'connection2.php';
    $users_sql = "SELECT users.id as uid, users.name as uname, files.name as fname, files.id as fid, file_requests.id as id, file_requests.status as status, file_requests.month as month, file_requests.day as day, file_requests.year as year, file_types.name as ftname FROM file_requests LEFT JOIN users ON file_requests.user_id = users.id LEFT JOIN files ON file_requests.file_id = files.id LEFT JOIN file_types ON files.file_type_id = file_types.id WHERE status = 0";
    $users_query = mysqli_query($conn, $users_sql);
    $user_num_row = mysqli_num_rows($users_query);
    if($user_num_row > 0) {
        echo '<table class="uk-table uk-table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Requestor</th>
                            <th>Requesting</th>
                            <th>Document Type</th>
                            <th>Date</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody id="user-table">';
        while($row = mysqli_fetch_assoc($users_query)) {
            echo '<tr>';
            echo '<td>';
            echo $row['id'];
            echo '</td>';
            echo '<td>';
            echo $row['uname'];
            echo '</td>';
            echo '<td>';
            echo $row['fname'];
            echo '</td>';
            echo '<td>';
            echo $row['ftname'];
            echo '</td>';
            echo '<td>';
            echo $row['month'] . " " . $row['day'] . ", " . $row['year'];
            echo '</td>';
            echo '<td>';
            echo "<ul class='uk-iconnav'>
                <li><button uk-icon='icon: check' data-id='".$row['id']."' data-type='approve-request'></button></li>
                <li><button uk-icon='icon: close' data-id='".$row['id']."' data-type='decline-request'></button></li>
            </ul>";
            echo '</td>';
            echo '</tr>';
        }
        echo            '</tbody>
        </table>';
    }else {
        echo "<center>No File Requests Available</center>";
    }
    
?>