<?php

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "alumni_project";

		$conn = mysqli_connect($servername, $username, $password, $dbname);

		$sql = "SELECT username, email, user_id FROM users WHERE username LIKE '%".$_POST["search"]."%'";
		$result = mysqli_query($conn, $sql);

		$output='';

		if(mysqli_num_rows($result) > 0)
		{


echo "<option>".$row['username']."  ".$row['email']."</option>";

			while($row = mysqli_fetch_array($result))
			{
				$output .= "<option value='".$row[2]."'>".$row[0]."  ".$row[1]."</option>";
			}
			echo $output;
		}
		else
		{
			echo 'No data found';
		}
		
		mysqli_close($conn);
?>