<html>
<head>
    <script src="modernizr.custom.65897.js"></script>
    <link href="game.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kodchasan" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kodchasan|Mali" rel="stylesheet">
    
</head>
<body>
    <?php
    //global variable
    $errormsg = "";
    //directory targetted
    $dir = "./game";
    // if the directory is a directory and if all the fields are empty then it will display an error message
    if(is_dir($dir)){
        if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['name']) || empty($_POST['screenname']) || empty($_POST['age']))  {
            $errormsg .= "<h3>The required fields are left blank</h3><br>\n";
        }
        // else will take off malicious slashes in data and also and open the file
        else {
            $string = stripslashes($_POST['name']) . ";";
            // this makes the password into hash for security reasons! (I'm extra!!)
            $password = md5($_POST['password']);
            $string .= $password . ";";
            $string .= stripslashes($_POST['username']) . ";";
            $string .= stripslashes($_POST['email']) . ";";
            $string .= stripslashes($_POST['age']) . ";";
            $string .= stripslashes($_POST['screenname']) . ";";
            $string .= stripslashes($_POST['comments']) . ";";
            //This is the file name that the data will be entered to
            $filename = "$dir/TheGamers.txt";
            // write and binary only
            $filehandle = fopen($filename, "ab");
            // if the file is not open then there is an error message indicating that the file was failed to be created
            if($filehandle === false){
                $errormsg .= "<h3>There was an error creating $filename</h3><br>\n";
            }
            //else will lock the file and then if there is info in the file it will indicate that is was successful
            else{
                if(flock($filehandle, LOCK_EX)) {
                    if(fwrite($filehandle, $string) > 0){
                        $errormsg .= "<h4>Successfully wrote to $filename</h4><br>\n";
                    }
                    // else will indicate failure
                    else{
                        $errormsg .= "<h3>There was an error writing to $filename</h3><br>\n";
                    }
                    // this unlocks the file
                    flock($filehandle, LOCK_UN);
                }
                // if the file does not lock then is will show an error
                else{
                    $errormsg .= "<h3>There was an error locking $filename</h3><br>\n";
                }
                // closes the file
                fclose($filehandle);
            }
        }   
    }
    // else will echo an error indicating that the directory does not exist, but it will create the directory for the user
    else{
        echo "<h3>Directory does not exist. Will create the file when good input is submitted</h3>\n";
        mkdir($dir);
        chmod($dir,0757);//setting up permissions of the directory. it will go to 666 in my sandbox, unfortunatly.
    }
    // if the fields in the form is empty when you press the submit button then it will display the error
    if(!empty($_POST['submit'])){
        echo $errormsg;
    }
    
    ?>
       
<!--       This is the form!!-->
        <form action="TheGame.php" method="post">
               <h1>The Game</h1>
            <label for="username">Username</label><input type="text" id="username" name="username"><br>
            <label for="password">Password</label><input type="password" id="password" name="password"><br>
            <label for="name">Full Name</label><input type="text" id="name" name="name"><br>
            <label for="email">Email</label><input type="text" id="email" name="email"><br>
            <label for="age">Age</label><input type="number" id="age" name="age"><br>
            <label for="screenname">Screenname</label><input type="text" id="screenname" name="screenname"><br>
            <label for="comments">Comments</label><textarea id="comments" name="comments"></textarea><br>
            <input name="submit" value="submit" type="submit">
        </form>
    <h1>Leaderboard</h1>
        <?php
//         $arrayvar = explode("\n", $string);
//         foreach ($arrayvar as $user) {
//             $dataarray = explode(";", $user);
//             echo $dataarray[2];
//         }
    
        if (isset($_POST["submit"]) && !empty($_POST['password']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['age']) && !empty($_POST['screenname']) && !empty($_POST['comments'])) {
            echo "<h2>" . $_POST["username"] . "</h2>";
        }
        
        
        ?>
</body>
</html>