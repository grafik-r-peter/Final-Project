<?php   
  include '../../db_actions.php';
  /*include '../../../header.php';*/
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Alumnis Of Code Factory</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="favicon.ico">
  <link rel="stylesheet" type="text/css" href="../../../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../../../assets/css/styles-global.css">
</head>
<body>

<div class="container-fluid topbar">
  <div class="topbar-left">
    <a class="nav-link" target="_blank" href="https://www.codefactory.wien/"> www.codefactory.wien</a>
  </div>

  <div class="topbar-right">
    <a target="_blank" href="https://www.facebook.com/CodeFactoryVienna">
      <img class="logobar" src="../../../assets/img/fb.svg" alt="Logo Facebook">
    </a>
    <a target="_blank" href="https://www.instagram.com/codefactoryvienna/">
      <img class="logobar" src="../../../assets/img/ig.svg" alt="Logo Instagram">
    </a>
  </div>
</div>

<nav class="navbar navbar-expand-md navbar-light bg-light">
  <a class="navbar-brand"  routerLink = "/"><img src="../../../assets/img/alumnilogo.png" alt="Alumni of Code Factory Logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExample04">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" routerLink = "/" routerLinkActive="nav-active" [routerLinkActiveOptions]="{exact: true}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" routerLink = "stories" routerLinkActive="nav-active">Stories</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" routerLink = "directory" routerLinkActive="nav-active">Directory</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" routerLink = "career" routerLinkActive="nav-active">Careers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" routerLink = "events" routerLinkActive="nav-active">Events</a>
      </li>
    </ul>

    <div *ngIf="authService.user | async; else loggedOut">
        <span  class="user-welcome mr-3" *ngIf="authService.user | async">
          Logged in as {{ (authService.user | async)?.email }} | <a routerLink = "intranet">Intranet</a>
        </span>
    </div>
    <ng-template #loggedOut>
    <a routerLink = "intranet">
      <button type="button" class="btn">Intranet</button>
    </a>
    </ng-template>
</div>
</nav>

        <div class="container">
          
       
        <form action="../actions/a_create_event.php" method="post" class="my-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Event name:</label>
                <input type="text"
                class="form-control"
                name="event_name"
                placeholder="Enter Event name"
                >
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Event image url:</label>
                <input type="text"
                class="form-control"
                name="image_url"
                placeholder="Enter image url"
                >
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1"> Start date:</label>
                <input type="date"
                class="form-control"
                name="start_date"
                placeholder="Enter Start date"
                >
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Cost:</label>
                <input type="text"
                class="form-control"
                name="cost"
                placeholder="Enter Cost"
                >
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Address:</label>
                <input type="text"
                class="form-control"
                name="address"
                placeholder="Enter Address"
                >
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">City:</label>
                <input type="text"
                class="form-control"
                name="city"
                placeholder="Enter City"
                >
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Country:</label>
                <input type="text"
                class="form-control"
                name="country"
                placeholder="Enter Country"
                >
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Event Category :</label>

                <select class="custom-select mb-4" name="event_category">
                <?php 
                $tables=array("images", "events", "location");
                $rows="*";
                $join=array("events.eventID = images.fk_eventID" ,"location.locationID = events.fk_locationID");
                $datas=$obj->join_tables($tables,$rows,$join);

                foreach($datas as $data){ 
                  echo "<option value='".$data['event_category']."'>".$data['event_category']."</option>";
              }
                ?>
              </select>
            </div>


              <div class="form-group">
                <label for="exampleInputEmail1">Location:</label>

                <select class="custom-select mb-4" name="fk_locationID">
                <?php 
                $tables=array("images", "events", "location");
                $rows="*";
                $join=array("events.eventID = images.fk_eventID" ,"location.locationID = events.fk_locationID");
                $rowss=$obj->join_tables($tables,$rows,$join);

                foreach($rowss as $data){ 
                  echo "<option value='".$data['locationID']."'>".$data['address']."</option>";
              }
                ?>
              </select>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Event name:</label>

                <select class="custom-select mb-4" name="fk_eventID">
                <?php 

                $tables=array("images", "events", "location");
                $rows="*";
                $join=array("events.eventID = images.fk_eventID" ,"location.locationID = events.fk_locationID");

                $rows=$obj->join_tables($tables,$rows,$join);

                
                foreach($rows as $row){ 
                  echo(
                "<option value='".$row['fk_eventID']."'>".$row['event_name']."</option>"
                
              );
              }
                ?>
              </select>
            </div>

              

              <button type="submit" class=" btn btn-danger">
                create
              </button>

              <a href="../../../events.php">
              <button type="button" class=" btn btn-danger">
                Back
              </button>
                </a>
            </form> 
              
          </div>
<?php 
include '../../footer.php';
?>

