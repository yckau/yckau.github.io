<?php

	$link = mysqli_connect("Server" , "Username", "Password", "Database");
	if (!$link) {
	    die("Cannot connect: " . mysqli_error ());
	}

	$today=getdate(date("U"));
	$time =$today['month']." ".$today['mday']." ".$today['year'];

	$postID = $_GET['postID'];
	$content = $_GET['content'];

	$sql = "INSERT INTO `comments` (`postID`, `time`, `commContent`) VALUES (".$postID.",'".$time."','".$content."')";
	$result = mysqli_query($link, $sql) or die ('Error: '.mysqli_error($link));

	print "<div class='cm'>You said: ".$content. "<br><div class='info'>".$time."</div></div>";

	mysqli_close($link);
?>