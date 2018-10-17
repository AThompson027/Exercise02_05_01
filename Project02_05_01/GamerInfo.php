<?php
// directory targeted
    $dir = "./game";
// if the directory is a directory and if the file is not opened then there will be an error
    if(is_dir($dir)){
        // File name for the data to be entered to
        $fileName = "TheGamers.txt";
        $fileHandle = fopen($dir . "/" . $fileName, "rb");
                    if ($fileHandle === false) {
                echo "There was an error reading file \"$fileName\".<br>\n";
            }
        // while the end of "fileName" is not reached then it will get the lines of data from the inputs and put them into the txt file. fgets when called will go down the line until it reaches the end of the file.
        else{
            while(!feof($fileName)){
                $name = fgets($fileHandle);
                // the HTML entities function changes the characters into HTML entities so it will not confuse the code
                // EXAMPLE: > = greater than OR a tag.
                echo "Name: " . htmlentities($name) ."<br>\n";
                $password = fgets($fileHandle);
                echo "Password: " . htmlentities($password) ."<br>\n"; 
                $username = fgets($fileHandle);
                echo "Username: " . htmlentities($username). "<br>\n";
                $email = fgets($fileHandle);
                echo "Email: " . htmlentities($email). "<br>\n";
                $age = fgets($fileHandle);
                echo "Age: " . htmlentities($age). "<br>\n";
                $screenName = fgets($fileHandle);
                echo "Screenname: " . htmlentities($screenName). "<br>\n";
                $comment = fgets($fileHandle);
                while($comment !== ""){ //while the "pointer" is not at the end of fileName
                    $comment .= fgets($fileHandle);
                }
                echo htmlentities($comment);
                echo "<hr>\n";
            }
        }
        // closes the file
        fclose($fileHandle);
    }
    ?>