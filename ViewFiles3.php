<!doctype html>


<html>
   <head>
    <title>View Files 3</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale-1.0">
    <script src="modernizr.custom.65897.js"></script>
    </head>
    
    <body>
    <h2>View Files 3</h2>
    <?php
        // this code pulls out the Exercise02_01_01 folder files. 
    $dir = "../Exercise02_01_01";
        //Scandir Lists files and directories inside the specified path
    $dirEntries = scandir($dir);
        echo "<table border='1' width='100%'>";
        // take any string data that we might have into an entity character "&ldquo;"
        echo "<tr><th colspan='4'>Directory Listing for <strong>" . htmlentities($dir) . "</strong></th></tr>\n";
        echo "<tr>";
        echo "<th><strong><em>Name</em></strong></th>";
        echo "<th><strong><em>Owner</em></strong></th>";
        echo "<th><strong><em>Permissions</em></strong></th>";
        echo "<th><strong><em>Size</em></strong></th>";
        echo "</tr>\n";
        // used a foreach instead of a while statement compared to ViewFiles.php
    foreach ($dirEntries as $entry) {
        if (strcmp($entry, '.') !== 0 && strcmp($entry, '..') !== 0) {
            $fullEntryName = $dir . "/" . $entry;
            echo "<tr><td>";
            if (is_file($fullEntryName)) {
                echo "<a href=\"$fullEntryName\">$fullEntryName</a><br>\n";
            } else {
                echo htmlentities($entry);
            }
             if (is_file($fullEntryName)) {
                 $perms = fileperms($fullEntryName);
                 $perms = decoct($perms % 01000);
                 echo "</td><td align='center'>0$perms";
                 echo "</td><td align='right'>" . number_format(filesize($fullEntryName), 0) . "bytes";
             }
            echo "</td></tr>";
        }
    }
        echo "</table>";
        ?>
    
    </body>
</html>


