<?php
if (isset($_POST['upload']) !== null || isset($_POST['upload']) !== "") {
    echo "<p>hi</p>";

        $fileName = isset($_GET['file']['name']);
        $filetmpName = isset($_GET['file']['tmp_name']);
        $fileSize = isset($_GET['file']['size']);
        $fileError = isset($_GET['file']['error']);
        $fileName = isset($_GET['file']['type']);

echo $fileName;

        $format = explode('.', $fileName);
        $formatext = strtolower(end($format));
        $allowedformat = array('jpg', 'jpeg', 'png');


        if (in_array($formatext, $allowedformat)) {
            if ($fileError === 0) {
                if ($fileSize < 5000000) {
                    $newFileName = uniqid('', true).".".$formatext;
                    $filePath = 'uploads/'.$newFileName;
                    move_uploaded_file($filetmpName, $filePath);
                    echo "Upload successful";
                    
                } else {
                    echo "File size to large for upload";
                }
            } else {
                echo "There was an error uploading your file";
            }
    
        } else {
            echo "File format not allowed", $formatext;
        }
    }else{
        echo "its not working";
    }
    
    ?>