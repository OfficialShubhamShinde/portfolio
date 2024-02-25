<?php
// connection 
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'portfolio';

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    echo "Connection Unsucessful can not connect beacuse ---> " . mysqli_connect_error();
}
use PHPMailer\PHPMailer\PHPMailer;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $subject = $_POST["subject"];
    $msg = $_POST["msg"];

    $insertContactdata = "INSERT INTO `contacts` (`name`, `contactno`, `email`, `subject`, `msg`) VALUES ('$name', '$email', '$phone', '$subject', '$msg')";
    $quesyInsertContactData = mysqli_query($conn, $insertContactdata);

    if ($quesyInsertContactData) {
        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer();

        //SMTP Settings
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "shubhamshinde9530@gmail.com";
        $mail->Password = "njev dftd fdpb gfyo";
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";

        $mail->isHTML(true);
        $mail->setFrom($email);
        $mail->addAddress($email);
        $mail->Subject = ("Thanks for Connecting with Me");
        $mail->Body = "Dear $name, " . "<br>" . "<br>" . "

        I wanted to extend my heartfelt appreciation for taking the time to connect with me through my portfolio website." . "<br>" . "<br>" . "
    
        Your interest and engagement mean a lot to me, and I am genuinely grateful for the opportunity to connect. I acknowledge the information you've provided, and I'll make sure to review it thoroughly. Please be assured that I will get back to you as promptly as possible." . "<br>" . "<br>" . "
        
        In the meantime, if you have any urgent queries or require immediate assistance, please don't hesitate to reach out to me directly at +91 7774882080" . "<br>" . "<br>" . "
        
        Once again, thank you for reaching out. I look forward to the possibility of working together or discussing how we can collaborate in the future." . "<br>" . "<br>" . "
        
        Best regards, " . "<br>" . "
        
        Shubham Shinde" . "<br>" . "
        Junior Software Developer";

        $mail->send();


        // Second email
        $mail->ClearAddresses(); // Clear the previous recipient
        $mail->addAddress("shubhamshinde9530@gmail.com");
        $mail->Subject = "New Connection Request from Portfolio";
        $mail->Body = "Dear Sir, " . "<br>" . "<br>" . "
        I wish to inform you about a recent connection request that has been submitted through your portfolio. The request pertains to the following details: " . "<br>" . "
        Name: $name " . "<br>" ."
        Email: $email " . "<br>" ."
        Contact Number: $phone " . "<br>" ."
        Subject: $subject " . "<br>" ."
        Message: $msg " . "<br>" . "<br>" ."
        
        I wanted to bring this to your attention as it appears that someone is interested in connecting with you directly. This could potentially lead to beneficial opportunities or collaborations that align with your objectives. I encourage you to consider reaching out to this individual using the provided contact information. " . "<br>" . "<br>" ."
        
        Thank You
        ";

        try {
            if ($mail->send()) {
                echo '<script>
                        alert("Thanks for connecting with Me.");
                        window.location.href = "index";
                    </script>';
            }
        } catch (Exception $e) {
            echo '<script>
                        alert("Something went wrong while connecting with me.");
                        window.location.href = "index";
                    </script>';
        }
        mysqli_close($conn);

        exit();
    }


}
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Portfolio | Shubham Shinde </title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSS 
    ============================================ -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/vendor/slick.css">
    <link rel="stylesheet" href="assets/css/vendor/slick-theme.css">
    <link rel="stylesheet" href="assets/css/vendor/aos.css">
    <link rel="stylesheet" href="assets/css/plugins/feature.css">
    <!-- Style css -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="template-color-1 spybody" data-spy="scroll" data-target=".navbar-example2" data-offset="70">
    <!-- Start Header -->
    <header class="rn-header haeder-default black-logo-version header--fixed header--sticky">
        <div class="header-wrapper rn-popup-mobile-menu m--0 row align-items-center">
            <!-- Start Header Left -->
            <div class="col-lg-2 col-6">
                <div class="header-left">
                    <div class="logo">
                        <a href="index.html">
                            <!-- <img src="assets/images/AC.png" alt="logo"> -->
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Header Left -->
            <!-- Start Header Center -->
            <div class="col-lg-10 col-6">
                <div class="header-center">
                    <nav id="sideNav" class="mainmenu-nav navbar-example2 d-none d-xl-block">
                        <!-- Start Mainmanu Nav -->
                        <ul class="primary-menu nav nav-pills">
                            <li class="nav-item"><a class="nav-link smoth-animation active" href="#home">Home</a></li>
                            <li class="nav-item"><a class="nav-link smoth-animation" href="#features">Work</a></li>
                            </li>
                            <li class="nav-item"><a class="nav-link smoth-animation" href="#resume">Resume</a></li>
                            <li class="nav-item"><a class="nav-link smoth-animation" href="#testimonial">Certification</a>
                            </li>
                            <li class="nav-item"><a class="nav-link smoth-animation" href="#clients">Projects</a></li>
                            <li class="nav-item"><a class="nav-link smoth-animation" href="#contacts">Contact</a></li>
                        </ul>
                        <!-- End Mainmanu Nav -->
                    </nav>
                    <!-- Start Header Right  -->
                    <div class="header-right">
                        <a class="rn-btn" target="_blank" href="assets/Resume_Shubham Shinde.pdf"><span>Download
                                CV</span></a>
                        <div class="hamberger-menu d-block d-xl-none">
                            <i id="menuBtn" class="feather-menu humberger-menu"></i>
                        </div>
                        <div class="close-menu d-block">
                            <span class="closeTrigger">
                                <i data-feather="x"></i>
                            </span>
                        </div>
                    </div>
                    <!-- End Header Right  -->

                </div>
            </div>
            <!-- End Header Center -->
        </div>
    </header>
    <!-- End Header Area -->
    <!-- Start Popup Mobile Menu  -->
    <div class="popup-mobile-menu">
        <div class="inner">
            <div class="menu-top">
                <div class="menu-header">
                    <a class="logo" href="index.html">
                        <p>Personal Portfolio</p>
                    </a>
                    <div class="close-button">
                        <button class="close-menu-activation close"><i data-feather="x"></i></button>
                    </div>
                </div>
            </div>
            <div class="content">
                <ul class="primary-menu nav nav-pills">
                    <li class="nav-item"><a class="nav-link smoth-animation active" href="#home">HOME</a></li>
                    <li class="nav-item"><a class="nav-link smoth-animation" href="#features">Work</a></li>
                    <li class="nav-item"><a class="nav-link smoth-animation" href="#resume">RESUME</a></li>
                    <li class="nav-item"><a class="nav-link smoth-animation" href="#testimonial">Certification</a></li>
                    <li class="nav-item"><a class="nav-link smoth-animation" href="#clients">PROJECTS</a></li>
                    <li class="nav-item"><a class="nav-link smoth-animation" href="#contacts">Contact</a></li>
                </ul>
                <!-- social sharea area -->
                <div class="social-share-style-1 mt--40">
                    <span class="title">find with me</span>
                    <ul class="social-share d-flex liststyle">
                        <li class="facebook"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook">
                                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                </svg></a>
                        </li>
                        <li class="instagram"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram">
                                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                </svg></a>
                        </li>
                        <li class="linkedin"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin">
                                    <path
                                        d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z">
                                    </path>
                                    <rect x="2" y="9" width="4" height="12"></rect>
                                    <circle cx="4" cy="4" r="2"></circle>
                                </svg></a>
                        </li>
                    </ul>
                </div>
                <!-- end -->
            </div>
        </div>
    </div>
    <!-- End Popup Mobile Menu  -->




    <main class="main-page-wrapper">

        <!-- Start Slider Area -->
        <div id="home" class="rn-slider-area">
            <div class="slide slider-style-1">
                <div class="container">
                    <div class="row row--30 align-items-center">
                        <div class="order-2 order-lg-1 col-lg-7 mt_md--50 mt_sm--50 mt_lg--30">
                            <div class="content">
                                <div class="inner">
                                    <span class="subtitle">Welcome to my world</span>
                                    <h1 class="title">Hello, <br> I’m <span>Shubham Shinde</span><br>
                                        <span class="header-caption" id="page-top">
                                            <!-- type headline start-->
                                            <span class="cd-headline clip is-full-width">
                                                <span>a </span>
                                                <!-- ROTATING TEXT -->
                                                <span class="cd-words-wrapper">
                                                    <b class="is-visible">Programmer.</b>
                                                    <b class="is-hidden">Coder.</b>
                                                    <b class="is-hidden">Developer.</b>
                                                </span>
                                            </span>
                                            <!-- type headline end -->
                                        </span>
                                    </h1>

                                    <div>
                                        <!-- <p class="description">I use animation as a third dimension by which to simplify
                                            experiences and kuiding thro each and every interaction. I’m not adding
                                            motion
                                            just to spruce things up, but doing it in ways that.</p> -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-xl-6 col-md-6 col-sm-6 col-12">
                                        <div class="social-share-inner-left">
                                            <span class="title">find with me</span>
                                            <ul class="social-share d-flex liststyle">
                                                <li class="facebook"><a
                                                        href="https://www.facebook.com/profile.php?id=100009714557541"
                                                        target="_blank"><i data-feather="facebook"></i></a>
                                                </li>
                                                <li class="instagram"><a
                                                        href="https://www.instagram.com/_shubham__shinde_"
                                                        target="_blank"><i data-feather="instagram"></i></a>
                                                </li>
                                                <li class="linkedin"><a
                                                        href="http://linkedin.com/in/shubham-shinde-588005223"
                                                        target="_blank"><i data-feather="linkedin"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-6 col-md-6 col-sm-6 col-12 mt_mobile--30">
                                        <div class="skill-share-inner">
                                            <!-- <span class="title">best skill on</span>
                                            <ul class="skill-share d-flex liststyle">
                                                <li><img src="assets/images/icons/icons-01.png" alt="Icons Images"></li>
                                                <li><img src="assets/images/icons/icons-02.png" alt="Icons Images"></li>
                                                <li><img src="assets/images/icons/icons-03.png" alt="Icons Images"></li>
                                            </ul> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="order-1 order-lg-2 col-lg-5">
                            <div class="thumbnail">
                                <div class="inner">
                                    <img src="assets/images/MyPic3.JPG" alt="Personal Portfolio Images">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Slider Area -->

        <!-- Start Service Area -->
        <div class="rn-service-area rn-section-gap section-separator" id="features">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-left" data-aos="fade-up" data-aos-duration="500"
                            data-aos-delay="100" data-aos-once="true">
                            <span class="subtitle">Work</span>
                            <h2 class="title">What have I done?</h2>
                        </div>
                    </div>
                </div>
                <div class="row row--25 mt_md--10 mt_sm--10">

                    <!-- Start Single Service -->
                    <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="100" data-aos-once="true"
                        class="col-lg-6 col-xl-4 col-md-6 col-sm-12 col-12 mt--50 mt_md--30 mt_sm--30">
                        <div class="rn-service">
                            <div class="inner">
                                <div class="icon">
                                    <i data-feather="code"></i>
                                </div>
                                <div class="content">
                                    <h4 class="title"><a href="#">Software Development</a></h4>
                                    <p class="description">Crafting functional applications for diverse needs and platforms.</p>
                                    <a class="read-more-button" href="#"><i class="feather-arrow-right"></i></a>
                                </div>
                            </div>
                            <a class="over-link" href="https://github.com/OfficialShubhamShinde"></a>
                        </div>
                    </div>
                    <!-- End SIngle Service -->
                    <!-- Start Single Service -->
                    <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="300" data-aos-once="true"
                        class="col-lg-6 col-xl-4 col-md-6 col-sm-12 col-12 mt--50 mt_md--30 mt_sm--30">
                        <div class="rn-service">
                            <div class="inner">
                                <div class="icon">
                                    <i data-feather="globe"></i>
                                </div>
                                <div class="content">
                                    <h4 class="title"><a href="#">Web Development</a></h4>
                                    <p class="description">Designing and building interactive websites and online experiences.</p>
                                    <a class="read-more-button" href="#"><i class="feather-arrow-right"></i></a>
                                </div>
                            </div>
                            <a class="over-link" href="https://github.com/OfficialShubhamShinde"></a>
                        </div>
                    </div>
                    <!-- End SIngle Service -->
                    <!-- Start Single Service -->
                    <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="500" data-aos-once="true"
                        class="col-lg-6 col-xl-4 col-md-6 col-sm-12 col-12 mt--50 mt_md--30 mt_sm--30">
                        <div class="rn-service">
                            <div class="inner">
                                <div class="icon">
                                    <i data-feather="smartphone"></i>
                                </div>
                                <div class="content">
                                    <h4 class="title"><a href="#">Andriod  Development</a></h4>
                                    <p class="description">Developing applications for Android mobile devices and platforms.</p>
                                    <a class="read-more-button" href="#"><i class="feather-arrow-right"></i></a>
                                </div>
                            </div>
                            <a class="over-link" href="https://github.com/OfficialShubhamShinde"></a>
                        </div>
                    </div>
                    <!-- End SIngle Service -->
                    <!-- Start Single Service -->
                    <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="100" data-aos-once="true"
                        class="col-lg-6 col-xl-4 col-md-6 col-sm-12 col-12 mt--50 mt_md--30 mt_sm--30">
                        <div class="rn-service">
                            <div class="inner">
                                <div class="icon">
                                    <i data-feather="image"></i>
                                </div>
                                <div class="content">
                                    <h4 class="title"><a href="#">Graphic Designing</a></h4>
                                    <p class="description">Creating visual content using design principles and digital tools.
                                    </p>
                                    <a class="read-more-button" href="#"><i class="feather-arrow-right"></i></a>
                                </div>
                            </div>
                            <a class="over-link" href="https://github.com/OfficialShubhamShinde"></a>
                        </div>
                    </div>
                    <!-- End SIngle Service -->
                    <!-- Start Single Service -->
                    <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="300" data-aos-once="true"
                        class="col-lg-6 col-xl-4 col-md-6 col-sm-12 col-12 mt--50 mt_md--30 mt_sm--30">
                        <div class="rn-service">
                            <div class="inner">
                                <div class="icon">
                                    <i data-feather="layers"></i>
                                </div>
                                <div class="content">
                                    <h4 class="title"><a href="#">API Development</a></h4>
                                    <p class="description">Constructing interfaces for seamless communication between software components.</p>
                                    <a class="read-more-button" href="#"><i class="feather-arrow-right"></i></a>
                                </div>
                            </div>
                            <a class="over-link" href="https://github.com/OfficialShubhamShinde"></a>
                        </div>
                    </div>
                    <!-- End SIngle Service -->
                    <!-- Start Single Service -->
                    <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="500" data-aos-once="true"
                        class="col-lg-6 col-xl-4 col-md-6 col-sm-12 col-12 mt--50 mt_md--30 mt_sm--30">
                        <div class="rn-service">
                            <div class="inner">
                                <div class="icon">
                                    <i data-feather="layout"></i>
                                </div>
                                <div class="content">
                                    <h4 class="title"><a href="#">UI/UX Design</a></h4>
                                    <p class="description">Designing interfaces for user-friendly and engaging digital experiences.</p>
                                    <a class="read-more-button" href="#"><i class="feather-arrow-right"></i></a>
                                </div>
                            </div>
                            <a class="over-link" href="https://github.com/OfficialShubhamShinde"></a>
                        </div>
                    </div>
                    <!-- End SIngle Service -->

                </div>
            </div>
        </div>
        <!-- End Service Area  -->

        <!-- Start Resume Area -->
        <div class="rn-resume-area rn-section-gap section-separator" id="resume">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <!-- <span class="subtitle">7+ Years of Experience</span> -->
                            <h2 class="title">My Resume</h2>
                        </div>
                    </div>
                </div>
                <div class="row mt--45">
                    <div class="col-lg-12">
                        <ul class="rn-nav-list nav nav-tabs" id="myTabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="professional-tab" data-toggle="tab" href="#professional"
                                    role="tab" aria-controls="professional" aria-selected="false">professional
                                    Skills</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="education-tab" data-toggle="tab" href="#education" role="tab"
                                    aria-controls="education" aria-selected="true">education</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="experience-tab" data-toggle="tab" href="#experience" role="tab"
                                    aria-controls="experience" aria-selected="false">experience</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="interview-tab" data-toggle="tab" href="#interview" role="tab"
                                    aria-controls="interview" aria-selected="false">Certification</a>
                            </li>
                        </ul>
                        <!-- Start Tab Content Wrapper  -->
                        <div class="rn-nav-content tab-content" id="myTabContents">
                            <!-- Start Single Tab  -->
                            <div class="tab-pane fade " id="education" role="tabpanel" aria-labelledby="education-tab">
                                <div class="personal-experience-inner mt--40">
                                    <div class="row">
                                        <!-- Start Skill List Area  -->
                                        <div class="col-lg-6 col-md-12 col-12">
                                            <div class="content">
                                                <span class="subtitle">2014 - 2023</span>
                                                <h4 class="maintitle">Education Quality</h4>
                                                <div class="experience-list">

                                                    <!-- Start Single List  -->
                                                    <div class="resume-single-list">
                                                        <div class="inner">
                                                            <div class="heading">
                                                                <div class="title">
                                                                    <h4>MCA (Managment)</h4>
                                                                    <span>MIT World Peace University (2021 -
                                                                        2023)</span>
                                                                </div>
                                                                <div class="date-of-time">
                                                                    <span>9.56/10</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Single List  -->

                                                    <!-- Start Single List  -->
                                                    <div class="resume-single-list">
                                                        <div class="inner">
                                                            <div class="heading">
                                                                <div class="title">
                                                                    <h4>BSc </h4>
                                                                    <span>Shivaji University (2017 - 2021)</span>
                                                                </div>
                                                                <div class="date-of-time">
                                                                    <span>5.6/10</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Single List  -->

                                                    <!-- Start Single List  -->
                                                    <div class="resume-single-list">
                                                        <div class="inner">
                                                            <div class="heading">
                                                                <div class="title">
                                                                    <h4>HSC</h4>
                                                                    <span>D.P.Bhosale Collage, Koregaon (2016 -
                                                                        2017)</span>
                                                                </div>
                                                                <div class="date-of-time">
                                                                    <span>5.1/10</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Single List  -->
                                                    <!-- Start Single List  -->
                                                    <div class="resume-single-list">
                                                        <div class="inner">
                                                            <div class="heading">
                                                                <div class="title">
                                                                    <h4>SSC</h4>
                                                                    <span>The Modern English School, Koregaon (2014 -
                                                                        2015)</span>
                                                                </div>
                                                                <div class="date-of-time">
                                                                    <span>7.8/10</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Single List  -->

                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Skill List Area  -->
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Tab  -->

                            <!-- Start Single Tab  -->
                            <div class="tab-pane show active fade single-tab-area " id="professional" role="tabpanel"
                                aria-labelledby="professional-tab">
                                <div class="personal-experience-inner mt--40">
                                    <div class="row row--40">

                                        <!-- Start Single Progressbar  -->
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="progress-wrapper">
                                                <div class="content">
                                                    <span class="subtitle">Skill Set</span>
                                                    <h4 class="maintitle">Frontend Skills</h4>
                                                    <!-- Start Single Progress Charts -->
                                                    <div class="progress-charts">
                                                        <h6 class="heading heading-h6">HTML</h6>
                                                        <div class="progress">
                                                            <div class="progress-bar wow fadeInLeft"
                                                                data-wow-duration="0.5s" data-wow-delay=".3s"
                                                                role="progressbar" style="width: 100%"
                                                                aria-valuenow="85" aria-valuemin="0"
                                                                aria-valuemax="100"><span
                                                                    class="percent-label">100%</span></div>
                                                        </div>
                                                    </div>
                                                    <!-- End Single Progress Charts -->

                                                    <!-- Start Single Progress Charts -->
                                                    <div class="progress-charts">
                                                        <h6 class="heading heading-h6">CSS</h6>
                                                        <div class="progress">
                                                            <div class="progress-bar wow fadeInLeft"
                                                                data-wow-duration="0.6s" data-wow-delay=".4s"
                                                                role="progressbar" style="width: 95%" aria-valuenow="85"
                                                                aria-valuemin="0" aria-valuemax="100"><span
                                                                    class="percent-label">95%</span></div>
                                                        </div>
                                                    </div>
                                                    <!-- End Single Progress Charts -->

                                                    <!-- Start Single Progress Charts -->
                                                    <div class="progress-charts">
                                                        <h6 class="heading heading-h6">JavaScript</h6>
                                                        <div class="progress">
                                                            <div class="progress-bar wow fadeInLeft"
                                                                data-wow-duration="0.7s" data-wow-delay=".5s"
                                                                role="progressbar" style="width: 80%" aria-valuenow="85"
                                                                aria-valuemin="0" aria-valuemax="100"><span
                                                                    class="percent-label">80%</span></div>
                                                        </div>
                                                    </div>
                                                    <!-- End Single Progress Charts -->

                                                    <!-- Start Single Progress Charts -->
                                                    <div class="progress-charts">
                                                        <h6 class="heading heading-h6">React JS</h6>
                                                        <div class="progress">
                                                            <div class="progress-bar wow fadeInLeft"
                                                                data-wow-duration="0.8s" data-wow-delay=".6s"
                                                                role="progressbar" style="width: 70%" aria-valuenow="85"
                                                                aria-valuemin="0" aria-valuemax="100"><span
                                                                    class="percent-label">70%</span></div>
                                                        </div>
                                                    </div>
                                                    <!-- End Single Progress Charts -->

                                                    <!-- Start Single Progress Charts -->
                                                    <div class="progress-charts">
                                                        <h6 class="heading heading-h6">Bootstrap</h6>
                                                        <div class="progress">
                                                            <div class="progress-bar wow fadeInLeft"
                                                                data-wow-duration="0.9s" data-wow-delay=".7s"
                                                                role="progressbar" style="width: 90%" aria-valuenow="85"
                                                                aria-valuemin="0" aria-valuemax="100"><span
                                                                    class="percent-label">90%</span></div>
                                                        </div>
                                                    </div>
                                                    <!-- End Single Progress Charts -->

                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Progressbar  -->

                                        <!-- Start Single Progressbar  -->
                                        <div class="col-lg-6 col-md-6 col-12 mt_sm--60">
                                            <div class="progress-wrapper">
                                                <div class="content">
                                                    <span class="subtitle">Skill Set</span>
                                                    <h4 class="maintitle">Backend Skill</h4>
                                                    <!-- Start Single Progress Charts -->
                                                    <div class="progress-charts">
                                                        <h6 class="heading heading-h6">PHP</h6>
                                                        <div class="progress">
                                                            <div class="progress-bar wow fadeInLeft"
                                                                data-wow-duration="0.5s" data-wow-delay=".3s"
                                                                role="progressbar" style="width: 100%"
                                                                aria-valuenow="85" aria-valuemin="0"
                                                                aria-valuemax="100"><span
                                                                    class="percent-label">100%</span></div>
                                                        </div>
                                                    </div>
                                                    <!-- End Single Progress Charts -->

                                                    <!-- Start Single Progress Charts -->
                                                    <div class="progress-charts">
                                                        <h6 class="heading heading-h6">Spring Boot</h6>
                                                        <div class="progress">
                                                            <div class="progress-bar wow fadeInLeft"
                                                                data-wow-duration="0.6s" data-wow-delay=".4s"
                                                                role="progressbar" style="width: 80%" aria-valuenow="85"
                                                                aria-valuemin="0" aria-valuemax="100"><span
                                                                    class="percent-label">80%</span></div>
                                                        </div>
                                                    </div>
                                                    <!-- End Single Progress Charts -->

                                                    <!-- Start Single Progress Charts -->
                                                    <div class="progress-charts">
                                                        <h6 class="heading heading-h6">Django</h6>
                                                        <div class="progress">
                                                            <div class="progress-bar wow fadeInLeft"
                                                                data-wow-duration="0.7s" data-wow-delay=".5s"
                                                                role="progressbar" style="width: 90%" aria-valuenow="85"
                                                                aria-valuemin="0" aria-valuemax="100"><span
                                                                    class="percent-label">90%</span></div>
                                                        </div>
                                                    </div>
                                                    <!-- End Single Progress Charts -->

                                                    <!-- Start Single Progress Charts -->
                                                    <div class="progress-charts">
                                                        <h6 class="heading heading-h6">Node JS</h6>
                                                        <div class="progress">
                                                            <div class="progress-bar wow fadeInLeft"
                                                                data-wow-duration="0.8s" data-wow-delay=".6s"
                                                                role="progressbar" style="width: 75%" aria-valuenow="85"
                                                                aria-valuemin="0" aria-valuemax="100"><span
                                                                    class="percent-label">75%</span></div>
                                                        </div>
                                                    </div>
                                                    <!-- End Single Progress Charts -->

                                                    <!-- Start Single Progress Charts -->
                                                    <div class="progress-charts">
                                                        <h6 class="heading heading-h6">Spring MVC</h6>
                                                        <div class="progress">
                                                            <div class="progress-bar wow fadeInLeft"
                                                                data-wow-duration="0.9s" data-wow-delay=".7s"
                                                                role="progressbar" style="width: 70%" aria-valuenow="85"
                                                                aria-valuemin="0" aria-valuemax="100"><span
                                                                    class="percent-label">70%</span></div>
                                                        </div>
                                                    </div>
                                                    <!-- End Single Progress Charts -->

                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Progressbar  -->

                                    </div>
                                </div>
                            </div>
                            <!-- End Single Tab  -->

                            <!-- Start Single Tab  -->
                            <div class="tab-pane fade" id="experience" role="tabpanel" aria-labelledby="experience-tab">
                                <div class="personal-experience-inner mt--40">
                                    <div class="row">
                                        <!-- Start Skill List Area  -->
                                        <div class="col-lg-6 col-md-12 col-12">
                                            <div class="content">
                                                <span class="subtitle">2022 - 2023</span>
                                                <h4 class="maintitle">Internship Experience</h4>
                                                <div class="experience-list">

                                                    <!-- Start Single List  -->
                                                    <div class="resume-single-list">
                                                        <div class="inner">
                                                            <div class="heading">
                                                                <div class="title">
                                                                    <h4>Junior Software Developer</h4>
                                                                    <span>ASDR Infotech Pvt. LTD. (Jan 2023 - July
                                                                        2023)</span>
                                                                </div>
                                                                <div class="date-of-time">
                                                                    <!-- <span>4.30/5</span> -->
                                                                </div>
                                                            </div>
                                                            <!-- <p class="description">The education should be very
                                                                interactual. Ut tincidunt est ac dolor aliquam sodales.
                                                                Phasellus sed mauris hendrerit, laoreet sem in, lobortis
                                                                mauris hendrerit ante.</p> -->
                                                        </div>
                                                    </div>
                                                    <!-- End Single List  -->
                                                    <!-- Start Single List  -->
                                                    <div class="resume-single-list">
                                                        <div class="inner">
                                                            <div class="heading">
                                                                <div class="title">
                                                                    <h4>PHP Developer</h4>
                                                                    <span>EdERA Pvt. LTD. (May 2022 - Aug 2022)</span>
                                                                </div>
                                                                <div class="date-of-time">
                                                                    <!-- <span>4.30/5</span> -->
                                                                </div>
                                                            </div>
                                                            <!-- <p class="description">The education should be very
                                                                interactual. Ut tincidunt est ac dolor aliquam sodales.
                                                                Phasellus sed mauris hendrerit, laoreet sem in, lobortis
                                                                mauris hendrerit ante.</p> -->
                                                        </div>
                                                    </div>
                                                    <!-- End Single List  -->


                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Skill List Area  -->
                                        <!-- Start Skill List Area  -->
                                        <div class="col-lg-6 col-md-12 col-12">
                                            <div class="content">
                                                <span class="subtitle">2023 - </span>
                                                <h4 class="maintitle">Job Experience</h4>
                                                <div class="experience-list">

                                                    <!-- Start Single List  -->
                                                    <div class="resume-single-list">
                                                        <div class="inner">
                                                            <div class="heading">
                                                                <div class="title">
                                                                    <h4>Junior Software Developer</h4>
                                                                    <span>ASDR Infotech Pvt. LTD. (Aug 2023)</span>
                                                                </div>
                                                                <div class="date-of-time">
                                                                    <!-- <span>4.30/5</span> -->
                                                                </div>
                                                            </div>
                                                            <!-- <p class="description">The education should be very
                                                                interactual. Ut tincidunt est ac dolor aliquam sodales.
                                                                Phasellus sed mauris hendrerit, laoreet sem in, lobortis
                                                                mauris hendrerit ante.</p> -->
                                                        </div>
                                                    </div>
                                                    <!-- End Single List  -->



                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Skill List Area  -->
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Tab  -->

                            <!-- Start Single Tab  -->
                            <div class="tab-pane fade" id="interview" role="tabpanel" aria-labelledby="interview-tab">
                                <div class="personal-experience-inner mt--40">
                                    <div class="row">
                                        <!-- Start Skill List Area  -->
                                        <div class="col-lg-6 col-md-12 col-12">
                                            <div class="content">
                                                <span class="subtitle">Certificates</span>
                                                <h4 class="maintitle">Professional Certification</h4>
                                                <div class="experience-list">

                                                    <!-- Start Single List  -->
                                                    <a
                                                        href="https://www.coursera.org/account/accomplishments/verify/ZE7GT6MKU5CF">
                                                        <div data-aos="fade-up" data-aos-duration="500"
                                                            data-aos-delay="300" data-aos-once="true"
                                                            class="resume-single-list">
                                                            <div class="inner">
                                                                <div class="heading">
                                                                    <div class="title">
                                                                        <h4>AWS (Cloud Computing Essential) </h4>
                                                                        <span>Amazon (Nov 2021)</span>
                                                                    </div>
                                                                    <div class="date-of-time">
                                                                        <span>10/10</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <!-- End Single List  -->
                                                    <!-- Start Single List  -->
                                                    <a
                                                        href="https://www.credly.com/badges/ef62024f-4a6d-4a72-9627-63926c411913/linked_in_profile">
                                                        <div data-aos="fade-up" data-aos-duration="500"
                                                            data-aos-delay="300" data-aos-once="true"
                                                            class="resume-single-list">
                                                            <div class="inner">
                                                                <div class="heading">
                                                                    <div class="title">
                                                                        <h4>Microsoft Certified: Azure Fundamentals</h4>
                                                                        <span>Microsoft (Feb 2023)</span>
                                                                    </div>
                                                                    <div class="date-of-time">
                                                                        <span>10/10</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <!-- End Single List  -->

                                                    <!-- Start Single List  -->
                                                    <a
                                                        href="https://drive.google.com/file/d/1qxaefrWr88WKzkFIk0dYLYULwCdBAx1r/view?usp=sharing">
                                                        <div data-aos="fade-up" data-aos-duration="500"
                                                            data-aos-delay="500" data-aos-once="true"
                                                            class="resume-single-list">
                                                            <div class="inner">
                                                                <div class="heading">
                                                                    <div class="title">
                                                                        <h4>Java Programming </h4>
                                                                        <span>Great Learning (December 2021)</span>
                                                                    </div>
                                                                    <div class="date-of-time">
                                                                        <span>10/10</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <!-- End Single List  -->

                                                    <!-- Start Single List  -->
                                                    <a
                                                        href="https://drive.google.com/file/d/1rGaqxHFTe3tYoHk1hlBtQT9pGL4dObnO/view?usp=sharing">
                                                        <div data-aos="fade-up" data-aos-duration="500"
                                                            data-aos-delay="900" data-aos-once="true"
                                                            class="resume-single-list">
                                                            <div class="inner">
                                                                <div class="heading">
                                                                    <div class="title">
                                                                        <h4>MS-CIT</h4>
                                                                        <span>MSBTE Mumbai (June 2015)</span>
                                                                    </div>
                                                                    <div class="date-of-time">
                                                                        <span>10/10</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <!-- End Single List  -->

                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Skill List Area  -->

                                        <!-- Start Skill List Area 2nd  -->
                                        <div class="col-lg-6 col-md-12 col-12 mt_md--60 mt_sm--60">
                                            <div class="content">
                                                <span class="subtitle"> <br> </span>
                                                <h4 class="maintitle"><br></h4>
                                                <div class="experience-list">

                                                    <!-- Start Single List  -->
                                                    <a
                                                        href="https://coursera.org/share/adf75c5da893ba15df1a624f24710ef8">
                                                        <div data-aos="fade-up" data-aos-duration="500"
                                                            data-aos-delay="500" data-aos-once="true"
                                                            class="resume-single-list">
                                                            <div class="inner">
                                                                <div class="heading">
                                                                    <div class="title">
                                                                        <h4>HTML, CSS, and JavaScript <br> for Web
                                                                            Developers</h4>
                                                                        <span>Johns Hopkins University (March
                                                                            2022)</span>
                                                                    </div>
                                                                    <div class="date-of-time">
                                                                        <span>10/10</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <!-- End Single List  -->

                                                    <!-- Start Single List  -->
                                                    <a
                                                        href="https://drive.google.com/file/d/1mUKj0yyd-yTgBVJjXdJzMoWPf5X1RIgd/view?usp=sharing">
                                                        <div data-aos="fade-up" data-aos-duration="500"
                                                            data-aos-delay="900" data-aos-once="true"
                                                            class="resume-single-list">
                                                            <div class="inner">
                                                                <div class="heading">
                                                                    <div class="title">
                                                                        <h4>Explore React.js Development</h4>
                                                                        <span>LinkedIn (Dec 2022)</span>
                                                                    </div>
                                                                    <div class="date-of-time">
                                                                        <span>10/10</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <!-- End Single List  -->



                                                    <!-- Start Single List  -->
                                                    <a
                                                        href="https://drive.google.com/file/d/1ROsO2lMIFGpa5WEULP5rGAC03r-QbCYs/view?usp=sharing">
                                                        <div data-aos="fade-up" data-aos-duration="500"
                                                            data-aos-delay="900" data-aos-once="true"
                                                            class="resume-single-list">
                                                            <div class="inner">
                                                                <div class="heading">
                                                                    <div class="title">
                                                                        <h4>HackMITWPU</h4>
                                                                        <span>MITWPU (20 to 23 January 2021)</span>
                                                                    </div>
                                                                    <div class="date-of-time">
                                                                        <!-- <span>5.00/5</span> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <!-- End Single List  -->

                                                    <!-- Start Single List  -->
                                                    <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="900"
                                                        data-aos-once="true" class="resume-single-list">
                                                        <div class="inner">
                                                            <div class="heading">
                                                                <div class="title">
                                                                    <h4>Big Data Hadoop and Spark Developer</h4>
                                                                    <span>SkillUP (October 2022)</span>
                                                                </div>
                                                                <div class="date-of-time">
                                                                    <span>10/10</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Single List  -->



                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Skill List Area  -->
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Tab  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Resume Area -->
        <!-- Start Testimonia Area  -->
        <div class="rn-testimonial-area rn-section-gap section-separator" id="testimonial">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <h2 class="title">Professional Certification</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="testimonial-activation testimonial-pb mb--30">
                            <!-- Start Single testiminail -->
                            <div class="testimonial mt--50 mt_md--40 mt_sm--40">
                                <div class="inner">
                                    <div class="card-info">
                                        <div class="card-thumbnail">
                                            <img src="assets/images/Certificate/AWSCertificate.jpg" alt="Testimonial-image">
                                        </div>
                                        <div class="card-content">
                                            <span class="subtitle mt--10">Amazon</span>
                                            <!-- <h3 class="title">AWS (Cloud Computing Essential) </h3>
                                            <span class="designation">Chief Operating Officer</span> -->
                                        </div>
                                    </div>
                                    <div class="card-description">
                                        <div class="title-area">
                                            <div class="title-info">
                                                <h3 class="title">AWS <br>(Cloud Computing Essential) </h3>
                                                <span class="date">Amazon - Nov 2021</span>
                                            </div>
                                            <div class="rating">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                            </div>
                                        </div>
                                        <div class="seperator"></div>
                                        <p class="discription">
                                            Nov 21, 2021. <br>
                                            I am Successfully Completed <br>
                                            <b>AWS Cloud Technical Essentials</b> <br>
                                            an online non-credit course authorized by Amazon Web Services and offered
                                            through Coursera
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--End Single testiminail -->
                            <!-- Start Single testiminail -->
                            <div class="testimonial mt--50 mt_md--40 mt_sm--40">
                                <div class="inner">
                                    <div class="card-info">
                                        <div class="card-thumbnail">
                                            <img src="assets/images/Certificate/microsoftA-Z.jpg" alt="Testimonial-image">
                                        </div>
                                        <div class="card-content">
                                            <span class="subtitle mt--10">Microsoft</span>
                                            <!-- <h3 class="title">AWS (Cloud Computing Essential) </h3>
                                            <span class="designation">Chief Operating Officer</span> -->
                                        </div>
                                    </div>
                                    <div class="card-description">
                                        <div class="title-area">
                                            <div class="title-info">
                                                <h3 class="title">Microsoft Certified:<br>Azure Fundamentals</h3>
                                                <span class="date">Microsoft - Feb 2023</span>
                                            </div>
                                            <div class="rating">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                            </div>
                                        </div>
                                        <div class="seperator"></div>
                                        <p class="discription">
                                            Feb 21, 2023. <br>
                                            I am Successfully Completed <br>
                                            <b>Microsoft Certified:Azure Fundamentals</b> <br>
                                            an online non-credit course authorized by Microsoft.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--End Single testiminail -->
                            <!-- Start Single testiminail -->
                            <div class="testimonial mt--50 mt_md--40 mt_sm--40">
                                <div class="inner">
                                    <div class="card-info">
                                        <div class="card-thumbnail">
                                            <img src="assets/images/Certificate/react.jpg" alt="Testimonial-image">
                                        </div>
                                        <div class="card-content">
                                            <span class="subtitle mt--10">LinkedIn Learning</span>
                                        </div>
                                    </div>
                                    <div class="card-description">
                                        <div class="title-area">
                                            <div class="title-info">
                                                <h3 class="title">React.js Development</h3>
                                                <span class="date">LinkedIn Learning - Dec 11, 2022</span>
                                            </div>
                                            <div class="rating">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                            </div>
                                        </div>
                                        <div class="seperator"></div>
                                        <p class="discription">
                                            Dec 11, 2022. <br>
                                            I am Successfully Completed <br>
                                            <b>React.js Development</b> <br>
                                            an online course authorized and offered by LinkedIn Learning
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--End Single testiminail -->
                            <!-- Start Single testiminail -->
                            <div class="testimonial mt--50 mt_md--40 mt_sm--40">
                                <div class="inner">
                                    <div class="card-info">
                                        <div class="card-thumbnail">
                                            <img src="assets/images/Certificate/WebCertificate.jpg" alt="Testimonial-image">
                                        </div>
                                        <div class="card-content">
                                            <span class="subtitle mt--10">Johns Hopkins University</span>
                                        </div>
                                    </div>
                                    <div class="card-description">
                                        <div class="title-area">
                                            <div class="title-info">
                                                <h3 class="title">HTML, CSS, and JavaScript <br> for Web Developers</h3>
                                                <span class="date">Johns Hopkins University - Mar 28, 2022</span>
                                            </div>
                                            <div class="rating">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                            </div>
                                        </div>
                                        <div class="seperator"></div>
                                        <p class="discription">
                                            March 28 , 2022. <br>
                                            I am Successfully Completed <br>
                                            <b>HTML, CSS, and Javascript for Web Developers</b> <br>
                                            an online non-credit course authorized by Johns Hopkins University and
                                            offered through Coursera
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--End Single testiminail -->
                            <!-- Start Single testiminail -->
                            <div class="testimonial mt--50 mt_md--40 mt_sm--40">
                                <div class="inner">
                                    <div class="card-info">
                                        <div class="card-thumbnail">
                                            <img src="assets/images/Certificate/java.jpg" alt="Testimonial-image">
                                        </div>
                                        <div class="card-content">
                                            <span class="subtitle mt--10">LinkedIn Learning</span>
                                        </div>
                                    </div>
                                    <div class="card-description">
                                        <div class="title-area">
                                            <div class="title-info">
                                                <h3 class="title">Learning Java</h3>
                                                <span class="date">LinkedIn Learning - Dec 09, 2022</span>
                                            </div>
                                            <div class="rating">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                            </div>
                                        </div>
                                        <div class="seperator"></div>
                                        <p class="discription">
                                            Dec 09, 2022. <br>
                                            I am Successfully Completed <br>
                                            <b>Learning Java</b> <br>
                                            an online course authorized and Offered by LinkedIn Learning.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--End Single testiminail -->
                            <!-- Start Single testiminail -->
                            <div class="testimonial mt--50 mt_md--40 mt_sm--40">
                                <div class="inner">
                                    <div class="card-info">
                                        <div class="card-thumbnail">
                                            <img src="assets/images/Certificate/django.jpg" alt="Testimonial-image">
                                        </div>
                                        <div class="card-content">
                                            <span class="subtitle mt--10">LinkedIn Learning</span>
                                        </div>
                                    </div>
                                    <div class="card-description">
                                        <div class="title-area">
                                            <div class="title-info">
                                                <h3 class="title">Django Essential Training</h3>
                                                <span class="date">LinkedIn Learning - Jan 03, 2023</span>
                                            </div>
                                            <div class="rating">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                            </div>
                                        </div>
                                        <div class="seperator"></div>
                                        <p class="discription">
                                            Jan 03, 2023. <br>
                                            I am Successfully Completed <br>
                                            <b>Django Essential Training </b> <br>
                                            an online course authorized and Offered by LinkedIn Learning.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--End Single testiminail -->
                            <!-- Start Single testiminail -->
                            <div class="testimonial mt--50 mt_md--40 mt_sm--40">
                                <div class="inner">
                                    <div class="card-info">
                                        <div class="card-thumbnail">
                                            <img src="assets/images/Certificate/HackMITWPU.jpg" alt="Testimonial-image">
                                        </div>
                                        <div class="card-content">
                                            <span class="subtitle mt--10">HackMITWPU</span>
                                            <!-- <h3 class="title">Nevine Dhawan</h3>
                                            <span class="designation">CEO Of Officer</span> -->
                                        </div>
                                    </div>
                                    <div class="card-description">
                                        <div class="title-area">
                                            <div class="title-info">
                                                <h3 class="title">HackMITWPU</h3>
                                                <span class="date">MITWPU - 20 jan 2022 - 23 jan, 2022</span>
                                            </div>
                                            <div class="rating">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                            </div>
                                        </div>
                                        <div class="seperator"></div>
                                        <p class="discription">
                                            This certificate is to appreciate for participating in
                                            Ideathon/Workathon/Octathon, HackMITWPU, 2029 that was conducted from 20 to
                                            23 January, 2022 at Dr. Vishwanath Karad MIT World Peace University, Pune,
                                            Bharat. This is to congratulate for taking one step forward towards
                                            innovation. You deserve our complments for giving us a good opportunity to
                                            place on record your remarkable sense ot duty and devotion towards your
                                            commendable performance
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--End Single testiminail -->
                            <!-- Start Single testiminail -->
                            <div class="testimonial mt--50 mt_md--40 mt_sm--40">
                                <div class="inner">
                                    <div class="card-info">
                                        <div class="card-thumbnail">
                                            <img src="assets/images/Certificate/mongodb.jpg" alt="Testimonial-image">
                                        </div>
                                        <div class="card-content">
                                            <span class="subtitle mt--10">LinkedIn Learning</span>
                                        </div>
                                    </div>
                                    <div class="card-description">
                                        <div class="title-area">
                                            <div class="title-info">
                                                <h3 class="title">MongoDB Essential Training</h3>
                                                <span class="date">LinkedIn Learning - Dec 15, 2022</span>
                                            </div>
                                            <div class="rating">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                            </div>
                                        </div>
                                        <div class="seperator"></div>
                                        <p class="discription">
                                            Dec 15, 2022. <br>
                                            I am Successfully Completed <br>
                                            <b>MongoDB Essential Training</b> <br>
                                            an online course authorized and Offered by LinkedIn Learning.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--End Single testiminail -->
                            <!-- Start Single testiminail -->
                            <div class="testimonial mt--50 mt_md--40 mt_sm--40">
                                <div class="inner">
                                    <div class="card-info">
                                        <div class="card-thumbnail">
                                            <img src="assets/images/Certificate/hadoop.jpg" alt="Testimonial-image">
                                        </div>
                                        <div class="card-content">
                                            <span class="subtitle mt--10">LinkedIn Learning</span>
                                        </div>
                                    </div>
                                    <div class="card-description">
                                        <div class="title-area">
                                            <div class="title-info">
                                                <h3 class="title">Learning Hadoop</h3>
                                                <span class="date">LinkedIn Learning - Dec 15, 2022</span>
                                            </div>
                                            <div class="rating">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                            </div>
                                        </div>
                                        <div class="seperator"></div>
                                        <p class="discription">
                                            Dec 15, 2022. <br>
                                            I am Successfully Completed <br>
                                            <b>Learning Hadoop</b> <br>
                                            an online course authorized and Offered by LinkedIn Learning.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--End Single testiminail -->
                            <!-- Start Single testiminail -->
                            <div class="testimonial mt--50 mt_md--40 mt_sm--40">
                                <div class="inner">
                                    <div class="card-info">
                                        <div class="card-thumbnail">
                                            <img src="assets/images/Certificate/MSCIT.jpg" alt="Testimonial-image">
                                        </div>
                                        <div class="card-content">
                                            <span class="subtitle mt--10">MS-CIT</span>
                                        </div>
                                    </div>
                                    <div class="card-description">
                                        <div class="title-area">
                                            <div class="title-info">
                                                <h3 class="title">MS-CIT</h3>
                                                <span class="date">MSBTE Mumbai - June 2015</span>
                                            </div>
                                            <div class="rating">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                            </div>
                                        </div>
                                        <div class="seperator"></div>
                                        <p class="discription">
                                            The withinsigned having successfully completed the prescribed course of
                                            studies and having passed the examination with <b>83 percent</b> Marks has
                                            been awarded the <b>Maharashtra State Certificate In Information Technology
                                                (MS-CIT)</b> On behalf of the Government of Maharashtra in the month of
                                            June - 2015 in testimony whereof are set the seals and signatures of the
                                            Director, Maharashtra State Board of Technical Education, Mumbai and the
                                            Managing Director, Maharashtra Knowledge Corporation Limited.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--End Single testiminail -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Testimonia Area  -->
        <!-- Start Client Area -->
        <div class="rn-client-area rn-section-gap section-separator" id="clients">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <span class="subtitle">Awesome Projects</span>
                            <h2 class="title">Projects</h2>
                        </div>
                    </div>
                </div>

                <div class="row row--25 mt--50 mt_md--40 mt_sm--40">
                    <div class="col-lg-4">
                        <div class="d-flex flex-wrap align-content-start h-100">
                            <div class="position-sticky clients-wrapper sticky-top rbt-sticky-top-adjust">
                                <ul class="nav tab-navigation-button flex-column nav-pills me-3" id="v-pills-tab"
                                    role="tablist">

                                    <li class="nav-item">
                                        <a class="nav-link" id="v-pills-home-tab" data-toggle="tab"
                                            href="#v-pills-Javascript" role="tab" aria-selected="true">JavaScript</a>
                                    </li>


                                    <li class="nav-item">
                                        <a class="nav-link active" id="v-pills-profile-tab" data-toggle="tab"
                                            href="#v-pills-Design" role="tab" aria-selected="true">PHP</a>
                                    </li>


                                    <li class="nav-item">
                                        <a class="nav-link" id="v-pills-wordpress-tab" data-toggle="tab"
                                            href="#v-pills-Wordpress" role="tab" aria-selected="true">Java</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="v-pills-settings-tabs" data-toggle="tab"
                                            href="#v-pills-settings" role="tab" aria-selected="true">React</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="v-pills-laravel-tabs" data-toggle="tab"
                                            href="#v-pills-laravel" role="tab" aria-selected="true">Django</a>
                                    </li>


                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="tab-area">
                            <div class="d-flex align-items-start">
                                <div class="tab-content" id="v-pills-tabContent">

                                    <div class="tab-pane fade" id="v-pills-Javascript" role="tabpanel"
                                        aria-labelledby="v-pills-home-tab">
                                        <div class="client-card">

                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img src="assets/images/Projects/NoteTaking.jpg"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#">Note Taking</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->

                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img src="assets/images/Projects/LiveNews.jpg"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#">Live News</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->

                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img src="assets/images/Projects/libraray.jpg"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#">Librabray
                                                                Building</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->

                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img
                                                                src="assets/images/Projects/formValidation.jpg"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#">Form
                                                                Validation</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->

                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img src="assets/images/Projects/Calculator.jpg"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#">Calculator</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->

                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img src="assets/images/Projects/alaram.jpg"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#">Alaram Clock</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->

                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img src="assets/images/Projects/NA pic.jpg"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#">NA</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->







                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img src="assets/images/Projects/NA pic.jpg"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#">NA</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->

                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img src="assets/images/Projects/NA pic.jpg"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#">NA</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->

                                        </div>
                                    </div>

                                    <div class="tab-pane fade show active" id="v-pills-Design" role="tabpanel"
                                        aria-labelledby="v-pills-profile-tab">
                                        <div class="client-card">

                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img
                                                                src="assets/images/Projects/tms.png"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#"
                                                                id="rehbarFoundation">AgileTime ETS</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->

                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img
                                                                src="assets/images/Projects/HareshwarFood.jpg"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#">Hareshwar Foods & Agro
                                                                Products</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->

                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img
                                                                src="assets/images/Projects/dental.png"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#">Perfect Smile Dental Clinic & Implant Centre</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->

                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img src="assets/images/Projects/SwarajAgro.jpg"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#">Swaraj Agro</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->

                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img src="assets/images/Projects/Portfolio1.jpg"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#">Portfolio
                                                                Website</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->

                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img src="assets/images/Projects/Divid.jpg"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#">DAVID CHU'S CHINA
                                                                BISTRO</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->

                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img src="assets/images/Projects/classes.png"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#">ASDR EduPulse Connect</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->

                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img src="assets/images/Projects/saponite.png"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#">Saponite Consultancy</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->

                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img src="assets/images/Projects/real estate.png"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#">Real Estate</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->
                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img src="assets/images/Projects/E-Commerce.png"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#">E-Commerce</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->
                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img src="assets/images/Projects/NA pic.jpg"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#">NA</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->
                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img src="assets/images/Projects/NA pic.jpg"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#">NA</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="v-pills-Wordpress" role="tabpanel"
                                        aria-labelledby="v-pills-wordpress-tab">
                                        <div class="client-card">

                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img src="assets/images/Projects/asdrlms.PNG"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#">ASDR LMS</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->

                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img src="assets/images/Projects/NA pic.jpg"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#">Java Swing</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->

                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img src="assets/images/Projects/NA pic.jpg"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#">Java Spring</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->

                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img src="assets/images/Projects/NA pic.jpg"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#">NA</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->

                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img src="assets/images/Projects/NA pic.jpg"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#">NA</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->

                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img src="assets/images/Projects/NA pic.jpg"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#">NA</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->

                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img src="assets/images/Projects/NA pic.jpg"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#">NA</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->

                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img src="assets/images/Projects/NA pic.jpg"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#">NA</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->

                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img src="assets/images/Projects/NA pic.jpg"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#">NA</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->

                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                                        aria-labelledby="v-pills-settings-tabs">
                                        <div class="client-card">

                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img src="assets/images/Projects/NA pic.jpg"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#">NA</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->


                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img src="assets/images/Projects/NA pic.jpg"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#">NA</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->

                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img src="assets/images/Projects/NA pic.jpg"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#">NA</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->

                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img src="assets/images/Projects/NA pic.jpg"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#">NA</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->

                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img src="assets/images/Projects/NA pic.jpg"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#">NA</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->

                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img src="assets/images/Projects/NA pic.jpg"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#">NA</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->

                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img src="assets/images/Projects/NA pic.jpg"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#">NA</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->

                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img src="assets/images/Projects/NA pic.jpg"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#">NA</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->

                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img src="assets/images/Projects/NA pic.jpg"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#">NA</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->

                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="v-pills-laravel" role="tabpanel"
                                        aria-labelledby="v-pills-laravel-tabs">
                                        <div class="client-card">

                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img
                                                                src="assets/images/Projects/RehbarFoundation.jpg"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#"
                                                                id="rehbarFoundation">Rehbar Foundation</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->

                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img src="assets/images/Projects/NA pic.jpg"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#">NA</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->

                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img src="assets/images/Projects/NA pic.jpg"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#">NA</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->

                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img src="assets/images/Projects/NA pic.jpg"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#">NA</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->

                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img src="assets/images/Projects/NA pic.jpg"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#">NA</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->

                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img src="assets/images/Projects/NA pic.jpg"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#">NA</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->

                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img src="assets/images/Projects/NA pic.jpg"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#">NA</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->

                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img src="assets/images/Projects/NA pic.jpg"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#">NA</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->

                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <a href="#"><img src="assets/images/Projects/NA pic.jpg"
                                                                alt="Client-image"></a>
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><a href="#">NA</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End client section -->

        <!-- Start Contact section -->
        <div class="rn-contact-area rn-section-gap section-separator" id="contacts">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <span class="subtitle">Contact</span>
                            <h2 class="title">Contact With Me</h2>
                        </div>
                    </div>
                </div>
                <div class="row mt--50 mt_md--40 mt_sm--40 mt-contact-sm">
                    <div class="col-lg-5">
                        <div class="contact-about-area">
                            <div class="thumbnail">
                                <img src="assets/images/Certificate/Saly-31.png" alt="contact-img">
                            </div>
                            <div class="title-area">
                                <h4 class="title">Shubham Ashok Shinde</h4>
                                <span>Programmer, Developer</span>
                            </div>
                            <div class="description">
                                <p>I am available for freelance work. Connect with me via and call in to my account.
                                </p>
                                <span class="phone">Phone: <a href="tel:01941043264">+91 7774882080</a></span>
                                <span class="mail">Email: <a
                                        href="mailto:admin@example.com">shubhamshinde9530@gmail.com</a></span>
                            </div>
                            <div class="social-area">
                                <div class="name">FIND WITH ME</div>
                                <div class="social-icone">
                                    <a href="https://www.facebook.com/profile.php?id=100009714557541" target="_blank"><i
                                            data-feather="facebook"></i></a>
                                    <a href="http://linkedin.com/in/shubham-shinde-588005223" target="_blank"><i
                                            data-feather="linkedin"></i></a>
                                    <a href="https://www.instagram.com/_shubham__shinde_" target="_blank"><i
                                            data-feather="instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-aos-delay="600" class="col-lg-7 contact-input">
                        <div class="contact-form-wrapper">
                            <div class="introduce">

                                <form method="POST" action="" class="rnt-contact-form rwt-dynamic-form row" >
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="contact-name">Your Name</label>
                                            <input class="form-control form-control-lg" required name="name"
                                                id="contact-name" type="text">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="contact-phone">Phone Number</label>
                                            <input class="form-control" name="phone" id="contact-phone"
                                                type="number">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="contact-email">Email</label>
                                            <input class="form-control form-control-sm" required id="contact-email"
                                                name="email" type="email">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="subject">subject</label>
                                            <input class="form-control form-control-sm" id="subject" name="subject"
                                                type="text">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="contact-message">Your Message</label>
                                            <textarea  name="msg" required  id="contact-message" cols="30"
                                                rows="10"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <button type="submit" class="rn-btn">
                                            <span>SEND MESSAGE</span>
                                            <i data-feather="arrow-right"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Contuct section -->

        <!-- Back to  top Start -->
        <div class="backto-top">
            <div>
                <i data-feather="arrow-up"></i>
            </div>
        </div>
        <!-- Back to top end -->

    </main>
    <!-- JS ============================================ -->
    <script src="assets/js/vendor/jquery.js"></script>
    <script src="assets/js/vendor/modernizer.min.js"></script>
    <script src="assets/js/vendor/feather.min.js"></script>
    <script src="assets/js/vendor/slick.min.js"></script>
    <script src="assets/js/vendor/bootstrap.js"></script>
    <script src="assets/js/vendor/text-type.js"></script>
    <script src="assets/js/vendor/wow.js"></script>
    <script src="assets/js/vendor/aos.js"></script>
    <script src="assets/js/vendor/particles.js"></script>
    <!-- main JS -->
    <script src="assets/js/main.js"></script>
</body>

</html>