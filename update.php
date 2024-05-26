<?php
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    // Redirect to login page
    header("Location: index.php");
    exit();
}
?>
<!-- HTML code for registration page goes here -->





<!-- Update.php,some distortion in css, photo not added, styling not done properly -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Update-User</title>
    <link rel="icon" type="images/png" href="images/favicon.ico">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <!--Right click-->
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).bind("contextmenu", function(e) {
                return false;
            });
        });
    </script>



    <!--Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <!--GF end-->

    <style>
        /* Style for the form */
        form {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f7f7f7;
            border: 1px solid #ccc;
            box-shadow: 0 0 5px #ccc;
            border-radius: 5px;
        }

        label {
            display: inline-block;
            margin-bottom: 7px;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-right: 10px;
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.3);
            transition: box-shadow 0.3s ease-in-out;
        }

        input[type="radio"] {
            margin-left: 5px;
            margin-right: 3px;
            margin-bottom: 20px;

        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .alert {
            padding: 20px;
            background-color: #f44336;
            color: white;
            margin-bottom: 15px;
            border-radius: 4px;
        }





        .form-wrapper {
            margin: 50px auto;
            text-align: center;
            /* padding: 10px 20px; */
            border-radius: 5px;
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.3);
            transition: box-shadow 0.3s ease-in-out;
            max-width: 600px;
        }

        .form-wrapper:hover {
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
        }

        /* input[type="text"] {
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-right: 10px;
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.3);
            transition: box-shadow 0.3s ease-in-out;
        } */

        input[type="text"]:hover,
        input[type="text"]:focus {
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #1a73e8;
            color: #fff;
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.3);
            transition: box-shadow 0.3s ease-in-out;
        }

        button:hover {
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
        }

        .user-details {
            margin-top: 50px;
        }

        .user-details p {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .user-details img {
            max-width: 200px;
            max-height: 200px;
            margin-top: 20px;
            border-radius: 50%;
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.3);
            transition: box-shadow 0.3s ease-in-out;
        }

        .user-details img:hover {
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
        }
    </style>

</head>

