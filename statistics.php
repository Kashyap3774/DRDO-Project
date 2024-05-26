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

<!-- Code for Gender - Bar Graph -->
<?php

// Connect to your database

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data_db";

// $servername = "localhost";
// $username = "id20415074_root";
// $password = "Qwerty@12345";
// $dbname = "id20415074_data_db";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the database
$sql = "SELECT gender, COUNT(*) AS count FROM employees GROUP BY gender";
$result = $conn->query($sql);

// Define colors for the bars
$color_male = 'cornflowerblue';
$color_female = 'hotpink';
$color_other = 'lightgray';

// Create a bar chart using Google Charts
echo "
  <script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>
  <script type='text/javascript'>
    google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Gender');
      data.addColumn('number', 'Count');
      data.addColumn({type: 'string', role: 'style'});

";

// Loop through the fetched data and add it to the chart data
while ($row = $result->fetch_assoc()) {
    // Set color based on gender
    $color = $color_other; // default to other
    switch ($row['gender']) {
        case 'Male':
            $color = $color_male;
            break;
        case 'Female':
            $color = $color_female;
            break;
    }

    // Add data row to the chart
    echo "data.addRow(['" . $row['gender'] . "', " . $row['count'] . ", '" . $color . "']);";
}

echo "

      var options = {
        title: 'Employee Gender Statistics',
        chartArea: {width: '50%'},
        hAxis: {
          title: 'Count',
          minValue: 0
        },
        vAxis: {
          title: 'Gender'
        },
        legend: { position: 'none' } // hide the color legend
      };

      var chart = new google.visualization.BarChart(document.getElementById('chart_div_bar'));
      chart.draw(data, options);
    }
  </script>
";

// Display the bar chart
// echo "<div id='chart_div_bar' style='width: 500px; height: 300px;'></div>";

// Close the connection
$conn->close();
?>





<!-- Histogram for states -->
<?php

// Connect to your database

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data_db";

// $servername = "localhost";
// $username = "id20415074_root";
// $password = "Qwerty@12345";
// $dbname = "id20415074_data_db";


$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get the addresses from the database
$sql = "SELECT address FROM employees";
$result = $conn->query($sql);

// Initialize an array to store the counts for each state
$state_counts = array(
    "Andaman and Nicobar Islands" => 0,
    "Andhra Pradesh" => 0,
    "Arunachal Pradesh" => 0,
    "Assam" => 0,
    "Bihar" => 0,
    "Chandigarh" => 0,
    "Chhattisgarh" => 0,
    "Dadra and Nagar Haveli and Daman and Diu" => 0,
    "Delhi" => 0,
    "Goa" => 0,
    "Gujarat" => 0,
    "Haryana" => 0,
    "Himachal Pradesh" => 0,
    "Jammu and Kashmir" => 0,
    "Jharkhand" => 0,
    "Karnataka" => 0,
    "Kerala" => 0,
    "Ladakh" => 0,
    "Lakshadweep" => 0,
    "Madhya Pradesh" => 0,
    "Maharashtra" => 0,
    "Manipur" => 0,
    "Meghalaya" => 0,
    "Mizoram" => 0,
    "Nagaland" => 0,
    "Odisha" => 0,
    "Puducherry" => 0,
    "Punjab" => 0,
    "Rajasthan" => 0,
    "Sikkim" => 0,
    "Tamil Nadu" => 0,
    "Telangana" => 0,
    "Tripura" => 0,
    "Uttar Pradesh" => 0,
    "Uttarakhand" => 0,
    "West Bengal" => 0
);


