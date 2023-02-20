<?php
if (isset($_POST['submit'])) {
// form data
$BalanceTreatment_ID = $_POST['BalanceTreatment_ID'];
$Payment_Amount = $_POST['Payment_Amount'];
$Payment_Date = $_POST['Payment_Date'];
$BalancePayment_Method = $_POST['BalancePayment_Method'];

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
$sql = "INSERT INTO BalancePayment (BalanceTreatment_ID, Payment_Amount, Payment_Date, BalancePayment_Method) 
        VALUES ('$BalanceTreatment_ID', '$Payment_Amount', '$Payment_Date', '$BalancePayment_Method');
        UPDATE Treatment SET Balance = Balance - '$Payment_Amount' WHERE Treatment_ID = '$BalanceTreatment_ID'";

if ($conn->multi_query($sql) === TRUE) {
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
<body>
<div class="main">
    <div class="form" style="padding-top: 20px; padding-bottom: 20px; margin-bottom: 30px;">
        <div class="header">
            <h1 id="formHead">Pay Balance</h1>
            <hr>
        </div>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="myform">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Treatment ID:</span>
                </div>
                <select name="BalanceTreatment_ID" class="form-select" aria-label="Default select example" id="gendera">
                </select>
                <script>
                    document.getElementById("gendera").innerHTML = "<?php include('viewTreatmentToBalance.php') ?> <?php echo $dropdown; ?>";
                </script>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Payment to Balance:</span>
                </div>
                <input class="form-control" type="number" name="Payment_Amount">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Payment Date:</span>
                </div>
                <input class="form-control" type="date" name="Payment_Date">
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

            <div class="subbut">
                <input type="submit" name="submit" value="Submit" class="btn btn-secondary">
            </div>
            
        </form>
    </div>
</div>    

    <?php include('common/footer.php') ?>   
</body>
</html>


