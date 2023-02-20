<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">    
    <?php include('common/header.php') ?>
     
    <link rel="stylesheet" href="css/style.css">
    <style>
        .card {
            margin: 20px;
        }
        #dashboard {
        animation: slide-up 1s;
        animation-fill-mode: forwards;
        }
    </style>
</head>
<body>

<div class="container mb-4 mt-4">
<div class="pricing card-deck flex-column flex-md-row mb-3">
        <div id="dashboard" class="card card-pricing popular shadow text-center px-3 mb-4" style="border-radius: 10px;">
            <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-dark text-white shadow-sm"></span>
            <div class="bg-transparent card-header pt-4 border-0">
                <!-- <img class="mb-4" src="css/calendar.svg" alt="Logo" style="width: 100px; height: 100px;"> -->
                <h1 class="h1 font-weight-bold text-dark text-center mb-4" >
                    <span class="Count">106</span>
                </h1>
            </div>
            <div class="card-body pt-0">
                <ul class="list-unstyled mb-4">
                    <li>Up to 5 users</li>
                </ul>
            </div>
        </div>
        <div id="dashboard" class="card card-pricing popular shadow text-center px-3 mb-4" style="border-radius: 10px;">
            <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-dark text-white shadow-sm"></span>
            <div class="bg-transparent card-header pt-4 border-0">
                <!-- <img class="mb-4" src="css/calendar.svg" alt="Logo" style="width: 100px; height: 100px;"> -->
                <h1 class="h1 font-weight-bold text-dark text-center mb-4" >
                    <span class="Count">106</span>
                </h1>
            </div>
            <div class="card-body pt-0">
                <ul class="list-unstyled mb-4">
                    <li>Up to 5 users</li>
                </ul>
            </div>
        </div>
        <div id="dashboard" class="card card-pricing popular shadow text-center px-3 mb-4" style="border-radius: 10px;">
            <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-dark text-white shadow-sm"></span>
            <div class="bg-transparent card-header pt-4 border-0">
                <!-- <img class="mb-4" src="css/calendar.svg" alt="Logo" style="width: 100px; height: 100px;"> -->
                <h1 class="h1 font-weight-bold text-dark text-center mb-4" >
                    <span class="Count">106</span>
                </h1>
            </div>
            <div class="card-body pt-0">
                <ul class="list-unstyled mb-4">
                    <li>Up to 5 users</li>
                </ul>
            </div>
        </div>
        <div id="dashboard" class="card card-pricing popular shadow text-center px-3 mb-4" style="border-radius: 10px;">
            <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-dark text-white shadow-sm"></span>
            <div class="bg-transparent card-header pt-4 border-0">
                <!-- <img class="mb-4" src="css/calendar.svg" alt="Logo" style="width: 100px; height: 100px;"> -->
                <h1 class="h1 font-weight-bold text-dark text-center mb-4" >
                    <span class="Count">106</span>
                </h1>
            </div>
            <div class="card-body pt-0">
                <ul class="list-unstyled mb-4">
                    <li>Up to 5 users</li>
                </ul>
            </div>
        </div>   
    </div>
    
        <div class="pricing card-deck flex-column flex-md-row mb-3">
            <div id="dashboard" class="card card-pricing popular shadow text-center px-3 mb-4" style="border-radius: 10px;">
                <?php include('charts/AppointmentChart.php') ?>
            </div> 
        </div>
    
        <div class="pricing card-deck flex-column flex-md-row mb-3">
        <div id="dashboard" class="card card-pricing popular shadow text-center px-3 mb-4" style="border-radius: 10px;">
            <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-dark text-white shadow-sm"></span>
            <div class="bg-transparent card-header pt-4 border-0">
                <!-- <img class="mb-4" src="css/calendar.svg" alt="Logo" style="width: 100px; height: 100px;"> -->
                <h1 class="h1 font-weight-bold text-dark text-center mb-4" >
                    <span class="Count" id='done'></span>
                </h1>
            </div>
            <div class="card-body pt-0">
                <ul class="list-unstyled mb-4">
                    <li>Done</li>
                    <li>Appointments</li>
                </ul>
            </div>
        </div>
        <div id="dashboard" class="card card-pricing popular shadow text-center px-3 mb-4" style="border-radius: 10px;">
            <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-dark text-white shadow-sm"></span>
            <div class="bg-transparent card-header pt-4 border-0">
                <!-- <img class="mb-4" src="css/calendar.svg" alt="Logo" style="width: 100px; height: 100px;"> -->
                <h1 class="h1 font-weight-bold text-dark text-center mb-4" >
                    <span class="Count" id='today'></span>
                </h1>
            </div>
            <div class="card-body pt-0">
                <ul class="list-unstyled mb-4">
                    <li>Today</li>
                    <li>Appointments</li>
                </ul>
            </div>
        </div>
        <div id="dashboard" class="card card-pricing popular shadow text-center px-3 mb-4" style="border-radius: 10px;">
            <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-dark text-white shadow-sm"></span>
            <div class="bg-transparent card-header pt-4 border-0">
                <!-- <img class="mb-4" src="css/calendar.svg" alt="Logo" style="width: 100px; height: 100px;"> -->
                <h1 class="h1 font-weight-bold text-dark text-center mb-4" >
                    <span class="Count" id='upcoming'></span>
                </h1>
            </div>
            <div class="card-body pt-0">
                <ul class="list-unstyled mb-4">
                    <li>Upcoming</li>
                    <li>Appointments</li>
                </ul>
            </div>
        </div>
        <div id="dashboard" class="card card-pricing popular shadow text-center px-3 mb-4" style="border-radius: 10px;">
            <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-dark text-white shadow-sm"></span>
            <div class="bg-transparent card-header pt-4 border-0">
                <!-- <img class="mb-4" src="css/calendar.svg" alt="Logo" style="width: 100px; height: 100px;"> -->
                <h1 class="h1 font-weight-bold text-dark text-center mb-4" >
                    <span class="Count" id='totalApp'>106</span>
                </h1>
            </div>
            <div class="card-body pt-0">
                <ul class="list-unstyled mb-4">
                    <li>Total</li>
                    <li>Appointments</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DentalClinic";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$done_result = mysqli_query($conn, "SELECT 'Done' AS date_status, COUNT(*) AS count FROM Appointment WHERE date < CURDATE();");

