<?php

    $error = '';
    $locResult = $carTypeResult = '';
    if(isset($_POST['submit'])) {

        // check number plate
        $numPlate = $_POST['plateNum'];
        $pattern = '/([A-Z]{3})-([0-9]{4})/';
        if(preg_match($pattern, $numPlate, $numPlateArr)) {

            switch($numPlateArr[1]) {
                case 'KHA':
                    $loc = 'Khartoum';
                    break;
                case 'JAZ':
                    $loc = 'Al jazeera';
                    break;
                case 'KUR':
                    $loc = 'Kurdufan';
                    break;
                default:
                    $loc = 'Unknown location';
            }

            switch(substr($numPlateArr[2], -1)) {
                case '0':
                    $carType = 'sport car';
                    break;
                case '3':
                    $carType = 'family car';
                    break;
                case '9':
                    $carType = 'transport car';
                    break;
                default:
                    $carType = 'Unknown type car';        
            }

            $locResult = "location: $loc";
            $carTypeResult = "car type: $carType";
        }
        else {
            $error = '* your licence should contain three uppercase letter and four number separated by dash (-)';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="stylesheet" href="css/style.css">
    <title>car number plate check</title>
</head>
<body>
    <main>
        <div class="container">

            <div class="img-container">
                <img src="images/license-plate.png" alt="">
            </div>
            <div class="form-container">
                <h3>car number plate check</h3>
                <form action="index.php" method="POST">
                    <div class="form-field">
                        <input type="text" name="plateNum" required> 
                        <span>number plate</span>
                        <div class="error"><?php echo $error ?></div>
                    </div>
                    <input type="submit" name="submit" value="check">
                </form>
                <div class="car-details">
                    <p><?php echo $locResult; ?></p>
                    <p><?php echo $carTypeResult; ?></p>
                </div>
            </div> <!-- / form-container -->

        </div> <!-- / container -->
    </main>

    <footer>
        <div class="attribution">
            Challenge by <span>someone at Karary University</span>. 
            Coded by <a href="#">Mohammed Abbas</a>.
        </div>
    </footer>
</body>
</html>