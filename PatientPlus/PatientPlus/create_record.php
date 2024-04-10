<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection file
    include_once 'config.php';

    // Escape user inputs to prevent SQL injection
    $patientID = mysqli_real_escape_string($conn, $_POST['patient']);
    $doctorID = mysqli_real_escape_string($conn, $_POST['doctor']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $diagnosis = mysqli_real_escape_string($conn, $_POST['diagnosis']);
    $treatment = mysqli_real_escape_string($conn, $_POST['treatment']);
    $notes = mysqli_real_escape_string($conn, $_POST['notes']);

    // Attempt to insert record
    $sql = "INSERT INTO MedicalRecords (PatientID, DoctorID, Date, Diagnosis, Treatment, Notes)
            VALUES ('$patientID', '$doctorID', '$date', '$diagnosis', '$treatment', '$notes')";

    if (mysqli_query($conn, $sql)) {
        // Redirect to another page after successful record creation
        header("Location: add_patientrecord.php");
        exit(); // Ensure that no more output is sent
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close database connection
    mysqli_close($conn);
}
?>
