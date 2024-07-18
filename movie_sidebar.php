<html>
	<style>
		.listimg_1_of_2 img {
			width: 100%;
			height: auto;
		}
	</style>
</html>
<body>
	


<div class="listview_1_of_3 images_1_of_3">
					<h3>Upcoming Movies</h3>
					<?php 
					$qry3=mysqli_query($conn,"select * from movies Limit 5");
					
					while($n=mysqli_fetch_array($qry3))
					{
					?>
				<div class="content-left">
					<div class="listimg listimg_1_of_2" style="width:100%;">
						 <img  style="width:100%;" src="<?php echo $n['Image'];?>">
					</div> 
					<div class="text list_1_of_2">
						  <div class="extra-wrap">
						  	<span style="text-color:#000" class="data"><?php echo $n['MovieName'];?><br>
						  	<span style="text-color:#000" class="data">Genre :<?php echo $n['Genre'];?><br>
                                <div class="data">Release Date :<?php echo $n['ReleaseDate'];?></div>
                                
                                
                                
                                <span class="text-top"><?php echo $n['Description'];?></span>
                          </div>
					</div>
					<div class="clear"></div>
				</div>
				<?php
				}
				?>
					
					
				
				
					
					
				
				
				
				
				</div>		
				<div class="clear"></div>		
</body>
