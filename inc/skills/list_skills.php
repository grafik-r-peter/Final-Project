<?php
$rows=$obj->fetch_records("skills");
?>
<table class="table table-sm table-light mt-3 students-table">
   <thead class="thead-dark students-thead">
     <th>ID</th>
     <th>skill_id</th>
     <th>skill</th>
     <th></th>
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