// Loop through the results and count the occurrences of each state
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $address = $row["address"];
        // Check if the address contains any of the state keywords and increment the corresponding state count
        if (stripos($address, "andaman and nicobar islands") !== false) {
            $state_counts["Andaman and Nicobar Islands"]++;
        }
        if (stripos($address, "andhra pradesh") !== false) {
            $state_counts["Andhra Pradesh"]++;
        }
        if (stripos($address, "arunachal pradesh") !== false) {
            $state_counts["Arunachal Pradesh"]++;
        }
        if (stripos($address, "assam") !== false) {
            $state_counts["Assam"]++;
        }
        if (stripos($address, "bihar") !== false) {
            $state_counts["Bihar"]++;
        }
        if (stripos($address, "chandigarh") !== false) {
            $state_counts["Chandigarh"]++;
        }
        if (stripos($address, "chhattisgarh") !== false) {
            $state_counts["Chhattisgarh"]++;
        }
        if (stripos($address, "dadra and nagar haveli and daman and diu") !== false) {
            $state_counts["Dadra and Nagar Haveli and Daman and Diu"]++;
        }
        if (stripos($address, "delhi") !== false) {
            $state_counts["Delhi"]++;
        }
        if (stripos($address, "goa") !== false) {
            $state_counts["Goa"]++;
        }
        if (stripos($address, "gujarat") !== false) {
            $state_counts["Gujarat"]++;
        }
        if (stripos($address, "haryana") !== false) {
            $state_counts["Haryana"]++;
        }
        if (stripos($address, "himachal pradesh") !== false) {
            $state_counts["Himachal Pradesh"]++;
        }
        if (stripos($address, "jammu and kashmir") !== false) {
            $state_counts["Jammu and Kashmir"]++;
        }
        if (stripos($address, "jharkhand") !== false) {
            $state_counts["Jharkhand"]++;
        }
        if (stripos($address, "karnataka") !== false) {
            $state_counts["Karnataka"]++;
        }
        if (stripos($address, "kerala") !== false) {
            $state_counts["Kerala"]++;
        }
        if (stripos($address, "ladakh") !== false) {
            $state_counts["Ladakh"]++;
        }
        if (stripos($address, "lakshadweep") !== false) {
            $state_counts["Lakshadweep"]++;
        }
        if (stripos($address, "madhya pradesh") !== false) {
            $state_counts["Madhya Pradesh"]++;
        }
        if (stripos($address, "maharashtra") !== false) {
            $state_counts["Maharashtra"]++;
        }
        if (stripos($address, "manipur") !== false) {
            $state_counts["Manipur"]++;
        }
        if (stripos($address, "meghalaya") !== false) {
            $state_counts["Meghalaya"]++;
        }
        if (stripos($address, "mizoram") !== false) {
            $state_counts["Mizoram"]++;
        }
        if (stripos($address, "nagaland") !== false) {
            $state_counts["Nagaland"]++;
        }
        if (stripos($address, "odisha") !== false) {
            $state_counts["Odisha"]++;
        }
        if (stripos($address, "puducherry") !== false) {
            $state_counts["Puducherry"]++;
        }
        if (stripos($address, "punjab") !== false) {
            $state_counts["Punjab"]++;
        }
        if (stripos($address, "rajasthan") !== false) {
            $state_counts["Rajasthan"]++;
        }
        if (stripos($address, "sikkim") !== false) {
            $state_counts["Sikkim"]++;
        }
        if (stripos($address, "tamil nadu") !== false) {
            $state_counts["Tamil Nadu"]++;
        }
        if (stripos($address, "telangana") !== false) {
            $state_counts["Telangana"]++;
        }
        if (stripos($address, "tripura") !== false) {
            $state_counts["Tripura"]++;
        }
        if (stripos($address, "uttar pradesh") !== false) {
            $state_counts["Uttar Pradesh"]++;
        }
        if (stripos($address, "uttarakhand") !== false) {
            $state_counts["Uttarakhand"]++;
        }
        if (stripos($address, "west bengal") !== false) {
            $state_counts["West Bengal"]++;
        }
    }
}

// Close the database connection
$conn->close();

