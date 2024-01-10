<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>videos uploader</title>
    <?php
    include("config.php");

    if (isset($_POST['btn_upload'])){
        $maxsize=2086282747 ;// 5mb  5242880

        

        $name=$_FILES['file']['name'];
        $target_dir="videos/";
        $target_file=$target_dir . $_FILES["file"]["name"];

        // select file type
        $videoFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // valid file extension
        $extensions_arr=array("mp4","mp3","ogg","avi","3gp","mov","mpeg","mp4v");

        // check extension
        if(in_array($videoFileType, $extensions_arr))
        {
            // check file size
            if(($_FILES['file']['size']>= $maxsize) || ($_FILES["file"]['size'] == 0))
            {
                echo "file too large. file must be less then 5 mg.";
            }
            else{
                // upload
                if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
                    // insert record
                    $query="INSERT INTO videos(name,location) VALUES('".$name."','".$target_file."')";

                    mysqli_query($con,$query);

                    echo "upload successfuly";

                }
            }
           
         }   // end of if in array
            else{
                echo "invalid file extension";
        }
    }
    ?>
</head>
<body>

<form action="" method="post" enctype="multipart/form-data" style="padding-left:30%; color:red;">
    <input type='file' name='file'>
    <input type="submit" name="btn_upload" value="Upload Video / Music">
</form>
    
</body>
</html>