<?php
        
        //global variable (the directory used)
        $dir = "../Exercise02_01_01";
        //if a file is set in the input value by the user, then it will check for slashes in the data inputed by the user.
        if (isset($_GET['fileName'])) {
            $fileToGet = $dir . "/" . stripslashes($_GET['fileName']);
            // if the file that is input by the user is readable then there will be not error message and the page will be true
            if (is_readable($fileToGet)) {
                // these headers gives us permission to download files and gives us security
                header("Content-Description: File Transfer");
                header("Content-Type: application/force-download");
                header("Content-Disposition: attachment; filename=\"" . $_GET["fileName"] . "\"");
                header("Content-Transfer-Encoding: base64");
                header("Content-Length: " . filesize($fileToGet));
                readfile($fileToGet);
                $errorMessage = "";
                $showErrorPage = false;
                // if it is not readable then it will display an error message
            } else {
                $errorMessage = "Cannot read \"$fileToGet\"";
                $showErrorPage = true;
            }
            // if there is no file set then there will be an error message inidicating that there is no file set
        } else {
            $errorMessage = "No filename specified";
            $showErrorPage = true;
        }
        if ($showErrorPage) {
            ?>
            
<!doctype html>


<html>
   <head>
    <title>File Downloader Error</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale-1.0">
    <script src="modernizr.custom.65897.js"></script>
    </head>
    
    <body>
<!-- htmlentities() is to help protect from script injections from the data the user inputs 
   This also protect us from breaking our own code. Any string in the html entities parenthesis will be analyzed for problematic characters-->
    <p>There was an error downloading "<?php echo htmlentities($_GET['fileName']);?>"</p>
    <p><?php echo htmlentities($errorMessage);?></p>  
    </body>
</html>
<?php
}
?>


