<?php
include '../../db_actions.php';

  $rowss=$obj->fetch_records("career");
//--------------------------------------------------
  $career_title =$_POST['career_title'];
  $career_teaser =$_POST['career_teaser'];
  $career_content =$_POST['career_content'];
  $career_image =$_POST['career_image'];

//------------------------------------------------

  $fields=array("career_title"=>"$career_title", "career_teaser"=>"$career_teaser", "career_content"=>"$career_content", "career_image"=>"$career_image");
  $test=$obj->insert_record('career', $fields);
//--------------------------------------------------
       ?>   
    <html>

    <head>
    <title>PHP CRUD  |  Add career</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script><body>
        
        <h1 class='text-center text-danger'>New Record Successfully Created</h1>
        <div class=' text-center container'>
        <a href='../action_forms/create_career.php' style='text-decoration:none'>
                <button type='button' class='btn btn-warning m-1'>
                    Back
                </button>
                </a>

        <a href='../../../career.php'><button type='button' class='btn btn-warning m-1'>Home
        </button>
        </a>
        </div>
      </body>
        </html>
    
    





