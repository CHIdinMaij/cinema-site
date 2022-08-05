<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php         
$id = $_SESSION["id2"];
        $link = mysqli_connect("localhost", "root", "", "cinema_db");
        $movieQuery = "SELECT * FROM bookingTable WHERE movieID ='$id'"; 
        $movieImageById = mysqli_query($link,$movieQuery);
        $row = mysqli_fetch_array($movieImageById);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Book Now</title>
    <link rel="icon" type="image/png" href="img/logo.png">
</head>

<body style="background-color:#6e5a11;">
    <div class="booking-panel">
        <div class="booking-panel-section booking-panel-section1">
            <h1>RESERVATION TICKET</h1>
        </div>
        <div class="booking-panel-section booking-panel-section2" onclick="window.history.go(-1); return false;">
            <i class="fas fa-2x fa-times"></i>
        </div>
        <div class="booking-panel-section booking-panel-section3">
            <div class="movie-box">
                
            </div>
        </div>
        <div class="booking-panel-section booking-panel-section4" id="print">
            <div class="title"></div>
            <div class="movie-information">
                <table>
                    <tr>
                        <td>MOVIE NAME</td>
                        <td><?php echo $row['movieName']; ?></td>
                    </tr>
                    <tr>
                        <td>SCREEN</td>
                        <td><?php echo $row['bookingTheatre']; ?></td>
                    </tr>
                    <tr>
                        <td>BOOKING TPYE</td>
                        <td><?php echo $row['bookingType']; ?></td>
                    </tr>
                    <tr>
                        <td>DATE</td>
                        <td><?php echo $row['bookingDate']; ?></td>
                    </tr>
                    <tr>
                        <td>TIME</td>
                        <td><?php echo $row['bookingTime']; ?></td>
                    </tr>
                    <tr>
                        <td>BOOK BY</td>
                        <td><?php echo $row['bookingFName']; ?></td>
                    </tr>
                    <tr>
                        <td>BOOKING NUMBER</td>
                        <td><?php echo $row['bookingPNumber']; ?></td>
                    </tr>
                </table>
            </div>
            <div class="booking-form-container">
                <form action="" method="">
                    <button type="submit" onclick="printnow()" value="submit" name="submit" class="form-btn">PRINT TICKET</button>
                </form>
            </div>
        </div>
    </div>

    <script src="scripts/jquery-3.3.1.min.js "></script>
    <script src="scripts/script.js "></script>
    <script>
     function printnow(){
         var area = document.getElementById('print').innerHTML;
         var body = document.body.innerHTML;
         document.body.innerHTML = area;
         window.print();
         document.body.innerHTML = body;
     }
    </script>
</body>

</html>