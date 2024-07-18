<?php include('header.php');
	$qry2=mysqli_query($conn,"select * from movies where MovieID='".$_GET['id']."'");
	$movie=mysqli_fetch_array($qry2);
	?>
<div class="content">
	<div class="wrap">
		<div class="content-top">
				<div class="section group">
					<div class="about span_1_of_2">	
						<h3><?php echo $movie['MovieName']; ?></h3>	
							<div class="about-top">	
								<div class="grid images_3_of_2">
									<img src="<?php echo $movie['Image']; ?>" alt=""/>
								</div>
								<div class="desc span_3_of_2">
									<p class="p-link" style="font-size:15px">Genre : <?php echo $movie['Genre']; ?></p>
									<p class="p-link" style="font-size:15px">Release Date : <?php echo date('d-M-Y',strtotime($movie['ReleaseDate'])); ?></p>
									<p style="font-size:15px"><?php echo $movie['Description']; ?></p>
									<a href="<?php // echo $movie['video_url']; ?>" target="_blank" class="watch_but">Watch Trailer</a>
								</div>
								<div class="clear"></div>
							</div>
							<?php $s=mysqli_query($conn,"SELECT DISTINCT r.CinemaID
														FROM rooms r
														INNER JOIN showtimes s ON r.RoomID = s.RoomID
														WHERE s.MovieID = '".$movie['MovieID']."'");
							if(mysqli_num_rows($s))
							{?>
							<table class="table table-hover table-bordered text-center">
							<?php
								
								while($shw=mysqli_fetch_array($s))
								{
									$t=mysqli_query($conn,"select * from cinemas where CinemaID='".$shw['CinemaID']."'");
									$theatre=mysqli_fetch_array($t);
									?>
									<tr>
										<td>
											<?php echo $theatre['CinemaName'].", ".$theatre['Location'];?>
										</td>
										<td>
											<?php $tr=mysqli_query($conn,"SELECT *
																		FROM showtimes s
																		INNER JOIN rooms r ON s.RoomID = r.RoomID
																		WHERE s.MovieID = '".$movie['MovieID']."' AND r.CinemaID = '".$shw['CinemaID']."'");
											while($shh=mysqli_fetch_array($tr))
											{
												$ttm=mysqli_query($conn,"select  * from showtimes where ShowtimeID='".$shh['ShowtimeID']."'");
												$ttme=mysqli_fetch_array($ttm);
												
												?>
												
												<a href="check_login.php?show=<?php echo $shh['ShowtimeID'];?>&movie=<?php echo $shh['MovieID'];?>&theatre=<?php echo $shw['CinemaID'];?>"><button class="btn btn-default"><?php echo date('h:i A',strtotime($ttme['Showtime']));?></button></a>
												<?php
											}
											?>
										</td>
									</tr>
									<?php
								}
							?>
						</table>
							<?php
							}
						
							else
							{
								?>
								<h3>No Show Available</h3>
								<?php
							}
							?>
						
					</div>			
				<?php include('movie_sidebar.php');?>
			</div>
				<div class="clear"></div>		
			</div>
	</div>
</div>
<?php include('footer.php');?>