<?php
if (isset($_POST['submit'])) {
  // form data
  $Patient_id = $_POST['Patient_ID'];
  $Given_name = $_POST['Given_name'];
  $Last_name = $_POST['Last_name'];
  $Birthdate = $_POST['Birthdate'];
  $Age = $_POST['Age'];
  $Sex = $_POST['Sex'];
  $Address = $_POST['Address'];
  $City = $_POST['City'];
  $Phone_Number = $_POST['Phone_Number'];
  $email = $_POST['email'];

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
  $sql = "INSERT INTO PatientInformation (Patient_ID, Given_name, Last_name, Birthdate, Age, Sex, Address, City, Phone_Number, email)
  VALUES ('$Patient_id', '$Given_name', '$Last_name', '$Birthdate', '$Age', '$Sex', '$Address', '$City', '$Phone_Number', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "Form data saved successfully";
    echo "<script>alert('Patient\'s Information Added');</script>";
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
<h1 class="modal-title fs-8 text-center" id="exampleModalLabel" style="width: -webkit-fill-available;">Add Patient's Personal Information</h1>
    <div class="modal-body" id='forms'>
    <div class="forma" style="">
        <div class="header">
        </div>
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="myform">
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                      <span class="input-group-text" id="">Patient ID:</span>
                  </div>
                  <select name="Patient_ID" class="form-select" aria-label="Default select example" id="PatientIDB">
                      
                  </select>
                  <script>
                      document.getElementById("PatientIDB").innerHTML = "<?php include('forms/viewRecorded.php') ?> <?php echo $dropdown; ?>";
                  </script>
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
              <div class="subbut">
                  <input type="submit" name="submit" value="Submit" class="btn btn-secondary">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              </div>
          </form>
          </div>
    </div>
    <?php include('common/footer.php') ?>

</body>
</html>


