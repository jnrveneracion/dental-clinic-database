<?php
if (isset($_POST['submit'])) {
// form data
$Patient_ID = $_POST['Patient_ID'];
$Treatment_ID = $_POST['Treatment_ID'];
$Procedure_done = $_POST['Procedure_done'];
$Procedure_Date = $_POST['Procedure_Date'];
$Dentist_ID = $_POST['Dentist_ID'];
$Tooth_No = $_POST['Tooth_No'];
$Amount_Charge = $_POST['Amount_Charge'];
$Amount_Paid = $_POST['Amount_Paid'];
$Payment_Method = $_POST['Payment_Method'];
$Balance = $_POST['Balance'];

// database credentials
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

// insert form data into database
$sql = "INSERT INTO Treatment (Patient_ID, Treatment_ID, Procedure_done, Procedure_Date, Dentist_ID, Tooth_No, Amount_Charge, Amount_Paid, Payment_Method, Balance)
VALUES ('$Patient_ID', '$Treatment_ID', '$Procedure_done', '$Procedure_Date', '$Dentist_ID', '$Tooth_No', '$Amount_Charge', '$Amount_Paid', '$Payment_Method', '$Balance')";

if ($conn->query($sql) === TRUE) {
    echo "Form data saved successfully";
    echo "<script>alert('Patient\'s Treatment Added');</script>";
    echo "<script>location.reload();</script>";
  } else {
    echo "<script>alert('something went wrong');</script>";
    echo "Error: " . $sql . "<br>" . $conn->error;
  }  

  $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Patien Information</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">   
    <?php include('common/header.php')?>
</head>
<body style="padding-bottom: 300px;">
<div class="main">
    <div class="form" style="padding-top: 20px; padding-bottom: 20px; margin-bottom: 30px;">
        <div class="header">
            <h1 id="formHead">RECORD TREATMENT</h1>
            <hr>
        </div>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="myform">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Patient ID:</span>
                </div>
                <select name="Patient_ID" class="form-select" aria-label="Default select example" id="gendera">
                </select>
                <script>
                    document.getElementById("gendera").innerHTML = "<?php include('viewRecorded.php') ?> <?php echo $dropdown; ?>";
                </script>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Treatment ID:</span>
                </div>
                <input class="form-control" type="text" name="Treatment_ID" autocomplete="name" placeholder="Patient's ID + Alphabet">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Procedure:</span>
                </div>
                    <select name="Procedure_done" class="custom-select form-control">
                        <option value="none">Choose Procedure</option>
                        <option value="Dental Fillings">Dental Fillings </option>
                        <option value="Dental Crowns">Dental Crowns</option>
                        <option value="Dental Bridges">Dental Bridges</option>
                        <option value="Dental Implants">Dental Implants</option>
                        <option value="Dental Veneers">Dental Veneers</option>
                        <option value="Dental Bonding">Dental Bonding</option>
                        <option value="Root Canal Therapy">Root Canal Therapy</option>
                        <option value="Tooth Extractions">Tooth Extractions</option>
                        <option value="Dental Inlays/Onlays">Dental Inlays/Onlays</option>
                        <option value="Dental Cleanings">Dental Cleanings</option>
                        <option value="Scaling and Root Planing">Scaling and Root Planing</option>
                        <option value="Gum Surgery">Gum Surgery</option>
                        <option value="Orthodontic Treatment">Orthodontic Treatment (Braces, Invisalign)</option>
                        <option value="Tooth Whitening">Tooth Whitening</option>
                        <option value="Dental Sealants">Dental Sealants</option>
                        <option value="Fluoride Treatment">Fluoride Treatment</option>
                        <option value="Periodontal Therapy">Periodontal Therapy</option>
                        <option value="Tooth Decay Treatment">Tooth Decay Treatment</option>
                        <option value="Others">Others</option>
                    </select>
                    
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Procedure Date:</span>
                </div>
                <input class="form-control" type="date" name="Procedure_Date">
            </div>
            <span style="text-align: center; font-weight: bold;">Teeth Chart</span>
            <img src="css/Teeth.png" alt="Teeth Chart" width="500" height="220"  class="imgChart">
            <span style="font-size: 10px;">Separate with comma ',' if recording more than one.</span>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Tooth/Teeth No.:</span>
                </div>
                <input class="form-control" type="text" name="Tooth_No">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Dentist ID:</span>
                </div>
                <select name="Dentist_ID" class="form-select" aria-label="Default select example" id="dentista">
                </select>
                <script>
                    document.getElementById("dentista").innerHTML = "<?php include('viewRecordedDentist.php') ?> <?php echo $dropdown; ?>";
                </script>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Amount Charge:</span>
                </div>
                <input class="form-control" type="number" name="Amount_Charge">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Amount Paid:</span>
                </div>
                <input class="form-control" type="number" name="Amount_Paid">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Payment Method:</span>
                </div>
                    <select name="BalancePayment_Method" class="custom-select form-control">
                        <option value="Cash">Cash</option>
                        <option value="Credit Card">Credit Card</option>
                        <option value="Debit Card">Debit Card</option>
                        <option value="Digital Wallte">Digital Wallet</option>
                        <option value="Personal Cheque">Personal Cheque</option>
                    </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Balance:</span>
                </div>
                <input class="form-control" type="number" name="Balance" id="Balance" readonly>
            </div>
            
            <script>
                document.querySelector('input[name="Amount_Charge"]').addEventListener('input', function() {
                    let balance = document.querySelector('input[name="Balance"]');
                    let amountCharge = +document.querySelector('input[name="Amount_Charge"]').value;
                    let amountPaid = +document.querySelector('input[name="Amount_Paid"]').value;
                    balance.value = amountCharge - amountPaid;
                });

                document.querySelector('input[name="Amount_Paid"]').addEventListener('input', function() {
                    let balance = document.querySelector('input[name="Balance"]');
                    let amountCharge = +document.querySelector('input[name="Amount_Charge"]').value;
                    let amountPaid = +document.querySelector('input[name="Amount_Paid"]').value;
                    balance.value = amountCharge - amountPaid;
                });
            </script>

            <div class="subbut">
                <input type="submit" name="submit" value="Submit" class="btn btn-secondary">
            </div>
            
        </form>
    </div>
</div>    
     
</body>
</html>


