<!DOCTYPE html>

<html lang="en">
    
    <head>
        <meta charset=utf-8>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>About Us</title>
        <!-- Load Roboto font -->
        <!-- <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'> -->
        <!-- Load css styles -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap_about_us.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" />
        <link rel="stylesheet" type="text/css" href="css/stylemain_about_us.css" />
        <link rel="stylesheet" type="text/css" href="css/pluton.css" />
        <!--[if IE 7]>
            <link rel="stylesheet" type="text/css" href="css/pluton-ie7.css" />
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="css/jquery.cslider_about_us.css" />
        <link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css" />
        <link rel="stylesheet" type="text/css" href="css/animate.css" />
        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57.png">
        <link rel="shortcut icon" href="images/ico/favicon.ico">
    </head>
    
    <body>
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <a href="#" class="brand">
                        <img src="images/logo.png" width="120" height="40" alt="Logo" />
                        <!-- This is website logo -->
                    </a>
                    <!-- Navigation button, visible on small resolution -->
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <i class="icon-menu"></i>
                    </button>
                    <!-- Main navigation -->
                    <div class="nav-collapse collapse pull-right">
                        <ul class="nav" id="top-navigation">
                            <li><a href="index_loggedin.php">Home</a></li>
                            <li><a href="downloads.php">Downloads</a></li>
                            <li><a href="developers_loggedin.php">Developers</a></li>
                            <li class="active"><a href="about_us_loggedin.php">About Us</a></li>
                            <!-- <li><a href="#clients">Clients</a></li> -->
                            <!-- <li><a href="#price">Price</a></li> -->
                            <li><a href="contact_us_loggedin.php">Contact Us</a></li>
                        </ul>
                    </div>
                    <!-- End main navigation -->
                </div>
            </div>
        </div>
        <!-- Start home section -->
        <div id="home">
            <!-- Start cSlider -->
            <div id="da-slider" class="da-slider">
                <!-- <div class="triangle"></div> -->
                <!-- mask elemet use for masking background image -->
                <div class="mask"></div>
                <!-- All slides centred in container element -->
                <div class="container">
                    <!-- Start first slide -->
                    <div class="da-slide">
                        <h2 class="fittext2">Making a Better World</h2>
                        <!-- <h4>Clean & responsive</h4> -->
                        <p>Through innovative, reliable products and services; talented people; a responsible approach to business and global citizenship; and collaboration with our partners and customers, EZ Pass is taking the world in imaginative new directions.</p>
                        <!-- <a href="#" class="da-link button">Read more</a> -->
                        <div class="da-img">
                            <img src="images/better_world.jpeg" alt="image01" width="520">
                        </div>
                    </div>
                    <!-- End first slide -->
                    <!-- Start second slide -->
                    <div class="da-slide">
                        <h2>Bettering Everyday Experience</h2>
                        <!-- <h4>Easy to use</h4> -->
                        <p>From our innovations in real time data processing to the hastle free experience for user, EZ Pass shares impactful experiences each day with people around the globe. Through our devotion to create superior products and services across all areas of our business, we strive to enhance the lives of people everywhere and bring positive change to the world around us. </p>
                        <!-- <a href="#" class="da-link button">Read more</a> -->
                        <div class="da-img">
                            <img src="images/everyday_exp.jpeg" width="520" alt="image02">
                        </div>
                    </div>
                    <!-- End second slide -->
                    <!-- Start third slide -->
                    <div class="da-slide">
                        <h2>Committed to Social Responsibility</h2>
                        <!-- <h4>Customizable</h4> -->
                        <p>We measure our success not only in our business achievements, but also by how well we serve our community, protect our planet‘s resources, and make a difference in people's lives. We embrace our responsibility to contribute as a good citizen, taking action around the world to foster a better society, protect and improve the environment, and strengthen our communities. </p>
                        <!-- <a href="#" class="da-link button">Read more</a> -->
                        <div class="da-img">
                            <img src="images/social_resp.jpeg" width="520" alt="image03">
                        </div>
                    </div>
                    <!-- Start third slide -->
                    <!-- Start cSlide navigation arrows -->
                    <div class="da-arrows">
                        <span class="da-arrows-prev"></span>
                        <span class="da-arrows-next"></span>
                    </div>
                    <!-- End cSlide navigation arrows -->
                </div>
            </div>
        </div>
        <!-- End home section -->
        <!-- Service section start -->
        <!-- Contact section edn -->
        <!-- Footer section start -->
        <div class="footer">
            <p>&copy; 2013 All Rights Reserved</p>
        </div>
        <!-- Footer section end -->
        <!-- ScrollUp button start -->
        <!-- <div class="scrollup">
            <a href="#">
                <i class="icon-up-open"></i>
            </a>
        </div> -->
        <!-- ScrollUp button end -->
        <!-- Include javascript -->
        <script src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.mixitup.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/modernizr.custom.js"></script>
        <script type="text/javascript" src="js/jquery.bxslider.js"></script>
        <script type="text/javascript" src="js/jquery.cslider.js"></script>
        <script type="text/javascript" src="js/jquery.placeholder.js"></script>
        <script type="text/javascript" src="js/jquery.inview.js"></script>
        <!-- Load google maps api and call initializeMap function defined in app.js -->
        <!-- // <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&amp;callback=initializeMap"></script> -->
        <!-- css3-mediaqueries.js for IE8 or older -->
        <!--[if lt IE 9]>
            <script src="js/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript" src="js/app.js"></script>
    </body>
</html>