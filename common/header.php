<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- CSS only -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
  <!-- navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top" style="padding-left: 10px; padding-right: 10px;">
    <a class="navbar-brand" href="#">
      <img src="css/logo.svg" alt="Logo" style="width: 40px; height: 40px;">
      Dental Clinic
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto" style="font-size: 20px;">
    <li class="nav-item">
      <a class="nav-link" href="index.php">Dashboard<span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="TreatmentRecords.php">Patient Records</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Forms
      </a>
      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        <li><a class="dropdown-item fs-5" href="AddAppointment.php">Add Appointment</a></li>
        <li><a class="dropdown-item fs-5" href="AddPatientInfo.php">Add Patient Information</a></li>
        <li><a class="dropdown-item fs-5" href="AddPatientTreatment.php">Add Treatment Record</a></li>
        <li><a class="dropdown-item fs-5" href="AddDentistInformation.php">Add Dentist Information</a></li>
        <li><a class="dropdown-item fs-5" href="AddBalancePayment.php">Pay Balance</a></li>
      </ul>
    </li>
    
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Tables
      </a>
      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        <li><a class="dropdown-item fs-5" href="Appointments.php">Appointment Records</a></li>
        <li><a class="dropdown-item fs-5" href="PatientsRecords.php">Patients Records</a></li>
        <li><a class="dropdown-item fs-5" href="AllTreatmentRecords.php">Treatment Records</a></li>
        <li><a class="dropdown-item fs-5" href="BillingRecords.php">Billing Records</a></li>
        <li><a class="dropdown-item fs-5" href="PatientsDentist.php">Patient's Dentist</a></li>
        <li><a class="dropdown-item fs-5" href="DentistsRecords.php">Dentist Records</a></li>
      </ul>
    </li>
  </ul>
</div>
</nav>

<!-- modals -->

<?php include('..forms/AddPatientInfo.php') ?>

<?php include('..forms/AddPatientTreatment.php') ?>
<?php include('..forms/AddDentistInformation.php') ?>





















    <!-- JS, Popper.js, and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>


