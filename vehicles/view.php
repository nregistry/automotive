<?php require_once('../init/initialization.php');
$url = base_url();
if (!$_GET['vehicle']) {
    redirect_to($url);
}
$vaehicle_id = htmlentities($_GET['vehicle']);
$vehicles = new Vehicles();
$current_vehicle = $vehicles->find_by_id($vaehicle_id);
if (!$current_vehicle) {
    redirect_to($url);
}
$status = 'ACTIVE';
?>
<!doctype html>
<html lang="en">

<head>
    <title>Automotive &mdash; System helps view members and vehicles</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo public_url(); ?>front/fonts/icomoon/style.css">
    <link rel="stylesheet" href="<?php echo public_url(); ?>front/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo public_url(); ?>front/css/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo public_url(); ?>front/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo public_url(); ?>front/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo public_url(); ?>front/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo public_url(); ?>front/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="<?php echo public_url(); ?>front/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo public_url(); ?>front/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="<?php echo public_url(); ?>front/css/aos.css">
    <link rel="stylesheet" href="<?php echo public_url(); ?>front/css/style.css">
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <div class="site-wrap">
        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>

        <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-6 col-xl-2">
                        <h1 class="mb-0 site-logo">
                            <a href="index.html" class="h2 mb-0">Automotive<span class="text-primary">.</span> </a>
                        </h1>
                    </div>
                    <div class="col-12 col-md-10 d-none d-xl-block">
                        <nav class="site-navigation position-relative text-right" role="navigation">
                            <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                                <li><a href="#home-section" class="nav-link">Home</a></li>
                                <li><a href="#about-section" class="nav-link">About Us</a></li>
                                <li><a href="#portfolio-section" class="nav-link">Vehicles</a></li>
                                <li><a href="#contact-section" class="nav-link">Contact</a></li>
                                <li><a href="<?php echo base_url(); ?>admin/login.php" class="nav-link btn btn-primary">Admin Sign In</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h3"></span></a></div>
                </div>
            </div>
        </header>

        <div class="site-blocks-cover overlay" style="background-image: url(<?php echo public_url(); ?>storage/images/hero_2.jpg);" data-aos="fade" id="home-section">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-8 mt-lg-5 text-center">
                        <h1 class="text-uppercase" data-aos="fade-up"><?php echo htmlentities($current_vehicle['vin_number']); ?></h1>
                        <p class="mb-5 desc" data-aos="fade-up" data-aos-delay="100">Profile.</p>
                        <div data-aos="fade-up" data-aos-delay="100">
                            <a href="<?php echo base_url(); ?>members/login.php" class="btn smoothscroll btn-primary mr-2 mb-2">Members Sign In</a>
                            <a href="<?php echo base_url(); ?>members/register.php" class="btn smoothscroll btn-success mr-2 mb-2">Members Sign Up</a>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#about-section" class="mouse smoothscroll">
                <span class="mouse-icon">
                    <span class="mouse-wheel"></span>
                </span>
            </a>
        </div>

        <div class="site-section cta-big-image" id="about-section">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-12 text-center" data-aos="fade">
                        <h2 class="section-title mb-3">About <?php echo htmlentities($current_vehicle['vin_number']) ?></h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 mb-5" data-aos="fade-up" data-aos-delay="">
                        <figure class="circle-bg">
                            <img src="<?php echo public_url(); ?>storage/vehicles/<?php echo htmlentities($current_vehicle['profile']); ?>" alt="Image" class="img-fluid">
                        </figure>
                    </div>
                    <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="100">
                        <div class="mb-4">
                            <h3 class="h3 mb-4 text-black">Vehicle Details</h3>
                            <p>properties of the current selected vehicle include..</p>
                        </div>
                        <div class="mb-4 table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Vin Number</th>
                                        <td><?php echo htmlentities($current_vehicle['vin_number']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Production Date</th>
                                        <td><?php echo htmlentities($current_vehicle['production_date']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Production Year</th>
                                        <td><?php echo htmlentities($current_vehicle['year']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Model</th>
                                        <td><?php echo htmlentities($current_vehicle['model']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Engine</th>
                                        <td><?php echo htmlentities($current_vehicle['engine']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Transmission</th>
                                        <td><?php echo htmlentities($current_vehicle['trans']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Color</th>
                                        <td><?php echo htmlentities($current_vehicle['colors']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Notes</th>
                                        <td><?php echo htmlentities($current_vehicle['notes']); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="site-section" id="portfolio-section">
            <div class="container">
                <div class="row mb-3">
                    <div class="col-12 text-center" data-aos="fade">
                        <h2 class="section-title mb-3">Vehicles Profile</h2>
                    </div>
                </div>
                <div class="row justify-content-center mb-5" data-aos="fade-up">
                    <div id="filters" class="filters text-center button-group col-md-7">
                        <button class="btn btn-primary active" data-filter="*">All</button>
                    </div>
                </div>
                <div id="posts" class="row no-gutter">
                    <?php $active_vehicles = $vehicles->find_all_by_status($status); ?>
                    <?php foreach ($active_vehicles as $car) { ?>
                        <div class="item web col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4">
                            <a href="<?php echo base_url(); ?>vehicles/view.php?vehicle=<?php echo htmlentities($car['id']); ?>" class="item-wrap">
                                <span class="icon-search2"></span>
                                <img class="img-fluid" src="<?php echo public_url(); ?>storage/vehicles/<?php echo htmlentities($car['profile']) ?>">
                            </a>
                            <br>
                            <p><?php echo htmlentities($car['vin_number']) ?></p>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>

        <section class="site-section bg-light" id="contact-section" data-aos="fade">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-12 text-center">
                        <h2 class="section-title mb-3">Contact Us</h2>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-4 text-center">
                        <p class="mb-4">
                            <span class="icon-room d-block h4 text-primary"></span>
                            <span>203 Fake St. Mountain View, San Francisco, California, USA</span>
                        </p>
                    </div>
                    <div class="col-md-4 text-center">
                        <p class="mb-4">
                            <span class="icon-phone d-block h4 text-primary"></span>
                            <a href="#">+1 232 3235 324</a>
                        </p>
                    </div>
                    <div class="col-md-4 text-center">
                        <p class="mb-0">
                            <span class="icon-mail_outline d-block h4 text-primary"></span>
                            <a href="#"><span class="__cf_email__" data-cfemail="6d1402181f08000c04012d0902000c0403430e0200">[email&#160;protected]</span></a>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-5">
                        <form action="#" class="p-5 bg-white">
                            <h2 class="h4 text-black mb-5">Contact Form</h2>
                            <div class="row form-group">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <label class="text-black" for="fname">First Name</label>
                                    <input type="text" id="fname" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="text-black" for="lname">Last Name</label>
                                    <input type="text" id="lname" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="text-black" for="email">Email</label>
                                    <input type="email" id="email" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="text-black" for="subject">Subject</label>
                                    <input type="subject" id="subject" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="text-black" for="message">Message</label>
                                    <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Write your notes or questions here..."></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <input type="submit" value="Send Message" class="btn btn-primary btn-md text-white">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <footer class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-5">
                                <h2 class="footer-heading mb-4">About Us</h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque facere laudantium magnam voluptatum autem. Amet aliquid nesciunt veritatis aliquam.</p>
                            </div>
                            <div class="col-md-3 ml-auto">
                                <h2 class="footer-heading mb-4">Quick Links</h2>
                                <ul class="list-unstyled">
                                    <li><a href="#about-section" class="smoothscroll">About Us</a></li>
                                    <li><a href="#services-section" class="smoothscroll">Services</a></li>
                                    <li><a href="#testimonials-section" class="smoothscroll">Testimonials</a></li>
                                    <li><a href="#contact-section" class="smoothscroll">Contact Us</a></li>
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <h2 class="footer-heading mb-4">Follow Us</h2>
                                <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                                <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                                <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                                <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h2 class="footer-heading mb-4">Subscribe Newsletter</h2>
                        <form action="#" method="post" class="footer-subscribe">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary text-black" type="button" id="button-addon2">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row pt-5 mt-5 text-center">
                    <div class="col-md-12">
                        <div class="border-top pt-5">
                            <p>

                                Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="<?php echo public_url(); ?>front/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo public_url(); ?>front/js/jquery-ui.js"></script>
    <script src="<?php echo public_url(); ?>front/js/popper.min.js"></script>
    <script src="<?php echo public_url(); ?>front/js/bootstrap.min.js"></script>
    <script src="<?php echo public_url(); ?>front/js/owl.carousel.min.js"></script>
    <script src="<?php echo public_url(); ?>front/js/jquery.countdown.min.js"></script>
    <script src="<?php echo public_url(); ?>front/js/jquery.easing.1.3.js"></script>
    <script src="<?php echo public_url(); ?>front/js/aos.js"></script>
    <script src="<?php echo public_url(); ?>front/js/jquery.fancybox.min.js"></script>
    <script src="<?php echo public_url(); ?>front/js/jquery.sticky.js"></script>
    <script src="<?php echo public_url(); ?>front/js/isotope.pkgd.min.js"></script>
    <script src="<?php echo public_url(); ?>front/js/main.js"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
</body>

</html>