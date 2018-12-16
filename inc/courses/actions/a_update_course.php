<?php

include '../../db_actions.php';
if($_POST) {

//-------------------------------------------------
  $rowss=$obj->fetch_records("courses");

//-----------------------------------------------------
  $course_name =$_POST['course_name'];
  $course_description =$_POST['course_description'];
  $courseID=$_POST['courseID'];
//--------------------------------------------------

  $table="courses";
  
  $params=array("course_name"=>"$course_name", "course_description"=>"$course_description");
  $where="courseID="."$courseID";
  $obj->update($table,$params,$where);
//--------------------------------------------------
?>
        <html>

    <head>

    <title>PHP CRUD  |  update course</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script><body>
        

        <h1 class='text-danger text-center'>Succcessfully Updated</h1>
        <div class=' text-center container'>
       <?php  
       echo "<a href='../action_forms/update_course.php?courseID=".$courseID."'><button type='button'class='btn btn-warning mx-1'>Back</button></a>";
       ?>

        <a href='../../../admin.php'><button type='button' class='btn btn-warning mx-1'>Home</button></a>
        </div>
      </body>
  </html>

        
        
<?php } else{
  echo "error"; 
} ?>