$done_row = mysqli_fetch_assoc($done_result);
$done = $done_row['count'];
echo "<script>document.getElementById('done').innerHTML = " . $done . ";</script>";

$today_result = mysqli_query($conn, "SELECT 'Today' AS date_status, COUNT(*) AS count FROM Appointment WHERE date = CURDATE();");

$today_row = mysqli_fetch_assoc($today_result);
$today = $today_row['count'];
echo "<script>document.getElementById('today').innerHTML = " . $today . ";</script>";

$upcoming_result = mysqli_query($conn, "SELECT 'Upcoming' AS date_status, COUNT(*) AS count FROM Appointment WHERE date > CURDATE();");

$upcoming_row = mysqli_fetch_assoc($upcoming_result);
$upcoming = $upcoming_row['count'];
echo "<script>document.getElementById('upcoming').innerHTML = " . $upcoming . ";</script>";

$totalApp_result = mysqli_query($conn, "SELECT COUNT(*) AS count FROM Appointment;");

$totalApp_row = mysqli_fetch_assoc($totalApp_result);
$totalApp = $totalApp_row['count'];
echo "<script>document.getElementById('totalApp').innerHTML = " . $totalApp . ";</script>";

?>



<script>
  let countSpans = document.querySelectorAll(".Count");
  countSpans.forEach(function(countSpan) {
    let targetCount = parseInt(countSpan.textContent); // get the target count
    let counter = 0;
    var interval = setInterval(function() {
      if (counter >= targetCount) {
        clearInterval(interval);
      } else {
        counter += 1;
        countSpan.textContent = counter;
      }
    }, 50);
  });
</script>
<!-- <div  class='container card card-pricing popular shadow text-center px-3 mb-4'>

</div> -->


<?php include('common/footer.php') ?>      
</body>
</html>