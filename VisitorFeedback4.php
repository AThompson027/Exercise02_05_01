<!doctype html>


<html>
   <head>
    <title>Visitor Feedback 4</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale-1.0">
    <script src="modernizr.custom.65897.js"></script>
    </head>
    
    <body>
    <h2>Visitor Feedback 4</h2>
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
                     // opens the current file and opens it in "rb" mode (read & binary)
                     $fileHandle = fopen($dir . "/" . $fileName, "rb");
                     // if the file does not open then it will display an error message
                     if ($fileHandle === false) {
                         echo "There was an error reading file \"$fileName\".<br>\n";
                     } else {
                         // "file get string" read everything in the file up to a new line
                         $from = fgets($fileHandle);
                          echo "From: " . htmlentities($from) . "<br>\n";
                         echo "hr>\n";
                          $email = fgets($fileHandle);
                         echo "Email: " . htmlentities($email) . "<br>\n";
                        $date = fgets($fileHandle);
                        echo "Date: " . htmlentities($date) . "<br>\n";
                         $comment = "";
                         while(!feof($fileHandle)) {
                             echo htmlentities($comment) . "<br>\n";
                         }
                         echo "hr>\n";
                         fclose($fileHandle);
                     }
    
//                     
//                     $commentLines = count($comments);
//                     // the 3 means that it will display the 3rd element in the array which is the comment the user inputed
//                     for ($i = 3; $i < $commentLines; $i++) {
//                         echo htmlentities($comments[$i]) . "<br>\n";
//                     }
             }
                 }
         }
             // else will display an error message
//          else {
//             echo "Folder \"$dir\" does not exist.<br>\n";
//         }
        ?>
    
    </body>
</html>


