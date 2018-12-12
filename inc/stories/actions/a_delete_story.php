<?php

include '../../db_actions.php';


if($_GET){
    $storyID = $_POST['storyID'] ;
    echo $storyID;

    $table="stories";
    $where="storyID = ".$storyID;
    $obj->delete($table,$where);

}?>
