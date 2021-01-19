<?php
    include_once 'connection2.php';
    $users_sql = "SELECT users.id as id, users.name as name, users.username as username, user_types.description as description FROM users LEFT JOIN user_types ON users.user_type_id = user_types.id";
    $users_query = mysqli_query($conn, $users_sql);
    $user_num_row = mysqli_num_rows($users_query);
    if($user_num_row > 0) {
        echo '<table class="uk-table uk-table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Role</th>
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
            echo $row['name'];
            echo '</td>';
            echo '<td>';
            echo $row['username'];
            echo '</td>';
            echo '<td>';
            echo $row['description'];
            echo '</td>';
            echo '<td>';
            echo "<ul class='uk-iconnav'>
                <li><button uk-icon='icon: file-edit' data-id='".$row['id']."' data-type='edit-user'></button></li>
                <li><button uk-icon='icon: trash' data-id='".$row['id']."' data-type='delete-user'></button></li>
            </ul>";
            echo '</td>';
            echo '</tr>';
        }
        echo            '</tbody>
        </table>';
    }else {
        echo "<center>No File Type Available</center>";
    }
    
?>