<?php
    $insert = false;
    if(isset($_POST['name'])){
        $server = "localhost";
        $username = "root";
        $password = "";
    
        $con = mysqli_connect($server, $username, $password);
    
        if(!$con){
            die("connection to this database failed due to" . mysqli_connect_error());
        }
        // echo "Success connecting to the db";
    
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $from = $_POST['from'];
        $to = $_POST['to'];
        $travel_d = $_POST['travel_d'];
        $class = $_POST['class'];
        $sql = "INSERT INTO `trip`.`ttrain` (`Name`, `Age`, `Gender`, `Email`, `Phone`, `From`, `To`, `travel_d`, `Class`, `Date_time`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$from', '$to', '$travel_d', '$class', current_timestamp());";
        // echo $sql;
        // INSERT INTO `trip`.`train` (`Name`, `Age`, `Gender`, `Email`, `Phone`, `From`, `To`, `Traveldate`, `Class`, `Date_time`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$from', '$to', '$traveldate', '$class', current_timestamp());
    
        if($con->query($sql) == true){
            $insert = true;
        }
        else{
            echo "ERROR: $sql <br> $con->error";
        }
    
        $con->close();
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="index.js"></script>
</head>
<body>
    <div class="container">
        <h1>Welcome to Train form</h3>
        <h4>Enter your details and submit this form to confirm your Trip </h4>

        <?php
            if($insert == true){
                echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us</p>";
                }
        ?>
        
        <form action="" method="post">
            <input type="text" id="name" name="name" placeholder="Enter your name">
            <input type="text" id="age" name="age" placeholder="Enter your Age">
            <input type="text" id="gender" name="gender" placeholder="Enter your gender">
            <input type="email" id="email" name="email" placeholder="Enter your email">
            <input type="phone" id="phone" name="phone" placeholder="Enter your phone">
            <input type="text" id="from" name="from" placeholder="Enter your City">
            <input type="text" id="to" name="to" placeholder="Enter your Drop point">
            <input type="date" id="travel_d" name="travel_d" placeholder="Enter your Travel Date : 27/10/2022">
            <input type="text" id="class" name="class" placeholder="Class : Economic/Premium/Business">
            <button class="b1">Submit</button> <br><br>
            <button class="b1"><a href="index.html" class="a10">Home</a></button> 
        </form>
    </div>
</body>
</html>