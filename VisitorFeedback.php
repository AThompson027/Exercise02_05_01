<!doctype html>


<html>
   <head>
    <title>Visitor Feedback 2</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale-1.0">
    <script src="modernizr.custom.65897.js"></script>
    </head>
    
    <body>
    <h2>Visitor Feedback 2</h2>
    <?php
        //global variable
        //directory targeted 
        $dir = "./comments";
        
        //if the directory is $dir then it will scan the directory and display all the comments (feedback) that the user has given to us from the /comments directory
         if (is_dir($dir)) {
             $commentFiles = scandir($dir);
             foreach ($commentFiles as $fileName) {
                 if ($fileName !== "." && $fileName !== "..") {
                     echo "From <strong>$fileName</strong><br>";
                     echo "<pre>\n";
                     // reads the files and sends the data to the specified page
                     readfile($dir . "/" . $fileName);
                     echo "</pre>\n";
                     echo "<hr>\n";
                 } 
             }
             // else will display an error message
         } else {
             echo "Folder \"$dir\" does not exist.<br>\n";
         }
        ?>
    
    </body>
</html>


