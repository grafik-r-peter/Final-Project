
<?php
 
require_once '../../db_actions.php';
 
if($_GET['id']) {
    $id = $_GET['id'];
 
    $sql = "SELECT profile_id FROM student_profile WHERE profile_id = {$id}";
    $rows=$db->query($sql);

    $stories = "SELECT * FROM stories";
    $row=$db->query($stories);

?>



<form action="../actions/a_create_story.php" method="POST">
  <div class="form-group">
    <label>Story Teaser-Text</label>
    <textarea class="form-control" name="teaser" placeholder="Add Teaser Text"></textarea>
  </div>
  <div class="form-group">
    <label>Story Content-Text</label>
    <textarea class="form-control" name="content" placeholder="Add Content Text"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Create a new Story</button>
</form>

<?php
}
?>