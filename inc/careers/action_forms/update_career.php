<?php


require_once '../../db_actions.php';

  $career_id = $_GET['career_id'];

 
  if($_GET['career_id']) {

    $sql = "SELECT * FROM career WHERE  career_id = {$career_id}";
    $connect = new mysqli("127.0.0.1", "root", "", "alumni_project");
    $result = $connect->query($sql);
    $data = $result->fetch_assoc();
   
//--------------------------------------------------------------------  
 ?>

  
    <form action="../actions/a_update_career.php" method="post" class="my-2">
              <div class="form-group">
                <label for="exampleInputEmail1">Career title:</label>
                <input type="text"
                class="form-control"
                name="career_title"
                placeholder="Enter Career title"
                value="<?php echo $data['career_title'] ?>"
                >
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Career teaser:</label>
                <input type="text"
                class="form-control"
                name="career_teaser"
                placeholder="Career teaser"
                value="<?php echo $data['career_teaser'] ?>"
                >
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1"> Career content:</label>
                <input type="text"
                class="form-control"
                name="career_content"
                placeholder="Enter Career content"
                value="<?php echo $data['career_content'] ?>"
                >
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Career image:</label>
                <input type="text"
                class="form-control"
                name="career_image"
                placeholder="Enter Career image"
                value="<?php echo $data['career_image'] ?>"
                >
              </div>
     
              <input type="hidden" name="career_id" value="<?php echo $data['career_id']?>">
 
              <button class="btn btn-danger" value="">
                Save Changes
              </button>
              <a href="../../../career.php"><button type="button" class=" btn btn-danger">Back</button></a>
            </form> 

 </div>
</body>
</html>
<?php 
}else{
  echo "eror";}
 ?>


