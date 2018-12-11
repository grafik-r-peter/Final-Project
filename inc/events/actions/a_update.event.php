<?php

include '../../db_actions.php';
if($_POST) {

    //-------------------------------------------------
  $tables=array("images", "events", "location");
  $rows="*";
  $join=array("events.eventID = images.fk_eventID" ,"location.locationID = events.fk_locationID");

  $obj->join_tables($tables,$rows,$join);

//-----------------------------------------------------
  $event_name =$_POST['event_name'];
  $start_date =$_POST['start_date'];
  $cost =$_POST['cost'];
  $address =$_POST['address'];
  $city =$_POST['city'];
  $country =$_POST['country'];
  $image_url =$_POST['image_url'];
  
//--------------------------------------------------

  echo "Update table: ";
$eventID=$_POST["eventID"];
$table="events";
$params=array("event_name"=>"$event_name", "start_date"=>"$start_date", "cost"=>"$cost");
$where="eventID = ".$eventID;

$obj->update($table,$params,$where);
//--------------------------------------------------

  echo "Update table: ";

$table="images";
$params=array("address"=>"$address", "city"=>"$city", "country"=>"$country");
$where="fk_eventID = ".$eventID;

$obj->update($table,$params,$where);
//--------------------------------------------------

  echo "Update table: ";
$fk_locationID=$_POST['eventID'];
$table="location";
$params=array("image_url"=>"$image_url");
$where="locationID = ".$fk_locationID;

$obj->update($table,$params,$where);
//--------------------------------------------------


    

        echo'<html>

    <head>

    <title>PHP CRUD  |  update concert</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script><body>'
        ;

        echo "<h1 class='text-danger text-center'>Succcessfully Updated</h1>";
        echo "<div class=' text-center container'>";
        echo "<a href='../action_forms/update_event.php?eventID=".$eventID."'><button type='button'class='btn btn-warning mx-1'>Back</button></a>";

        echo "<a href='../../../events.php'><button type='button' class='btn btn-warning mx-1'>Home</button></a>";
        echo'</div></body>

            </html>';

        
        

}

?>

