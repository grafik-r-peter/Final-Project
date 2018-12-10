<?php 
include 'inc/header.php';
?>

<link rel="stylesheet" href="./assets/css/form.css">


<div class="container">

	<div class="row">
  		<div class="col-6 mx-auto">

			<div class="myform my-3 px-2 mx-auto">
			  	<form class="form p-3" role="form" autocomplete="off" action="user_register.php" method="POST" text-dark>
  								<h4 class="text-center py-2">Edit user</h4>
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


                                <button type="submit" name="userregistration" id="regsubmit" class="btn btn-primary btn-block">UPDATE USER</button>
                </form>
            </div>

		</div>
	</div>

</div>

	

<?php 
include 'inc/footer.php';
?>

