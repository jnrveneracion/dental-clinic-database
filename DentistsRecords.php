<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">   
    <?php include('common/header.php') ?>
    <style>
        * {
        box-sizing: border-box;
        }

        #Appointments {
            animation: slide-up 0.5s;
            animation-fill-mode: forwards;
        }

    </style>
</head>
<body>
<div class="container-fluid bg-white rounded shadow p-3 mb-5 bg-body-tertiary rounded-7" id="Appointments" style="width: -webkit-fit-content; margin-left: 50px; margin-right: 50px;">
  <h1 class="text-center">Dentists Records</h1>
  <hr>
    <div class="form-group bg-white" style="width: -webkit-fill-available; float: left; padding: 11px; width: -webkit-fit-content; border-radius: 0px 10px 10px 0px;" id='appSticky'>
        Gender Count:
        <span class="dot bg-dark-subtle"></span> <span class="Count" id='male' style="font-weight: bold;"> </span> - Male
        <span class="dot bg-dark-subtle"></span> <span class="Count" id='female' style="font-weight: bold;"> </span> - Female
    </div>
    <div class="form-group" style="width: 300px; float: right; ">
            <input type="text" class="form-control" id="search-input" placeholder="Enter search term...">
        </div>
  <table id="appointments-table" class='table table-hover table-striped' style="margin-top: 20px;">
    <thead>
      <tr style='text-align: center;' class='bg-dark'>
            <th><button class="btn text-white" onclick="sortTable(0)">No.</button></th>
            <th><button class="btn text-white" onclick="sortTable(1)">Dentist ID</button></th>
            <th><button class="btn text-white" onclick="sortTable(2)">Given Name</button></th>
            <th><button class="btn text-white" onclick="sortTable(3)">Last Name</button></th>
            <th><button class="btn text-white" onclick="sortTable(4)">Birthdate</button></th>
            <th><button class="btn text-white" onclick="sortTable(5)">Age</button></th>
            <th><button class="btn text-white" onclick="sortTable(6)">Sex</button></th>
            <th><button class="btn text-white" onclick="sortTable(7)">Address</button></th>
            <th><button class="btn text-white" onclick="sortTable(8)">City</button></th>
            <th><button class="btn text-white" onclick="sortTable(9)">Phone Number</button></th>
            <th><button class="btn text-white" onclick="sortTable(10)">Email</button></th>
            <th><button class="btn text-white" onclick="sortTable(11)">Date Hired</button></th>
            <th><button class="btn text-white" onclick="sortTable(12)">Specialization</button></th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
      <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "DentalClinic";

        // create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        // query to select all appointments from the table "Appointment"
        $sql = "SELECT *
                FROM DentistInformation";

        $result = $conn->query($sql);

        // display all appointments in the table
        if ($result->num_rows > 0) {
          $count = 1;
          $countMale = 0;
          $countFemale = 0;
          while ($row = $result->fetch_assoc()) {
            $gender = $row["Sex"];
            $age = $row["Age"];

            if ($gender == "Male") {
                $countMale++;
            } elseif ($gender == "Female") {
                $countFemale++;
            }

            echo "<tr " . $row_style . ">";
            echo "<td style='text-align: center;'>" . $count . ".</td>";
            echo "<td>" . $row["Dentist_ID"] . "</td>";
            echo "<td>" . $row["Given_name"] . "</td>";
            echo "<td>" . $row["Last_name"] . "</td>";
            echo "<td>" . $row["Birthdate"] . "</td>";
            echo "<td>" . $row["Age"] . "</td>";
            echo "<td>" . $row["Sex"] . "</td>";
            echo "<td>" . $row["Address"] . "</td>";
            echo "<td>" . $row["City"] . "</td>";
            echo "<td>" . $row["Phone_Number"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["date_hired"] . "</td>";
            echo "<td>" . $row["Specialization"] . "</td>";
            echo "</tr>";
            $count++;
          }
          echo "<script>document.getElementById('male').innerHTML = " . $countMale . ";</script>";
          echo "<script>document.getElementById('female').innerHTML = " . $countFemale . ";</script>";
        } else {
          echo "<tr><td colspan='6'>No appointments found</td></tr>";
        }

        $conn->close();
      ?>

            </tbody>
        </table>
    </div>    
    <script>
        function sortTable(col) {
        var table, rows, switching, i, x, y, shouldSwitch;
        table = document.getElementById("appointments-table");
        switching = true;

        while (switching) {
            switching = false;
            rows = table.rows;
            for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[col];
            y = rows[i + 1].getElementsByTagName("TD")[col];
            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                shouldSwitch = true;
                break;
            }
            }
            if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            }
        }
        }

        $(document).ready(function(){
            // get the table rows
            var rows = $("#appointments-table tbody tr");

            // set up the search input
            $("#search-input").on("keyup", function() {
            var value = $(this).val().toLowerCase();

            // filter the table rows
            rows.filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
            });
        });

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
            }, 200);
        });

    </script>
<?php include('common/footer.php') ?>   
</body>
</html>
