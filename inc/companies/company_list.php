<?php
 $rows=$obj->fetch_records("companies");
?>
<a href="./action_forms/create_companies.php">

</a>
<table class="table table-sm table-light mt-3 students-table">
   <thead class="thead-dark students-thead">
     <th>ID</th>
     <th>company_name</th>
     <th>company_address</th>
     <th></th>
   </thead>

<?php
 foreach ($rows as $row) { ?>
   <tr class="">
     <td><?php echo $row['company_id']; ?> </td>
     <td><?php echo $row['company_name'];?></td>
     <td><?php echo $row['company_address'];?></td>
     <td>
              <a href="inc/companies/action_forms/update_companies.php?company_id=<?php echo $row['company_id'];?>">
              <button type="button" class="btn btn-outline-secondary">
                Edit
              </button>
              </a>
            <a href="inc/companies/action_forms/delete_companies.php?company_id=<?php echo $row['company_id'];?>">
              <button type="button" class="btn btn-outline-secondary onclick="confirmation()"">
                Delete
              </button>
              </a>
     </td>
   </tr>
    <?php } ?>
</table>