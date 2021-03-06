<?php

ob_start();
session_start(); // start a new session or continues the previous

include '../db_actions.php';
include "../../inc/header.php";



$passError ="";
$emailError ="";
$nameError ="";
$email="";
$name="";

$error = false;

if ( isset($_POST['btn-signup']) ) {
 
 // sanitize user input to prevent sql injection
 $name = trim($_POST['name']);
  //trim - strips whitespace (or other characters) from the beginning and end of a string
  $name = strip_tags($name);
  // strip_tags — strips HTML and PHP tags from a string
  $name = htmlspecialchars($name);
 // htmlspecialchars converts special characters to HTML entities
 $email = trim($_POST['email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $pass = trim($_POST['pass']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);

 $role="student";
  $fname = $_POST['f_name'];
  $lname = $_POST['l_name'];
  $description = $_POST['description']; 
  $phone = $_POST['phone'];
  $portfolio = $_POST['portfolio'];
  $job_status = $_POST['job_status'];

 // basic name validation
 if (empty($name)) {
  $error = true;
  $nameError = "Please enter your full name.";
 } else if (strlen($name) < 3) {
  $error = true;
  $nameError = "Name must have at least 3 characters.";
 } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
  $error = true;
  $nameError = "Name must contain alphabets and space.";
 }

 //basic email validation
 if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address.";
 } else {
  // checks whether the email exists or not
  $where=array("email"=>$email);
  $rows=$obj->select_record("users",$where);
  $count = count($rows);

  if($count!=0){
   $error = true;
   $emailError = "Provided Email is already in use.";
  }
 }

 // password validation
 if (empty($pass)){
  $error = true;
  $passError = "Please enter password.";
 } else if(strlen($pass) < 6) {
  $error = true;
  $passError = "Password must have at least 6 characters.";
 }

 // password hashing for security
$password = hash('sha256', $pass);


 // if there's no error, continue to signup
 if( !$error ) {
  $arr=array("username"=>$name,"email"=>$email,"password"=>$password,"user_role"=>$role);
  $res=$obj->insert_record('users',$arr);
  $sql="INSERT INTO student_profile(first_name,last_name,jobs_status,description,portfolio,phone_number,fk_userID) VALUES ('$fname','$lname','$job_status','$description','$portfolio','$phone',LAST_INSERT_ID())";
  $db->query($sql);
 
  if ($res) {
   $errTyp = "success";
   $errMSG = "Successfully registered, you may login now";
   unset($name);
   unset($email);
   unset($pass);
  } else {
   $errTyp = "danger";
   $errMSG = "Something went wrong, try again later...";
  }
  
 }


}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Alumnis Of Code Factory</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="favicon.ico">
  <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../../assets/css/styles-global.css">

  <script src="../../assets/js/jquery-3.3.1.min.js"></script>
  
</head>
<body>
<div class="container-fluid topbar">
  <div class="topbar-left">
    <a class="nav-link" target="_blank" href="https://www.codefactory.wien/"> www.codefactory.wien</a>
  </div>

  <div class="topbar-right">
    <a target="_blank" href="https://www.facebook.com/CodeFactoryVienna">
      <img class="logobar" src="../../assets/img/fb.svg" alt="Logo Facebook">
    </a>
    <a target="_blank" href="https://www.instagram.com/codefactoryvienna/">
      <img class="logobar" src="../../assets/img/ig.svg" alt="Logo Instagram">
    </a>
  </div>
</div>
<nav class="navbar navbar-expand-md navbar-light bg-light">
  <a class="navbar-brand"><img src="../../assets/img/alumnilogo.png" alt="Alumni of Code Factory Logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExample04">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="../../index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../stories.php">Stories</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../directory.php">Directory</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../career.php">Careers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../events.php">Events</a>
      </li>
      <?php if(isset($_SESSION['student'])!=""){  ?>
      <li class="nav-item">
        <a class="nav-link" href="../../profile.php">Profile</a>
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
    
        <span  class="user-welcome mr-3">
  
          <?php  
          $where=array("fk_userID"=>$_SESSION['company']);
          $rows=$obj->select_record("companies",$where);

          foreach ($rows as $row) {
            echo "Welcome ".$row["company_name"]."!<br>";
          }

          echo "userID is:".$_SESSION['company'];?> | <a>Login</a>
        </span>
    
    <?php }elseif (isset($_SESSION['admin'])!=""){?>
    <div>
        <span  class="user-welcome mr-3">
  
          <?php  
  
          echo "Welcome Admin!"?> | <a>Login</a>
        </span>
    </div>
    <?php }elseif (isset($_SESSION['admin'])!="")?>
    <?php if(!isset($_SESSION['student']) && !isset($_SESSION['company']) && !isset($_SESSION['admin'])){//fix this shit?>
      <a href="../../inc/login/login.php">
        <button type="button" class="btn">Login</button>
      </a>
  <?php } ?>

  <?php if(isset($_SESSION['student'])!="" || isset($_SESSION['company'])!="" || isset($_SESSION['admin'])!="" || isset($_SESSION['admin'])!=""){  ?>
    <a href="../../inc/login/logout.php?logout">
      <button type="button" class="btn btn-primary">Logout</button>
    </a>
   <?php }?>
</div>
</nav> 

  <div class="container">
   <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
  
      
            <h2 class="my-3">Create new user</h2>
            <hr />
          
           <?php

        

        if ( isset($errMSG) ) {
  
          ?>
           <div class="alert alert-<?php echo $errTyp ?>">
                        <?php echo $errMSG; ?>
            </div>

<?php
  }
  ?>
          <label>Username</label>
            <input type="text" name="name" class="form-control" placeholder="Enter Name" maxlength="50" value="<?php echo $name ?>" />
      
               <span class="text-danger"><?php echo $nameError; ?></span>
          
    
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
    
               <span class="text-danger"><?php echo $emailError; ?></span>
      
          
      
            
        <label>Password</label>
            <input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />
            
               <span class="text-danger"><?php echo $passError; ?></span>
             <div class="form-group">
    <label>First Name</label>
    <input type="text" class="form-control" placeholder="First Name" name="f_name">
  </div>
   <div class="form-group">
    <label>Last Name</label>
    <input type="text" class="form-control" placeholder="Last Name" name="l_name">
  </div>
 
  <div class="form-group">
    <label>Phone Number</label>
    <input type="text" class="form-control" name="phone" placeholder="Phone">
  </div>
  <div class="form-group">
    <label>Portfolio URL</label>
    <input type="text" class="form-control" name="portfolio" placeholder="Website">
  </div>
  <div class="form-group">
    <label>Short Description</label>
    <textarea class="form-control" name="description" placeholder="Add short description"></textarea>
  </div>
  <div class="form-group">
    <label>Job Status</label>
    <select multiple class="form-control" name="job_status">
      <option value="employed">Employed</option>
      <option value="available">Available</option>
    </select>
  </div>

            
            <button type="submit" class="btn btn-danger" name="btn-signup">Sign Up</button>
            <a href="../../admin.php" class="btn btn-danger">Back</a>
            <hr />

  
   </form>
   </div>
          
        </div>
</body>
</html>
<?php ob_end_flush(); ?>
<?php 
include './../footer.php';
?>