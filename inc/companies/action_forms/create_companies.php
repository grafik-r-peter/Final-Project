<?php   
  include '../../db_actions.php';
  /*include '../../../header.php';*/

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

 $role="company";
$company_name =$_POST['company_name'];
$company_address =$_POST['company_address'];
  

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
  $sql="INSERT INTO companies(company_name, company_address, fk_userID) VALUES ('$company_name','$company_address',LAST_INSERT_ID())";
  $db->query($sql);
 
  if ($res) {
   $errTyp = "success";
   $errMSG = "Successfully registered, you may login now";
   unset($name);
   unset($email);
   unset($pass);
   unset($company_name);
   unset($company_address);
  } else {
   $errTyp = "danger";
   $errMSG = "Something went wrong, try again later...";
  }
  
 }


}
?>

        <div class="container">
          
       
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="my-4">
            <input type="text" name="name" class="form-control" placeholder="Enter Name" maxlength="50" value="<?php echo $name ?>" />
      
               <span class="text-danger"><?php echo $nameError; ?></span>
          
    

            <input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
    
               <span class="text-danger"><?php echo $emailError; ?></span>
      
          
      
            
        
            <input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />
            
               <span class="text-danger"><?php echo $passError; ?></span>
             <div class="form-group">
              <div class="form-group">
                <label for="exampleInputEmail1">Company name:</label>
                <input type="text"
                class="form-control"
                name="company_name"
                placeholder="Enter Company name"
                >
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Company address:</label>
                <input type="text"
                class="form-control"
                name="company_address"
                placeholder="Company address:"
                >
              </div>


              <button type="submit" class=" btn btn-danger" name="btn-signup">
                Add Company
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

