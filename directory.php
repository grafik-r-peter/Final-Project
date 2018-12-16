<?php 
include 'inc/header.php';
include "inc/topnav.php";
include "inc/nav.php";
include "inc/carousel.php";


?>
    <script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"inc/directory/list_directory.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#content').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});


    </script>

<div class="container mt-5">
        <div class="row justify-content-md-center">
                <div class="col-md-10">
                        <div class="text-center center-block">                
                                <h2>Directory of Code Factory students</h2>
                                <div class="form-group my-3">
    <div class="input-group">
     <input type="text" name="search_text" id="search_text" placeholder="Search"/>
    </div>
   </div>
                        </div>
                <div id="content">
    

                       
                </div>
        </div>
</div>
</div>
<?php 
include 'inc/footer.php';
?>