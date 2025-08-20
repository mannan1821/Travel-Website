<?php
if(!empty($name) && !empty($age) && !empty($gender) && !empty($email) && !empty(phone_no)){
$insert = false;
$server = "localhost";
$username = "root";
$password = "";

$con = mysqli_connect($server, $username, $password);

if(!$con){
    die("<br>Database connection failed due to".mysqli_connect_error());
}

else{
    // echo "<br>Database connected successfully";
}

$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone_no = $_POST['phone_no'];
$description = $_POST['description'];
$source = $_POST['source'] ?? [];
$source_str = implode(", ", $source);  

$sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone_no`, `description`, `date`, `source`)
VALUES ('$name', '$age', '$gender', '$email', '$phone_no', '$description', current_timestamp(),'$source_str')";
// echo "<br>$sql";

if($con->query($sql)==true){
    $insert==true;
    // echo "<br>Data inserted succesfully";
}

else{
    echo "ERROR: $sql<br> $con->error";
}

$con->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="st.css">
    <title>Thanks For Choosing Travel Junkie</title>

</head>
<body>
    <img class="img" src="natur_water_sea_travel_sky_beach_turquoise_summer_island_4k_hd.jpg" alt="Turquoise Summer Island">
    <?php
    if($insert==true){
        echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><h1 class='details'>Your form has been successfully submitted. Happy Journey!</h1>";
    } else{
        echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><h1 class='details'>An Error Occured! Please Fill The Form Again.</h1>";
    }
    ?>  

</body>
</html>

