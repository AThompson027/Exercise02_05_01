<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>File Uploader</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <script src="modernizr.custom.65897.js"></script>
</head>
<body>
    <h2>File Uploader</h2>
    <?php
//    variables
    $dir = ".";
    
    // if the upload input is set, and if the files input is set, then the file that is selected will upload to the second dimensional array
    if (isset($_POST['upload'])) {
        if (isset($_FILES['newFile'])) {
            if(move_uploaded_file($_FILES['newFile']['tmp_name'], $dir . "/" . $_FILES['newFile']['name']) === true) {
//                chmod($dir . "/" . $_FILES['newFile']['name'], 0644);
                echo "File \"" . htmlentities($_FILES['newFile']['name']) . "\"successfully uploaded. <br>\n";
               // else it will echo a string indicating that there was an error uploading the file indicated by the user  
        } else {
            echo "There was an error uploading \"" . htmlentities($_FILES['newFile']['name']) . "\" . <br>\n";
        }
    }
    }
    ?>
    <!-- form to allow the user to choose a file to upload. -->
    <form action="FileUpload.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="25000">File to upload: <input type="file" name="newFile"><br>
    (25,000 byte limit)<br>
    <input type="submit" name="upload" value="Upload the File"><br>
    </form>
</body>
</html>