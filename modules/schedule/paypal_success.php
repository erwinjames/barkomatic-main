<?php
require "../../resources/config.php";
require "../library/PHPMailer/src/Exception.php";
require "../library/PHPMailer/src/PHPMailer.php";
require "../library/PHPMailer/src/SMTP.php";
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_GET['token']!=NULL) {
$mail = new PHPMailer();
try {
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    // $mail->SMTPDebug = 4;
    $mail->isSMTP();
    $mail->Mailer = "smtp";
    $mail->SMTPAuth = true;
    $mail->Host = 'smtp.gmail.com';
    $mail->Username = 'manugasewinjames@gmail.com';
    $mail->Password = 'ejmanugas30';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->setFrom('manugasewinjames@gmail.com', 'Reservation');
    $mail->addAddress($_SESSION['email']);
    $mail->isHTML(true);
    $mail->Subject = 'Reservation Confirmation';
    $mail->Body = "
    <!DOCTYPE html>
    <head>
    <style>
        body {
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            }
    </style>
    </head>
    <body>
        <div class='container m-auto'>
            <div class='row'>
                <div class='col-sm-12'>
                  <h1>sample</h1>
                </div>
            </div>
        </div>
    </body>
    </html>";
    $mail->send();
    echo "Emailed Successfully";
}catch(Exception $e){
    echo "Could not sent the reservation confirmation. Mailer Error: {$mail->ErrorInfo}";
    // echo 'Could not sent the reservation confirmation.{$mail->ErrorInfo}';
}
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Barkomatic - Online Ticketing</title>
    <link rel="icon" href="../../img/core-img/favicon.png">
    <link rel="stylesheet" href="../../css/default-assets/main.css?version=barkomatic">
</head>
<body>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <header class="header-area">
        <div class="top-header-area">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <div class="top-header-content">
                            <a href="#"><i class="icon_mail"></i> <span>barkomatic2021@gmail.com</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-header-area">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <nav class="classy-navbar justify-content-between" id="robertoNav">
                        <a class="nav-brand mr-0" href="index.php">
                            <img src="../../img/core-img/logo.png" alt="BarkoMatic">
                        </a>
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </div>
                        <div class="classy-menu">
                            <div class="classycloseIcon">
                                <div class="cross-wrap">
                                    <span class="top"></span>
                                    <span class="bottom"></span>
                                </div>
                            </div>
                            <div class="classynav">
                                <ul id="nav">
                                    <li class="active"><a href="index.html">Home</a></li>
                                    <li class="cn-dropdown-item has-down">
                                        <a href="#">How to Book</a>
                                        <ul class="dropdown" style="background-color: #09527F;">
                                            <li><a href="passenger.html">- Passenger</a></li>
                                            <li><a href="rollings-cargo.html">- Rollings Cargo</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.php">Contact Us</a></li>
                                    <li class="cn-dropdown-item has-down">
                                        <a href="#">About Us</a>
                                        <ul class="dropdown" style="background-color: #09527F;">
                                            <li><a href="faq.html">- FAQ</a></li>
                                            <li><a href="about.html">- About Us</a></li>
                                            <li><a href="ticket-agent.html">- Ticket Agent</a></li>
                                            <li><a href="blog.html">- Blog</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <section class="welcome-section">
        <div class="banner-content">
            <div class="intro text-center container">
                <h1 class="text-white display-3">THANK YOU FOR CHOOSING US!</h1>
                <p class="text-white">PLEASE CHECK YOUR EMAIL TO PRINT YOUR TICKET</p>
            </div>
        </div>
    </section>

    <footer class="footer-area section-padding-80-0">
            <div class="main-footer-area">
                <div class="container">
                    <div class="row align-items-baseline ">
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="single-footer-widget mb-80">
                                <a href="#" class="footer-logo"><img src="img/core-img/logo.png" alt=""></a>
                                <p>Email Us</p>
                                <h4>barkomatic2021@gmail.com<h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copywrite-content">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-8">
                            <div class="copywrite-text">
                                <p>Copyright &copy;
                                    <script>document.write(new Date().getFullYear());</script> 
                                    All rights reserved | Barkomatic</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <script src="../../js/jquery.min.js"></script>
        <script src="../../js/popper.min.js"></script>
        <script src="../../js/jquery.validate.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/roberto.bundle.js"></script>
        <script src="../../js/main/active.js"></script>
        <script src="../../js/main/create-account/login/process.js"></script>
</body>
</html>

