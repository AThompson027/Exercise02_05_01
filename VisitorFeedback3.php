<!doctype html>


<html>
   <head>
    <title>Visitor Feedback 3</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale-1.0">
    <script src="modernizr.custom.65897.js"></script>
    </head>
    
    <body>
    <h2>Visitor Feedback 3</h2>
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
                     // specificly looks in the file for new lines.. for every new line.. it will put in an array
                     $comments = file($dir . "/" . $fileName);
                     // displays the elements in the array specified
                     echo "From: " . htmlentities($comments[0]) . "<br>\n";
                     echo "Email: " . htmlentities($comments[1]) . "<br>\n";
                     echo "Date: " . htmlentities($comments[2]) . "<br>\n";
                     //  counts the elements in the array
                     $commentLines = count($comments);
                     // the 3 means that it will display the 3rd element in the array which is the comment the user inputed
                     for ($i = 3; $i < $commentLines; $i++) {
                         echo htmlentities($comments[$i]) . "<br>\n";
                     }
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


