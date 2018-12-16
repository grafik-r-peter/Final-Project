<?php
$rows=$obj->fetch_records("skills");
?>
<div class="container">
  <div class="row  justify-content-center">
    <div class="col-md-8">
      <table class="table table-sm table-light mt-3 students-table">
         <thead class="thead-dark students-thead">
           <th>ID</th>
           <th>skill</th>
           <th style="width:20%;"></th>
         </thead>
      <?php   
          foreach ($rows as $row) { ?>
              <tr class="">                                                
                  <td><?php echo $row['skillsID']; ?> </td>
                  <td><?php echo $row['skill'];?></td>
                  <td>
                  <a href="inc/skills/action_forms/update_skill.php?skillsID=<?php echo $row['skillsID'];?>">
                      <button type="button" class="btn btn-outline-secondary">
                        Edit
                      </button>
                  </a>
                    <a href="inc/skills/action_forms/delete_skill.php?skillsID=<?php echo $row['skillsID'];?>">
                      <button type="button" class="btn btn-outline-secondary">
                        Delete
                      </button>
                  </a>
                  </td>                                           
              </tr> 
      <?php } ?> 
      </table>
    </div>
  </div>
</div>