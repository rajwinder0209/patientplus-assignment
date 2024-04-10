<?php
include 'config.php';
include 'layout.php';

// Retrieve patients from the database
$result = $conn->query("SELECT * FROM patients");

// Check if the query was successful
if ($result) {
    $patients = array(); // Initialize an empty array to store patients

    // Fetch each row as an associative array
    while ($row = $result->fetch_assoc()) {
        $patients[] = $row; // Append the row to the patients array
    }
} else {
    // Handle the case when the query fails
    echo "Error: " . $conn->error;
    // You may want to handle this error differently based on your requirements
}

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Patients</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="mt-4 mb-3">All patients</h1>
    <div class="row">
        <?php foreach($patients as $patient): ?>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $patient['FirstName'] . ' ' . $patient['LastName']; ?></h5>
                        <p class="card-text"><strong>Patient ID:</strong> <?php echo $patient['PatientID']; ?></p>
                        <p class="card-text"><strong>Date of Birth:</strong> <?php echo $patient['DateOfBirth']; ?></p>
                        <p class="card-text"><strong>Gender:</strong> <?php echo $patient['Gender']; ?></p>
                        <p class="card-text"><strong>Address:</strong> <?php echo $patient['Address']; ?></p>
                        <p class="card-text"><strong>Phone:</strong> <?php echo $patient['Phone']; ?></p>
                        <p class="card-text"><strong>Email:</strong> <?php echo $patient['Email']; ?></p>
                        <a href="edit_patient.php?id=<?php echo $patient['PatientID']; ?>" class="btn btn-primary">Edit</a>
                        <a href="delete_patient.php?id=<?php echo $patient['PatientID']; ?>" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<a href="add_newpatient.php" class="btn btn-secondary mt-3">Add Patient</a>
<a href="read_doctors.php" class="btn btn-secondary mt-3">view Doctors</a>
<?php
include 'footer.php';
?>
</body>
</html>
