<form method="post" action="">
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
        <select name="Treatment_ID" class="form-select" aria-label="Default select example" id="bal">
            
        </select>
        <script>
            document.getElementById("bal").innerHTML = "<?php include('viewTreatmentBalance.php') ?> <?php echo $dropdown; ?>";
        </script>
    </div>
  <label for="payment_amount">Payment Amount:</label>
  <input type="number" name="payment_amount" id="payment_amount" required>
  <br><br>
  <label for="payment_date">Payment Date:</label>
  <input type="date" name="payment_date" id="payment_date" required>
  <br><br>
  <input type="submit" name="submit" value="Submit">
</form>

<?php
    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "", "DentalClinic");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Select the database
    mysqli_select_db($conn, "DentalClinic");

    // Get the selected patient ID from the form
    $patient_id = $_POST["Patient_ID"];

    // Write the SQL query to select treatment IDs with balance for the selected patient
    $sql = "SELECT Treatment_ID FROM Treatment WHERE Patient_ID = '$patient_id' AND Balance > 0";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if there are any results
    if (mysqli_num_rows($result) > 0) {
        // Start the dropdown
        echo "<div class='input-group mb-3'>";
        echo "<div class='input-group-prepend'>";
        echo "<span class='input-group-text' id=''>Treatment ID:</span>";
        echo "</div>";
        echo "<select name='Treatment_ID' class='form-select' aria-label='Default select example' id='treatment-select'>";

        // Loop through the results
        while ($row = mysqli_fetch_assoc($result)) {
            // Add each value as an option to the dropdown
            echo "<option value='" . $row["Treatment_ID"] . "'>" . $row["Treatment_ID"] . "</option>";
        }

        // Close the dropdown
        echo "</select>";
        echo "</div>";
    } else {
        // If there are no results, show an error message
        echo "No results found";
    }

    // Close the database connection
    mysqli_close($conn);
?>
