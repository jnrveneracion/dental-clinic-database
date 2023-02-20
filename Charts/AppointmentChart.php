<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "DentalClinic");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select the database
mysqli_select_db($conn, "DentalClinic");

// Write the SQL query to retrieve appointment data by date
$sql = "SELECT DATE(Appointment_ID) AS date, COUNT(*) AS appointments FROM Appointment GROUP BY DATE(Appointment_ID)";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if there are any results
if (mysqli_num_rows($result) > 0) {
    // Process the data to create a chart
    $labels = array();
    $data = array();

    while ($row = mysqli_fetch_assoc($result)) {
        array_push($labels, $row['date']);
        array_push($data, $row['appointments']);
    }

    // Close the result set
    mysqli_free_result($result);

    // Close the database connection
    mysqli_close($conn);

    // Display the chart using Chart.js
    echo "<div style='padding: 20px;'>";
    echo "<canvas id='appointments-chart'></canvas>";
    echo "<script src='https://cdn.jsdelivr.net/npm/chart.js'></script>";
    echo "<script>";
    echo "var ctx = document.getElementById('appointments-chart').getContext('2d');";
    echo "var chart = new Chart(ctx, {";
    echo "    type: 'line',";
    echo "    data: {";
    echo "        labels: " . json_encode($labels) . ",";
    echo "        datasets: [{";
    echo "            label: 'Appointments by Date',";
    echo "            data: " . json_encode($data) . ",";
    echo "            backgroundColor: 'white',";
    echo "            borderColor: 'black',";
    echo "            borderWidth: 1";
    echo "        }]";
    echo "    },";
    echo "    options: {";
    echo "        scales: {";
    echo "            y: {";
    echo "                beginAtZero: true";
    echo "            }";
    echo "        }";
    echo "    }";
    echo "});";
    echo "</script>";
    echo "</div>";
    
} else {
    // If there are no results, show an error message
    echo "No results found";
}
?>
