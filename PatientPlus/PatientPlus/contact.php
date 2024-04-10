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
    <link rel="shortcut icon" href="images/fevicon.png" type="">

    <title>Contact us</title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

    <!-- Custom styles for this template -->
    <style>
        .contact_section {
            position: relative;
            background-color: cornflowerblue;
            font-family: "Poppins", sans-serif;
            padding-bottom: 50px;
        }

        .contact_section h2 {
            text-align: center;
            color: #fefdfc;
            margin-bottom: 50px;
        }

        .contact_section h2 span {
            color: #fefdfc;
        }

        .contact_section form {
            padding-right: 35px;
        }

        .contact_section input {
            width: 100%;
            border: 0;
            height: 50px;
            border-radius: 25px;
            margin-bottom: 25px;
            padding-left: 25px;
            background-color: #fefdfc;
            outline: none;
            color: #101010;
        }

        .contact_section input::-webkit-input-placeholder {
            color: #131313;
        }

        .contact_section input:-ms-input-placeholder {
            color: #131313;
        }

        .contact_section input::-ms-input-placeholder {
            color: #131313;
        }

        .contact_section input::placeholder {
            color: #131313;
        }

        .contact_section input.message-box {
            height: 120px;
        }

        .contact_section button {
            padding: 15px 55px;
            outline: none;
            border: none;
            border-radius: 30px;
            border: 1px solid #fa0909;
            color: #fff;
            font-weight: bold;
            background-color: #fa0909;
            cursor: pointer;
        }

        .map_section {
            width: 100%;
            height: 450px;
            overflow: hidden;
            border-radius: 15px;
        }

        .map_section iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }

        @media (min-width: 768px) {
            .contact_section .row {
                display: flex;
                flex-wrap: wrap-reverse;
            }

            .contact_section .col-md-6 {
                flex: 0 0 50%;
                max-width: 50%;
            }
        }
    </style>
</head>
<body>

<?php
include "layout.php";
?>
<!-- contact section -->
<section class="contact_section layout_padding">
    <div class="container ">
        <div class="heading_container ">
            <h2 class="">
                Book
                <span>An Appointment</span>
            </h2>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="#">
                    <div>
                        <input type="text" placeholder="Name" />
                    </div>
                    <div>
                        <input type="email" placeholder="Email" />
                    </div>
                    <div>
                        <input type="text" placeholder="Pone Number" />
                    </div>
                    <div>
                        <input type="text" class="message-box" placeholder="Message" />
                    </div>
                    <div class="d-flex mt-4">
                        <button>SEND</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <!-- map section -->
                <div class="map_section">
                    <iframe
                        width="600"
                        height="450"
                        frameborder="0" style="border:0"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387269.68686309336!2d-74.25987369999999!3d40.6976637!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2suk!4v1624391952106!5m2!1sen!2suk"
                        allowfullscreen>
                    </iframe>
                </div>
                <!-- end map section -->
            </div>
        </div>
    </div>
</section>
<!-- end contact section -->

<?php
include_once "footer.php";
?>
</body>
</html>
