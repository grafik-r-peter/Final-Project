<?php
ob_start();
session_start();
 $name="";
           $emailError="";
           $passError="";
           $email="";
           $errMSG="";

include '../db_actions.php';

$error = false;

if( isset($_POST['btn-login']) ) {

 // prevent sql injections/ clear user invalid inputs
 $email = trim($_POST['email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $pass = trim($_POST['pass']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);
 // prevent sql injections / clear user invalid inputs

 if(empty($email)){
  $error = true;
  $emailError = "Please enter your email address.";
 } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address.";
 }

 if(empty($pass)){
  $error = true;
  $passError = "Please enter your password.";
 }

 // if there's no error, continue to login
 if (!$error) {
  
  $password = hash('sha256', $pass); // password hashing

  $where=array("email"=>$email);
  $rows=$obj->select_record("users",$where);

  $count = count($rows);
  echo $count;// if uname/pass is correct it returns must be 1 row

  foreach($rows as $row){
  if( $count == 1 && $row['password']==$password ) {
      if($row['user_role']==="student"){
        $_SESSION['student'] = $row['user_id'];
        header("Location: ../../profile.php");
      }
      elseif($row['user_role']==="company"){
        $_SESSION['company'] = $row['user_id'];
        header("Location: ../../directory.php");
      }
      elseif($row['user_role']==="admin"){
        $_SESSION['admin'] = $row['user_id'];
        header("Location: ../../admin.php");
      }
  } else {
   $errMSG = "Incorrect Credentials, Try again...";
  }
  
 }
}

}
?>

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


   <div class="container"><form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
     
       
               <h2>Sign In.</h2>
               <hr />
               
              <?php
             
             
               if ( isset($errMSG) ) {
               echo $errMSG; ?>
                 
                  <?php
     }
     ?>
              
             
               
               <input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />
           
               <span class="text-danger"><?php echo $emailError; ?></span>
     
             
               <input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
           
              <span class="text-danger"><?php echo $passError; ?></span>
               <hr />
   
               
               <button type="submit" name="btn-login" class="btn btn-danger">Sign In</button>
             
             
               <hr />
     
              
         
             
      </form></div>
   </div>
</div>
</body>
</html>
<?php ob_end_flush(); ?>