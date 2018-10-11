<!doctype html>


<html>
   <head>
    <title>Visitor Comments</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale-1.0">
    <script src="modernizr.custom.65897.js"></script>
    </head>
    
    <body>
    <h2>Visitor Comments</h2>
    <?php
        //global variables
        //directory targeted
        $dir = "./comments";
        
        if (is_dir($dir)) {
            //if the user has pressed submit (save)
            if (isset($_POST['save'])) {
                //if the user has not inputted their data(name) then it will echo an error message
                if (empty($_POST['name'])) {
                    echo "Unknown Visitor\n";
                } else {
                    // else then the data(name) will be displayed on the page including other data
                    $saveString = stripslashes($_POST['name']) . "\n";
                    $saveString .= stripslashes($_POST['email']) . "\n";
                    //shows date in "r" format
                    $saveString .= date('r') . "\n";
                    $saveString .= stripslashes($_POST['comment']) . "\n";
                    //debug
                    echo "\$saveString: $saveString<br>";
                    //Shows the time in microtime
                    $currentTime = microtime();
                    //debug
                    echo "\$currentTime: $currentTime<br>";
                    //breaks the string into an array
                    $timeArray = explode(" ", $currentTime);
                    // this dumps the variable content into another variable
                    echo var_dump($timeArray) . "<br>";
                    //This will show the whole number with the decimal
                    $timeStamp = (float)$timeArray[1] + (float)$timeArray[0];
                    //debug
                    echo "\$timeStamp: $timeStamp<br>";
                    $saveFileName = "$dir/Comment.$timeStamp.txt";
                    //debug
                    echo "\$saveFileName: $saveFileName<br>";
                    //if there is contents in the file (file name + data) then it will be saved in the foler
                    if (file_put_contents($saveFileName, $saveString) > 0) {
                       echo "File \"" . htmlentities($saveFileName) . "\successfully saved.<br>\n";
                        // else (no content) it will save that there was an error
                    } else {
                        echo "There was an error writing \"" . htmlentities($saveFileName) . "\".<br>\n";
                    }
                   }
            }
        } else {
            // this makes a directory from the value of "$dir"
            mkdir($dir);
            chmod($dir, 0757);
        }
     
        ?>
    <form action="VisitorComments.php" method="post">
        Your name: <input type="text" name="name"><br>
        Your email: <input type="email" name="email"><br>
        <textarea name="comment" rows="6" cols="100"></textarea><br>
        <input type="submit" name="save" value="Submit Your Comment">
    </form>
    </body>
</html>
