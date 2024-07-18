
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seat Reservation</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 800px;
        }

        .screen-container {
            background-color: #343a40;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 20px;
        }

        .screen {
            background-color: #000;
            color: #fff;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .seat-layout {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .seat-row {
            display: flex;
            justify-content: center;
            margin-bottom: 10px;
        }

        .seat {
            width: 40px;
            height: 40px;
            margin: 5px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            position: relative;
            font-size: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
        }

        .seat.standard {
            background-color: grey; /* Màu nền cho ghế Standard */
        }

        .seat.vip {
            background-color: green; /* Màu nền cho ghế VIP */
        }

        .seat.double {
            background-color: rgb(208, 32, 144); /* Màu nền cho ghế Double */
        }

        .seat.occupied {
            background-color: red; /* Màu nền cho ghế đã được đặt */
            cursor: not-allowed;
        }

        .seat.selected {
            background-color: #ffc107; /* Màu nền khi ghế được chọn */
        }

        .seat-text {
            z-index: 1;
        }

        .summary {
            text-align: center;
            margin-top: 20px;
        }

        .legend {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        .legend-item {
            display: flex;
            align-items: center;
            margin-right: 20px;
        }

        .legend-item span {
            margin-left: 5px;
        }
    </style>
</head>
<body>
<?php
include('header.php');
?>


    <div class="container mt-5">
        <h2 class="text-center mb-4">Seat Reservation</h2>
        <div class="row mb-3">
            <div class="col">
            <?php
				$s=mysqli_query($conn," SELECT t.*, r.CinemaID
										FROM tickets t
										INNER JOIN showtimes s ON t.ShowtimeID = s.ShowtimeID
										INNER JOIN rooms r ON s.RoomID = r.RoomID
										WHERE t.ShowtimeID ='".$_SESSION['show']."'");
				$shw=mysqli_fetch_array($s);
				
				$t=mysqli_query($conn,"select * from cinemas where CinemaID='".$shw['CinemaID']."'");
				$theatre=mysqli_fetch_array($t);
			?>

                <p>Cinema: <?php echo $theatre['CinemaName'].", ".$theatre['Location'];?></p>
                <p>Room: 
                <?php 
					$ttm=mysqli_query($conn,"select  * from showtimes where ShowtimeID='".$shw['ShowtimeID']."'");
					
					$ttme=mysqli_fetch_array($ttm);
					
					$sn=mysqli_query($conn,"SELECT *
											FROM rooms r
											INNER JOIN seats s ON r.RoomID = s.RoomID
											WHERE r.RoomID ='".$ttme['RoomID']."'");
					
					$screen=mysqli_fetch_array($sn);
					echo $screen['RoomName'];

					?>
                </p>
                <p>Showtime: <?php echo date('h:i A',strtotime($ttme['Showtime']));?> Show</p>
            </div>
        </div>
        <div class="screen-container">
            <div class="screen">Screen</div>
        </div>
        <div class="seat-layout">
            <!-- Hàng ghế 1 - Standard -->
            <div class="seat-row">
                <button class="seat standard" data-seat="A1" data-price="80"><span class="seat-text">A1</span></button>
                <button class="seat standard" data-seat="A2" data-price="80"><span class="seat-text">A2</span></button>
                <button class="seat occupied standard" data-seat="A3" data-price="80"><span class="seat-text">A3</span></button>
                <button class="seat standard" data-seat="A4" data-price="80"><span class="seat-text">A4</span></button>
                <button class="seat standard" data-seat="A5" data-price="80"><span class="seat-text">A5</span></button>
                <button class="seat occupied standard" data-seat="A6" data-price="80"><span class="seat-text">A6</span></button>
                <button class="seat occupied standard" data-seat="A7" data-price="80"><span class="seat-text">A7</span></button>
                <button class="seat standard" data-seat="A8" data-price="80"><span class="seat-text">A8</span></button>
                <button class="seat standard" data-seat="A9" data-price="80"><span class="seat-text">A9</span></button>
                <button class="seat standard" data-seat="A10" data-price="80"><span class="seat-text">A10</span></button>
            </div>
            <div class="seat-row">
                <button class="seat standard" data-seat="A1" data-price="80"><span class="seat-text">A1</span></button>
                <button class="seat standard" data-seat="A2" data-price="80"><span class="seat-text">A2</span></button>
                <button class="seat occupied standard" data-seat="A3" data-price="80"><span class="seat-text">A3</span></button>
                <button class="seat standard" data-seat="A4" data-price="80"><span class="seat-text">A4</span></button>
                <button class="seat standard" data-seat="A5" data-price="80"><span class="seat-text">A5</span></button>
                <button class="seat occupied standard" data-seat="A6" data-price="80"><span class="seat-text">A6</span></button>
                <button class="seat standard" data-seat="A7" data-price="80"><span class="seat-text">A7</span></button>
                <button class="seat occupied standard" data-seat="A8" data-price="80"><span class="seat-text">A8</span></button>
                <button class="seat standard" data-seat="A9" data-price="80"><span class="seat-text">A9</span></button>
                <button class="seat standard" data-seat="A10" data-price="80"><span class="seat-text">A10</span></button>
            </div>
            <!-- Hàng ghế 2 - VIP -->
            <div class="seat-row">
                <button class="seat vip" data-seat="B1" data-price="100"><span class="seat-text">B1</span></button>
                <button class="seat vip" data-seat="B2" data-price="100"><span class="seat-text">B2</span></button>
                <button class="seat occupied vip" data-seat="B3" data-price="100"><span class="seat-text">B3</span></button>
                <button class="seat vip" data-seat="B4" data-price="100"><span class="seat-text">B4</span></button>
                <button class="seat vip" data-seat="B5" data-price="100"><span class="seat-text">B5</span></button>
                <button class="seat vip" data-seat="B6" data-price="100"><span class="seat-text">B6</span></button>
                <button class="seat occupied vip" data-seat="B7" data-price="100"><span class="seat-text">B7</span></button>
                <button class="seat occupied vip" data-seat="B8" data-price="100"><span class="seat-text">B8</span></button>
                <button class="seat vip" data-seat="B9" data-price="100"><span class="seat-text">B9</span></button>
                <button class="seat vip" data-seat="B10" data-price="100"><span class="seat-text">B10</span></button>
            </div>
            <div class="seat-row">
                <button class="seat vip" data-seat="B1" data-price="100"><span class="seat-text">B1</span></button>
                <button class="seat vip" data-seat="B2" data-price="100"><span class="seat-text">B2</span></button>
                <button class="seat occupied vip" data-seat="B3" data-price="100"><span class="seat-text">B3</span></button>
                <button class="seat vip" data-seat="B4" data-price="100"><span class="seat-text">B4</span></button>
                <button class="seat occupied vip" data-seat="B5" data-price="100"><span class="seat-text">B5</span></button>
                <button class="seat occupied vip" data-seat="B6" data-price="100"><span class="seat-text">B6</span></button>
                <button class="seat occupied vip" data-seat="B7" data-price="100"><span class="seat-text">B7</span></button>
                <button class="seat vip" data-seat="B8" data-price="100"><span class="seat-text">B8</span></button>
                <button class="seat vip" data-seat="B9" data-price="100"><span class="seat-text">B9</span></button>
                <button class="seat vip" data-seat="B10" data-price="100"><span class="seat-text">B10</span></button>
            </div>
            <div class="seat-row">
                <button class="seat vip" data-seat="B1" data-price="100"><span class="seat-text">B1</span></button>
                <button class="seat vip" data-seat="B2" data-price="100"><span class="seat-text">B2</span></button>
                <button class="seat occupied vip" data-seat="B3" data-price="100"><span class="seat-text">B3</span></button>
                <button class="seat occupied vip" data-seat="B4" data-price="100"><span class="seat-text">B4</span></button>
                <button class="seat vip" data-seat="B5" data-price="100"><span class="seat-text">B5</span></button>
                <button class="seat occupied vip" data-seat="B6" data-price="100"><span class="seat-text">B6</span></button>
                <button class="seat occupied vip" data-seat="B7" data-price="100"><span class="seat-text">B7</span></button>
                <button class="seat vip" data-seat="B8" data-price="100"><span class="seat-text">B8</span></button>
                <button class="seat vip" data-seat="B9" data-price="100"><span class="seat-text">B9</span></button>
                <button class="seat vip" data-seat="B10" data-price="100"><span class="seat-text">B10</span></button>
            </div>
            <!-- Hàng ghế 3 - Double -->
            <div class="seat-row">
                <button class="seat double" data-seat="C1" data-price="150"><span class="seat-text">C1</span></button>
                <button class="seat double" data-seat="C2" data-price="150"><span class="seat-text">C2</span></button>
                <button class="seat occupied double" data-seat="C3" data-price="150"><span class="seat-text">C3</span></button>
                <button class="seat double" data-seat="C4" data-price="150"><span class="seat-text">C4</span></button>
                <button class="seat double" data-seat="C5" data-price="150"><span class="seat-text">C5</span></button>
                <button class="seat occupied double" data-seat="C6" data-price="150"><span class="seat-text">C6</span></button>
                <button class="seat double" data-seat="C7" data-price="150"><span class="seat-text">C7</span></button>
                <button class="seat double" data-seat="C8" data-price="150"><span class="seat-text">C8</span></button>
                <button class="seat double" data-seat="C9" data-price="150"><span class="seat-text">C9</span></button>
                <button class="seat occupied double" data-seat="C10" data-price="150"><span class="seat-text">C10</span></button>
            </div>
        </div>
        <div class="legend mb-3">
            <div class="legend-item">
                <div class="seat standard"></div>
                <span>Standard - 80.000vnđ</span>
            </div>
            <div class="legend-item">
                <div class="seat vip"></div>
                <span>VIP - 100.000vnđ</span>
            </div>
            <div class="legend-item">
                <div class="seat double"></div>
                <span>Double - 150.000vnđ</span>
            </div>
            <div class="legend-item">
                <div class="seat occupied"></div>
                <span>Occupied Seat</span>
            </div>
        </div>
        
        <!-- Phần tổng kết và thanh toán -->
        <div class="summary mt-4 text-center">
            <p>Selected Seats: <span id="selected-seats">None</span></p>
            <p>Total Price: <span id="total-price">0</span>.000 Vnđ</p>
            <a href="order_food.php" id="checkout" class="btn btn-primary mt-3" style="width:100%; display: inline-block; text-align: center;">Next</a>
        </div>
    </div>
    <br>

    <!-- Các thư viện và mã JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const seats = document.querySelectorAll('.seat:not(.occupied)');
            const selectedSeats = document.getElementById('selected-seats');
            const totalPriceElement = document.getElementById('total-price');
            const checkoutButton = document.getElementById('checkout');

            seats.forEach(seat => {
                seat.addEventListener('click', () => {
                    seat.classList.toggle('selected');
                    updateSelectedSeats();
                });
            });

            checkoutButton.addEventListener('click', () => {
                alert('Proceeding to checkout');
                // window.location.href = 'checkout.html'; // Uncomment for actual use
            });

            function updateSelectedSeats() {
                const selectedSeatsArr = Array.from(document.querySelectorAll('.seat.selected'))
                    .map(seat => seat.getAttribute('data-seat'));
                
                const totalPrice = Array.from(document.querySelectorAll('.seat.selected'))
                    .reduce((sum, seat) => sum + parseInt(seat.getAttribute('data-price')), 0);
                
                selectedSeats.textContent = selectedSeatsArr.length ? selectedSeatsArr.join(', ') : 'None';
                totalPriceElement.textContent = totalPrice;
            }
        });
    </script>

<?php include('footer.php');?>
</body>
</html>
