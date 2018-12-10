<?php 
include 'inc/header.php';
include 'inc/db_actions.php';
?>

<link rel="stylesheet" href="./assets/css/form.css">

<style>

	div {
		border: 1px solid red;
	}

</style>



<?php

$rows=$obj->fetch_records("users");


?>



<div class="container-fluid">
	
<!-- Nav tabs -->
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#first">User management</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#second">Second</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#third">Third</a>
  </li>
    <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#fourth">Fourth</a>
  </li>
    <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#fifth">Fifth</a>
  </li>
    <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#sixth">Sixth</a>
  </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane container-fluid active" id="first">


  	<div class="modal fade" id="confirm" role="dialog">
            <div class="modal-dialog modal-sm h-100 d-flex flex-column justify-content-center my-0">
              <div class="modal-content bg-dark text-white">
                <div class="modal-header">
                  <h4 class="modal-title">Are you sure?</h4>
                </div>
                <div class="modal-body">
                    Body text here
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-danger mx-auto">Delete</button>
                    <button type="button" data-dismiss="modal" class="btn btn-primary mx-auto">Cancel</button>
                </div>
              </div>
            </div>
        </div>

<script>

	function confirmation(){
		$('#confirm').modal('show');
	}

</script>

  	<div class="row">
  		<div class="col-8">

			<input class="form-control mt-3" type="text" name="search-text" id="search-text" placeholder="fast search">

				<table class="table my-3 mx-1 vertical-align">
					  <thead class="thead-dark">
					    <tr>
					      <th scope="col">Name</th>
					      <th scope="col">Email</th>
					      <th scope="col">operation</th>
					    </tr>
					  </thead>
					  <tbody class="table-striped" id="selresult"> <!-- target to ajax  -->
					  
					    	
					 		<?php foreach($rows as $row){
						 		echo "<tr>";              //loops to print the records
								echo "<td>".$row['username']."</td>";
								echo "<td>".$row['email']."</td>";
								echo '<td><button type="button" class="btn btn-warning mx-1 btn-sm px-3">edit</button> <button type="button" class="btn btn-danger btn-sm" onclick="confirmation()">delete</button> </td>';
								echo "</tr>";
							} ?>

						
					  </tbody>
				</table>
		</div>


		<script>
			$(document).ready(function() {
				$('#search-text').keyup(function() {
					var txt = $(this).val();
						if (txt == '')
						{

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




  			<div class="col-4 my-3 mx-0 px-3">   <!-- User registration -->
  				<form class="form myform p-3" role="form" autocomplete="off" action="user_register.php" method="POST" text-dark>
  								<h4 class="text-center py-3">New user registration</h4>
                                <div class="form-group">
                                    <label for="username" >Username</label>
                                    <input type="text" class="form-control form-control-lg myinput" name="username" id="username" required="true">
                                    <div id="username_feedback"></div>
                                </div>
                                <div class="form-group">
                                    <label for="password" >Password</label>
                                    <input type="password" class="form-control form-control-lg myinput" name="password" id="password" required="" autocomplete="new-password">
                                    <div id="password_feedback"></div>
                                </div>
                                <div class="form-group">
                                    <label for="email" >E-mail</label>
                                    <input type="email" class="form-control form-control-lg myinput" name="email" id="email" required="true" aria-describedby="emailHelp">
                                    <div id="emailHelp"></div>
                                </div>


									<div class="form-check form-check-inline">
									  <input class="form-check-input" type="radio" name="user_role" id="role1" value="student">
									  <label class="form-check-label" for="role1">student</label>
									</div>
									<div class="form-check form-check-inline">
									  <input class="form-check-input" type="radio" name="user_role" id="role2" value="company">
									  <label class="form-check-label" for="role2">company</label>
									</div>
									<div class="form-check form-check-inline">
									  <input class="form-check-input" type="radio" name="user_role" id="role3" value="admin">
									  <label class="form-check-label" for="role3">admin</label>
									</div>
									<div class="form-check form-check-inline mb-3">
									  <input class="form-check-input" type="radio" name="user_role" id="role4" value="superadmin">
									  <label class="form-check-label" for="role4">super admin</label>
									</div>


                                <button type="submit" name="userregistration" id="regsubmit" class="btn btn-primary btn-block">REGISTER</button>
                </form>


  				
  			</div>
  		
  	</div>

  </div>
  <div class="tab-pane container fade" id="second">bbbbbbbbbbbb</div>
  <div class="tab-pane container fade" id="third">ccccccccccc</div>
  <div class="tab-pane container fade" id="fourth">dddddddddddd</div>
  <div class="tab-pane container fade" id="fifth">eeeeeeeee</div>
  <div class="tab-pane container fade" id="sixth">fffffffffff</div>
</div>

</div>

<?php 
include 'inc/footer.php';
?>