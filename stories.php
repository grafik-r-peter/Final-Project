<?php 
include 'inc/header.php';
include "inc/carousel.php";
include "inc/stories/list_stories.php"
?>




<div class="container mt-5">
	<h1 class="title text-center p-3">Our Success Stories</h1>

	<h4 class="title text-center p-4">Alumni from CodeFactory</h4>

   

	<?php foreach ($data as $row) { ?>	
		<div class="row p-2">
			<figure class="col-md-4 col-sm-12">
				<figcaption class="text-uppercase font-weight-bold text-center">
					<?php echo $row['first_name']; echo " "; echo $row['last_name']; ?>
				</figcaption>

				<div>
					<div class="hovereffect">
						<img class="img-fluid img-thumbnail" src="assets/img/<?php echo $row['image_url'] ?>" 
						alt="<?php echo $row['first_name']; echo $row['last_name']; ?>">

						<div class="overlay">
            				
				                <p>
				                    <a href="https://twitter.com/" target="_blank">
				                        <i class="fab fa-twitter"></i>
				                    </a>
				                    <a href="https://www.facebook.com/" target="_blank">
				                        <i class="fab fa-facebook f"></i>
				                    </a>
				                    <a href="https://www.instagram.com/" target="_blank">
				                        <i class="fab fa-instagram"></i>
				                    </a>
				                    <a href="https://www.linkedin.com/" target="_blank">
				                        <i class="fab fa-linkedin-in"></i>
				                    </a>
				                </p>
            				
        				</div>
					</div>
				</div>

			</figure>

			<p class="col-md-4 col-sm-12 text-justify pt-md-4"><?php echo $row['story_teaser'] ?></p>
			<div class="col-md-4 col-sm-12 text-justify pt-md-4">
				<p class="font-weight-bold">Skills:</p>
				<ul>
					 <?php 
						$arr= $row["skills"];
					   foreach ($arr as $c){
					       echo "<li>".$c["skills"]."</li>";
					   } 
					 ?>

			<br>
					<button class="btn btn-outline-dark" type="button" data-toggle="collapse" data-target="#collapse<?php echo $row['profile_id'];?>" aria-expanded="false" aria-controls="collapse<?php echo $row['profile_id'];?>">
		    		Read more
		  			</button>
				</ul>
			</div>

			<div class="collapse m-3" id="collapse<?php echo $row['profile_id'];?>">
				<div class="card card-body">
					<?php echo $row['story_content']; ?>					
				</div>
			</div>
			
		</div>
		<?php } ?>

		<hr>

			

<?php 
include 'inc/footer.php';
?>