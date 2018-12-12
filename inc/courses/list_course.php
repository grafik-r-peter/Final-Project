<?php
$rows=$obj->fetch_records("courses");
?>
<table class="table table-sm table-light mt-3 students-table">
   <thead class="thead-dark students-thead">
     <th>ID</th>
     <th>course_name</th>
     <th>course_description</th>
     <th></th>
   </thead>
<?php   
    foreach ($rows as $row) { ?>
        <tr class="">                                                
            <td><?php echo $row['courseID']; ?> </td>
            <td><?php echo $row['course_name'];?></td>
            <td><?php echo $row['course_description'];?></td>            
            <td>
            <a href="inc/courses/action_forms/update_course.php?courseID=<?php echo $row['courseID'];?>">
                <button type="button" class="btn btn-outline-secondary">
                  Edit
                </button>
            </a>
              <a href="inc/courses/action_forms/delete_course.php?courseID=<?php echo $row['courseID'];?>">
                <button type="button" class="btn btn-outline-secondary">
                  Delete
                </button>
            </a>
            </td>                                           
        </tr> 
<?php } ?> 
</table>