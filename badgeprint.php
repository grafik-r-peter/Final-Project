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

			// echo $badgebase[0].$badgeColor[0];


			$output = '
					<div class="col-5 my-3 mx-0 px-3" id="badgeTarget">
 

              <div class = "badgevert">
					<?php 
					for ($x = 0; $x <= 15; $x++) {
					   ?> 
			  <div class="badgeline">

			   	    <div><img src="assets/img/1st_badge_gold.png"></div>
			   	    <div><img src="assets/img/1st_badge_silver.png"></div>
			   	    <div><img src="assets/img/1st_badge_bronze.png"></div>
			   	    <div> <input type="checkbox" name="1st" value="added"> </div>

			  </div> 

			  <div class="radioline">

				
			  		<div class="radioheight"><input type="radio" name="choice" value="gold"></div>
			  		<div class="radioheight"><input type="radio" name="choice" value="silver"></div>
			  		<div class="radioheight"><input type="radio" name="choice" value="bronze"></div>
			  	

			  </div><?php
} 
?>
              </div>


		</div>';

		
		} else
		{
			echo 'No data found';
		}
		
		mysqli_close($conn);
?>

