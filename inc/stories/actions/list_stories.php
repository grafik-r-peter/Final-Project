
<!-- File for joining Tables for the Content Page stories.php -->

<?php 

include "inc/db_actions.php";


$tables=array("student_profile", "stories", "student_skills", "skills", "images");
$rows="*";
$join=array("student_profile.profile_id = stories.fk_profileID", 
			"student_profile.profile_id = student_skills.fk_student_profileID",
			"student_skills.fk_skillsID = skills.skillsID",
			"stories.storyID = images.fk_storiesID"

			);

$rows=$obj->join_tables($tables,$rows,$join);

$data=array();
foreach ($rows as $row) {
   $data[$row['profile_id']]["profile_id"] = $row["profile_id"];	
   $data[$row['profile_id']]["first_name"] = $row["first_name"];
   $data[$row['profile_id']]["last_name"] = $row["last_name"];
   $data[$row['profile_id']]["image_url"] = $row["image_url"];
   $data[$row['profile_id']]["story_content"] = $row["story_content"];
   $data[$row['profile_id']]["story_teaser"] = $row["story_teaser"];
   $data[$row["profile_id"]]["skills"][$row["skillsID"]]=array("skills"=>$row["skill"]);
}


?>
