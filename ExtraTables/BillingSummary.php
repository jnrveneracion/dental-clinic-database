<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">   
    <style>
        * {
        box-sizing: border-box;
        }

    </style>
</head>
<body>
    <h1 class="text-center">Billing Summary</h1>
    <div class="form-group" style="width: 300px; float: right;">
        <input type="text" class="form-control" id="search-input" placeholder="Enter search term...">
    </div>
  <table id="" class='table table-hover table-striped' style="margin-top: 70px;">
    <thead>
      <tr style='text-align: center;' class='bg-dark'>
            <th><button class="btn text-white" ">No.</button></th>
            <th><button class="btn text-white" ">Patient ID</button></th>
            <th><button class="btn text-white" ">Patient's Name</button></th>
            <th><button class="btn text-white" ">Patient's Last Name</button></th>
            <th><button class="btn text-white" ">Dentist's Name</button></th>
            <th><button class="btn text-white" ">Dentist's Last Name</button></th>
            <th><button class="btn text-white" ">Total Treatments</button></th>
            <th><button class="btn text-white" ">Total Amount Charge</button></th>
            <th><button class="btn text-white" ">Total Amount Paid</button></th>
            <th><button class="btn text-white" ">Total Balance</button></th>
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
                    d.Given_name AS Dentist_given_name,
                    d.Last_name AS Dentist_last_name,
                    COUNT(*) AS Total_treatments,
                    SUM(t.Amount_Charge) AS Total_amount_charged,
                    SUM(t.Amount_Paid) AS Total_amount_paid,
                    SUM(t.Balance) AS Total_balance
                FROM
                    Treatment t
                    LEFT JOIN PatientInformation p ON t.Patient_ID = p.Patient_ID
                    LEFT JOIN DentistInformation d ON t.Dentist_ID = d.Dentist_ID
                GROUP BY
                    p.Patient_ID,
                    p.Given_name,
                    p.Last_name,
                    d.Given_name,
                    d.Last_name
                ORDER BY
                    Procedure_Date ASC;";

        $result = $conn->query($sql);

        // display all appointments in the table
        if ($result->num_rows > 0) {
          $count = 1;
          while ($row = $result->fetch_assoc()) {

            echo "<tr " . $row_style . ">";
            echo "<td style='text-align: center;'>" . $count . ".</td>";
            echo "<td>" . $row["Patient_ID"] . "</td>";
            echo "<td>" . $row["Given_name"] . "</td>";
            echo "<td>" . $row["Last_name"] . "</td>";
            echo "<td>" . $row["Dentist_given_name"] . "</td>";
            echo "<td>" . $row["Dentist_last_name"] . "</td>";
            echo "<td>" . $row["Total_treatments"] . "</td>";
            echo "<td style='text-align: end;'>" . number_format($row["Total_amount_charged"], 2) . "</td>";
            echo "<td style='text-align: end;'>" . number_format($row["Total_amount_paid"], 2) . "</td>";
            echo "<td style='text-align: end;'>" . number_format($row["Total_balance"], 2) . "</td>";
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
</body>
</html>
