 <?php
    include 'auth-page-controller.php';
    $select_files = "SELECT files.id as fid, files.name as fname, files.file_type_id as ftypeid, directory, files.month, files.day, files.year, file_types.id as ftid, file_types.name as ftname, file_requests.status, file_requests.id as rid, file_requests.user_id as uid, users.user_type_id as utid FROM files LEFT JOIN file_types on files.file_type_id = file_types.id LEFT JOIN file_requests ON file_requests.file_id = files.id LEFT JOIN users ON file_requests.user_id = users.id ORDER BY rid DESC";

    $select_files_query = mysqli_query($conn, $select_files);
    $num_rows_files = mysqli_num_rows($select_files_query);
    $sem = "";
    $firstSem = ['August','September','October','Novembe','December'];
    $secondSem = ['January','February','March','April','May'];
    $summer = ['June','July'];
    $download_userid;

    if($num_rows_files > 0) {
       $temp = 0;
        while($row = mysqli_fetch_assoc($select_files_query)) {
            $file_name = $row['fname'];
            $file_arry = explode(".", $file_name);
            if($row['uid'] == NULL || $row['uid'] == "") { $download_userid = $_SESSION['id'];} else { $download_userid = $row['uid'];}
            $select_download = "SELECT * FROM downloaded WHERE user_id = " . $download_userid . " AND file_id = " . $row['fid'] . " LIMIT 1";
            $download_query = mysqli_query($conn, $select_download);
            $download_row = mysqli_num_rows($download_query);
            if($row['uid'] == $_SESSION['id'] || $row['uid'] == NULL || ($row['utid'] != 1 && $_SESSION['role'] == 1) || $row['uid'] != $_SESSION['id']) {
                if($temp != $row['fid']) {
                    $temp = $row['fid'];
                    echo "<li class='file_row'>
                            <article class='uk-comment uk-comment-primary uk-visible-toggle'>
                                <header class='uk-comment-header uk-position-relative'>
                                    <div class='uk-grid-medium uk-flex-middle' uk-grid>
                                        <div class='uk-width-auto'>
                                            <img class='uk-border-circle' src='images/files.png' width='80' height='80' alt=''>
                                        </div>
                                        <div class='uk-width-expand'>
                                            <h4 class='uk-comment-title uk-margin-remove'>".$row['fname']."</h4>
                                            <p class='uk-comment-meta uk-margin-remove-top' style='margin-bottom:0px'>Uploaded:  ".$row['month']." ".$row['day'].", ".$row['year']."</p><p class='uk-comment-meta uk-margin-remove-top' style='margin-bottom:0px'>Semester: ";
                    if(in_array($row['month'],$firstSem)) {
                        echo "First Semester";
                    }else if(in_array($row['month'],$secondSem)) {
                        echo "Second Semester";
                    }else {
                        echo "Summer";
                    }
                    echo "</p><p class='uk-comment-meta uk-margin-remove-top'><a class='uk-link-reset' href='#'>File Type: ".$row['ftname']."</a></p>
                                        </div>
                                    </div>
                                </header>
                                <div class='uk-comment-body'>
                                    <ul class='uk-subnav uk-subnav-divider' uk-margin>";
                          if($file_arry[1] == "pdf") {
                              echo "<li><button class='uk-button uk-button-primary' style='padding: 0px;background-color: #ffffff00;color: #1e87f0;' data-type='view-file' data-id='".$row['fid']."' data-file='".$row['fname']."'>View</button></li>";
                          }
                    if($auth != "restricted") {
                        echo "<li><a class='uk-text-primary' href='php/download-file-controller.php?file=".$row['fname']."&link=".$row['directory']."' data-file='".$row['fname']."' data-link='".$row['directory']."'>Download</a></li>
                            <li><button class='uk-button uk-button-danger' style='padding: 0px;background-color: #ffffff00;color: #f0516f;' data-type='delete-file' data-id='".$row['fid']."'>Delete</button></li>";
                    }else {

                        if($row['status'] == NULL || $row['status'] == 2 || $row['status'] == 3) {
                            echo "<li><button class='uk-button uk-button-primary' style='padding: 0px;background-color: #ffffff00;color: #1e87f0;' data-type='request-file' data-id='".$row['fid']."' data-file='".$row['fname']."' data-uid='".$_SESSION['id']."'>Request</button></li>";
                            
                            if($download_row > 0) {
                                echo "<li><p class='uk-text-success' style='margin-bottom:0px'>DOWNLOADED</p></li>";
                            }else if($row['status'] == 3) {
                                echo "<li><p class='uk-text-danger' style='margin-bottom:0px'>Declined</p></li>";
                            }
                        }else if ($row['uid'] != $_SESSION['id']) {
                            echo "<li><button class='uk-button uk-button-primary' style='padding: 0px;background-color: #ffffff00;color: #1e87f0;' data-type='request-file' data-id='".$row['fid']."' data-file='".$row['fname']."' data-uid='".$_SESSION['id'].">Request</button></li>";
                        }else if($row['status'] == "0") {
                            echo "<li><p class='uk-text-success' style='margin-bottom:0px'>PENDING REQUEST</p></li>";
                        }else if($row['status'] == "1") {
                            echo "<li><a class='uk-text-primary' id='aaf' href='php/download-file-controller.php?file=".$row['fname']."&link=".$row['directory']."&uid=".$_SESSION['id']."&rid=".$row['rid']."' data-file='".$row['fname']."' data-link='".$row['directory']."'>Download</a></li>";
                        }
                    }
                                echo "</ul>


                            </div>
                        </article>
                    </li>";
                }
            }
        }
    }else {
        echo "<center>No File Available</center>";
    }
?>