<html?>
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
          				$qry2=mysqli_query($conn,"select * from  tbl_movie where status='0'  limit 4");

          				  while($m=mysqli_fetch_array($qry2))
                   {
                    ?>

					
            <div class="content-left">
					<div class="listimg listimg_1_of_2" style="width:100%; display:flex;flex-wrap:wrap;">
					<?php
						
						?>
						 <a href="about.php?id=<?php echo $m['movie_id'];?>"><img height="100px;" src="<?php echo $m['image'];?>"></a>
					</div>
					<div class="text list_1_of_2">
						  <div class="extra-wrap1">
                                         <a href="about.php?id=<?php echo $m['movie_id'];?>" class="link4"><?php echo $m['movie_name'];?></a><br>
                                        <span class="data">Release Date:<?php echo $m['release_date'];?></span><br>
                                        Cast:<Span class="data"><?php echo $m['cast'];?></span><br>
                                        Description: <span" class="color2"><?php echo $m['desc'];?></span><br>
                                    </div>
					</div>
					
					<div class="clear"></div>
				</div>
			

  	    <?php
  	    	}
  	    	?>

			
				
			
		</div>				

		<div>
		<?php include('movie_sidebar.php');?>

		</div>

	</div>
	
</div>
<?php include('footer.php');?>
</div>
<?php include('searchbar.php');?>