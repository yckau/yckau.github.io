<?php
	ini_set ("display_errors", "1");
	error_reporting(E_ALL);
;
	$link = mysqli_connect("Server" , "Username", "Password", "Database");
	if (!$link) {
	    die("Cannot connect: " . mysqli_error ());
	}

	$nop = $_GET['nop'];

	$sql = "SELECT * FROM posts INNER JOIN friends ON posts.friendID = friends.friendID WHERE postID >".$nop." ORDER BY postID ASC LIMIT 3";

	$result = mysqli_query($link, $sql);


	if (mysqli_num_rows($result) > 0) {
	    // output data of each row
	    while($row = mysqli_fetch_assoc($result)) {

	    		$sql2 = "SELECT time, commContent FROM comments WHERE postID =".$row["postID"];
	    		$result2 = mysqli_query($link, $sql2);
	        	print "<div class='post'><b>".$row["name"]."</b>";
	        	if ($row["starred"] == "N"){
	        		
	        		print " <span class='star_".$row['friendID']."'><i class='far fa-star N' style='color: grey;' onclick='updateStar(".$row['friendID'].",this);'></i></span>"."<br>";
	        	} else {
	        		print " <span class='star_".$row['friendID']."'><i class='fas fa-star Y' style='color: yellow;' onclick='updateStar(".$row['friendID'].",this);'></i></span>"."<br>";
	        	}
	        	
	        	print "<div class='info'>".$row["time"]."&nbsp;&nbsp;&nbsp;&nbsp;at ".$row["location"]. "</div>";
	        	print "<p>".$row["content"]." <img src='".$row["image"]."' alt='Hello' align='top'></p>";
	        	print "<div class='cm_container'>";
	        	print "<div class='cm_area' id='post_".$row["postID"]."'>";
	        	while($row2 = mysqli_fetch_assoc($result2)) {
	        		print "<div class='cm'>You said: ".$row2["commContent"]."<br>";
	        		print "<div class='info'>".$row2["time"]."</div></div>";
	        	}
	        	print "</div>";
	        	$apple="\"apple\"";
	        	//print "<form action='#' onSubmit='test();return false'><input type='hidden' name='postID' value=".$row['postID']."><input type='text' name='content'></form><br>"."</div>";

	        	print "<form action='#' onSubmit='updateComments(".$row['postID'].");return false'><input type='hidden' name='postID' value=".$row['postID']."><input type='text'  style='margin-left: 10px; margin-top: 10px; border-radius: 3px; padding: 3px' placeholder='Write a comment here...' id='cm_".$row['postID']."'></form><br></div>";
	        	print "</div>";
	    }
	} 
	
	mysqli_close($link);
?>
