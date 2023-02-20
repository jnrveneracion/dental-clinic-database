<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">   
    <?php include('common/header.php')?>   
</head>
<body>
    <h1 class="text-center">Patient's Records</h1> 
    <div class="ViewTable" >  
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
            <div class="input-group input-group-lg">
                <input type="text" style="border-right: none;" class="form-control" name="searchTerm" id="searchBar" placeholder="Search by Patient's ID, Name, City, Doctor's ID, Procedure done or its date" value="<?php echo (isset($searchTerm)) ? $searchTerm : ''; ?>">
                <input type="date" id="searchTermD">
                <input type="submit" class="btn btn-secondary" name="submit" value="Search">
                <input type="submit" class="btn btn-secondary" name="viewAll" value="View All" id="viewAll">
            </div>
            </div>
            <script>
                    document.getElementById('searchTermD').addEventListener('change', function() {
                        var date = document.getElementById('searchTermD').value;
                        document.getElementById('searchBar').value = date;
                    });
            </script>
            <span id='searchspan'></span>
        </form>
    </div>   
    
        <?php
            if (isset($_POST['searchTerm'])) {
                $searchTerm = $_POST['searchTerm'];
                echo "<script>document.getElementById('searchspan').innerHTML = '\'" . $searchTerm . "\' found here: About <span id=\'numberofresults\'></span> results found.';</script>";
            } else {
                $searchTerm = "";
            }
            if (isset($_POST['viewAll'])) {
                $searchTerm = "";
                echo "<script>document.getElementById('searchspan').style.display = 'none';</script>";
            }
            
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "DentalClinic";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }
            
            $sql = "SELECT Treatment.*, PatientInformation.Given_Name, PatientInformation.Last_Name, PatientInformation.City, PatientInformation.Birthdate, PatientInformation.Age, PatientInformation.Sex, PatientInformation.Address, PatientInformation.Phone_Number, PatientInformation.email, BalancePayment.*
                    FROM Treatment 
                    LEFT JOIN PatientInformation ON Treatment.Patient_ID = PatientInformation.Patient_ID 
                    LEFT JOIN BalancePayment ON Treatment.Treatment_ID = BalancePayment.BalanceTreatment_ID 
                    WHERE Treatment.Patient_ID LIKE '%$searchTerm%' 
                    OR Treatment.Procedure_done LIKE '%$searchTerm%' 
                    OR Treatment.Procedure_Date LIKE '%$searchTerm%' 
                    OR Treatment.Dentist_ID LIKE '%$searchTerm%' 
                    OR Treatment.Tooth_No LIKE '%$searchTerm%' 
                    OR PatientInformation.Given_Name LIKE '%$searchTerm%' 
                    OR PatientInformation.Last_Name LIKE '%$searchTerm%' 
                    OR PatientInformation.City LIKE '%$searchTerm%' 
                    ORDER BY Patient_ID";

            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $count = 1;
                $previous_patient_id = "";
                echo "<div class='container-xxl' id='cont'>";
                    while ($row = $result->fetch_assoc()) {
                    $current_patient_id = $row["Patient_ID"];
                        if ($previous_patient_id != $current_patient_id) {
                            if ($previous_patient_id != "") {
                                echo "</table>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                                $count = 1; 
                            }
                            
                            echo "<div class='withAnimation'>";
                                echo "<div class='containerRecord'>";
                                    echo "
                                    <h4 class='mb-0'>" . $current_patient_id . " 
                                        <button type='button' style='float: right; height: 51px; display: flex; align-items: center; margin-top: 2px;' class='btn btn-warning btn-sm' data-toggle='modal' data-target='#patientModal" . $current_patient_id . "'>View Records</button>
                                    <span style='font-family: monospace; font-size: 15px;'><br>
                                        <span id='viewTag1'>Patient's Name: </span><span style='color: white;'>". $row["Given_Name"] ."</span><br>
                                       
                                    </span>
                                    </h4>";    
                                echo "</div>";   
                            echo "</div>";  
                            echo "<div class='modal fade' id='patientModal" . $current_patient_id . "' tabindex='-1' role='dialog' aria-labelledby='patientModalLabel" . $current_patient_id . "' aria-hidden='true' style='-webkit-backdrop-filter: blur(2px); color: white;'>";
                            echo "<div class='modal-dialog modal-dialog-centered modal-dialog-scrollable' role='document'>";
                            echo "<div class='modal-content' style='width: 800px;'>";
                            echo "<div class='modal-header'>";
                            echo "<h5 class='modal-title text-dark id='patientModalLabel" . $current_patient_id . "'>Patient ID: " . $current_patient_id . "</h5>";
                            echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                            echo "<span aria-hidden='true' style='color: red;'>&times;</span>";
                            echo "</button>";
                            echo "</div>";
                            echo "<div class='modal-body'>";
                            echo "<table class='table table-bordered table-hover'>";
                            echo "<tr><td colspan='5' id='headtable' class='bg-warning'>Patient's Personal Information</td></tr>";
                            echo "<tr><th>Given Name</th><td colspan='1'>" . $row["Given_Name"] . "</td><th>Last Name</th><td colspan='2'>" . $row["Last_Name"] . "</td></tr>";
                            echo "<tr><th>Birthdate</th><td colspan='0'>" . $row["Birthdate"] . "</td><th>Age</th><td colspan='2'>" . $row["Age"] . "</td></tr>";
                            echo "<tr><th>Sex</th><td colspan='4'>" . $row["Sex"] . "</td></tr>";
                            echo "<tr><th>Address</th><td colspan='1'>" . $row["Address"] . "</td><th>City</th><td colspan='2'>" . $row["City"] . "</td></tr>";
                            echo "<tr><th>Phone No:</th><td colspan='1'>" . $row["Phone_Number"] . "</td><th>Email</th><td colspan='2'>" . $row["email"] . "</td></tr>";
                            echo "<div style='height=200px; background-color: white;'>";
                            echo "</div>";
                            echo "<tr><th></th><th></th><th></th><th></th><th></th></tr>";
                            echo "<tr><td colspan='5' id='headtable' class='bg-warning'>Treatment Records</td></tr>";
                            $previous_patient_id = $current_patient_id;
                                      
                        }
                            
                            echo "<tr style='background-color: rgb(237, 237, 237);'><th><span style='color: red;'>" . $count . "</span> - Treatment ID</th><th>Procedure Done</th><th>Procedure Date</th><th>Dentist ID</th><th>Tooth Number</th></tr>";
                            echo "<tr>
                                    <td style='text-align: center;' class='align-middle'>" . $row["Treatment_ID"] . "</td>
                                    <td style='text-align: center; font-size: 15px;' class='align-middle'>" . $row["Procedure_done"] . "</td>
                                    <td style='text-align: center;' class='align-middle'>" . $row["Procedure_Date"] . "</td>
                                    <td style='text-align: center;' class='align-middle'>" . $row["Dentist_ID"] . "</td>
                                    <td style='text-align: center;' class='align-middle'>" . $row["Tooth_No"] . "</td>
                                  </tr>";
                            echo "
                                <tr style='text-align: center;'>
                                    <th class='align-middle'>Billing</th>
                                    <th class='align-middle'>Payment Method</th>
                                    <th class='align-middle'>Amount Charge</th>
                                    <th class='align-middle'>Amount Paid</th>
                                    <th class='align-middle'>Balance</th>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style='text-align: center; color: green;'><span>" . $row["Payment_Method"] . "</span></td>
                                    <td style='text-align: end;'><span class='billSpan'>₱" . number_format($row["Amount_Charge"], 2) . "</span></td>
                                    <td style='text-align: end;'><span class='billSpan'>₱" . number_format($row["Amount_Paid"], 2) . "</span></td>
                                    <td style='text-align: end;'><span class='billSpan'>₱" . number_format($row["Balance"], 2) . "</span></td>
                                </tr>
                                <tr>
                                    <th>Balance Payment</th>
                                    <td class='align-middle' style='text-align: center; color: green;'><span>" . $row["BalancePayment_Method"] . "</span></td>
                                    <td class='align-middle' style='text-align: center;'>" . $row["Payment_Date"]. "</span></td>
                                    <td class='align-middle' style='text-align: end;'><span class='billSpan'>₱" . number_format($row["Payment_Amount"], 2) . "</span></td>
                                    <td class='align-middle' style='text-align: end;'><span class='billSpan'>₱" . number_format($row["Balance"], 2) . "</span></td>
                                    
                                </tr>";
                                echo "<tr><th></th><th></th><th></th><th></th><th></th></tr>";
                                    $count++;
                    }
                      
                        
            } else {
            echo "<h3 class='mb-3' style='text-align: center;'>No results found</h3>";
            echo "<script>document.getElementById('searchspan').style.display = 'none';</script>";
            }
            
            if ($result->num_rows > 0) {
                echo "<script>document.getElementById('numberofresults').innerHTML = $result->num_rows;</script>"; 
            }    
    ?>  
    
    
</body>
</html>

