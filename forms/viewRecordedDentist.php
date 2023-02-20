<?php
        // Connect to the database
        $conn = mysqli_connect("localhost", "root", "", "DentalClinic");

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Select the database
        mysqli_select_db($conn, "DentalClinic");

        // Write the SQL query
        $sql = "SELECT Dentist_ID FROM DentistInformation";

        // Execute the query
        $result = mysqli_query($conn, $sql);

        // Check if there are any results
        if (mysqli_num_rows($result) > 0) {
            // Start the dropdown
            echo "<select>";
            echo "<option>Choose Dentist ID</option>";
            // Loop through the results
            while ($row = mysqli_fetch_assoc($result)) {
                // Add each value as an option to the dropdown
                
                echo "<option value='" . $row["Dentist_ID"] . "'>" . $row["Dentist_ID"] . "</option>";
            }

            // Close the dropdown
            echo "</select>";
            $dropdown = ob_get_clean();
        } else {
            // If there are no results, show an error message
            echo "No results found";
        }

        // Close the database connection
        mysqli_close($conn);
?>