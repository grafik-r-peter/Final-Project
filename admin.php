<?php 
include 'inc/header.php';
include "inc/topnav.php";
include "inc/nav.php";
?>




<link rel="stylesheet" href="./assets/css/form.css">


         <style>
             .badgevert {
               display: flex;
               flex-direction: column;
               width: 90%;
             }

             .badgeline {
             	display: flex;
             	flex-direction: row;
             	justify-content: flex-start;
             	align-items: center;
             	width: 100%;
             	height: 9vw;
             }

             .badgeline img {
             	max-width: 100%;
             }

             .radioline {
             	display: flex;
             	flex-direction: row;
             	align-items: center;
             	justify-content: space-around;
             	width: 97%;
             	height: 2vw;
             	margin-bottom: 2vw;
             }

             .radioheight {
             	max-height: 100%;
             }

             input[type=checkbox] {
			  	transform: scale(1.5);
			}

			    input[type=radio] {
			    border: 0px;
			    width: 1vw;
			    height: 1vw;
			}

          </style>



<?php



function listing() {

	global $obj;

	$rows=$obj->fetch_records("users");

	
			?>
					<input class="form-control mt-3" type="text" name="search-text" id="search-text" placeholder="Search for Username">

				<table class="table my-3 mx-1 vertical-align">
					  <thead class="thead-dark">
					    <tr>
					      <th scope="col">Username</th>
					      <th scope="col">eMail</th>
					      <th scope="col"></th>
					    </tr>
					  </thead>
					  <tbody class="table-striped" id="selresult"> <!-- target to ajax  -->
					  
					    	
					 		<?php foreach($rows as $row){
						 		echo "<tr>";              //loops to print the records
								echo "<td>".$row['username']."</td>";
								echo "<td>".$row['email']."</td>";
								echo "<td><a href='edit.php?id=".$row['user_id']."' role='button' class='btn btn-warning mx-1 btn-sm px-3'>Edit</a> <button type='button' class='btn btn-danger btn-sm deletebutton' id='".$row['user_id']."'>delete</button> </td>";
								echo "</tr>";
							} ?>

						
					  </tbody>
				</table>
			<?php
}



function listingBadges() {


		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "alumni_project";

		$conn = mysqli_connect($servername, $username, $password, $dbname);

		$sql = "SELECT * FROM student_profile join students_results on students_results.fk_student_profileID = student_profile.profile_id JOIN badges on students_results.fk_badgeID = badges.badgeID";

		$result = mysqli_query($conn, $sql);


		if (mysqli_num_rows($result) > 0)

		{

			$rows = mysqli_fetch_all($result);

		}
		else
		{
			echo 'No data found';
		}
		
		mysqli_close($conn);



			?>
				<input class="form-control mt-3" type="text" name="search-text" id="search-text2" placeholder="fast search">
			 
					<div class="form-group">
					    <label for="exampleSelect1">Example select</label>
					    <select class="form-control" size="20" id="selresult2">
					    	
					 		 <?php 
							$norepeat = ''; 


					 		 foreach($rows as $row){
					 			if ($norepeat != $row[0]) {
					 			echo "<option value='".$row[0]."'>".$row[1]."  ".$row[2]."</option>";
					 			$norepeat = $row[0]; }
							} ?> 

					    </select>
					</div>
						
					  </tbody>
				</table>
			<?php
}

?>



<div class="container">
	
<!-- Nav tabs -->
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#first">User management</a>
  </li>
  </li>
    <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#company">Company management</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#badges">Badges</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#courses">Courses</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#events">Events</a>
  </li>
    <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#skills">Skills</a>
  </li>
    <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#careers">Careers</a>
  </li>

