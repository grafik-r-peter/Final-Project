<?php

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "alumni_project";

		$id = $_POST["userId"];
        // print_r($id);
		$conn = mysqli_connect($servername, $username, $password, $dbname);

		// print_r($id."<br>");
		$sql = "SELECT * FROM student_profile join students_results on students_results.fk_student_profileID = student_profile.profile_id JOIN badges on students_results.fk_badgeID = badges.badgeID WHERE profile_id = {$id}";



		$result = mysqli_query($conn, $sql);

		$badgeId='';
		$badgeColor='';
		$badgeImage='';
		$badgeName='';

		mysqli_num_rows($result);


			while($row = mysqli_fetch_array($result))
		{
			  $badgeId .= $row[12]." ";
			  $badgeColor .= $row[15]." ";
			  $badgeImage .= $row[14]." ";
		}

		  
			$badgeBase = (explode(" ",$badgeId));
			$badgeColors = (explode(" ",$badgeColor));
			$badgeImage = (explode(" ",$badgeImage));

            $key = ' ';
            $del_val = '';


			if (($key = array_search($del_val, $badgeBase)) !== false) {
              unset($badgeBase[$key]);
                }

            if (($key = array_search($del_val, $badgeColors)) !== false) {
              unset($badgeColors[$key]);
                }

            if (($key = array_search($del_val, $badgeImage)) !== false) {
              unset($badgeImage[$key]);
                }


			// print_r($badgeBase);
			// print_r($badgeColors);


					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "alumni_project";

					
					$conn = mysqli_connect($servername, $username, $password, $dbname);

					$sql = "SELECT * FROM badges";
		            $result = mysqli_query($conn, $sql);
		            $rows = mysqli_fetch_all($result);

		            // print_r($rows);


		            $radioname = 0;


					$titles = array("1st Week", "2nd Week", "3rd Week", "4th Week", "5th Week", "6th Week", "7th Week", "8th Week", "9th Week", "10th Week", "11th Week", "12th Week", "13th Week", "14th Week", "15th Week");


			$output = '<div class = "badgevert">';



					for ($x = 0; $x <= 42; $x=$x+3 ) {
					// foreach ($rows as $row) {

					$radioname++;
					$checked='';

					$goldcheck='';
					$silvercheck='';
					$bronzecheck='';


						foreach ($badgeBase as $badgeFound) {
							// print_r($badgeFound.' '.$x.' '.($x+1).' '.($x+2).' <br>');
							if ($badgeFound == $x || $badgeFound == ($x+1) || $badgeFound == ($x+2) ) {
								$checked='checked';
								if ($badgeFound == $x) {$goldcheck='checked';}
								if ($badgeFound == ($x+1)) {$silvercheck='checked';}
								if ($badgeFound == ($x+2)) {$bronzecheck='checked';}
						}							
					  }


			$output .= '<div class="row text-center mx-auto"> <h5 class="text-center my-0 py-0">'.$titles[$radioname-1]." - ".$rows[$x][1].'</h5> </div>
					<div class="badgeline">

			   	    <div><img src="'; $output .= $rows[$x][2]; $output .= '"></div>
			   	    <div><img src="'; $output .= $rows[$x+1][2]; $output .= '"></div>
			   	    <div><img src="'; $output .= $rows[$x+2][2]; $output .= '"></div>
			   	    <div> <input type="checkbox" '.$checked.' name="1st" value="added"> </div>

			  </div> 

			  <div class="radioline">


			  		<div class="radioheight"><input type="radio" '.$goldcheck.' name="choice'.$radioname.'" value="gold"></div>
			  		<div class="radioheight"><input type="radio" '.$silvercheck.' name="choice'.$radioname.'" value="silver"></div>
			  		<div class="radioheight"><input type="radio" '.$bronzecheck.' name="choice'.$radioname.'" value="bronze"></div>
			  	

			  </div>

			 '; 

			}

			$output .= '</div>';


		echo($output);

		
		mysqli_close($conn);
?>
