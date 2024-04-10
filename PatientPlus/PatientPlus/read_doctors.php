<?php
include 'config.php';
include 'layout.php';
// Retrieve doctors from the database
$result = $conn->query("SELECT * FROM doctors");

// Check if the query was successful
if ($result) {
    $doctors = array(); // Initialize an empty array to store doctors

    // Fetch each row as an associative array
    while ($row = $result->fetch_assoc()) {
        $doctors[] = $row; // Append the row to the doctors array
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
    <title>View Doctors</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="mt-4">Doctors</h1>
    <div class="row mt-4">
        <?php foreach($doctors as $doctor): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Name:<?php echo $doctor['FirstName'] . ' ' . $doctor['LastName']; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo $doctor['Specialization']; ?></h6>
                        <p class="card-text">Phone: <?php echo $doctor['Phone']; ?></p>
                        <p class="card-text">Email: <?php echo $doctor['Email']; ?></p>
                        <a href="edit_doctor.php?id=<?php echo $doctor['DoctorID']; ?>" class="btn btn-primary mr-2">Edit</a>
                        <a href="delete_doctor.php?id=<?php echo $doctor['DoctorID']; ?>" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<a href="add_doctor.php" class="btn btn-secondary mt-3">Add Doctor</a><br>

<?php
include_once 'footer.php';
?>

<script>
    function deleteDoctor(doctorID) {
        // Display a confirmation dialog
        if (confirm('Are you sure you want to delete this doctor?')) {
            // If user confirms, redirect to the delete endpoint
            window.location.href = 'delete_doctor.php?id=' + doctorID;
        }
    }

    function editDoctor(doctorID) {
        // Redirect to the edit page with the doctor's ID in the URL parameter
        window.location.href = 'edit_doctor.php?id=' + doctorID;
    }
</script>

</body>
</html>