// Prepare the data for the Google Charts histogram
$data = array(
    array("State", "Count"),
    array("Andaman and Nicobar Islands", $state_counts["Andaman and Nicobar Islands"]),
    array("Andhra Pradesh", $state_counts["Andhra Pradesh"]),
    array("Arunachal Pradesh", $state_counts["Arunachal Pradesh"]),
    array("Assam", $state_counts["Assam"]),
    array("Bihar", $state_counts["Bihar"]),
    array("Chandigarh", $state_counts["Chandigarh"]),
    array("Chhattisgarh", $state_counts["Chhattisgarh"]),
    array("Dadra and Nagar Haveli and Daman and Diu", $state_counts["Dadra and Nagar Haveli and Daman and Diu"]),
    array("Delhi", $state_counts["Delhi"]),
    array("Goa", $state_counts["Goa"]),
    array("Gujarat", $state_counts["Gujarat"]),
    array("Haryana", $state_counts["Haryana"]),
    array("Himachal Pradesh", $state_counts["Himachal Pradesh"]),
    array("Jammu and Kashmir", $state_counts["Jammu and Kashmir"]),
    array("Jharkhand", $state_counts["Jharkhand"]),
    array("Karnataka", $state_counts["Karnataka"]),
    array("Kerala", $state_counts["Kerala"]),
    array("Ladakh", $state_counts["Ladakh"]),
    array("Lakshadweep", $state_counts["Lakshadweep"]),
    array("Madhya Pradesh", $state_counts["Madhya Pradesh"]),
    array("Maharashtra", $state_counts["Maharashtra"]),
    array("Manipur", $state_counts["Manipur"]),
    array("Meghalaya", $state_counts["Meghalaya"]),
    array("Mizoram", $state_counts["Mizoram"]),
    array("Nagaland", $state_counts["Nagaland"]),
    array("Odisha", $state_counts["Odisha"]),
    array("Puducherry", $state_counts["Puducherry"]),
    array("Punjab", $state_counts["Punjab"]),
    array("Rajasthan", $state_counts["Rajasthan"]),
    array("Sikkim", $state_counts["Sikkim"]),
    array("Tamil Nadu", $state_counts["Tamil Nadu"]),
    array("Telangana", $state_counts["Telangana"]),
    array("Tripura", $state_counts["Tripura"]),
    array("Uttar Pradesh", $state_counts["Uttar Pradesh"]),
    array("Uttarakhand", $state_counts["Uttarakhand"]),
    array("West Bengal", $state_counts["West Bengal"]),

);

// Encode the data as a JSON string for use in the JavaScript code
$json_data = json_encode($data);

?>

















