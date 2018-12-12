<?php
$tables=array("student_profile", "student_skills", "skills", "enrollment_table", "courses"  );
$rows="*";
$join=array("student_profile.profile_id = student_skills.fk_student_profileID",
			"student_skills.fk_skillsID = skills.skillsID",
			"student_profile.profile_id = enrollment_table.fk_student_profileID",
			"enrollment_table.fk_courseID = courses.courseID",
			);

$rows=$obj->join_tables($tables,$rows,$join);

$data=array();
foreach ($rows as $row) {
   $data[$row['profile_id']]["profile_id"] = $row["profile_id"];	
   $data[$row['profile_id']]["first_name"] = $row["first_name"];
   $data[$row['profile_id']]["last_name"] = $row["last_name"];
   $data[$row['profile_id']]["jobs_status"] = $row["jobs_status"]; 
   $data[$row['profile_id']]["profile_picture"] = $row["profile_picture"];
   $data[$row["profile_id"]]["skills"][$row["skillsID"]]=array("skills"=>$row["skill"]);
   $data[$row["profile_id"]]["courses"][$row["courseID"]]=array("courses"=>$row["course_name"]);   
}


// 	$servername = "localhost";
// 	$username = "root";
// 	$password = "";
// 	$dbname = "alumni_project";

// 	$conn = mysqli_connect($servername, $username, $password, $dbname);

// 	$sql = "SELECT username, email, user_id 
// 			FROM users 
// 			WHERE username 
// 			LIKE '%".$_POST["search"]."%'";
// 	$result = mysqli_query($conn, $sql);

// 	$output='';

// 	if(mysqli_num_rows($result) > 0)
// 	{


// 		while($row = mysqli_fetch_array($result))
// 		{
// 			$output .= "<tr>";
// 			$output .= "<td>".$row[0]."</td> <td>".$row[1]."</td>"."<td><a href='edit.php?id=".$row[2]."' role='button' class='btn btn-warning mx-1 btn-sm px-3'>Edit</a> <button type='button' class='btn btn-danger btn-sm deletebutton' id='".$row['user_id']."'>delete</button> </td>";
// 			$output .= "</tr>";
// 		}
// 		echo $output;
// 	}
// 	else
// 	{
// 		echo 'No data found';
// 	}
	
// 	mysqli_close($conn);
// ?>