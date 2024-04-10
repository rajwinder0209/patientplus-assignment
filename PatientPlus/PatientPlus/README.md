# PatientPlus

PatientPlus is a web application for managing patient records and medical information. It allows healthcare professionals to create, view, and manage medical records for patients, including details such as diagnosis, treatment, and notes.

## Technologies Used

- HTML
- CSS (Bootstrap)
- PHP
- MySQL

## Installation

### Prerequisites

- Web server environment (e.g., Apache, Nginx)
- PHP (version 7 or higher)
- MySQL or MariaDB
- code editor(pycharm)

### 1. Database Setup

1. Download and install MySQL or MariaDB if you haven't already.
2. Import the provided SQL file (`database.sql`) into your MySQL/MariaDB database management tool (e.g., phpMyAdmin) to create the required tables and relationships.

### 2. Configuration

1. Clone or download this repository to your local machine.
2. Navigate to the project directory.
3. Open the `config.php` file located in the project directory.
4. Update the database connection details (hostname, username, password, database name) to match your MySQL/MariaDB configuration.
```php
<?php

// Database configuration
$servername = "localhost"; // Change this if your database is hosted elsewhere
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$database = "patientPlus"; // Your MySQL database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
```   


5. Open the `PatientPlus.sql` file located in the project directory.
- run the sql script in the phpmyadmin xampp to create the database(Tables) with available records.

### 3. Running the Application

1. Place the project files in the xampp folder`(xammp/htdocs)` on your local machine.
2. Start your web server.
3. Open a web browser and navigate to the URL where you placed the project files.`localhost/PatientPlus/index.php`

## Usage

- Navigate to the application URL in your web browser.
- Use the provided features to manage patient records and medical information.
- Create, view, edit, and delete patient records and doctor information as needed.


## License

This project is licensed under the [MIT License](LICENSE).
