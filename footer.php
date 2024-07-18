<div class="footer">
	<div class="wrap">
			<div class="footer-top">
				<div class="col_1_of_4 span_1_of_4" style="width:20%;margin-right: 60px;">
					<div class="footer-nav">
						<div class="h-logo" style="margin-right: 160px; width:150px; height: auto;">
							<a href="index.php"><img src="images/logo.png"  alt=""/></a>
						</div>
		            </div>
				</div>
				<div class="col_1_of_4 span_1_of_4" style="width:20%;margin-right: 65px;">
					<div class="textcontact">
						<p style="color: white;">Theatre 3D Movie<br>
						Address: No 1, Trinh Van Bo Street, Nam Tu Liem district, Ha Noi.<br>
						Email: theatre3d@gmail.com<br>
						</p>
					</div>
				</div>
				<div class="col_1_of_4 span_1_of_4" style="width:20%;margin-right: 65px;">
					<div class="call_info">
						<p class="txt_3" style="color: white;">Call us:</p>
						<p class="txt_4" style="color: white;">123-456-7890</p>
					</div>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<div class=social>
						<a href="#"><img src="images/fb.png" alt=""/></a>
						<a href="#"><img src="images/tw.png" alt=""/></a>
						<a href="#"><img src="images/dribble.png" alt=""/></a>
						<a href="#"><img src="images/pinterest.png" alt=""/></a>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</body>
</html>

<style>
.content {
	padding-bottom:0px !important;
}
#form111 {
                width:500px;
                margin:50px auto;
}
#search111{
                padding:8px 15px;
                background-color:#fff;
                border:0px solid #dbdbdb;
}
#button111 {
                position:relative;
                padding:6px 15px;
                left:-8px;
                border:2px solid #207cca;
                background-color:#207cca;
                color:#fafafa;
}
#button111:hover  {
                background-color:#fafafa;
                color:#207cca;
}

</style>

<script src="js/auto-complete.js"></script>
 <link rel="stylesheet" href="css/auto-complete.css">
    <script>
        var demo1 = new autoComplete({
            selector: '#search111',
            minChars: 1,
            source: function(term, suggest){
                term = term.toLowerCase();
                <?php
						$qry2=mysqli_query($con,"select * from tbl_movie");
						?>
               var string="";
                <?php $string="";
                while($ss=mysqli_fetch_array($qry2))
                {
                
                $string .="'".strtoupper($ss['movie_name'])."'".",";
                //$string=implode(',',$string);
                
              
                }
                ?>
                //alert("<?php echo $string;?>");
              var choices=[<?php echo $string;?>];
                var suggestions = [];
                for (i=0;i<choices.length;i++)
                    if (~choices[i].toLowerCase().indexOf(term)) suggestions.push(choices[i]);
                suggest(suggestions);
            }
        });
    </script>