<?php
include('config.php');
session_start();
date_default_timezone_set('Asia/Kolkata');
?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Free Theater Website Template | About :: w3layouts</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="all" />
<link type="text/css" rel="stylesheet" href="http://www.dreamtemplate.com/dreamcodes/tabs/css/tsc_tabs.css" />
<link rel="stylesheet" href="css/tsc_tabs.css" type="text/css" media="all" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src='js/jquery.color-RGBa-patch.js'></script>
<script src='js/example.js'></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>

</style>

</head>
<body>
<div class="header">
	<div class="header-top">
		<div style="margin:0px auto;width:80%;display:flex;justify-content:space-between;align-items:center;">
			<div class="h-logo" style="margin-right: 160px;">
				<a href="index.php"><img src="images/logo.png" alt=""/></a>
			</div>
			<div>
				<form action="process_search.php"  method="post" onsubmit="myFunction()">
					<fieldset>
						<div style="display:flex;justify-content:center;align-items:center" >
							<input type="text" placeholder="Search Movies Here..." style="height:27px;width:350px;border-radius: 4px;"  required id="search111" name="search_query">
							<input type="submit" value="Search" style="height:29px;padding-top:4px;border-radius: 4px;" id="button111">
						</div>       	
					</fieldset>
				</form>
			</div>
			<div style="margin: 10px auto">
				<ul class="group" id="example-one">
					<li><a href="index.php">Home</a></li>
					<li><a href="movies_events.php">Movies</a></li>
					<li>
						<?php if(isset($_SESSION['user'])){
						$us=mysqli_query($conn,"select * from users where UserID='".$_SESSION['user']."'");
						$user=mysqli_fetch_array($us);?><a href="profile.php"><?php echo $user['Username'];?></a><a href="logout.php">Logout</a><?php }else{?><a href="login.php">Login</a><?php }?>
					</li>
				</ul>
			</div>
 			<div class="clear"></div>
   		</div>
    </div>
</div>
<script>
function myFunction() 
     if($('#hero-demo').val()=="")
        {
            alert("Please enter movie name...");
            return false;
        }
    else{
        return true;
    }
    </script>
