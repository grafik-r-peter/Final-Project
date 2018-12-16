<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alumni_project";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(isset($_POST["query"])){
$search = mysqli_real_escape_string($conn, $_POST["query"]);
$query="SELECT * FROM student_profile JOIN student_skills ON student_profile.profile_id = student_skills.fk_student_profileID JOIN skills ON student_skills.fk_skillsID = skills.skillsID JOIN enrollment_table ON student_profile.profile_id = enrollment_table.fk_student_profileID JOIN courses ON enrollment_table.fk_courseID = courses.courseID WHERE student_profile.first_name LIKE '%".$search."%' OR student_profile.last_name LIKE'%".$search."%' OR skills.skill LIKE '%".$search."%' OR student_profile.jobs_status LIKE '%".$search."%'";

}
else {
$query="SELECT * FROM student_profile JOIN student_skills ON student_profile.profile_id = student_skills.fk_student_profileID JOIN skills ON student_skills.fk_skillsID = skills.skillsID JOIN enrollment_table ON student_profile.profile_id = enrollment_table.fk_student_profileID JOIN courses ON enrollment_table.fk_courseID = courses.courseID";
}

$result = mysqli_query($conn, $query);

$rows = mysqli_fetch_array($result);


$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0){
 while($row = mysqli_fetch_array($result))
 {

   $data[$row['profile_id']]["profile_id"] = $row["profile_id"];	
   $data[$row['profile_id']]["fk_userID"] = $row["fk_userID"];  
   $data[$row['profile_id']]["first_name"] = $row["first_name"];
   $data[$row['profile_id']]["last_name"] = $row["last_name"];
   $data[$row['profile_id']]["jobs_status"] = $row["jobs_status"]; 
   $data[$row['profile_id']]["profile_picture"] = $row["profile_picture"];
   $data[$row["profile_id"]]["skills"][$row["skillsID"]]=array("skills"=>$row["skill"]);
   $data[$row["profile_id"]]["courses"][$row["courseID"]]=array("courses"=>$row["course_name"]);   
}}
else
{
 echo 'Data Not Found';
}

 ?>
 <table class="table table-sm table-light mt-3 students-table">
                                <thead class="thead-dark students-thead">
                                        <th></th>
                                        <th>Name</th>
                                        <th>Skills</th>
                                        <th>Course</th>
                                        <th>Job Status</th>
                                        <th></th>
                                </thead>                                
                                        
                                        <?php 
                                       if (!empty($data)){
                                        foreach ($data as $row) { ?>
                                        <tr class="">                                                
                                                <td><img src="<?php echo $row['profile_picture']; ?>" class="dir-img" alt="<?php echo $row['first_name']." "; echo $row['last_name']; ?>"></td>
                                                <td><?php echo $row['first_name']." "; echo $row['last_name']; ?> </td>
                                                <td>
                                                        <!-- Loop through skills array -->
                                                        <?php 
                                                            $arr= $row["skills"];
                                                            foreach ($arr as $c){
                                                            echo $c["skills"]."<br>";
                                                        }?> 
                                                </td>
                                                <td>
                                                        <!-- Loop through courses array -->
                                                        <?php 
                                                            $arr= $row["courses"];
                                                            foreach ($arr as $c){
                                                                echo $c["courses"]."<br>";
                                                            }
                                                        ?> 
                                                </td>                                                        
                                                <td><?php echo $row['jobs_status'];?></td>
                                                <td>
                                                        <a href="profile-directory.php?id=<?php echo $row["fk_userID"];?>">
                                                        <button class="btn btn-outline-dark">
                                                               Profile 
                                                        </button>
                                                </a>
                        
                                                        <a href="inc/requests/send_request.php?id=<?php echo $row["fk_userID"];?>">
                                                        <button class="btn btn-outline-dark">
                                                               Send Request
                                                        </button>
                                                </a>
                                                </td>                                         
                                        </tr> 
                                        <?php } }?>
                                          
                                                                                                    
                        </table>
