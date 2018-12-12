<?php


require_once '../../db_actions.php';

 

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
                <input type="date"
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

