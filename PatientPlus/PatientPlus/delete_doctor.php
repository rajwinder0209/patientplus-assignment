<?php
include 'config.php';

// Check if doctor ID is provided
if (isset($_GET['id'])) {
    $doctorID = $_GET['id'];

    // Prepare SQL statement for deleting associated medical records
    $sqlDeleteMedicalRecords = "DELETE FROM medicalrecords WHERE DoctorID=?";

    // Use prepared statement to execute the SQL query
    $stmtDeleteMedicalRecords = $conn->prepare($sqlDeleteMedicalRecords);
    $stmtDeleteMedicalRecords->bind_param("i", $doctorID);

    // Execute the deletion of medical records
    $stmtDeleteMedicalRecords->execute();

    // Prepare SQL statement for deleting doctor by ID
    $sqlDeleteDoctor = "DELETE FROM doctors WHERE DoctorID=?";

    // Use prepared statement to execute the SQL query
    $stmtDeleteDoctor = $conn->prepare($sqlDeleteDoctor);
    $stmtDeleteDoctor->bind_param("i", $doctorID);

    // Execute the deletion of the doctor
    if ($stmtDeleteDoctor->execute()) {
        // Redirect to view doctors page after successful delete
        header("Location: read_doctors.php");
        exit();
    } else {
        echo "Error: " . $sqlDeleteDoctor . "<br>" . $conn->error;
    }

    // Close the prepared statements and database connection
    $stmtDeleteMedicalRecords->close();
    $stmtDeleteDoctor->close();
    $conn->close();
} else {
    // Redirect to view doctors page if doctor ID is not provided
    header("Location: read_doctors.php");
    exit();
}
?>
