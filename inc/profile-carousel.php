<!-- Individual Slider for Profile page -->

<?php 

$tables=array("users", "student_profile");
$rows="*";
$join=array("users.user_id=student_profile.fk_userID");
$where="user_id=".$_SESSION['student'];
$rows=$obj->join_tables($tables,$rows,$join,$where);


 ?>

<div id="myCarousel" class="carousel slide d-none d-sm-block" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="second-slide" src="./assets/img/work-731198_1600x572.jpg" alt="Second slide">
      <div class="overlay"></div>
      <div class="container">
        <div class="carousel-caption">
          <?php foreach($rows as $row){ ?>

          <img src="<?php echo $row['profile_picture'] ?>" class="profile-img" alt="">
      
          <h1><?php echo $row["first_name"]." ".$row["last_name"] ?></h1>
          
          <p><?php echo $row["description"] ?></p>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>