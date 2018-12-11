
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

?>