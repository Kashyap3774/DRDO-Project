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





<!-- This is the index page and the registration page -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Registration-Form</title>
    <link rel="icon" type="images/png" href="images/favicon.ico">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">



    <!--Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <!--GF end-->

    <style>
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.5);
            margin-top: 50px;
        }

        .form-group label {
            font-weight: bold;
        }

        #preview {
            max-width: 300px;
            max-height: 300px;
            margin-top: 10px;
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
        <form method="POST" action="register.php" enctype="multipart/form-data" onsubmit="return validateForm()">
            <h2 class="text-center mb-4">Registration Form</h2>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="icno">ICNO</label>
                    <input type="text" class="form-control" id="icno" name="icno" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="mobile">Mobile</label>
                    <input type="tel" class="form-control" id="mobile" name="mobile" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="designation">Designation</label>
                    <input type="text" class="form-control" id="designation" name="designation" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="department">Department</label>
                    <select class="form-control" id="department" name="department" required>
                        <option value="">Choose</option>
                        <option value="SC-B">SC-B</option>
                        <option value="SC-C">SC-C</option>
                        <option value="SC-D">SC-D</option>
                        <option value="SC-E">SC-E</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="gender">Gender</label>
                    <select class="form-control" id="gender" name="gender" required>
                        <option value="">Choose</option>
                        <option value="MALE">Male</option>
                        <option value="FEMALE">Female</option>
                        <option value="OTHERS">Others</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="salary">Salary</label>
                    <input type="number" class="form-control" id="salary" name="salary" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="photo">Photo</label>
                    <div class="custom-file" id="photoselector">
                        <input accept="image/*" type="file" class="custom-file-input" id="photo" name="photo" onchange="previewPhoto()">
                        <label class="custom-file-label" for="photo">Choose file</label>
                    </div>
                    <!-- <img id="preview" src="" alt="" class="img-thumbnail"> -->
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        function validateForm() {
            let form = document.forms[0];
            let photo = document.getElementById("photo").value;
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                form.classList.add('was-validated');
                return false;
            }
            if (photo === '') {
                alert("Please select a photo.");
                return false;
            }
            return true;
        }

        function previewPhoto() {
            let preview = document.getElementById("preview");
            let file = document.getElementById("photo").files[0];
            let photoSelector = document.getElementById("photoselector");
            if (!preview) {
                preview = document.createElement("img");
                preview.id = "preview";

            }
            preview.alt = "image is loading";
            let reader = new FileReader();

            reader.onloadend = function() {
                preview.width = 250;
                preview.height = 250;
                preview.alt = "preview";
                preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
                preview.remove();
            }
            photoSelector.insertAdjacentElement("afterend", preview);
        }
    </script>






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