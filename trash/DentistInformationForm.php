<?php
if (isset($_POST['submit'])) {
  // form data
    $Dentist_ID = $_POST['Dentist_ID'];
    $Given_name = $_POST['Given_name'];
    $Last_name = $_POST['Last_name'];
    $Birthdate = $_POST['Birthdate'];
    $Age = $_POST['Age'];
    $Sex = $_POST['Sex'];
    $Address = $_POST['Address'];
    $City = $_POST['City'];
    $Phone_Number = $_POST['Phone_Number'];
    $email = $_POST['email'];
    $date_hired = $_POST['date_hired'];
    $Specialization = $_POST['Specialization'];

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
    $sql = "INSERT INTO DentistInformation (Dentist_ID, Given_name, Last_name, Birthdate, Age, Sex, Address, City, Phone_Number, email, date_hired, Specialization)
    VALUES ('$Dentist_ID', '$Given_name', '$Last_name', '$Birthdate', '$Age', '$Sex', '$Address', '$City', '$Phone_Number', '$email', '$date_hired', '$Specialization')";

if ($conn->query($sql) === TRUE) {
    echo "Form data saved successfully";
    echo "<script>alert('Dentist\'s Information Added');</script>";
    echo "<script>location.reload();</script>";
  } else {
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
<body padding-bottom: 600px;>
<div class="main" style="height: 80vh; margin-bottom: 130px;">
    <div class="form">
        <div class="header">
            <h1 id="formHead">DENTIST INFORMATION</h1>
            <hr>
        </div>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="myform">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Dentist ID:</span>
                </div>
                <input class="form-control" type="text" name="Dentist_ID" placeholder="Enter Alphanumeric ID">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Given Name:</span>
                </div>
                <input class="form-control" type="text" name="Given_name" autocomplete="name" placeholder="Enter Name">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Last Name:</span>
                </div>
                <input class="form-control" type="text" name="Last_name" placeholder="Enter Last Name....">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Birthdate:</span>
                </div>
                <input class="form-control" type="date" name="Birthdate">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Age:</span>
                </div>
                <input class="form-control" type="number" name="Age">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Sex:</span>
                </div>
                    <select name="Sex" class="custom-select form-control">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Address:</span>
                </div>
                <input class="form-control" type="text" name="Address" placeholder="Enter House No. and Street Name...">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">City:</span>
                </div>
                <input class="form-control" type="text" name="City" placeholder="Enter City...">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Phone Number:</span>
                </div>
                <input class="form-control" type="text" name="Phone_Number" placeholder="09*********">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Email:</span>
                </div>
                <input class="form-control" type="text" name="email" placeholder="Enter your email...">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Date Hired:</span>
                </div>
                <input class="form-control" type="date" name="date_hired">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Specialization:</span>
                </div>    
                <select name="Specialization" class="custom-select form-control">
                    <option value="none">Select a specialization</option>
                    <option value="Periodontics">Periodontics</option>
                    <option value="Oral Pathology">Oral Pathology</option>
                    <option value="Public Health Dentistry">Public Health Dentistry</option>
                    <option value="Oral Surgery">Oral Surgery</option>
                    <option value="Oral Medicine & Radiology">Oral Medicine & Radiology</option>    
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


