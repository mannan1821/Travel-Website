<?php
$conn = new mysqli("mysql", "root", "root", "projects");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS tripform (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    age INT,
    gender VARCHAR(10),
    email VARCHAR(100),
    phone VARCHAR(10)
)";

if (!$conn->query($sql)) {
    die("TABLE ERROR: " . $conn->error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $stmt = $conn->prepare("INSERT INTO tripform (name, age, gender, email, phone) VALUES (?, ?, ?, ?, ?)");

    if (!$stmt) {
        die("PREPARE ERROR: " . $conn->error);
    }

    $stmt->bind_param(
        "sisss",
        $_POST['name'],
        $_POST['age'],
        $_POST['gender'],
        $_POST['email'],
        $_POST['phone_no']
    );

    if (!$stmt->execute()) {
        die("INSERT ERROR: " . $stmt->error);
    }

    $stmt->close();

    header("Location: index.php?success=1");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To Travel Junkie</title>
    <link rel="stylesheet" href="sa.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Borel&display=swap" rel="stylesheet">
</head>

<body>
    <video class="img" src="62129ed9-455f-4fa1-aa22-2cb25b6b496b.mp4" autoplay loop muted></video>

    <div class="container">
        <h3>Welcome to Ghuraf Registration Form</h3>
        <p>Enter your details to confirm your trip</p>
    </div>

    <?php
    if (isset($_GET['success'])) {
        echo "<span style='color:orange;font-weight:bold;'>SUCCESS</span>";
    }
    ?>

    <div class="details">
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter Your Name (required)">
            <input type="text" name="age" id="age" placeholder="Enter Your Age (required)">
            <input type="text" name="gender" id="gender" placeholder="Enter Your Gender (required)">
            <input type="text" name="email" id="email" placeholder="Enter Your Email (required)">
            <input type="tel" name="phone_no" id="phone_no" placeholder="Enter Your Phone No. (required)">

            <br><br><br>

            <h2>How you got to know us?<p class="p">(optional)</p></h2>
            <br>

            <input type="checkbox" style="width: 20px; height: 20px; accent-color: red;" name="source[]" id="Youtube" value="Youtube"> Youtube
            <br>
            <input type="checkbox" style="width: 20px; height: 20px; accent-color: red;" name="source[]" id="Facebook" value="Facebook"> Facebook
            <input type="checkbox" style="width: 20px; height: 20px; accent-color: red;" name="source[]" id="Instagram" value="Instagram"> Instagram

            <br><br><br>

            <textarea name="description" id="description" placeholder="Why Us? (optional)"></textarea>
            <br><br>

            <button type="submit" class="button">Submit</button>
            <button type="reset" class="button">Reset</button>
        </form>
    </div>
</body>
</html>
