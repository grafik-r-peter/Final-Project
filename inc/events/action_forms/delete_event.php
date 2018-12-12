<?php

 
include '../../db_actions.php';

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
   $fk_locationID=$_GET['eventID']; 
   $sql3 = "SELECT * FROM location WHERE  locationID  = {$fk_locationID}";
    $result3 = $connect->query($sql3);
    $data3 = $result3->fetch_assoc();
  
//-----------------------------------------------------
  
?>

<div class="container">

<h3 class="text-danger text-center mb-4">Do you really want to delete this data?</h3>

<form action="../actions/a_delete.php" method="post">
       
                
                <input type="hidden"
              
                name="eventID"
            
                value="<?php echo $data['eventID'] ?>"
                >

              
              <button type="submit" name="btn" class=" btn btn-danger">
                Yes, delete it!
              </button>

              <a href="../../../events.php">
              <button type="button" class=" btn btn-danger">
                No, go back!
              </button>
                </a>
            </form>    
</div>
 

</body>

</html>

 
<?php }else{
  echo "faild";
} ?>


