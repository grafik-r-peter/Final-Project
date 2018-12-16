<?php
include '../../db_actions.php';

  $event_name =$_POST['event_name'];
  $start_date =$_POST['start_date'];
  $cost =$_POST['cost'];
  $address =$_POST['address'];
  $city =$_POST['city'];
  $country =$_POST['country'];
  $type =$_POST['type'];
  $submit=$_POST['submit'];
//------------------------------------------------

  $fields=array("event_name"=>"$event_name", "start_date"=>"$start_date", "cost"=>"$cost","event_category"=>"$type");
  $test=$obj->insert_record('events', $fields);
//--------------------------------------------------

  $sql="INSERT INTO location (address, city, country, fk_eventID) VALUES ('$address','$city','$country',LAST_INSERT_ID())";
  $db->query($sql);

if(isset($submit)) {  
    $message="";
        $upOne = realpath(__DIR__ . '/../../../');
        $safeDir = $upOne.DIRECTORY_SEPARATOR."assets".DIRECTORY_SEPARATOR."img".DIRECTORY_SEPARATOR;
        $filename = basename($_FILES['image']['name']);
        $ext = substr($filename, strrpos($filename, '.') + 1);
        

        //check to see if upload parameter specified
        if(($_FILES["image"]["error"]==UPLOAD_ERR_OK) && ($ext == "png") && ($_FILES["image"]["type"] == "image/png") && ($_FILES["image"]["size"] < 70000000)){
            //check to make sure file uploaded by upload process
            if(is_uploaded_file($_FILES["image"]["tmp_name"])){
                // capture filename and strip out any directory path info
                $fn = basename($_FILES["image"]["name"]);
                //Build now filename with safty measures in place
                $copyfile = $safeDir."safe_prefix_secure_info".strip_tags($fn);
                $path="assets".DIRECTORY_SEPARATOR."img".DIRECTORY_SEPARATOR."safe_prefix_secure_info".strip_tags($fn);
                //copy file to safe directory
                if(move_uploaded_file($_FILES["image"]["tmp_name"], $copyfile)){
                    $message .= "<br>Successfully uploaded file $copyfile\n";
                    $sql = "INSERT INTO images(image_url,fk_eventID) VALUES ('$path',LAST_INSERT_ID())";
                   
                $db->query($sql);
}
    $list = glob($safeDir . "*");
}
} }
   ?>
    <html>

    <head>
    <title>Add Event</title>
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
        </div>
      </body>
        </html>
    
    





