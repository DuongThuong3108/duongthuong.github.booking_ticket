<?php include('header.php');
if(!isset($_SESSION['user']))
{
	header('location:login.php');
}
	
	?>
<div class="content">
	<div class="wrap">
		<div class="content-top">
				<div class="section group">
					<div class="about span_1_of_2">	
						<h3>BOOKINGS</h3>
						<?php include('msgbox.php');?>
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