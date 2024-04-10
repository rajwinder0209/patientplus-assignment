
<?php
include 'config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input data
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $specialization = htmlspecialchars($_POST['specialization']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);

    // Prepare SQL statement using a prepared statement to prevent SQL injection
    $sql = "INSERT INTO doctors (FirstName, LastName, Specialization, Phone, Email) VALUES (?, ?, ?, ?, ?)";

    // Use prepared statement to execute the SQL query
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $firstName, $lastName, $specialization, $phone, $email);

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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Doctor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }

        h2 {
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: auto;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="tel"],
        input[type="email"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<a href="read_patients.php">View Data</a>
<center><h2>Add New Doctor</h2></center>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="firstName">First Name:</label><br>
    <input type="text" id="firstName" name="firstName" required><br>

    <label for="lastName">Last Name:</label><br>
    <input type="text" id="lastName" name="lastName" required><br>

    <label for="specialization">Specialization:</label><br>
    <input type="text" id="specialization" name="specialization"><br>

    <label for="phone">Phone:</label><br>
    <input type="tel" id="phone" name="phone"><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br>

    <input type="submit" value="Add Doctor">
</form>
</body>
</html>