<body>


    <!-- Navbar -->
    <nav class="navbar navbar-expand-xl navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">
            <img src="images/drdoin.png" width="370" height="80" class="d-inline-block align-top" alt="DRDO logo">
        </a>

        <a class="navbar-brand" href="https://amritmahotsav.nic.in/" target="_blank">
            <img src="images/akam.png" width="132" height="72" class="d-inline-block align-top" alt="AmritMahotsav">
        </a>

        <a class="navbar-brand" href="https://www.g20.org/en/g20-india-2023/logo-theme/" target="_blank">
            <img src="images/g20.png" width="132" height="72" class="d-inline-block align-top" alt="G20 India">
        </a>


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- <form class="form-inline my-2 my-lg-0" action="search.php" method="POST">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
            </form> -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="usersearch.php">Search</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="update.php">Update</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="statistics.php">Statistics</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">SignOut</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://www.drdo.gov.in/contact-us" target="_blank">Contact</a>
                </li>
            </ul>
        </div>
    </nav>


    <style>
        body {
            background-image: url('images/bg.svg');
            background-repeat: no-repeat;
            background-size: cover;
            font-family: 'Labrada', serif;
        }



        /* body {
            background-color: #f1f1f1;
            font-family: 'Labrada', serif;
        } */

        .navbar {
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
            display: flex;
            align-items: center;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }

        .navbar-brand img {
            margin-right: 10px;
        }

        .nav-link {
            font-size: 18px;
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }

        .nav-link:hover {
            color: #fff;
            text-shadow: none;
        }

        .nav-item.active .nav-link {
            color: #fff;
            text-shadow: none;
        }

        /* Date and Time */
        #datetime {
            display: inline-block;
            font-size: 15px;
        }

        #datetime-wrapper {
            background-color: transparent;
            color: black;
            text-align: right;
            font-size: 15px;
            padding: 10px;
            position: absolute;
            top: 60px;
            right: 0;
            z-index: 999;
        }

        /* Media query for small screens */
        @media only screen and (max-width: 768px) {
            #datetime {
                font-size: 13px;
            }

            #datetime-wrapper {
                padding: 5px;
                top: 50px;
            }
        }
    </style>

    <!-- Date and Time -->
    <div id="datetime-wrapper">
        <span id="datetime"></span>
    </div>

    <script>
        function updateTime() {
            var today = new Date();
            var options = {
                timeZone: 'Asia/Kolkata',
                hour12: false
            };
            var time = today.toLocaleTimeString('en-GB', options);
            var date = today.toLocaleDateString('en-GB', {
                timeZone: 'Asia/Kolkata',
                day: 'numeric',
                month: 'numeric',
                year: 'numeric'
            }).split('/').join('/');
            document.getElementById("datetime").innerHTML = "Date: " + date + " &nbsp;&nbsp; Time: " + time;
        }
        setInterval(updateTime, 1000);

        // set position of datetime element
        function setPosition() {
            var navbar = document.querySelector(".navbar");
            var navbarHeight = navbar.offsetHeight;
            var navbarTop = navbar.offsetTop;
            var datetime = document.querySelector("#datetime-wrapper");
            datetime.style.top = navbarHeight + navbarTop + "px";
            datetime.style.right = "10px";
        }
        setPosition();

        // update position of datetime element on window resize
        window.addEventListener("resize", function() {
            setPosition();
        });

        // update position of datetime element on navbar toggle
        var navbarToggle = document.querySelector(".navbar-toggler");
        navbarToggle.addEventListener("click", function() {
            var datetime = document.querySelector("#datetime-wrapper");
            if (navbarToggle.classList.contains("collapsed")) {
                datetime.style.top = navbarHeight + navbarTop + "px";
            } else {
                datetime.style.top = navbarHeight + "px";
            }
        });
    </script>
    <!-- Navbar ends -->








    <div class="container">
        <div class="form-wrapper">
            <form action="update.php" method="post">
                <input type="text" name="icno" placeholder="Enter IC Number (to Update User)">
                <button type="submit">Search</button>
            </form>
        </div>
    </div>

    <div class="container">
        <div class="user-details-wrapper" style="min-height: 35vh;">


            <?php
            // Connect to the database

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

            if (isset($_POST['icno'])) {
                // Check if the IC number exists in the database
                $icno = $_POST['icno'];
                $sql = "SELECT * FROM employees WHERE icno='$icno'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Display the employee's details
                    $row = $result->fetch_assoc();
            ?>

                    <form action="update.php" method="POST">
                        IC No.: <input type="text" name="icno" value="<?php echo $row["icno"]; ?>" readonly><br>
                        Name: <input type="text" name="name" value="<?php echo $row["name"]; ?>"><br>
                        Email: <input type="email" name="email" value="<?php echo $row["email"]; ?>"><br>
                        Mobile: <input type="tel" name="mobile" value="<?php echo $row["mobile"]; ?>"><br>
                        Designation: <input type="text" name="designation" value="<?php echo $row["designation"]; ?>"><br>
                        Address: <input type="text" name="address" value="<?php echo $row["address"]; ?>"><br>
                        Department:
                        <input type="radio" name="department" value="SC-B" <?php echo ($row["department"] == "SC-B") ? "checked" : ""; ?>> SC-B
                        <input type="radio" name="department" value="SC-C" <?php echo ($row["department"] == "SC-C") ? "checked" : ""; ?>> SC-C
                        <input type="radio" name="department" value="SC-D" <?php echo ($row["department"] == "SC-D") ? "checked" : ""; ?>> SC-D
                        <input type="radio" name="department" value="SC-E" <?php echo ($row["department"] == "SC-E") ? "checked" : ""; ?>> SC-E <br>
                        Gender:
                        <input type="radio" name="gender" value="male" <?php echo ($row["gender"] == "Male") ? "checked" : ""; ?>> Male
                        <input type="radio" name="gender" value="female" <?php echo ($row["gender"] == "Female") ? "checked" : ""; ?>> Female
                        <input type="radio" name="gender" value="others" <?php echo ($row["gender"] == "Others") ? "checked" : ""; ?>> Others<br>
                        Salary: <input type="number" name="salary" value="<?php echo $row["salary"]; ?>"><br>
                        <input type="submit" name="submit" value="Update">
                    </form>
            <?php
                } else {
                    echo '<p>No employee found with the IC No. ' . $icno . '</p>';
                }
            }

            // If the form has been submitted to update the employee's details
            if (isset($_POST['submit'])) {
                // Update the employee's details
                $icno = $_POST['icno'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $mobile = $_POST['mobile'];
                $designation = $_POST['designation'];
                $address = $_POST['address'];
                $department = $_POST['department'];
                $gender = $_POST['gender'];
                $salary = $_POST['salary'];

                // Update the employee's record in the database
                $sql = "UPDATE employees SET name='$name', email='$email', mobile='$mobile', designation='$designation', address='$address', department='$department', gender='$gender', salary='$salary' WHERE icno='$icno'";

                if ($conn->query($sql) === TRUE) {
                    echo "<script>alert('Employee details updated successfully')</script>";
                } else {
                    echo "Error updating employee details: " . $conn->error;
                }
            }

            $conn->close();
            ?>

        </div>
    </div>









    <footer class="py-3 my-4 mt-5">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="index.php" class="nav-link px-2 text-muted">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
        </ul>
        <p class="text-center text-muted">Copyright © 2023<br>Made in collaboration with DRDO & Ashutosh Kashyap<br> All rights reserved.</p>
    </footer>

</body>

</html>