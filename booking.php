<?php include('header.php');
if(!isset($_SESSION['user']))
{
	header('location:login.php');
}
	$qry2=mysqli_query($conn,"select * from movies where MovieID='".$_SESSION['movie']."'");
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
							<table class="table table-hover table-bordered text-center">
							<?php
								$s=mysqli_query($conn," SELECT r.CinemaID, s.ShowtimeID, r.RoomID, t.TicketID
														FROM tickets t
														INNER JOIN showtimes s ON t.ShowtimeID = s.ShowtimeID
														INNER JOIN rooms r ON s.RoomID = r.RoomID
														WHERE t.ShowtimeID ='".$_SESSION['show']."'");
								$shw=mysqli_fetch_array($s);
								
									$t=mysqli_query($conn,"select * from cinemas where CinemaID='".$shw['CinemaID']."'");
									$theatre=mysqli_fetch_array($t);
									?>
									<tr>
										<td class="col-md-6">
											Theatre
										</td>
										<td>
											<?php echo $theatre['CinemaName'].", ".$theatre['Location'];?>
										</td>
										</tr>
										<tr>
											<td>
												Room
											</td>
										<td>
											<?php 
												$ttm=mysqli_query($conn,"select  * from showtimes where ShowtimeID='".$shw['ShowtimeID']."'");
												
												$ttme=mysqli_fetch_array($ttm);
												
												$sn=mysqli_query($conn,"select  * from rooms where RoomID='".$ttme['RoomID']."'");
												
												$screen=mysqli_fetch_array($sn);
												echo $screen['RoomName'];
							
												?>
										</td>
									</tr>
									<tr>
										<td>
											Date
										</td>
										<td>
											<?php 
												$ti=mysqli_query($conn,"select * from tickets where TicketID='".$shw['TicketID']."'");
												$ticket=mysqli_fetch_array($ti);

												echo $ticket['PurchaseDate'];
											?>
										</td>
										
									</tr>
									<tr>
										<td>
											Show Time
										</td>
										<td>
											<?php echo date('h:i A',strtotime($ttme['Showtime']));?> Show
										</td>
									</tr>
									<!-- <tr>
										<td>
											Number of Seats
										</td>
										<td>
											<form  action="process_booking.php" method="post">
												<input type="hidden" name="screen" value="<?php echo $screen['screen_id'];?>"/>
											<input type="number" required tile="Number of Seats" max="<?php echo $screen['seats']-$avl[0];?>" min="0" name="seats" class="form-control" value="1" style="text-align:center" id="seats"/>
											<input type="hidden" name="amount" id="hm" value="<?php echo $screen['charge'];?>"/>
											<input type="hidden" name="date" value="<?php echo $date;?>"/>
										</td>
									</tr> -->
									<tr>
										
									</tr>
									<tr>
										<td colspan="2">
											<a href="book_seat.php" class="btn btn-info" style="width:100%; display: inline-block; text-align: center;">Next</a>
											
											</form>
										</td>
									</tr>
						<table>
							<tr>
								<td></td>
							</tr>
						</table>
					</div>			
				<?php include('movie_sidebar.php');?>
			</div>
				<div class="clear"></div>		
			</div>
	</div>
</div>
<?php include('footer.php');?>
<script type="text/javascript">
	$('#seats').change(function(){
		var charge=<?php echo $screen['charge'];?>;
		amount=charge*$(this).val();
		$('#amount').html("Rs "+amount);
		$('#hm').val(amount);
	});
</script>