<!-- Pie chart fully furnished -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Statistics</title>
    <link rel="icon" type="images/png" href="images/favicon.ico">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!--Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <!--GF end-->


    <!-- Head  for histogram-statewise -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable(<?php echo $json_data; ?>);

            var options = {
                title: 'State Counts',
                legend: {
                    position: 'none'
                },
                histogram: {
                    bucketSize: 1
                }
            };

            var chart = new google.visualization.Histogram(document.getElementById('chart_div_histogram'));

            chart.draw(data, options);
        }
    </script>









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

        /* button {
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			background-color: #1a73e8;
			color: #fff;
			box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.3);
			transition: box-shadow 0.3s ease-in-out;
		} */

        /* button:hover {
			box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
		} */

        /* .user-details {
			margin-top: 50px;
		} */

        /* .user-details p {
			font-size: 18px;
			margin-bottom: 10px;
		} */

        /* .user-details img {
			max-width: 200px;
			max-height: 200px;
			margin-top: 20px;
			border-radius: 50%;
			box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.3);
			transition: box-shadow 0.3s ease-in-out;
		} */

        .user-details img:hover {
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
        }
    </style>





    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Department', 'Count'],
                <?php
                // Connect to your database

                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "data_db";

                // $servername = "localhost";
                // $username = "id20415074_root";
                // $password = "Qwerty@12345";
                // $dbname = "id20415074_data_db";


                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Prepare SQL statement with placeholders for security
                $sql = "SELECT department, COUNT(*) as count FROM employees WHERE department IN ('SC-B', 'SC-C', 'SC-D', 'SC-E') GROUP BY department";

                $stmt = $conn->prepare($sql);
                $stmt->execute();

                // Bind result variables
                $stmt->bind_result($department, $count);

                // Fetch results and store in array
                $data = array();
                while ($stmt->fetch()) {
                    $data[] = array('department' => $department, 'count' => $count);
                }

                // Close statement and connection
                $stmt->close();
                $conn->close();

                // Loop through data array and output as JavaScript array
                foreach ($data as $row) {
                    echo "['" . htmlentities($row['department']) . "', " . htmlentities($row['count']) . "],";
                }
                ?>
            ]);

            var options = {
                title: 'Employee Statistics by Department',
                pieHole: 0.4,
                chartArea: {
                    left: '10%',
                    top: '10%',
                    width: '80%',
                    height: '80%'
                },
                height: 400,
                legend: {
                    position: 'right'
                }
            };

            var chart = new google.visualization.PieChart(document.getElementById('chart_div_pie'));
            chart.draw(data, options);
        }
    </script>
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

    <style>
        body {
            background-image: url('images/bg.svg') !important;
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
        body {
            background-color: #f1f1f1;
            font-family: 'Labrada', serif;
        }

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











    <!--Division for Map of India @all code here, unlike others, whose php code is upper, header is in head and then display in division  -->
    <div class="left">
        <div class="container">
            <div class="form-wrapper" style="max-width: 950px;">
                <!-- Map of INDIA fully functional -->

                <?php
                // Connect to your database

                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "data_db";

                // $servername = "localhost";
                // $username = "id20415074_root";
                // $password = "Qwerty@12345";
                // $dbname = "id20415074_data_db";


                $conn = mysqli_connect($servername, $username, $password, $dbname);

                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Query the database for the state names
                $sql = "SELECT address FROM employees";
                $result = mysqli_query($conn, $sql);

                $states = array();

                // Loop through the results and extract the state names
                while ($row = mysqli_fetch_assoc($result)) {
                    $address = strtolower($row['address']);





                    // Check for each state keyword in the address

                    if (strpos($address, 'andaman and nicobar islands') !== false) {
                        $states['Andaman and Nicobar Islands'] = isset($states['Andaman and Nicobar Islands']) ? $states['Andaman and Nicobar Islands'] + 1 : 1;
                    } elseif (strpos($address, 'andhra pradesh') !== false) {
                        $states['Andhra Pradesh'] = isset($states['Andhra Pradesh']) ? $states['Andhra Pradesh'] + 1 : 1;
                    } elseif (strpos($address, 'arunachal pradesh') !== false) {
                        $states['Arunachal Pradesh'] = isset($states['Arunachal Pradesh']) ? $states['Arunachal Pradesh'] + 1 : 1;
                    } elseif (strpos($address, 'assam') !== false) {
                        $states['Assam'] = isset($states['Assam']) ? $states['Assam'] + 1 : 1;
                    } elseif (strpos($address, 'bihar') !== false) {
                        $states['Bihar'] = isset($states['Bihar']) ? $states['Bihar'] + 1 : 1;
                    } elseif (strpos($address, 'chandigarh') !== false) {
                        $states['Chandigarh'] = isset($states['Chandigarh']) ? $states['Chandigarh'] + 1 : 1;
                    } elseif (strpos($address, 'chhattisgarh') !== false) {
                        $states['Chhattisgarh'] = isset($states['Chhattisgarh']) ? $states['Chhattisgarh'] + 1 : 1;
                    } elseif (strpos($address, 'dadra and nagar haveli') !== false) {
                        $states['Dadra and Nagar Haveli'] = isset($states['Dadra and Nagar Haveli']) ? $states['Dadra and Nagar Haveli'] + 1 : 1;
                    } elseif (strpos($address, 'daman and diu') !== false) {
                        $states['Daman and Diu'] = isset($states['Daman and Diu']) ? $states['Daman and Diu'] + 1 : 1;
                    } elseif (strpos($address, 'delhi') !== false) {
                        $states['Delhi'] = isset($states['Delhi']) ? $states['Delhi'] + 1 : 1;
                    } elseif (strpos($address, 'goa') !== false) {
                        $states['Goa'] = isset($states['Goa']) ? $states['Goa'] + 1 : 1;
                    } elseif (strpos($address, 'gujarat') !== false) {
                        $states['Gujarat'] = isset($states['Gujarat']) ? $states['Gujarat'] + 1 : 1;
                    } elseif (strpos($address, 'haryana') !== false) {
                        $states['Haryana'] = isset($states['Haryana']) ? $states['Haryana'] + 1 : 1;
                    } elseif (strpos($address, 'himachal pradesh') !== false) {
                        $states['Himachal Pradesh'] = isset($states['Himachal Pradesh']) ? $states['Himachal Pradesh'] + 1 : 1;
                    } elseif (strpos($address, 'jammu and kashmir') !== false) {
                        $states['Jammu and Kashmir'] = isset($states['Jammu and Kashmir']) ? $states['Jammu and Kashmir'] + 1 : 1;
                    } elseif (strpos($address, 'jharkhand') !== false) {
                        $states['Jharkhand'] = isset($states['Jharkhand']) ? $states['Jharkhand'] + 1 : 1;
                    } elseif (strpos($address, 'karnataka') !== false) {
                        $states['Karnataka'] = isset($states['Karnataka']) ? $states['Karnataka'] + 1 : 1;
                    } elseif (strpos($address, 'kerala') !== false) {
                        $states['Kerala'] = isset($states['Kerala']) ? $states['Kerala'] + 1 : 1;
                    } elseif (strpos($address, 'ladakh') !== false) {
                        $states['Ladakh'] = isset($states['Ladakh']) ? $states['Ladakh'] + 1 : 1;
                    } elseif (strpos($address, 'lakshadweep') !== false) {
                        $states['Lakshadweep'] = isset($states['Lakshadweep']) ? $states['Lakshadweep'] + 1 : 1;
                    } elseif (strpos($address, 'madhya pradesh') !== false) {
                        $states['Madhya Pradesh'] = isset($states['Madhya Pradesh']) ? $states['Madhya Pradesh'] + 1 : 1;
                    } elseif (strpos($address, 'maharashtra') !== false) {
                        $states['Maharashtra'] = isset($states['Maharashtra']) ? $states['Maharashtra'] + 1 : 1;
                    } elseif (strpos($address, 'manipur') !== false) {
                        $states['Manipur'] = isset($states['Manipur']) ? $states['Manipur'] + 1 : 1;
                    } elseif (strpos($address, 'meghalaya') !== false) {
                        $states['Meghalaya'] = isset($states['Meghalaya']) ? $states['Meghalaya'] + 1 : 1;
                    } elseif (strpos($address, 'mizoram') !== false) {
                        $states['Mizoram'] = isset($states['Mizoram']) ? $states['Mizoram'] + 1 : 1;
                    } elseif (strpos($address, 'nagaland') !== false) {
                        $states['Nagaland'] = isset($states['Nagaland']) ? $states['Nagaland'] + 1 : 1;
                    } elseif (strpos($address, 'orissa') !== false) {
                        $states['Orissa'] = isset($states['Orissa']) ? $states['Orissa'] + 1 : 1;
                    } elseif (strpos($address, 'puducherry') !== false) {
                        $states['Puducherry'] = isset($states['Puducherry']) ? $states['Puducherry'] + 1 : 1;
                    } elseif (strpos($address, 'punjab') !== false) {
                        $states['Punjab'] = isset($states['Punjab']) ? $states['Punjab'] + 1 : 1;
                    } elseif (strpos($address, 'rajasthan') !== false) {
                        $states['Rajasthan'] = isset($states['Rajasthan']) ? $states['Rajasthan'] + 1 : 1;
                    } elseif (strpos($address, 'sikkim') !== false) {
                        $states['Sikkim'] = isset($states['Sikkim']) ? $states['Sikkim'] + 1 : 1;
                    } elseif (strpos($address, 'tamil nadu') !== false) {
                        $states['Tamil Nadu'] = isset($states['Tamil Nadu']) ? $states['Tamil Nadu'] + 1 : 1;
                    } elseif (strpos($address, 'telangana') !== false) {
                        $states['Telangana'] = isset($states['Telangana']) ? $states['Telangana'] + 1 : 1;
                    } elseif (strpos($address, 'tripura') !== false) {
                        $states['Tripura'] = isset($states['Tripura']) ? $states['Tripura'] + 1 : 1;
                    } elseif (strpos($address, 'uttar pradesh') !== false) {
                        $states['Uttar Pradesh'] = isset($states['Uttar Pradesh']) ? $states['Uttar Pradesh'] + 1 : 1;
                    } elseif (strpos($address, 'uttarakhand') !== false) {
                        $states['IN-UT'] = isset($states['IN-UT']) ? $states['IN-UT'] + 1 : 1;
                    } elseif (strpos($address, 'west bengal') !== false) {
                        $states['West Bengal'] = isset($states['West Bengal']) ? $states['West Bengal'] + 1 : 1;
                    }

                    // Add other states as needed
                }

                // Disconnect from the database
                mysqli_close($conn);

                // Create the data table for the Google Chart



                $table = array(
                    ['State', 'Number of Users'],
                    ['Andhra Pradesh', isset($states['Andhra Pradesh']) ? $states['Andhra Pradesh'] : 0],
                    ['Arunachal Pradesh', isset($states['Arunachal Pradesh']) ? $states['Arunachal Pradesh'] : 0],
                    ['Assam', isset($states['Assam']) ? $states['Assam'] : 0],
                    ['Bihar', isset($states['Bihar']) ? $states['Bihar'] : 0],
                    ['Chhattisgarh', isset($states['Chhattisgarh']) ? $states['Chhattisgarh'] : 0],
                    ['Delhi', isset($states['Delhi']) ? $states['Delhi'] : 0],
                    ['Goa', isset($states['Goa']) ? $states['Goa'] : 0],
                    ['Gujarat', isset($states['Gujarat']) ? $states['Gujarat'] : 0],
                    ['Haryana', isset($states['Haryana']) ? $states['Haryana'] : 0],
                    ['Himachal Pradesh', isset($states['Himachal Pradesh']) ? $states['Himachal Pradesh'] : 0],
                    ['Jammu and Kashmir', isset($states['Jammu and Kashmir']) ? $states['Jammu and Kashmir'] : 0],
                    ['Jharkhand', isset($states['Jharkhand']) ? $states['Jharkhand'] : 0],
                    ['Karnataka', isset($states['Karnataka']) ? $states['Karnataka'] : 0],
                    ['Kerala', isset($states['Kerala']) ? $states['Kerala'] : 0],
                    ['Madhya Pradesh', isset($states['Madhya Pradesh']) ? $states['Madhya Pradesh'] : 0],
                    ['Maharashtra', isset($states['Maharashtra']) ? $states['Maharashtra'] : 0],
                    ['Manipur', isset($states['Manipur']) ? $states['Manipur'] : 0],
                    ['Meghalaya', isset($states['Meghalaya']) ? $states['Meghalaya'] : 0],
                    ['Mizoram', isset($states['Mizoram']) ? $states['Mizoram'] : 0],
                    ['Nagaland', isset($states['Nagaland']) ? $states['Nagaland'] : 0],
                    ['Orissa', isset($states['Orissa']) ? $states['Orissa'] : 0],
                    ['Punjab', isset($states['Punjab']) ? $states['Punjab'] : 0],
                    ['Rajasthan', isset($states['Rajasthan']) ? $states['Rajasthan'] : 0],
                    ['Sikkim', isset($states['Sikkim']) ? $states['Sikkim'] : 0],
                    ['Tamil Nadu', isset($states['Tamil Nadu']) ? $states['Tamil Nadu'] : 0],
                    ['Telangana', isset($states['Telangana']) ? $states['Telangana'] : 0],
                    ['Tripura', isset($states['Tripura']) ? $states['Tripura'] : 0],
                    ['Uttar Pradesh', isset($states['Uttar Pradesh']) ? $states['Uttar Pradesh'] : 0],
                    ['IN-UT', isset($states['IN-UT']) ? $states['IN-UT'] : 0],
                    ['West Bengal', isset($states['West Bengal']) ? $states['West Bengal'] : 0],

                    // Add other states as needed
                );

                // Convert the data table to JSON format
                $jsonTable = json_encode($table);

                ?>

                <!-- HTML code for the Google Chart -->
                <html>

                <head>
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                        google.charts.load('current', {
                            'packages': ['geochart']
                        });
                        google.charts.setOnLoadCallback(drawRegionsMap);

                        function drawRegionsMap() {
                            var data = google.visualization.arrayToDataTable(<?php echo $jsonTable; ?>);

                            var options = {
                                region: 'IN',
                                resolution: 'provinces',
                                displayMode: 'regions',
                                backgroundColor: '#81d4fa',
                                datalessRegionColor: '#FFFFFF',
                                tooltip: {
                                    textStyle: {
                                        color: '#444444'
                                    },
                                    trigger: 'hover'
                                }
                            };

                            var chart = new google.visualization.GeoChart(document.getElementById('chart_div_states'));

                            chart.draw(data, options);
                        }
                    </script>
                </head>

                <body>
                    <div id="chart_div_states" style="margin:auto; width: 900px; height: 500px;"></div>
                </body>

                </html>

            </div>
        </div>
    </div>




    <!-- Division for bar chart -->
    <div class="left">
        <div class="container">
            <div class="form-wrapper">
                <div id="chart_div_bar"></div>
            </div>
        </div>
    </div>




    <!-- Division for pie chart -->
    <div class="right">
        <div class="container">
            <div class="form-wrapper">
                <div id="chart_div_pie"></div>
            </div>
        </div>
    </div>


    <!-- Division for Histogram -->
    <div class="right">
        <div class="container">
            <div class="form-wrapper">
                <div id="chart_div_histogram" style="width: 561px; height: 700px;"></div>
            </div>
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