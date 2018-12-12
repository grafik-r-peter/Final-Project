<?php

ob_start();
session_start(); // start a new session or continues the previous

include '../db_actions.php';
include "../inc/header.php";

$passError ="";
$emailError ="";
$nameError ="";
$email="";
$name="";

if(isset($_SESSION['student'])!="" || isset($_SESSION['company'])!="" || isset($_SESSION['admin'])!="" || isset($_SESSION['admin'])!=""){
 header("Location: ../../index.php"); // redirects to home.php
}

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
<!DOCTYPE html>
<html>
<head>
<title>Login & Registration System</title>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
   <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
  
      
            <h2>Sign Up.</h2>
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
          
            <input type="text" name="name" class="form-control" placeholder="Enter Name" maxlength="50" value="<?php echo $name ?>" />
      
               <span class="text-danger"><?php echo $nameError; ?></span>
          
    

            <input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
    
               <span class="text-danger"><?php echo $emailError; ?></span>
      
          
      
            
        
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

            
            <button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>
            <hr />

  
   </form>
          
        </div>
</body>
</html>
<?php ob_end_flush(); ?>