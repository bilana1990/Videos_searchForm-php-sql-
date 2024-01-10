<?php
include ("config.php");
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>play videos page</title>
    <style media="screen">
        video{
            float:left;
        }
        </style>
</head>
<body>
    <div>
        <?php
        $fetchVideos=mysqli_query($con, "SELECT * FROM videos ORDER BY id DESC");
        while($row=mysqli_fetch_assoc($fetchVideos))
        {
            $location=$row['location'];

            echo "<div>";
            echo "<video src='".$location."' controls width='500px' height='300px'>";
            echo "</div>";
        }
        ?>

        <a href="index.php">Home</a>
    </div>
    
</body>
</html>