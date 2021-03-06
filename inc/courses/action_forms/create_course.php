<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Alumnis Of Code Factory</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="favicon.ico">
  <link rel="stylesheet" type="text/css" href="../../../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../../../assets/css/styles-global.css">

  <script src="../../../assets/js/jquery-3.3.1.min.js"></script>
  
</head>
<body>
<div class="container-fluid topbar">
  <div class="topbar-left">
    <a class="nav-link" target="_blank" href="https://www.codefactory.wien/"> www.codefactory.wien</a>
  </div>

  <div class="topbar-right">
    <a target="_blank" href="https://www.facebook.com/CodeFactoryVienna">
      <img class="logobar" src="../../../assets/img/fb.svg" alt="Logo Facebook">
    </a>
    <a target="_blank" href="https://www.instagram.com/codefactoryvienna/">
      <img class="logobar" src="../../../assets/img/ig.svg" alt="Logo Instagram">
    </a>
  </div>
</div>

<?php 
ob_start();
session_start();
include "../../../inc/db_actions.php";
 ?>
<nav class="navbar navbar-expand-md navbar-light bg-light">
  <a class="navbar-brand"><img src="../../../assets/img/alumnilogo.png" alt="Alumni of Code Factory Logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExample04">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="../../../index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../../stories.php">Stories</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../../directory.php">Directory</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../../career.php">Careers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../../events.php">Events</a>
      </li>
      <?php if(isset($_SESSION['student'])!=""){  ?>
      <li class="nav-item">
        <a class="nav-link" href="../../../profile.php">Profile</a>
      </li>
    <?php }?>
    </ul>
    <?php if(isset($_SESSION['student'])!=""){  ?>
    <div>
        <span  class="user-welcome mr-3">
  
          <?php  
          $where=array("fk_userID"=>$_SESSION['student']);
          $rows=$obj->select_record("student_profile",$where);

          foreach ($rows as $row) {
            echo "Welcome ".$row["first_name"]."!<br>";
          }

          echo "userID is:".$_SESSION['student'];?> | <a>Login</a>
        </span>
    </div>
    <?php }elseif (isset($_SESSION['company'])!=""){?>
    <div>
        <span  class="user-welcome mr-3">
  
          <?php  
          $where=array("fk_userID"=>$_SESSION['company']);
          $rows=$obj->select_record("companies",$where);

          foreach ($rows as $row) {
            echo "Welcome ".$row["company_name"]."!<br>";
          }

          echo "userID is:".$_SESSION['company'];?> | <a>Login</a>
        </span>
    </div>
    <?php }elseif (isset($_SESSION['admin'])!=""){?>
    <div>
        <span  class="user-welcome mr-3">
  
          <?php  
  
          echo "Welcome Admin!"?> | <a>Login</a>
        </span>
    </div>
    <?php }elseif (isset($_SESSION['admin'])!="")?>
    <?php if(!isset($_SESSION['student']) && !isset($_SESSION['company']) && !isset($_SESSION['admin'])){//fix this shit?>
      <a href="../../../inc/login/login.php">
        <button type="button" class="btn">Login</button>
      </a>
  <?php } ?>

  <?php if(isset($_SESSION['student'])!="" || isset($_SESSION['company'])!="" || isset($_SESSION['admin'])!="" || isset($_SESSION['admin'])!=""){  ?>
    <a href="../../../inc/login/logout.php?logout">
      <button type="button" class="btn btn-primary">Logout</button>
    </a>
   <?php }?>
</div>
</nav> 



        <div class="container">
          
       
        <form action="../actions/a_create_course.php" method="post" class="my-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Course name:</label>
                <input type="text"
                class="form-control"
                name="course_name"
                placeholder="Enter Course name"
                >
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Course description:</label>
                <input type="text"
                class="form-control"
                name="course_description"
                placeholder="Course description:"
                >
              </div>
          
              <button type="submit" class=" btn btn-danger">
                create
              </button>

              <a href="../../../admin.php">
              <button type="button" class=" btn btn-danger">
                Back
              </button>
                </a>
            </form> 
              
          </div>
<?php 
include '../../footer.php';
?>

<!-- <table class="table my-3 mx-1 vertical-align">
    <thead class="thead-dark">
      <tr>
        <th scope="col">course name</th>
        <th scope="col">course description</th>
        <th scope="col">operation</th>
      </tr>
    </thead>
    <tbody class="table-striped" id="selresult"> target to ajax
    
        
      <?php foreach($rowCourse as $rowCourses){
        echo "<tr>";              //loops to print the records
        echo "<td>".$rowCourses['course_name']."</td>";
        echo "<td>".$rowCourses['course_description']."</td>";
        echo "<td><a href='inc/courses/action_forms/update_course.php?courseID=".$rowCourses['courseID']."' role='button' class='btn btn-warning mx-1 btn-sm px-3'>Edit</a>
          <a href='inc/courses/action_forms/delete_course.php?courseID=".$rowCourses['courseID']."' role='button' class='btn btn-danger mx-1 btn-sm px-3'>delete</a>
          </td>";
        echo "</tr>";
      } ?>

    
    </tbody>
</table> -->
