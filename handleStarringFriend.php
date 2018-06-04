<?php
	ini_set ("display_errors", "1");
	error_reporting(E_ALL);

	$link = mysqli_connect("Server" , "Username", "Password", "Database");
	if (!$link) {
	    die("Cannot connect: " . mysqli_error ());
	}

	$friendID = $_GET['friendID'];
	$value = $_GET['value'];

	$sql = "UPDATE friends SET starred='".$value."' WHERE friendID=".$friendID;
	$result = mysqli_query($link, $sql) or die ('Error: '.mysqli_error($link));
	if ($value == "N") {
		print " <span class='star_$friendID'><i class='far fa-star N' style='color: grey;' onclick='updateStar($friendID, this);'></i></span>";
	} else {
		print " <span class='star_$friendID'><i class='fas fa-star Y' style='color: yellow;' onclick='updateStar($friendID, this);'></i></span>";
	}
	    

	mysqli_close($link);
?>
