<?php
include 'config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input data
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $address = htmlspecialchars($_POST['address']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $patientID = $_POST['patientID'];

    // Prepare SQL statement using a prepared statement to prevent SQL injection
    $sql = "UPDATE patients SET FirstName=?, LastName=?, DateOfBirth=?, Gender=?, Address=?, Phone=?, Email=? WHERE PatientID=?";

    // Use prepared statement to execute the SQL query
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssi", $firstName, $lastName, $dob, $gender, $address, $phone, $email, $patientID);

    if ($stmt->execute()) {
        // Redirect to view patients page after successful update
        header("Location: read_patients.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the prepared statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // If form is not submitted, fetch patient details by ID from database
    if (isset($_GET['id'])) {
        $patientID = $_GET['id'];
        // Query to fetch patient details by ID
        $sql = "SELECT * FROM patients WHERE PatientID=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $patientID);
        $stmt->execute();
        $result = $stmt->get_result();
        // Fetch patient details
        $patient = $result->fetch_assoc();
    } else {
        // Redirect to view patients page if ID is not provided
        header("Location: read_patients.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Patient</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2 class="mt-4">Edit Patient</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="mt-4">
        <input type="hidden" name="patientID" value="<?php echo $patient['PatientID']; ?>">
        <div class="form-group">
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" value="<?php echo $patient['FirstName']; ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" value="<?php echo $patient['LastName']; ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" value="<?php echo $patient['DateOfBirth']; ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" class="form-control" required>
                <option value="M" <?php if ($patient['Gender'] == 'M') echo 'selected'; ?>>Male</option>
                <option value="F" <?php if ($patient['Gender'] == 'F') echo 'selected'; ?>>Female</option>
                <!-- Add other gender options as needed -->
            </select>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="<?php echo $patient['Address']; ?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" value="<?php echo $patient['Phone']; ?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $patient['Email']; ?>" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Patient</button>
    </form>
</div>
</body>
</html>
