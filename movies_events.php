<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies</title>
    <style>
        .films-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px; /* Khoảng cách giữa các phần tử */
        }

        .col_1_of_4 {
            flex: 1 1 calc(25% - 20px); /* Chia đều 4 phần tử trên một hàng, trừ đi khoảng cách giữa các phần tử */
            box-sizing: border-box;
        }

        .single {
            width: 100%;
            height: 0;
            padding-bottom: 50%; /* Tỷ lệ khung hình 2:1 (900x450) */
            position: relative;
            overflow: hidden;
            background: #000; /* Màu nền để khi hình ảnh không load sẽ có màu */
        }

        .single img {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 100%;
            object-fit: cover; /* Đảm bảo hình ảnh giữ tỷ lệ khung hình */
            transform: translate(-50%, -50%);
        }

        .movie-text {
            padding: 10px 0;
        }

        .clear {
            clear: both;
        }

        /* Placeholder styles */
        .placeholder {
            visibility: hidden;
        }
    </style>
</head>
<body>

    <?php include('header.php');?>

    <div class="content">
        <div class="wrap">
            <div class="content-top">
                <h3>Movies</h3>

                <div class="films-container">
                    <?php
                        $today = date("Y-m-d");
                        $qry2 = mysqli_query($conn, "SELECT * FROM movies");
                        $movies = [];
                        while ($m = mysqli_fetch_array($qry2)) {
                            $movies[] = $m;
                        }

                        $count = count($movies);
                        $placeholders = $count % 4 === 0 ? 0 : 4 - ($count % 4);

                        foreach ($movies as $m) {
                    ?>
                            <div class="col_1_of_4">
                                <div class="imageRow">
                                    <div class="single">
                                        <a href="about.php?id=<?php echo $m['MovieID']; ?>"><img src="<?php echo $m['Image']; ?>" alt="" /></a>
                                    </div>
                                    <div class="movie-text">
                                        <h4 class="h-text"><a href="about.php?id=<?php echo $m['MovieID']; ?>"><?php echo $m['MovieName']; ?></a></h4>
                                        <strong>Genre: </strong><span><?php echo $m['Genre']; ?></span><br>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }

                        for ($i = 0; $i < $placeholders; $i++) {
                    ?>
                            <div class="col_1_of_4 placeholder"></div>
                    <?php
                        }
                    ?>
                </div>

            </div>
            <div class="clear"></div>
        </div>
    </div>

    <?php include('footer.php');?>

</body>
</html>
