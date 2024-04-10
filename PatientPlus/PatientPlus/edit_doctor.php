<?php
include 'config.php';

// Retrieve doctor details based on doctorID sent via POST or GET request
if (isset($_POST['doctorID'])) {
    $doctorID = $_POST['doctorID'];
} elseif (isset($_GET['id'])) {
    $doctorID = $_GET['id'];
} else {
    // Redirect to error page or handle error appropriately
    exit("Doctor ID not provided.");
}

// Retrieve doctor details from the database
$sql = "SELECT * FROM doctors WHERE DoctorID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $doctorID);
$stmt->execute();
$result = $stmt->get_result();
$doctor = $result->fetch_assoc();

// Close prepared statement
$stmt->close();

// Update doctor details
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $specialization = htmlspecialchars($_POST['specialization']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);

    $sql = "UPDATE doctors SET FirstName=?, LastName=?, Specialization=?, Phone=?, Email=? WHERE DoctorID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $firstName, $lastName, $specialization, $phone, $email, $doctorID);

    if ($stmt->execute()) {
        header("Location: read_doctors.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Doctor</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Doctor Details</h2>
    <form action="edit_doctor.php" method="post">
        <input type="hidden" name="doctorID" value="<?php echo $doctor['DoctorID']; ?>">
        <div class="form-group">
            <label for="firstName">First Name:</label>
            <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $doctor['FirstName']; ?>" required>
        </div>
        <div class="form-group">
            <label for="lastName">Last Name:</label>
            <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $doctor['LastName']; ?>" required>
        </div>
        <div class="form-group">
            <label for="specialization">Specialization:</label>
            <input type="text" class="form-control" id="specialization" name="specialization" value="<?php echo $doctor['Specialization']; ?>" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $doctor['Phone']; ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $doctor['Email']; ?>" required>
        </div>
        <button type="submit" name="update" class="btn btn-primary">Update Doctor</button>
        <a href="delete_doctor.php?id=<?php echo $doctor['DoctorID']; ?>" class="btn btn-danger ml-2" onclick="return confirm('Are you sure you want to delete this doctor?')">Delete Doctor</a>
    </form>
</div>
</body>
</html>
