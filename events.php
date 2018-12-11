<?php   
  include 'inc/header.php';
  /*include 'inc/db_actions.php';*/


  $tables=array("images", "events", "location");
  $rows="*";
  $join=array("events.eventID = images.fk_eventID" ,"location.locationID = events.fk_locationID");

  $rows=$obj->join_tables($tables,$rows,$join);
?>
<link rel="stylesheet" href="./assets/css/form.css">

<style>

  div {
    border: 1px solid red;
  }

</style>

   
<!-- <div class="dropdown-menu" aria-labelledby="dropdown04">
  <a class="dropdown-item" href="restaurant_create.php">add new restaurant</a>
  <a class="dropdown-item" href="concert_create.php">add new concert</a>
  <a class="dropdown-item" href="place_create.php">add new place</a>
</div> -->
<script>

  function confirmation(){
    $('#confirm').modal('show');
  }

</script>
<div class="tab-content">
  <div class="tab-pane container-fluid active" id="first">
<div class="modal fade" id="confirm" role="dialog">
  <div class="modal-dialog modal-sm h-100 d-flex flex-column justify-content-center my-0">
    <div class="modal-content bg-dark text-white">
      <div class="modal-header">
        <h4 class="modal-title">Are you sure?</h4>
      </div>
      <div class="modal-body">
          Body text here
      </div>
      <div class="modal-footer">
          <button type="button" data-dismiss="modal" class="btn btn-danger mx-auto">Delete</button>
          <button type="button" data-dismiss="modal" class="btn btn-primary mx-auto">Cancel</button>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<button type="button"
        class="btn btn-outline-secondary
        onclick="confirmation()"">
          delete
</button>


<div class="container mt-5">
  <div class="col-sm-8">
      <div class="containerFilter clearfix margin-b-80">
          <a href="/events" data-filter="*" class="current"><b>ALL</b></a> -
          <a href="/events#courses"><b>Courses</b></a> -
          <a href="/events#Conferences"><b> Conferences</b></a> -
      </div>
  </div>

   <h3 class="mt-5">Courses</h3>
    

   
        <br>
        <br>
<input class="form-control mt-3" type="text" name="search-text" id="search-text" placeholder="fast search">

  <h3>Events</h3>
    <div class="container" id="selresult">
      <div class="row">
          <?php foreach($rows as $row){
        echo' 
        <div class="card col-lg-4" style="width: 18rem;">
          <div class="hovereffect">
              <img class="card-img-top
              img-responsive
              img"
              src="'.$row['image_url'].'" 
              alt="Card image cap">
          
            <div class="card-body overlay">
              <a class="info" 
              href="http://www.codefactory.wien/de/willkommen-bei-der-codefactory/">
                Join us
              </a>
            </div>
          </div> 
                   
          <div class="card-body">
            <h3>'.$row['event_name'].'</h3>
            Start Date:
              '.$row['start_date'].'<br>
            Cost:
              '.$row['cost'].'<br>
            Class size:
              25<br>    
            Location:
              '.$row['address'].', '.$row['city'].', '.$row['country'].'
          </div>
          <div class="d-flex justify-content-start mb-4">
            <a href="inc/events/action_forms/update_event.php?eventID='.$row['eventID'].'"
            style="text-decoration:none">
              <button type="button" class="btn btn-outline-secondary">
                Edit
              </button>
            </a>
            <a href="inc/events/action_forms/delete_event.php?eventID='.$row["eventID"].'">
              <button type="button"
              class="btn btn-outline-secondary
              onclick="confirmation()"">
                delete
              </button>
          </a>
</div>
        </div>
          '
        ;}
        ?>    
      </div>
    </div>
    <script>
      let firstKey=true;
      let savedList = '';
      $(document).ready(function() {
        $('#search-text').keyup(function() {
          if (firstKey) {   // save original list
                savedList = $('#selresult').html();
                firstKey = false;
                }
          var txt = $(this).val();
            if (txt == '')
            {
              $('#selresult').html(savedList);  // restore original list
            }
            else
            {
              // console.log(txt);
              $('#selresult').html('Searching...');
              $.ajax({
                url:"test.php",
                method:"post",
                data:{search:txt},
                dataType:"text",
                success:function(data)
              {

                  $('#selresult').html(data);

                }
               });
            }

        });
      });

    </script>

<!-- 
<center><h3>Google Maps</h3></center>
    
<div id="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d170129.53089878606!2d16.23997523842075!3d48.22059981577508!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476d079e5136ca9f%3A0xfdc2e58a51a25b46!2sVienna!5e0!3m2!1sen!2sat!4v1539344574292" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
</div> -->
</div>
</div>
<?php 
include 'inc/footer.php';
?>