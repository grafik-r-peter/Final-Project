<?php 
include 'inc/header.php';
include 'inc/db_actions.php';
/*include "inc/carousel.php";*/
$rowCareer=$obj->fetch_records("career");
?>

<div class="container mt-5">

    <div class="row">
        <div class="col-sm-12">
    <h4 class="title text-center p-4">Companies that hire at the moment</h4>
        </div> 
    </div>      

    <div class="row">
      <?php 
      $i=0;
      foreach($rowCareer as $rowCareers){echo '<div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="'.$rowCareers["career_image"].'" data-holder-rendered="true">
                <div class="card-body">
                <h5 class="text-danger">'.$rowCareers["career_title"].'</h5>
                  <p class="card-text">'.$rowCareers["career_teaser"].'</p>
                  <a class="text-info" href="#" data-toggle="modal" data-target="#exampleModalCenter1'.$i.'">
                    show more
                    </a>
<!-- Modal -->
    <div class="modal fade" id="exampleModalCenter1'.$i.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle'.$i.'">'
        .$rowCareers["career_title"].'</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="'.$rowCareers["career_image"].'" data-holder-rendered="true"><hr>
        
        
        <p class="card-text">'.$rowCareers["career_teaser"].'</p>
        
        
        </div>
        <div class="modal-footer">

        </div>
        </div>
        </div>
    </div>
                  
                  <div class="d-flex justify-content-between align-items-center my-3">
                    <div class="btn-group">
                
                    </div>
                    
                  </div>
                  <div class="d-flex justify-content-between align-items-center my-3">
  <div class="btn-group">
  <a href="inc/career/action_forms/update_career.php?career_id='.$rowCareers["career_id"].'">
      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
    </a>
<a href="inc/career/action_forms/delete_career.php?career_id='.$rowCareers["career_id"].'">
      <button type="button" class="btn btn-sm btn-outline-secondary">delete</button></a>
  </div>
</div>
                </div>

              </div>
              
            </div>


            ';$i++;}?>
        <!-- col end -->
        
      </div>
      <!-- /.row -->

</div>
<?php 
include 'inc/footer.php';
?>
