<?php

include '../../db_actions.php';


    if($_POST){
    $company_id=$_POST["company_id"]; 
    
//---------------------------------------------
    $rowss=$obj->fetch_records("companies");
//------------------------------------------------
    $table="companies";
    $where="company_id= ".$company_id;
    $obj->delete($table,$where);
}?>

        <html>

    <head>

    <title>PHP CRUD  |  delete Company</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script><body>
        

        <h1 class='text-danger text-center'>Successfully deleted!!</h1>
        <div class=' text-center container'>
        <a href='../../../admin.php'><button type='button' class='btn btn-warning'>Back</button></a>
        </div>
    </body>

    </html>



