<?php include('header.php');
extract($_POST);
?>
</div>
<div class="content">
<?php
// Kiểm tra xem có dữ liệu được gửi từ form không
if (isset($_GET['search_query']) && !empty($_GET['search_query'])) {
    // Lấy giá trị từ ô search bar và làm sạch để tránh SQL Injection
    $search_query = mysqli_real_escape_string($conn, $_GET['search_query']);

    // Câu truy vấn SQL để tìm kiếm phim theo tên
    $query = "SELECT * FROM movies WHERE MovieName LIKE '%$search_query%'";

    // Thực hiện truy vấn
    $result = mysqli_query($conn, $query);

    // Kiểm tra và xử lý kết quả
    if ($result) {
        // Đưa kết quả vào biến $rs để sử dụng sau này
        $rs = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        // Xử lý trường hợp truy vấn không thành công
        echo "Lỗi trong quá trình truy vấn dữ liệu: " . mysqli_error($conn);
    }

    // Đóng kết nối CSDL
    mysqli_close($conn);
} else {
}
?>
    
	<div class="wrap">
		<h3 style="color: #FCAC03; font-size: 2em; padding: 1.5%;">Movies</h3>
		<div class="content-top" style="display:flex; flex-wrap:wrap;">
			
			
			<?php
          	 $today=date("Y-m-d");
          	$qry2=mysqli_query($conn,"select DISTINCT MovieName, MovieID, Image, Genre from movies where MovieName LIKE '%$search_query%'");
						
          	  while($m=mysqli_fetch_array($qry2))
                   {
                    ?>
                    
                    <div class="col_1_of_4 span_1_of_4">
					<div class="imageRow">
						  	<div class="single">
						  	
						  		<a href="about.php?id=<?php echo $m['MovieID'];?>" rel="lightbox"><img src="<?php echo $m['Image'];?>" alt="" /></a>
						  	</div>
						  	<div class="movie-text">
						  		<h4 class="h-text"><a href="about.php?id=<?php echo $m['MovieID'];?>"><?php echo $m['MovieName'];?></a></h4>
						  		<strong>Genre: </strong><Span><?php echo $m['Genre'];?></span><br>
						  		
						  	</div>
		  				</div>
		  		</div>
		  		
  	    <?php
  	    	}
  	    	?>
			
			</div>
				<div class="clear"></div>		
			</div>
			<?php include('footer.php');?>
			
