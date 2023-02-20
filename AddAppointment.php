<?php
if (isset($_POST['submit'])) {
  // form data
  $Appointment_ID = $_POST['Appointment_ID'];
  $patient_id = $_POST['Patient_ID'];
  $given_name = $_POST['Given_name'];
  $last_name = $_POST['Last_name'];
  $date = $_POST['date'];
  $time = $_POST['time'];

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
  $sql = "INSERT INTO Appointment (Appointment_ID ,Patient_ID, Given_name, Last_name, date, time)
  VALUES (CURRENT_TIMESTAMP, '$patient_id', '$given_name', '$last_name', '$date', '$time')";

if ($conn->query($sql) === TRUE) {
    echo "Form data saved successfully";
    echo "<script>alert('Appointment added');</script>";
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
    <title>Add Appointment</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">   
    <?php include('common/header.php') ?>
    <style>
        .forma {
            width: -webkit-fit-content;
            margin: 0 auto;
            position: initial;
        }
    </style>
</head>
<body>
    <h1 class="modal-title fs-8 text-center" id="exampleModalLabel" style="width: -webkit-fill-available;">Add New Appointment</h1>
    <div class="modal-body" id='forms'>
    <div class="forma" style="">
        <div class="header">
        </div>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="myform">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Patient ID:</span>
                </div>
                <input class="form-control" type="text" name="Patient_ID" placeholder="Enter Alphanumeric ID without spaces">
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
                    <span class="input-group-text" id="">Date of Appointment:</span>
                </div>
                <input class="form-control" type="date" name="date">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Time of Appointment:</span>
                </div>
                    <select name="time" class="custom-select form-control">
                        <option value="9:00 AM">9:00 AM</option>
                        <option value="9:30 AM">9:30 AM</option>
                        <option value="10:00 AM">10:00 AM</option>
                        <option value="10:30 AM">10:30 AM</option>
                        <option value="11:00 AM">11:00 AM</option>
                        <option value="11:30 AM">11:30 AM</option>
                        <option value="12:00 PM">12:00 PM</option>
                        <option value="12:30 PM">12:30 PM</option>
                        <option value="1:00 PM">1:00 PM</option>
                        <option value="1:30 PM">1:30 PM</option>
                        <option value="2:00 PM">2:00 PM</option>
                        <option value="2:30 PM">2:30 PM</option>
                        <option value="3:00 PM">3:00 PM</option>
                        <option value="3:30 PM">3:30 PM</option>
                        <option value="4:00 PM">4:00 PM</option>
                        <option value="4:30 PM">4:30 PM</option>
                        <option value="5:00 PM">5:00 PM</option>
                    </select>
            </div>               
            <div class="subbut">
                <input type="submit" name="submit" value="Submit" class="btn btn-secondary" >
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>    
        </form>
    </div>
    </div>
    <?php include('common/footer.php') ?>
</body>
</html>