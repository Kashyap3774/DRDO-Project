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




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>User-Search</title>
    <link rel="icon" type="images/png" href="images/favicon.ico">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
        .form-wrapper {
            margin: 50px auto;
            text-align: center;
            padding: 10px 20px;
            border-radius: 5px;
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.3);
            transition: box-shadow 0.3s ease-in-out;
        }

        .form-wrapper:hover {
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
        }

        input[type="text"] {
            width: 300px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-right: 10px;
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.3);
            transition: box-shadow 0.3s ease-in-out;
        }

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
            <form action="usersearch.php" method="post">
                <input type="text" name="icno" placeholder="Enter ICNO (Search User)">
                <button type="submit">Search</button>
            </form>
        </div>
    </div>
    <div class="container">
        <div class="user-details-wrapper" style="min-height: 35vh;">
            <?php
            // Retrieve the ICNO input
            if (isset($_POST['icno'])) {
                $icno = $_POST['icno'];

                // Connect to your database
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "data_db";

                // $servername = "localhost";
                // $username = "id20415074_root";
                // $password = "Qwerty@12345";
                // $dbname = "id20415074_data_db";

                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Prepare the SQL statement to retrieve user details
                $stmt = $conn->prepare("SELECT * FROM employees WHERE icno = ?");
                $stmt->bind_param("s", $icno);
                $stmt->execute();

                // Fetch the user details
                $result = $stmt->get_result();
                $user = $result->fetch_assoc();

                // Display the user details
                if ($user) {
                    echo "<div class='card p-3'>";
                    echo "<div class='row'>";
                    echo "<div class='col-sm-4'>";
                    echo "<img src='" . $user['photo'] . "' class='img-thumbnail' width='200px' height='200px'>";
                    echo "</div>";
                    echo "<div class='col-sm-8'>";
                    echo "<h2>" . $user['name'] . "</h2>";
                    echo "<p>Email: " . $user['email'] . "</p>";
                    echo "<p>ICNO: " . $user['icno'] . "</p>";

                    echo "<p>Mobile: " . $user['mobile'] . "</p>";
                    echo "<p>Designation: " . $user['designation'] . "</p>";
                    echo "<p>Address: " . $user['address'] . "</p>";
                    echo "<p>Department: " . $user['department'] . "</p>";
                    echo "<p>Gender: " . $user['gender'] . "</p>";
                    echo "<p>Salary: " . $user['salary'] . "</p>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                } else {
                    echo "<p>No user found with ICNO " . $icno . "</p>";
                }

                // Close the database
                $stmt->close();
                $conn->close();
            }
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