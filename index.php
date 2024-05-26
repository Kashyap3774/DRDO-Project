<?php
// Start session
session_start();

// Check if the user is already logged in
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
    // User is already logged in, redirect to registration page
    header("Location: registration.php");
    exit();
}

// Establish a connection to the database

$db_host = 'localhost';
$db_name = 'data_login';
$db_user = 'root';
$db_pass = '';

// $db_host = 'localhost';
// $db_name = 'id20334042_data_login';
// $db_user = 'id20334042_login';
// $db_pass = 'Qwerty@12345';

// Create a new mysqli object and check for connection errors
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize user input to prevent SQL injection and XSS attacks
function cleanInput($input)
{
    $search = array(
        '@<script[^>]*?>.*?</script>@si',   // Strip out javascript
        '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
        '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
        '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
    );
    $output = preg_replace($search, '', $input);
    return $output;
}

// Escape user input to prevent SQL injection and XSS attacks
function escapeInput($input)
{
    global $conn;
    $output = $conn->real_escape_string($input);
    return $output;
}

// Initialize error message variable
$error_message = '';

// Sanitize and escape user input using the cleanInput and escapeInput functions
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = cleanInput($_POST['username']);
    $password = cleanInput($_POST['password']);
    $username = escapeInput($username);
    $password = escapeInput($password);

    // Construct the SQL query
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Login successful, set session variable and redirect to registration page
        $_SESSION['logged_in'] = true;
        header("Location: registration.php");
        exit();
    } else {
        // display an error message
        $error_message = ':( Invalid Username or Password. Try again or Contact admin to reset it.';
    }
}
?>



<!-- Complete Login page with added sql injection and xss attacks: -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Page</title>
    <link rel="icon" type="images/png" href="images/favicon.ico">
    <!-- Load Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

    <!--Right click Block-->
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
        .container {
            background-color: #fff;
            margin-top: 100px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.5);
            padding: 40px;
            border-radius: 10px;
        }
    </style>
</head>

<body>

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
    </style>


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
                    <a class="nav-link" href="registration.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="statistics.php">Statistics</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://www.drdo.gov.in/contact-us" target="_blank">Contact</a>
                </li>
            </ul>
        </div>
    </nav>

    <style>
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








    <div class="container" style="max-width: 700px">
        <h2>Login</h2>
        <form method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>


            <!-- <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div> -->

            <!-- Add a "show password" checkbox -->
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="show-password">
                    <label class="form-check-label" for="show-password">Show Password</label>
                </div>
            </div>

            <!-- JavaScript code to toggle the visibility of the password input field  -->
            <script>
                // Get the password input field and the "show password" checkbox
                var passwordField = document.getElementById('password');
                var showPasswordField = document.getElementById('show-password');

                // Add a click event listener to the "show password" checkbox
                showPasswordField.addEventListener('click', function() {
                    // Toggle the password input field visibility
                    if (passwordField.type === 'password') {
                        passwordField.type = 'text';
                    } else {
                        passwordField.type = 'password';
                    }
                });
            </script>
            <!-- Check box js code ends -->






            <div class="error-message" style="color: red;"><?php echo $error_message; ?></div>



            <button type="submit" class="btn btn-primary">Log In</button>

        </form>



        <!-- Load Bootstrap JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </div>










    <!-- Footer -->

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