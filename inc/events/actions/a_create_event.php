<?php
include '../../db_actions.php';

//-------------------------------------------------
  $tables=array("images", "events", "location");
  $rows="*";
  $join=array("events.eventID = images.fk_eventID" ,"location.locationID = events.fk_locationID");

  $obj->join_tables($tables,$rows,$join);
//--------------------------------------------------
  $event_name =$_POST['event_name'];
  $start_date =$_POST['start_date'];
  $cost =$_POST['cost'];
  $address =$_POST['address'];
  $city =$_POST['city'];
  $country =$_POST['country'];
  $image_url =$_POST['image_url'];

  $fk_eventID =$_POST['fk_eventID'];
  $fk_locationID =$_POST['fk_locationID'];

//------------------------------------------------

  $fields=array("event_name"=>"$event_name", "start_date"=>"$start_date", "cost"=>"$cost", "fk_locationID"=>"$fk_locationID");
  $test=$obj->insert_record('events', $fields);
//--------------------------------------------------

  $fields=array("address"=>"$address", "city"=>"$city", "country"=>"$country");
  $test2=$obj->insert_record('location', $fields);
//----------------------------------------------------

  $fields=array("image_url"=>"$image_url", "fk_eventID"=>"$fk_eventID");
  $test3=$obj->insert_record('images', $fields);
//------------------------------------------------------              
   ?>
    <html>

    <head>
    <title>PHP CRUD  |  Add concert</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script><body>
        <h1 class='text-center text-danger'>New Record Successfully Created</h1>
        <div class=' text-center container'>
        <a href='../action_forms/create_event.php' style='text-decoration:none'>
          <button type='button' class='btn btn-warning m-1'>
              Back
          </button>
          </a>

        <a href='../../../events.php'><button type='button' class='btn btn-warning m-1'>Home</button></a>
        </div></body>
        </html>
    
    





