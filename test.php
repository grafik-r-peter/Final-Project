<?php

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "alumni_project";

		$conn = mysqli_connect($servername, $username, $password, $dbname);

		/*$sql = "SELECT event_name, event_category FROM events WHERE event_name LIKE '%".$_POST["search"]."%'";*/
		$sql="SELECT * FROM images JOIN events ON events.eventID = images.fk_eventID JOIN location ON location.locationID = events.fk_locationID WHERE event_name LIKE '%".$_POST["search"]."%'";
		$result = mysqli_query($conn, $sql);
		

		$output='';
		if(mysqli_num_rows($result) > 0)
		{

			while($row = mysqli_fetch_array($result))
			{
				$output .= ' 
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
                </div>
                  ';
			}
			echo $output;
		}
		else
		{
			echo 'No data found';
		}
		
		mysqli_close($conn);
?>