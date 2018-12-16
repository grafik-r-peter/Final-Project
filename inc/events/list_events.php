<?php 
 $tables=array("images", "events", "location");
  $rows="*";
  $join=array("events.eventID = images.fk_eventID" ,"location.fk_eventID = events.eventID");

  $rows=$obj->join_tables($tables,$rows,$join);

 ?>

<table class="table table-sm table-light mt-3 students-table">
                                <thead class="thead-dark students-thead">
                                  <th>ID</th>
                                  <th>event_name</th>
                                  <th>start_date</th>
                                  <th>cost</th>
                                  <th>address</th>
                                  <th>image</th>
                                  <th></th>

                                </thead>                                
                                        
                                        <?php foreach ($rows as $row) { ?>
                                        <tr class="">                                                
                                                <td><?php echo $row['eventID']; ?> </td>
                                                <td><?php echo $row['event_name'];?></td>
                                                <td><?php echo $row['start_date'];?></td>                                                 
                                                <td><?php echo $row['cost']; ?></td>
                                                <td><?php echo $row['address'].','.$row['city'].', '.$row['country']; ?></td>
                                            
                                                <td><?php echo $row['image_url']; ?></td>
                                                <td>
                  <a href="inc/events/action_forms/update_event.php?eventID=<?php echo $row['eventID'];?>">
                      <button type="button" class="btn btn-outline-secondary">
                        Edit
                      </button>
                  </a>
                    <a href="inc/events/action_forms/delete_event.php?eventID=<?php echo $row['eventID'];?>">
                      <button type="button" class="btn btn-outline-secondary">
                        Delete
                      </button>
                  </a>
                  </td> 
                                            
                                        </tr> 

                                        <?php } ?>                                                                     
                              </table>

