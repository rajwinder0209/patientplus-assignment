<?php
include 'config.php';

// Check if patient ID is provided
if (isset($_GET['id'])) {
    $patientID = $_GET['id'];

    // Prepare SQL statement for deleting patient by ID
    $sql = "DELETE FROM patients WHERE PatientID=?";

    // Use prepared statement to execute the SQL query
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $patientID);

    if ($stmt->execute()) {
        // Redirect to view patients page after successful delete
        header("Location: read_patients.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the prepared statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // Redirect to view patients page if patient ID is not provided
    header("Location: read_patients.php");
    exit();
}
?>
