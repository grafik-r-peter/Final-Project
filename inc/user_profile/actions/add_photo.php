<?php 

include "../../db_actions.php";
session_start();



echo "Upload image: ";
if(isset($_POST["insert"])) {

	$where="fk_userID=".$_SESSION['student'];
	$param="profile_picture";
    $obj->updatePhoto("student_profile",$param,$where);
}





 ?>

 <h3 align="center">Upload photo to MySQL</h3>  
                <br />  
                <form method="post" enctype="multipart/form-data">  
                     <input type="file" name="image" id="image" />  
                     <br>  
                     <input type="submit" name="insert" id="insert" value="Insert"/>  
                </form>  
                <br>  
                <br>  