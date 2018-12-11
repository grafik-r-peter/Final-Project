<?php

ob_start();
session_start(); // start a new session or continues the previous

include '../db_actions.php';

$passError ="";
$emailError ="";
$nameError ="";
$email="";
$name="";
$role="";

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

 $role=$_POST['role'];

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
 
  if ($res) {
   $errTyp = "success";
   $errMSG = "Successfully registered, you may login now";
   unset($name);
   unset($email);
   unset($pass);
  unset($role);
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
      
            <hr />
            <input type="checkbox" name="role" value="student"> Student
            <input type="checkbox" name="role" value="company"> Company
            <input type="checkbox" name="role" value="admin"> Admin
            
            <button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>
            <hr />
          
            <a href="index.php">Sign in Here...</a>
    
  
   </form>
</body>
</html>
<?php ob_end_flush(); ?>