<?php
    include_once 'connection2.php';
    $category_sql = "SELECT * FROM file_types";
    $category_query = mysqli_query($conn, $category_sql);
    $cat_num_row = mysqli_num_rows($category_query);
    if($cat_num_row > 0) {
        echo '<table class="uk-table uk-table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>';
        while($row = mysqli_fetch_assoc($category_query)) {
            echo '<tr>';
            echo '<td>';
            echo $row['id'];
            echo '</td>';
            echo '<td>';
            echo $row['name'];
            echo '</td>';
            echo '<td>';
            echo "<ul class='uk-iconnav'>
                <li><button uk-icon='icon: file-edit' data-id='".$row['id']."' data-type='edit'></button></li>
                <li><button uk-icon='icon: trash' data-id='".$row['id']."' data-type='delete'></button></li>
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