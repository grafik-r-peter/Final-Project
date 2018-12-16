
<?php 
include 'inc/header.php';
include "inc/topnav.php";
include "inc/nav.php";
include 'inc/profile-carousel.php';

if (isset($_SESSION['student'])!=""){
  $id=$_SESSION['student'];
} elseif(isset($_SESSION['company'])!="" || isset($_SESSION['admin'])!="") {
  $id=$_GET['id'];
} else {
  header("Location: index.php");
}
$tables=array("users", "student_profile");
$rows="*";
$join=array("users.user_id=student_profile.fk_userID");
$where="user_id=".$id;
$rows1=$obj->join_tables($tables,$rows,$join,$where);
//many to many
$tables=array("student_profile", "enrollment_table", "courses", "student_skills", "skills","students_results","badges", "projects");
$rows="*";
$where="student_profile.fk_userID={$id}";
$join=array("student_profile.profile_id=enrollment_table.fk_student_profileID","courses.courseID=enrollment_table.fk_courseID","student_profile.profile_id=student_skills.fk_student_profileID","student_skills.fk_skillsID=skills.skillsID","students_results.fk_student_profileID=student_profile.profile_id","students_results.fk_badgeID=badges.badgeID", "students_results.fk_projectID=projects.projectID");
$rows=$obj->join_tables($tables,$rows,$join,$where);
$data=array();
foreach ($rows as $row) {
    $data[$row['profile_id']]["first_name"] = $row["first_name"];
    $data[$row['profile_id']]["fk_userID"] = $row["fk_userID"];
    $data[$row['profile_id']]["profile_id"] = $row["profile_id"];
    $data[$row["profile_id"]]["courses"][$row["courseID"]]=array("course"=>$row["course_name"]);
}
$skills=array();
foreach ($rows as $row) {
   $skills[$row['profile_id']]["first_name"] = $row["first_name"];
   $skills[$row["profile_id"]]["skills"][$row["skillsID"]]=array("skills"=>$row["skill"]);
} 
$badges=array();
foreach ($rows as $row1) {
   $badges[$row1['profile_id']]["first_name"] = $row1["first_name"];  
   $badges[$row1["profile_id"]]["badges"][$row1["badgeID"]]=array("badges"=>$row1["badge_image"]);
    $badges[$row1["profile_id"]]["projects"][$row1["projectID"]]=array("projects"=>$row1["project_name"]);
} 
foreach ($badges as $row) {
                $arr1= $row["badges"];
                $arr2=$row["projects"];
                
         
}
?>
<!-- LOGIN FORM FOR LOGGED OUT USERS -->
<!-- <div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-3">    
      <div class="user-login" *ngIf="!(authService.user | async)">
          <label for="e-mail">E-Mail</label><br>
          <input class="form-control" type="text" [(ngModel)]="email"><br><br>
  
          <label for="e-mail">Password</label>
          <input class="form-control" type="password" [(ngModel)]="password">
          <button class="btn" (click)="login()" [disabled]="!email || !password">
            Login
          </button>
        </div>
      </div>
  </div>
  <div class="d-flex justify-content-md-end justify-content-sm-center">
    <button class="btn btn-outline-secondary" (click)="logout()" *ngIf="authService.user | async">
    Logout
    </button>
  </div> -->
<!-- CONTENT EXCLUSIVE FOR LOGGED IN USERS -->
<div class="container profile-page">
  <div class="row text-center">
    <!-- Content area -->
    <div class="col-md-12">
      <h3>Information</h3>
      <?php if(isset($_SESSION['student'])!=""){  ?>
      <a href=<?php echo 'inc/user_profile/actions_forms/update_profile.php?id='.$id?> class="btn btn-secondary">Edit my Data</a>
      <a href=<?php echo 'inc/user_profile/actions_forms/add_skills.php?id='.$id?> class="btn btn-secondary">Add Skills</a>
      <a href="inc/user_profile/actions/add_photo.php" class="btn btn-secondary">Upload Profile Picture</a>

    <?php } ?>
      <table class="table table-sm table-profile">
        <tbody>
           <tr>
            <th class="w-50">Course:</th>
            <td class="w-50">
              <?php 
            foreach ($data as $row) {
                
                $arr= $row["courses"];
                foreach ($arr as $c){
                    echo $c["course"].", ";
                }
            }
           ?>
            </td>
          </tr>
          <?php foreach($rows1 as $row){ ?>
          <tr>
            <th>Skills:</th>
            <td><?php 
            foreach ($skills as $row1) {
                $arr1= $row1["skills"];
                foreach ($arr1 as $skill){
                    echo $skill["skills"].", ";
                }
            } ?></td>
          </tr>
          <tr>
            <th>Job Status:</th>
            <td><?php echo $row['jobs_status'];?></td>
          </tr>
          <tr>
            <th>Portoflio:</th>
            <td><?php echo $row['portfolio'];?></td>
          </tr>
          <tr>
            <th>Github Profile:</th>
            <td>Green/Red</td>
          </tr>
          <?php if(isset($_SESSION['student'])!=""){  ?>
          <tr>
            <th>eMail:</th>
            <td><?php echo $row['email'];?></td>
          </tr> 
          <tr>
            
            <th>Phone:</th>
            <td><?php echo $row['phone_number'];?></td>
          </tr>
        <?php }  ?>
          <?php } ?>                                      
        </tbody>
      </table>
    </div>
  </div>
  <!-- badges -->
<h3 class="mt-5 mb-4">Badges</h3>
  <div class="row justify-content-center badges">
<?php 
foreach ($badges as $row) {
                $arr1= $row["badges"];
                foreach ($arr1 as $badge){?>
                  <div class="col-4 text-center">      
          <img src="<?php echo $badge["badges"] ?>" alt="{blabla}">
        <?php } 
          foreach ($arr2 as $badge){
        ?>
      <p>Week 1 <br><p><?php echo $badge["projects"] ?></p>
     
          </div>
            <?php
                }
            }
?> 
</div>
<?php 
$where=array("fk_studentID" => $id,"request"=>"denied");
$rows=$obj->select_record("requests",$where);
$no=count($rows);
if($no>0){
 ?>
<a href="inc/user_profile/list_requests.php" class="btn btn-secondary"><?php echo $no; ?> request</a>
<?php } else{ ?>
<a href="inc/user_profile/accept.php" class="btn btn-secondary"><?php echo $no; ?> request</a>
<?php } ?>
</div>
<?php 
include 'inc/footer.php';
?>