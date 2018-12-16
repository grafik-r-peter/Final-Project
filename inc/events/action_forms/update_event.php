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

<?php 

if($_GET['eventID']) {

    $eventID = $_GET['eventID'];


    $sql = "SELECT * FROM events WHERE  eventID = {$eventID}";
    $connect = new mysqli("127.0.0.1", "root", "", "alumni_project");
    $result = $connect->query($sql);
    $data = $result->fetch_assoc();
//--------------------------------------------------------------------    
    
    $sql2 = "SELECT * FROM images WHERE  fk_eventID = {$eventID}";
    $result2 = $connect->query($sql2);
    $data2 = $result2->fetch_assoc();
    
//-------------------------------------------------
   $fk_eventID=$_GET['eventID']; 
   $sql3 = "SELECT * FROM location WHERE  fk_eventID  = {$fk_eventID}";
    $result3 = $connect->query($sql3);
    $data3 = $result3->fetch_assoc();
  
//-----------------------------------------------------
  

?>
    <form action="../../events/actions/a_update.event.php" method="post" class="my-2">
              <div class="form-group">
                <label for="exampleInputEmail1">Event name:</label>
                <input type="text"
                class="form-control"
                name="event_name"
                placeholder="Enter Event name"
                value="<?php echo $data['event_name'] ?>"
                >
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Event image url:</label>
                <input type="text"
                class="form-control"
                name="image_url"
                placeholder="Enter image url"
                value="<?php echo $data2['image_url'] ?>"
                >
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1"> Start date:</label>
                <input type="datetime"
                class="form-control"
                name="start_date"
                placeholder="Enter Start date"
                value="<?php echo $data['start_date'] ?>"
                >
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Cost:</label>
                <input type="text"
                class="form-control"
                name="cost"
                placeholder="Enter Cost"
                value="<?php echo $data['cost'] ?>"
                >
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Address:</label>
                <input type="text"
                class="form-control"
                name="address"
                placeholder="Enter Address"
                value="<?php echo $data3['address'] ?>"
                >
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">City:</label>
                <input type="text"
                class="form-control"
                name="city"
                placeholder="Enter City"
                value="<?php echo $data3['city'] ?>"
                >
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Country:</label>
                <input type="text"
                class="form-control"
                name="country"
                placeholder="Enter Country"
                value="<?php echo $data3['country'] ?>"
                >

              
              <input type="hidden" name="eventID" value="<?php echo $data['eventID']?>">
              <input type="hidden" name="image_id" value="<?php echo $data2['image_id']?>">
              <input type="hidden" name="fk_locationID " value="<?php echo $data3['fk_locationID ']?>">

              

              <button class="btn btn-danger" type="submit">
                Save Changes
              </button>
              <a href="../../../events.php">
              <button type="button" class="btn btn-danger">Back</button></a>
            </form> 

 </div>



 

</body>

</html>

 

<?php
}
?>

