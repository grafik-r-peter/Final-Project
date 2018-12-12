<?php
$row=$obj->fetch_records("career");

             
?>
<table class="table table-sm table-light mt-3 students-table">
    <thead class="thead-dark students-thead">
      <th>ID</th>
      <th>career_title</th>
      <th>career_teaser</th>
      <th></th>
    </thead>                                
            
            <?php foreach ($row as $rows) { ?>
            <tr class="">                                                
                    <td><?php echo $rows['career_id']; ?></td>
                    <td><?php echo $rows['career_title'];?></td>
                    <td><?php echo $rows['career_teaser'];?></td>                                                 
                    <td>
                    <a href="inc/careers/action_forms/update_career.php?career_id=<?php echo $rows['career_id'];?>">
                        <button type="button" class="btn btn-outline-secondary">
                          Edit
                        </button>
                    </a>
                      <a href="inc/careers/action_forms/delete_career.php?career_id=<?php echo $rows['career_id'];?>">
                        <button type="button" class="btn btn-outline-secondary">
                          Delete
                        </button>
                    </a>
                    </td>                                           
            </tr> 
            <?php } ?>                                                                     
  </table>