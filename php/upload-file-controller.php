<?php
    if(isset($_FILES['files']['name']) && !empty($_FILES['files']['name'])) {
        $counter = 0;
        $result = "";
        $size = count($_FILES['files']['name']);
        while($counter < $size) {
            $filename = basename($_FILES['files']['name'][$counter]);
            $directory = "file-storage/temp";
            $target_file = "../" .$directory . "/" . $filename;

            if (!file_exists($target_file)) {

                if(move_uploaded_file($_FILES['files']['tmp_name'][$counter], $target_file)) {
                    if($counter == 0) {
                        $result = $_FILES['files']['name'][$counter];
                    }else {
                        $result += "," . $_FILES['files']['name'][$counter];
                    }
                }
            }
            $counter++;
        }
        echo $result;
    }
?>