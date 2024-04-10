
<?php
include_once "layout.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Medical Record</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {

        }
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }
        form {
            width: 80%;
            max-width: 500px; /* Adjust the maximum width as needed */
        }
    </style>
</head>
<body>
<div class="container">
    <div>
        <h2 class="text-center">Create New Medical Record</h2>
        <form id="medicalRecordForm" method="post" action="create_record.php">
            <div class="form-group">
                <label for="patient">Select Patient:</label>
                <select name="patient" id="patient" class="form-control">
                    <!-- Options will be dynamically populated from the database -->
                    <?php
                    // Include database connection file
                    include_once 'config.php';

                    // Retrieve patient data
                    $sql = "SELECT * FROM patients";
                    $result = $conn->query($sql);

                    // Check if patients data exists
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["PatientID"] . "'>" . $row["FirstName"] . " " . $row["LastName"] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No patients found</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="doctor">Select Doctor:</label>
                <select name="doctor" id="doctor" class="form-control">
                    <!-- Options will be dynamically populated from the database -->
                    <?php
                    // Retrieve doctor data
                    $sql = "SELECT * FROM doctors";
                    $result = $conn->query($sql);

                    // Check if doctors data exists
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["DoctorID"] . "'>" . $row["FirstName"] . " " . $row["LastName"] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No doctors found</option>";
                    }
                    $conn->close();
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" name="date" class="form-control">
            </div>
            <div class="form-group">
                <label for="diagnosis">Diagnosis:</label>
                <textarea name="diagnosis" rows="4" cols="50" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="treatment">Treatment:</label>
                <textarea name="treatment" rows="4" cols="50" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="notes">Notes:</label>
                <textarea name="notes" rows="4" cols="50" class="form-control"></textarea>
            </div>
            <input type="submit" value="Create" class="btn btn-primary">
        </form>
    </div>
</div>

<?php
include_once "footer.php";
?>
</body>
</html>
