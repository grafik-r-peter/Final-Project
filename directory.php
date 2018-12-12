<?php 
include 'inc/header.php';
include "inc/carousel.php";
include "inc/directory/list_directory.php";
?>

<div class="container mt-5">
        <div class="row justify-content-md-center">
                <div class="col-md-10">
                        <div class="text-center center-block">                
                                <h2>Directory of Code Factory students</h2>
                                <label>Search </label>
                                <form class="form-inline d-flex justify-content-center">
                                    <input name="searchInput" class="form-control" placeholder="e.g.">
                                    <button class="btn btn-outline-secondary" (click)="searchText=''">reset</button>
                                </form>
                        </div>
                        <table class="table table-sm table-light mt-3 students-table">
                                <thead class="thead-dark students-thead">
                                        <th></th>
                                        <th>Name</th>
                                        <th>Skills</th>
                                        <th>Course</th>
                                        <th>Job Status</th>
                                        <th></th>
                                </thead>                                
                                        
                                        <?php foreach ($data as $row) { ?>
                                        <tr class="">                                                
                                                <td><img src="<?php echo $row['profile_picture']; ?>" class="dir-img" alt="<?php echo $row['first_name']." "; echo $row['last_name']; ?>"></td>
                                                <td><?php echo $row['first_name']." "; echo $row['last_name']; ?> </td>
                                                <td>
                                                        <!-- Loop through skills array -->
                                                        <?php 
                                                            $arr= $row["skills"];
                                                            foreach ($arr as $c){
                                                            echo $c["skills"]."<br>";
                                                        }?> 
                                                </td>
                                                <td>
                                                        <!-- Loop through courses array -->
                                                        <?php 
                                                            $arr= $row["courses"];
                                                            foreach ($arr as $c){
                                                                echo $c["courses"]."<br>";
                                                            }
                                                        ?> 
                                                </td>                                                        
                                                <td><?php echo $row['jobs_status']; ?></td>
                                                <td>
                                                        <a href="profile.php/?id=<?php echo $row["profile_id"];?>">
                                                        <button class="btn btn-outline-dark">
                                                               Profile 
                                                        </button>
                                                </a>
                                                </td>                                           
                                        </tr> 
                                        <?php } ?>
                                          
                                                                                                    
                        </table>
                </div>
        </div>
</div>

<?php 
include 'inc/footer.php';
?>