</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane container-fluid active" id="first">

  	<a href="./inc/login/register.php" class="btn btn-dark">Add User</a>



  	<div class="row">
  		<div class="col-12">

			<?php listing(); ?>


		</div>


  		  		
  	</div>

  </div>

	  <div class="tab-pane container-fluid fade" id="badges">  <!-- Badges part -->

	  <div class="row">
  		<div class="col-7">
	  	
		 <?php listingBadges(); ?>
 

		</div>
		
		<div class="col-5 my-3 mx-0 px-3" id="badgeTarget">
 

              <div class="badgevert">
					<?php 
					for ($x = 0; $x <= 15; $x++) {
					   ?> 
			  <div class="badgeline">
			   	    <div><img src="assets/img/1st_badge_gold.png"></div>
			   	    <div><img src="assets/img/1st_badge_silver.png"></div>
			   	    <div><img src="assets/img/1st_badge_bronze.png"></div>
			   	    <div> <input type="checkbox" name="1st" value="added"> </div>
			  </div> 

			  <div class="radioline">

				
			  		<div class="radioheight"><input type="radio" name="choice" value="gold"></div>
			  		<div class="radioheight"><input type="radio" name="choice" value="silver"></div>
			  		<div class="radioheight"><input type="radio" name="choice" value="bronze"></div>
			  	

			  </div><?php
} 
?>
              </div>


		</div>

	   </div>

	  </div>
  <div class="tab-pane container fade" id="company">
  	 <a href="./inc/companies/action_forms/create_companies.php" class="btn btn-dark">Add Company</a>

  	<?php include "./inc/companies/company_list.php" ?>
  </div>
  <div class="tab-pane container fade" id="courses">
  	<a href="./inc/courses/action_forms/create_course.php" class="btn btn-dark">Add Course</a>
  	<?php include "./inc/courses/list_course.php" ?>
  </div>
  <div class="tab-pane container fade" id="events">
  	<a href="./inc/events/action_forms/create_event.php" class="btn btn-dark">Add Event</a>
  	<?php include "./inc/events/list_events.php" ?>
  </div>
  <div class="tab-pane container fade" id="skills">
  	 <a href="./inc/skills/action_forms/create_skill.php" class="btn btn-dark">Add Skills</a>
  	 <?php include "./inc/skills/list_skills.php" ?>

  </div>
 
  <div class="tab-pane container fade" id="careers">
  	<a href="./inc/careers/action_forms/create_career.php" class="btn btn-dark">Add Career</a>
  	<?php include "./inc/careers/careers_list.php" ?>
  	
  </div>
</div>





		<script>  //AJAX search 1
			let firstKey=true;
			let savedList = '';
			$(document).ready(function() {
				$('#search-text').keyup(function() {
					if (firstKey) {   // save original list
								savedList = $('#selresult').html();
								firstKey = false;
								}
					var txt = $(this).val();
						if (txt == '')
						{
							$('#selresult').html(savedList);  // restore original list
						}
						else
						{
							console.log(txt);
							$('#selresult').html('Searching...');
							$.ajax({
								url:"fetch.php",
								method:"post",
								data:{search:txt},
								dataType:"text",
								success:function(data)
							{
							 		$('#selresult').html(data);

							 	}
							 });
						}

				});
			});

		</script>




		<script>  //AJAX search 2

			let firstKey2 = true;
			let savedList2 = '';
			$(document).ready(function() {
				$('#search-text2').keyup(function() {
					if (firstKey2) {   // save original list
								savedList2 = $('#selresult2').html();
								firstKey2 = false;
								}
					var txt2 = $(this).val();
						if (txt2 == '')
						{
							$('#selresult2').html(savedList2);  // restore original list
						}
						else
						{
							console.log(txt2);
							$('#selresult2').html('Searching...');
							$.ajax({
								url:"fetch2.php",
								method:"post",
								data:{search:txt2},
								dataType:"text",
								success:function(data2)
							{
							 		$('#selresult2').html(data2);

							 	}
							 });
						}

				});
			});

		</script>





		<script>  //AJAX delete
			let deleteId;

			$(document).on('click', '.deletebutton', function(){
							console.log('fired');
							deleteId = ($(this).attr('id'));
							console.log('calling ajax delete with ', deleteId);
							$.ajax({
							url:"ajaxdelete.php",
							method:"post",
							data:{targetId:deleteId},
							dataType:"text",
							success:function(newset)
							 {
							  		$('#selresult').html(newset);

							  	}
						  });
						
				});

		</script>




		<script>  //AJAX badges draw
			let optionId;
			$(document).ready(function() {
				$('#selresult2').change(function() {
					
							optionId = $(this).val();
							console.log('calling ajax badge with ', optionId)	
							$.ajax({
							url:"badgeprint.php",
							method:"post",
							data:{userId:optionId},
							dataType:"text",
							success:function(badge)
							 {

							  		$('#badgeTarget').html(badge);

							  	}
						  });
						
				});
			});

		</script>








</div>

<?php 
include 'inc/footer.php';
?>