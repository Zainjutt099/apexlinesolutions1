<?php
$servername = "localhost";
$username = "root"; // XAMPP کا ڈیفالٹ یوزر
$password = "";     // XAMPP کا ڈیفالٹ پاس ورڈ خالی ہوتا ہے
$dbname = "youare";

// کنکشن بنانا
$conn = new mysqli($servername, $username, $password, $dbname);

// چیک کریں کنکشن ٹھیک ہے؟
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['full_name'];
    $school = $_POST['school_name'];
    $cat = $_POST['category'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $desc = $_POST['description'];

    $sql = "INSERT INTO applications (full_name, school_name, category, phone, email, description)
            VALUES ('$name', '$school', '$cat', '$phone', '$email', '$desc')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('درخواست کامیابی سے موصول ہوگئی!'); window.location.href='index.html';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>