<?php

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "alumni_project";

		$conn = mysqli_connect($servername, $username, $password, $dbname);

		$sql = "SELECT username, email FROM users WHERE username LIKE '%".$_POST["search"]."%'";
		$result = mysqli_query($conn, $sql);

		$output='';
		if(mysqli_num_rows($result) > 0)
		{

			while($row = mysqli_fetch_array($result))
			{
				$output .= "<tr>";
				$output .= "<td>".$row[0]."</td> <td>".$row[1]."</td>"."<td><button type='button' class='btn btn-warning mx-1 btn-sm px-3'>edit</button> <button type='button' class='btn btn-danger btn-sm' onclick='confirmation()'>delete</button> </td>";
				$output .= "</tr>";
			}
			echo $output;
		}
		else
		{
			echo 'No data found';
		}
		
		mysqli_close($conn);
?>