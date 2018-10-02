<!doctype html>


<html>
   <head>
    <title>View Files 2</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale-1.0">
    <script src="modernizr.custom.65897.js"></script>
    </head>
    
    <body>
    <h2>View Files 2</h2>
    <?php
        // this code pulls out the Exercise02_01_01 folder files. 
    $dir = "../Exercise02_01_01";
        //Scandir Lists files and directories inside the specified path
    $dirEntries = scandir($dir);
        // used a foreach instead of a while statement compared to ViewFiles.php
    foreach ($dirEntries as $entry) {
        if (strcmp($entry, '.') !== 0 && strcmp($entry, '..') !== 0) {
            echo "<a href=\"$dir/$entry\">$entry</a><br>\n";
        }
    }
        ?>
    
    </body>
</html>


