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
          
       
        <form action="../actions/a_create_course.php" method="post" class="my-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Course name:</label>
                <input type="text"
                class="form-control"
                name="course_name"
                placeholder="Enter Course name"
                >
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Course description:</label>
                <input type="text"
                class="form-control"
                name="course_description"
                placeholder="Course description:"
                >
              </div>
          
              <button type="submit" class=" btn btn-danger">
                create
              </button>

              <a href="../../../admin.php">
              <button type="button" class=" btn btn-danger">
                Back
              </button>
                </a>
            </form> 
              
          </div>
<?php 
include '../../footer.php';
?>
crud
<!-- <table class="table my-3 mx-1 vertical-align">
    <thead class="thead-dark">
      <tr>
        <th scope="col">course name</th>
        <th scope="col">course description</th>
        <th scope="col">operation</th>
      </tr>
    </thead>
    <tbody class="table-striped" id="selresult"> target to ajax
    
        
      <?php foreach($rowCourse as $rowCourses){
        echo "<tr>";              //loops to print the records
        echo "<td>".$rowCourses['course_name']."</td>";
        echo "<td>".$rowCourses['course_description']."</td>";
        echo "<td><a href='inc/courses/action_forms/update_course.php?courseID=".$rowCourses['courseID']."' role='button' class='btn btn-warning mx-1 btn-sm px-3'>Edit</a>
          <a href='inc/courses/action_forms/delete_course.php?courseID=".$rowCourses['courseID']."' role='button' class='btn btn-danger mx-1 btn-sm px-3'>delete</a>
          </td>";
        echo "</tr>";
      } ?>

    
    </tbody>
</table> -->
