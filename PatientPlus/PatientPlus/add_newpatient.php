<?php
include 'config.php';
include_once "layout.php";
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

    // Prepare SQL statement using a prepared statement to prevent SQL injection
    $sql = "INSERT INTO patients (FirstName, LastName, DateOfBirth, Gender, Address, Phone, Email) VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Use prepared statement to execute the SQL query
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $firstName, $lastName, $dob, $gender, $address, $phone, $email);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the prepared statement and database connection
    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Add New Patient</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        /*body {*/
        /*    font-family: Arial, sans-serif;*/
        /*    background-color: #f8f9fa;*/
        /*    padding: 20px;*/
        /*}*/

        h2 {
            margin-bottom: 20px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
        }

        input,
        select {
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        a {
            margin-top: 10px;
            display: block;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Add New Patient</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <label for="firstName">First Name:</label>
            <input type="text" class="form-control" id="firstName" name="firstName" required>
        </div>
        <div class="form-group">
            <label for="lastName">Last Name:</label>
            <input type="text" class="form-control" id="lastName" name="lastName" required>
        </div>
        <div class="form-group">
            <label for="dob">Date of Birth:</label>
            <input type="date" class="form-control" id="dob" name="dob" required>
        </div>
        <div class="form-group">
            <label for="gender">Gender:</label>
            <select class="form-control" id="gender" name="gender" required>
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" id="address" name="address">
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="tel" class="form-control" id="phone" name="phone">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Patient</button>
    </form>

    <a href="add_doctor.php" class="btn btn-secondary mt-3">Add Doctor</a>
    <a href="read_doctors.php" class="btn btn-secondary mt-2">View Doctors</a>
    <a href="read_patients.php" class="btn btn-secondary mt-2">View Patients</a>
    <a href="add_patientrecord.php" class="btn btn-secondary mt-2">Add Patient Record</a>
    <a href="patientrecords.php" class="btn btn-secondary mt-2">View All Records</a>
</div>

<?php
include_once "footer.php";
?>
</body>
</html>>
