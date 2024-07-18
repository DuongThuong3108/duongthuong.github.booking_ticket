<html>
	<style>
		.listimg_1_of_2 img {
			width: 100%;
			height: auto;
		}
	</style>
</html>
<body>
<?php
include('header.php');
?>

<div class="content">
	<div class="wrap">
		<div class="content-top">
				<div class="listview_1_of_3 images_1_of_3">
				<h3>Films in Theaters</h3>
					
					<?php
          				$today=date("Y-m-d");
          				$qry2=mysqli_query($conn,"select * from  movies order by rand() Limit 10");

          				  while($m=mysqli_fetch_array($qry2))
                   {
                    ?>

					
            <div class="content-left">
					<div class="listimg listimg_1_of_2" style="width:100%;">
					<?php
						
						?>
						 <a href="about.php?id=<?php echo $m['MovieID'];?>"><img height="100px;" src="<?php echo $m['Image'];?>"></a>
					</div>
					<div class="text list_1_of_2">
						  <div class="extra-wrap1">
                                        <a href="about.php?id=<?php echo $m['MovieID'];?>"><h4 style="color:black; font-weight:bold;"><?php echo $m['MovieName'];?></h4></a><br>
                                        <strong>Release Date: </strong><span><?php echo $m['ReleaseDate'];?></span><br>
                                        <strong>Genre: </strong><span><?php echo $m['Genre'];?></span><br>
                                        <strong>Description: </strong> <span><?php echo $m['Description'];?></span><br>
                                    </div>
					</div>
					
					<div class="clear"></div>
				</div>
  	    		<?php
  	    			}
  	    			?>
				
			
		</div>				
				<div class="listview_1_of_3 images_1_of_3">
				<h3>Films in Theaters</h3>
					
					<?php
          				$today=date("Y-m-d");
          				$qry2=mysqli_query($conn,"select * from  movies order by rand() Limit 10");

          				  while($m=mysqli_fetch_array($qry2))
                   {
                    ?>

					
            <div class="content-left">
					<div class="listimg listimg_1_of_2" style="width:100%;">
					<?php
						
						?>
						 <a href="about.php?id=<?php echo $m['MovieID'];?>"><img height="100px;" src="<?php echo $m['Image'];?>"></a>
					</div>
					<div class="text list_1_of_2">
						  <div class="extra-wrap1">
						  				<a href="about.php?id=<?php echo $m['MovieID'];?>"><h4 style="color:black; font-weight:bold;"><?php echo $m['MovieName'];?></h4></a><br>
						  				<strong>Release Date: </strong><span><?php echo $m['ReleaseDate'];?></span><br>
                                        <strong>Genre: </strong><span><?php echo $m['Genre'];?></span><br>
                                        <strong>Description: </strong> <span><?php echo $m['Description'];?></span><br>
                                    </div>
					</div>
					
					<div class="clear"></div>
				</div>
  	    		<?php
  	    			}
  	    			?>
					
					
		</div>			
		<?php include('movie_sidebar.php');?>
	</div>
</div>
<?php include('footer.php');?>
</div>
<?php include('searchbar.php');?>