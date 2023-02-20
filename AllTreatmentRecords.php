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
<div class="container-xl bg-white rounded shadow p-3 mb-5 bg-body-tertiary rounded-7" id="Appointments" style="width: -webkit-fit-content;">
  <h1 class="text-center">Treatment Records</h1>
  <hr>
    <div class="form-group" style="width: 300px; float: right; padding-bottom: 20px;">
            <input type="text" class="form-control" id="search-input" placeholder="Enter search term...">
        </div>
  <table id="appointments-table" class='table table-hover table-striped' style="margin-top: 20px;">
    <thead>
      <tr style='text-align: center;' class='bg-dark'>
            <th><button class="btn text-white" onclick="sortTable(0)">No.</button></th>
            <th><button class="btn text-white" onclick="sortTable(1)">Patient ID</button></th>
            <th><button class="btn text-white" onclick="sortTable(2)">Treatment ID</button></th>
            <th><button class="btn text-white" onclick="sortTable(3)">Procedure Done</button></th>
            <th><button class="btn text-white" onclick="sortTable(4)">Procedure Date</button></th>
            <th><button class="btn text-white" onclick="sortTable(5)">Dentist ID</button></th>
            <th><button class="btn text-white" onclick="sortTable(6)">Tooth No(s)</button></th>
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
        $sql = "SELECT
                    p.Patient_ID,
                    p.Given_name,
                    p.Last_name,
                    t.Treatment_ID,
                    t.Procedure_Done,
                    t.Procedure_Date,
                    t.Dentist_ID,
                    t.Tooth_No
                FROM
                    Treatment t
                    LEFT JOIN PatientInformation p ON t.Patient_ID = p.Patient_ID
                GROUP BY
                    t.Treatment_ID
                ORDER BY
                    p.Patient_ID ASC;";

        $result = $conn->query($sql);

        // display all appointments in the table
        if ($result->num_rows > 0) {
          $count = 1;
          while ($row = $result->fetch_assoc()) {

            echo "<tr " . $row_style . ">";
            echo "<td style='text-align: center;'>" . $count . ".</td>";
            echo "<td>" . $row["Patient_ID"] . "</td>";
            echo "<td>" . $row["Treatment_ID"] . "</td>";
            echo "<td>" . $row["Procedure_Done"] . "</td>";
            echo "<td>" . $row["Procedure_Date"] . "</td>";
            echo "<td>" . $row["Dentist_ID"] . "</td>";
            echo "<td>" . $row["Tooth_No"] . "</td>";
            echo "</tr>";
            $count++;
          }
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
