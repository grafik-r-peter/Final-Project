<?php 

include "../../header.php";

require_once '../../db_actions.php';
 
if($_GET['id']) {
    $id = $_GET['id'];
 
    $sql = "SELECT * FROM student_profile WHERE profile_id = {$id}";
    $rows=$db->query($sql);

    $skills = "SELECT * FROM skills";
    $row=$db->query($skills);
 

 





 ?>



<form action="../actions/a_create_profile.php" method="POST">
  <div class="form-group">
    <label>First Name</label>
    <input type="text" class="form-control" placeholder="First Name" name="f_name">
  </div>
   <div class="form-group">
    <label>Last Name</label>
    <input type="text" class="form-control" placeholder="Last Name" name="l_name">
  </div>
  <div class="form-group">
    <label>Email address</label>
    <input type="email" class="form-control" name="email" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label>Phone Number</label>
    <input type="text" class="form-control" name="phone" placeholder="Phone">
  </div>
  <div class="form-group">
    <label>Portfolio URL</label>
    <input type="text" class="form-control" name="portfolio" placeholder="Website">
  </div>
  <div class="form-group">
    <label>Short Description</label>
    <textarea class="form-control" name="description" placeholder="Add short description"></textarea>
  </div>
  <div class="form-group">
    <label>Job Status</label>
    <select multiple class="form-control" name="job_status">
      <option value="employed">Employed</option>
      <option value="available">Available</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Create</button>
</form>
