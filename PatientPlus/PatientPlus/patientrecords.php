<?php
include_once 'layout.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Patient Records</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        h2 {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 30px;
        }

        .table-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .table-responsive {
            overflow-x: auto;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>View Patient Records</h2>
    <div class="table-container">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-light">
                <tr>
                    <th>Patient Name</th>
                    <th>Doctor Name</th>
                    <th>Date</th>
                    <th>Diagnosis</th>
                    <th>Treatment</th>
                    <th>Notes</th>
                </tr>
                </thead>
                <tbody>
                <?php
                // Include database connection file
                include_once 'config.php';

                // Retrieve patient records with names of patients and doctors
                $sql = "SELECT MR.Date, MR.Diagnosis, MR.Treatment, MR.Notes, 
                                   CONCAT(P.FirstName, ' ', P.LastName) AS PatientName,
                                   CONCAT(D.FirstName, ' ', D.LastName) AS DoctorName
                            FROM MedicalRecords MR
                            JOIN Patients P ON MR.PatientID = P.PatientID
                            JOIN Doctors D ON MR.DoctorID = D.DoctorID";
                $result = $conn->query($sql);

                // Check if patient records exist
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["PatientName"] . "</td>";
                        echo "<td>" . $row["DoctorName"] . "</td>";
                        echo "<td>" . $row["Date"] . "</td>";
                        echo "<td>" . $row["Diagnosis"] . "</td>";
                        echo "<td>" . $row["Treatment"] . "</td>";
                        echo "<td>" . $row["Notes"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No patient records found</td></tr>";
                }
                $conn->close();
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<br>

<a href="add_patientrecord.php" class="btn btn-secondary mt-3">Add health record</a><br>
<br>
<?php
include 'footer.php';
?>
</body>
</html>
