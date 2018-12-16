
<?php 
include "../db_actions.php";
session_start();

$studentID=$_SESSION['student'];
$requestID=$_GET['id'];
$companyID=$_GET['cid'];

$params=array("request"=>"accepted");
$where="requestID=$requestID";

$obj->update("requests",$params,$where);

$where1=array("fk_userID"=>$studentID);
$rows=$obj->select_record("student_profile",$where1);

foreach($rows as $row){
$title="Information ".$row['first_name']." ".$row['last_name'];
$message="Name: ".$row["first_name"]." ".$row['last_name'].", Phone: ".$row['phone_number'].", Portfolio: ".$row['portfolio'];
$fields=array("comment"=>$message,"sender"=>$studentID,"receiver"=>$companyID,"comment_subject"=>$title,"read_msg"=>0);
$obj->insert_record("comments",$fields);


}
 ?>


    <html>

    <head>

    <title>Update Event</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script><body>
        <h1 class='text-danger text-center'>Succcessfully Updated</h1>
        <div class=' text-center container'>"
        <a href='list_requests.php'><button type='button'class='btn btn-warning mx-1'>Back</button></a>

        <a href='./../../profile.php'><button type='button' class='btn btn-warning mx-1'>Home</button></a>
        </div></body>
     </html>
