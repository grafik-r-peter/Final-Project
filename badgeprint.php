<?php

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "alumni_project";

		$id = $_POST["userId"];

		$conn = mysqli_connect($servername, $username, $password, $dbname);

		$sql = "SELECT * FROM student_profile JOIN students_results on student_profile.profile_id = students_results.fk_student_profileID JOIN badges on students_results.fk_badgeID = badges.badgeID WHERE profile_id = {$id}";

		$result = mysqli_query($conn, $sql);

		$badgeId='';
		$badgeColor='';

		if(mysqli_num_rows($result) > 0)
		{

			while($row = mysqli_fetch_array($result))
		{
			  $badgeId .= $row[12]." ";
			  $badgeColor .= $row[14]." ";
		}

		  
		
			$badgebase = (explode(" ",$badgeId));
			$badgeColor = (explode(" ",$badgeColor));

			echo $badgebase[0].$badgeColor[0];


			$output = 

		
		} else
		{
			echo 'No data found';
		}
		
		mysqli_close($conn);
?>

