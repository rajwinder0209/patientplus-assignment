<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" href="images/favicon.png" type="image/gif" />

    <title>PatientPlus</title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet" />

    <!-- lightbox Gallery-->
    <link rel="stylesheet" href="css/ekko-lightbox.css" />

    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/patients.css" rel="stylesheet" />

</head>

<body>

<!-- header section strats -->
<header class="header_section">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
            <a class="navbar-brand" href="index.php">
          <span>
            PatientPlus
          </span>
            </a>
            <div class="" id="">

                <div class="custom_menu-btn">
                    <button onclick="openNav()">
                        <span class="s-1"> </span>
                        <span class="s-2"> </span>
                        <span class="s-3"> </span>
                    </button>
                    <div id="myNav" class="overlay">
                        <div class="overlay-content">
                            <a href="index.php">Home</a>
                            <a href="add_newpatient.php">add patients/records</a>
                            <a href="patientrecords.php">health records</a>
                            <a href="read_patients.php">manage records</a>
                            <a href="contact.php">Contact</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
<!-- end header section -->

<!-- slider section -->
<section class="slider_section position-relative">
    <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="img_container">
                    <div class="img-box">
                        <img src="img/hospital.jpg" class="" alt="...">
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="img_container">
                    <div class="img-box">
                        <img src="img/gray.jpg" class="" alt="...">
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="img_container">
                    <div class="img-box">
                        <img src="img/surgeons-performing-operation-operation-room.jpg" class="" alt="...">
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel_btn_box">
            <a class="carousel-control-prev" href="#customCarousel1" role="button" data-slide="prev">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#customCarousel1" role="button" data-slide="next">
                <i class="fa fa-arrow-right" aria-hidden="true"></i>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="detail-box">
        <div class="col-md-8 col-lg-6 mx-auto">
            <div class="inner_detail-box">
                <h1>
                    PATIENT'S FIRST  <br>
                    Choice
                </h1>
                <p>
                    "A comprehensive patient management website offering appointment scheduling, medical record storage,
                    treatment tracking, and communication tools for healthcare providers and patients."
                </p>
                <div>
                    <a href="" class="slider-link">
                        CONTACT US
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end slider section -->


<script >

    // to get current year
    function getYear() {
        var currentDate = new Date();
        var currentYear = currentDate.getFullYear();
        document.querySelector("#displayYear").innerHTML = currentYear;
    }

    getYear();

    // overlay menu
    function openNav() {
        document.getElementById("myNav").classList.toggle("menu_width");
        document.querySelector(".custom_menu-btn").classList.toggle("menu_btn-style");
    }

</script>
</body>
</html>