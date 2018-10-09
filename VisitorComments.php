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
            
        } else {
            // this makes a directory from the value of "$dir"
            mkdir($dir);
            chmod($dir, 0666);
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


