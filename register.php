<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data_db";

// $servername = "localhost";
// $username = "id20415074_root";
// $password = "Qwerty@12345";
// $dbname = "id20415074_data_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$icno = $_POST['icno'];
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$designation = $_POST['designation'];
$address = $_POST['address'];
$department = $_POST['department'];
$gender = $_POST['gender'];
$salary = $_POST['salary'];

$photo = $_FILES['photo']['tmp_name'];
$photoType = $_FILES['photo']['type'];
$photoName = $_FILES['photo']['name'];
$photoPath = "uploads/" . $photoName;
move_uploaded_file($photo, $photoPath);

$sql = "SELECT * FROM employees WHERE icno='$icno'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  echo "<script>alert('Error: IC number $icno already exists in the database.');</script>";
  echo "<script>window.location.href='index.php';</script>";
} else {
  $sql = "INSERT INTO employees (icno, name, email, mobile, designation, address, department, gender, salary, photo)
        VALUES ('$icno', '$name', '$email', '$mobile', '$designation', '$address', '$department', '$gender', '$salary', '$photoPath')";

  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Great.!! New record created successfully :)');</script>";
    echo "<script>window.location.href='index.php';</script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
