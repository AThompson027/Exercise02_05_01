<html>
  <head>
      <title>Example</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale-1.0">
    <script src="modernizr.custom.65897.js"></script>
  </head>
   <body>
    <?php
    $dir = ".";
    $saveFileName= "./TheGamers.txt";
    $saveString = "";
    $dataArray = array();
    
     function displayText($message) {
         echo "<script>alert(\"$message\")</script>";
     }
    if (is_dir($dir)) {
        if (isset($_POST['save'])) {
            if (empty($_POST['username'])) {
                displayAlert("Unknown User");
            }
            else {
                $dataArray[] =
                    stripslashes($_POST['username']);
                $dataArray[] =
                    md5(stripslashes($_POST['password']));
                $dataArray[] =
                    stripslashes($_POST['name']);
                $dataArray[] =
                    stripslashes($_POST['email']);
                $dataArray[] =
                    stripslashes($_POST['screenname']);
                $dataArray[] =
                    stripslashes($_POST['comments']);
                $saveString = implode(";",$dataArray);
                $saveString .= '/n';
                //debug
                echo "\$saveString = $saveString<br>";
                $fileHandle = fopen($saveFileName, "a");
                if ($fileHandle === false) {
                    displayAlert("There was an error creating $saveFileName");
                } else {
                    if (flock($fileHandle, LOCK_EX)) {
                        if (fwrite($fileHandle,$saveFileName) > 0) {
                            displayAlert("Successfully wrote to file $saveFileName.");
                        } else {
                            displayAlert("There was an error writing to $saveFileName");
                        }
                        flock($fileHandle, LOCK_UN);
                    } else {
                      displayAlert("There was an error locking $saveFileName for writing");  
                    }
                    fclose($fileHandle);
                }
            }
        }
    }
    ?>
    
<h1>The Game</h1>
<form method="post">
    <label for="username">Username</label><input type="text" id="username" name="username"><br>
    <label for="password">Password</label><input type="password" id="password" name="password"><br>
    <label for="name">Full Name</label><input type="text" id="name" name="name"><br>
    <label for="email">Email</label><input type="text" id="email" name="email"><br>
    <label for="age">Age</label><input type="number" id="age" name="age"><br>
    <label for="screenname">Screenname</label><input type="text" id="screenname" name="screenname"><br>
    <label for="comments">Comments</label><textarea id="comments" name="comments"></textarea><br>
    <input name="save" value="submit" type="submit">
</form>
</body>
</html>