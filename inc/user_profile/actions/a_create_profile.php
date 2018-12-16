
<?php

require_once '../../db_actions.php';


 
if($_POST) {
    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $description = $_POST['description'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $portfolio = $_POST['portfolio'];
    $job_status = $_POST['job_status'];

    $fields=array("first_name"=>$fname,
                  "last_name"=>$lname,
                  "jobs_status"=>$job_status,
                  "description"=>$description,
                  "portfolio"=>$portfolio,
                  "phone_number"=>$phone);
    $obj->insert_record("student_profile",$fields);
}
 
?>