<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>search bar page</title>
</head>
<body>
	<form method="post">
		<label>search music/videos</label>
		<input type="text" name="search">
		<input type="submit" name="submit">
		
	</form>
</body>

</html>


<?php
	//set the connection
	$con=new PDO("mysql:host=localhost;dbname=videosearch",'gio bilana', 'password');


	//check the connection
	if(!$con){
		die("connection failed:" .mysqli_connect_error());
	}

	// submit the search and select from the database
	if(isset($_POST["submit"])){
		$str=$_POST["search"];
		$sth=$con->prepare("SELECT * FROM `videos` WHERE name='$str'");

		$sth->setFetchmode(PDO:: FETCH_OBJ);
		$sth->execute();

		if($row=$sth->fetch())
		{
?>
		<br>
		<table>
			<tr>
				<th>name</th>
			</tr>

			<tr>
			<td><a href="play.php"><?php echo $row->name;?></a></td>
				<!-- <td><a href="play.php"><?php echo $row->location;?></a></td> -->
		</tr>
		</table>



<?php
      }

	  else{
		echo "name does not exist.";
	  }



	}

?>

