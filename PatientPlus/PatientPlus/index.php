<?php
// Include the config.php file to establish database connection
include_once "config.php";
include 'layout.php';
?>

<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="Site keywords here">
    <meta name="description" content="">
    <meta name='copyright' content=''>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Mediplus - Free Medical and Doctor Directory HTML Template.</title>

    <!-- Favicon -->
    <link rel="icon" href="img/favicon.png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- custom css   -->
    <link rel="stylesheet" href="css/about.css">

    <style>
        /* Style for the video section */
        .video-section {
            padding: 50px 0;
        }
        .video-title {
            margin-bottom: 20px; /* Add space between title and video */
            font-weight: 20px;
        }
        .video-container {
            width: 100%;
            position: relative;
            padding-bottom: 56.25%; /* Aspect ratio 16:9 for video */
            overflow: hidden;
        }
        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }

        .description {
            padding: 20px;
        }

        /* Media queries for responsiveness */
        @media (max-width: 768px) {
            .video-section {
                padding: 30px 0;
            }
            .description {
                padding: 20px 10px;
            }
        }
    </style>

</head>
<body>
<section class="video-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Title placed at the center -->
                <h2 class="video-title">Who we are:</h2>
            </div>
        </div>
        <div class="row">
            <!-- Video on the left -->
            <div class="col-md-6">
                <div class="video-container">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/YOUR_VIDEO_ID" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
            <!-- Description on the right -->
            <div class="col-md-6">
                <div class="description">
                    <h3>Our services</h3>

                    <p>
                        PatientPlus Management is an integrated patient management system, revolutionizing healthcare processes. It facilitates seamless appointment scheduling, secure storage of medical records, meticulous tracking of treatments, and efficient communication between healthcare providers and patients. With user-friendly interfaces for both providers and patients, it fosters enhanced care coordination, empowers patients to take control of their health, and ultimately improves overall healthcare outcomes. PatientPlus Management represents a transformative approach to healthcare delivery, ensuring better patient care experiences and optimizing operational efficiencies for healthcare organizations.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!--About section starts-->

<section class="image-section">
    <div class="container">
       <h2 style="color: #2C2D3F"><center><b>About US</b></center></h2>
        <div class="row">

            <!-- Image on the left, description on the right -->
            <div class="col-md-6">
                <div class="image-container">
                    <img src="img/surgery.jpg" alt="Image 1">
                </div>
            </div>
            <div class="col-md-6">
                <div class="image-description">
                    <h3>Sugery</h3>
                    <p>Experience precision and expertise with our comprehensive surgery services. Our skilled surgeons utilize advanced techniques and
                        state-of-the-art technology to provide safe and effective surgical interventions, ensuring optimal outcomes for every patient.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Image on the right, description on the left -->
            <div class="col-md-6 order-md-2">
                <div class="image-container">
                    <img src="img/dentist.jpg" alt="Image 2">
                </div>
            </div>
            <div class="col-md-6 order-md-1">
                <div class="image-description">
                    <h3>Dentist</h3>
                    <p>Transform your smile and maintain optimal oral health with our exceptional dentist services. From routine cleanings and check-ups to advanced procedures like dental implants and cosmetic dentistry,
                        our experienced dentists deliver personalized care to meet your unique needs, leaving you with a confident and healthy smile.</p>
                </div>
            </div>
        </div>
    </div>
</section>




<?php
include_once 'footer.php';
?>



<!-- Bootstrap JS (optional) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>