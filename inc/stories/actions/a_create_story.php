<?php

require_once '../../db_actions.php';
 
if($_POST) {
    $profile_id = $_POST['profile_id'] // STILL NEED A ID TO GRAB FROM THE BUTTON
    $teaser = $_POST['teaser'];
    $content = $_POST['content'];

    $fields=array("story_teaser"=>$teaser,
                  "story_content"=>$content);
    $obj->insert_record("stories",$fields);
}
 
?>



 

 
