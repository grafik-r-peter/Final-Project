<?php
 
require_once '../../db_actions.php';

 
if($_POST) {
   $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $description = $_POST['description'];
   
 
    $id = $_POST['id'];
    $skills = $_POST['skills'];
   

    for ($i = 0; $i < count($skills); $i++) {
    
        $sql="SELECT skillsID FROM skills where skill='$skills[$i]'";
        $q=$db->query($sql);
        $row=mysqli_fetch_assoc($q);
        $skillID=$row['skillsID'];
        $arr=array("fk_student_profileID"=>$id,"fk_skillsID"=>$skillID);
        $obj->insert_record("student_skills", $arr);
    }


     $sql = "UPDATE student_profile SET first_name = '$fname', last_name = '$lname', description = '$description' WHERE profile_id = {$id}";
     $db->query($sql);


 
 
}
 
?>