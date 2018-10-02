<!doctype html>


<html>
   <head>
    <title>View Files</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale-1.0">
    <script src="modernizr.custom.65897.js"></script>
    </head>
    
    <body>
    <h2>View Files</h2>
    <?php
        // this code pulls out the Exercise02_01_01 folder files. 
    $dir = "../Exercise02_01_01";
        // this opens the directory/folder
    $openDir = opendir($dir);
    while ($curFile = readdir($openDir)) {
        //string comparing the $curFile value and the period (.) which is not equal to 0 and if the string comparing of the $curFile value and the double period (..) which is not equal to 0. It will echo an href to link the files inside the Exercise.
        if (strcmp($curFile, '.') !== 0 && strcmp($curFile, '..') !== 0) {
            echo "<a href=\"$dir/$curFile\">$curFile</a><br>\n";
        }
    }
        // this closes the directory
    closedir($openDir);
        ?>
    
    </body>
</html>


