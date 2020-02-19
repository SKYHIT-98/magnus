<?php
session_start();

if(empty($_SESSION['username']))
{
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>MAGNUS</title>
    <meta charset="utf-8">
    <link rel='icon' href='images/favicon.png' type='image/x-icon'/ >
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Knewave&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Rammetto+One&display=swap" rel="stylesheet"> 
    <style>
    @font-face {
font-family: "batman" !important;

src: url("fonts/batman.woff") format("woff"); 
}
video {  max-height: -webkit-fill-available;
    padding-top: calc(height/ width * 100%);
}


        .modal-content {
            color: #000;
        }
        #myVideo {
  position: absolute;
  right: 0;
  bottom: 0;
z-index: -1;
-webkit-filter: blur(5px); /* Safari 6.0 - 9.0 */
filter: blur(5px);
}
.noselect {
  -webkit-touch-callout: none; /* iOS Safari */
    -webkit-user-select: none; /* Safari */
     -khtml-user-select: none; /* Konqueror HTML */
       -moz-user-select: none; /* Old versions of Firefox */
        -ms-user-select: none; /* Internet Explorer/Edge */
            user-select: none; /* Non-prefixed version, currently
                                  supported by Chrome, Opera and Firefox */
}
    </style>
</head>

<body>
    <div class="site-wrap">
        <div class="site-mobile-menu">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>
        <header class="site-navbar py-3" role="banner">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-11 col-xl-2">
                        <h1 class="mb-0"><a href="index.html" class="text-white h2 mb-0">Mag<span class="text-primary">nus</span> </a></h1>
                    </div>
                    <div class="col-12 col-md-10 d-none d-xl-block">
                        <nav class="site-navigation position-relative text-right" role="navigation">
                            <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                                <li class="active"><a href="index.php">Home</a></li>
                                <li><a href="events.php">Events</a></li>
                                <li><a href="#chairpersons">Chairpersons</a></li>
                                <li><a href="#contact">Contact Us</a></li>
                                <li class="cta"><a class="btn" data-toggle="modal" data-target="#adminModal" style="cursor: pointer;">Admin</a></li>
                                <li class="cta"><a data-toggle="modal" data-target="#myModal" style="cursor: pointer;">Register</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>
                </div>
            </div>


           




            <div class="modal fade" id="adminModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="adminLogin">Admin Login</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body mx-5 p-5 ">
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" name="login">
                                <?php
                                if ($_SERVER['REQUEST_METHOD'] == "POST") {

                                    $username = $_POST['username'];
                                    $password = $_POST['password'];

                                    include 'database.php';
                                    if (!empty($username) || !empty($password)) {
                                        $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
                                        $res = mysqli_query($conn, $sql);
                                        $count = mysqli_num_rows($res);
                                        if ($count == 0) {
                                            header('location:');
                                        } else {
                                            $_SESSION['username'] = $username;
                                            header("location:admin.php");
                                        }
                                    } else {
                                        $err = "please fill in all the fields";
                                    }
                                }
                                ?>

                                <div class="row form-group">
                                    <label for="username">Username</label>
                                    <input type="text" id="username" name="username" class="form-control">
                                </div>
                                <div class="row form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                                <div class="row form-group">
                                    <button type="submit" name="submit" class="btn btn-primary py-2 px-4 text-white">Login</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Register Yourself</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action='form.php'>
                                <div class="row form-group">
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <label class="" for="fname">Name</label>
                                        <input type="text" id="name" name="name" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="" for="lname">Mobile No.</label>
                                        <input type="text" id="mobile" name="mobile" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">

                                    <div class="col-md-12">
                                        <label class="" for="subject">Event</label>
                                        <input type="text" id="event" name="events" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">

                                    <div class="col-md-12">
                                        <label class="" for="email">Email</label>
                                        <input type="email" id="email" name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label class="" for="subject">College</label>
                                        <input type="text" id="college" name="college" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <input type="submit" name="submit" value="Register" class="btn btn-primary py-2 px-4 text-white">
                                        <!-- <button type="submit" name="submit" class="btn btn-primary py-2 px-4 text-white">Register</button> -->
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer mb-0">
                            <p class="text-danger mb-0 font-weight-bold">Disclaimer: Only college students with valid IDs are allowed to participate.</p>
                        </div>
                    </div>
                </div>  
            </div>
        </header>
    </div>
    <div class="site-section site-hero">
    
<video id="myVideo" autoplay  loop muted playsinline poster="https://uploads-ssl.webflow.com/5b05ed948ee27f736bbe9315/5c010c25f033cc0a5e62dfdc_poster-34.jpg">
  <source src="teaser.mp4" type="video/mp4">
</video>
        <div class="container">
       
            <div class="row " style="width: 100%; align-items: center !important;">
          
                <div class="col-md-12">
              
                <h1 class="d-block mb-4 fest-name noselect" data-aos="fade-up" data-aos-delay="200" style="font-family: 'Rammetto One';">MAGNUS</h1>
                        <span class="d-block mb-5 caption d-flex justify-content-center text-center" data-aos="fade-up" data-aos-delay="300">20<sup>th</sup> - 22<sup>nd</sup> MARCH 2020</span>
                        <h2 class="slogan text-center" href="#" data-aos="fade-up" data-aos-delay="400" style="font-family: 'Knewave', cursive;"> <span>FIRE UP THE
                                RODEO</span></h2>
                </div>
            </div>
        </div>
    </div>


    <div class="site-sectin">

        <div class="p-3 text-secondary" style=" background-color: #333333;">
            <h3 class="d-block text-center">ECHOES OF THE PAST</h3> <br />
            <span class="d-block text-center">
                <h4>GOT GAME? GLORY AWAITS. HUSTLE THE FIRE WITHIN.</h4>
            </span>
        </div>
        <div class="container mt-5" id="event">
            <h2 data-aos="fade-up" data-aos-delay="400"><span>AFTER MOVIE MAGNUS 19</span></h2>
            <iframe width="100%" height="500" src="https://www.youtube.com/embed/KvBm67d0Dx4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>            </div>
        </div>
        <div class="mt-5 hashtag " style="width: 100%;">
                <a href="https://www.instagram.com/explore/tags/fireuptherodeo/" target="_blank" class="float-right fixed-bottom text-right mr-2" style="color: #ff0939; font-size: 1.43rem !important"><strong>#FIREUPTHERODEO</strong></a>
        </div>

    </div>
    <div class="site-section" id="chairpersons">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-lg-4 mb-5">
                    <div class="site-section-heading" data-aos="fade-up">
                        <h2 class="text-center">Chairpersons</h2>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-6 col-lg-4 mb-5 mb-lg-5" data-aos="fade-up" data-aos-delay="100">
                    <div class="testimony text-center">
                        <figure>
                            <img src="images/Gandhi Suryadevara.jpg" alt="Image" class="img-fluid">
                        </figure>
                        <blockquote>
                            <p class="author mb-0">Gandhi Suryadevara</p>
                            <p class="text-muted mb-4">Coordinator</p>

                        </blockquote>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-5 mb-lg-5" data-aos="fade-up" data-aos-delay="200">
                    <div class="testimony text-center">
                        <figure>
                            <img src="images/Jeebitesh Bhattacharya.jpg" alt="Image" class="img-fluid">
                        </figure>
                        <blockquote>
                            <p class="author mb-0">Jeebitesh Bhattacharya</p>
                            <p class="text-muted mb-4">Coordinator</p>

                        </blockquote>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-5 mb-lg-5" data-aos="fade-up" data-aos-delay="300">
                    <div class="testimony text-center">
                        <figure>
                            <img src="images/Parth Sehlot.jpg" alt="Image" class="img-fluid">
                        </figure>
                        <blockquote>
                            <p class="author mb-0">Parth Sehlot</p>
                            <p class="text-muted mb-4">Coordinator</p>

                        </blockquote>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-5 mb-lg-5" data-aos="fade-up" data-aos-delay="400">
                    <div class="testimony text-center">
                        <figure>
                            <img src="images/Menita Khanna.jpg" alt="Image" class="img-fluid">
                        </figure>
                        <blockquote>
                            <p class="author mb-0">Menita Khanna</p>
                            <p class="text-muted mb-4">Coordinator</p>

                        </blockquote>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-5 mb-lg-5" data-aos="fade-up" data-aos-delay="500">
                    <div class="testimony text-center">
                        <figure>
                            <img src="images/user.png" alt="Image" class="img-fluid">
                        </figure>
                        <blockquote>
                            <p class="author mb-0">Person Kumar</p>
                            <p class="text-muted mb-4">Coordinator</p>

                        </blockquote>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-5 mb-lg-5" data-aos="fade-up" data-aos-delay="600">
                    <div class="testimony text-center">
                        <figure>
                            <img src="images/user.png" alt="Image" class="img-fluid">
                        </figure>
                        <blockquote>
                            <p class="author mb-0">Person Thomas</p>
                            <p class="text-muted mb-4">Coordinator</p>

                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class=" aboutus-section site-section pb-0 mt-0" id="about-us">
        <div class="mb-5 text-secondary font-weight-bold" style="background-color:#333333 ;">
            <div class="row col-md-12">
                <div class="col-md-3 m-auto p-5 text-center">
                    <h2 class="mb-0" style="font-size: 1.58rem; font-weight: bold !important">7500+</h2>
                    <h2 style="font-size: 1.58rem; font-weight: bold !important">Football</h2>
                </div>
                <div class="col-md-border"></div>
                <div class="col-md-3 m-auto p-5 text-center">
                    <h2 class="mb-0" style="font-size: 1.58rem; font-weight: bold !important">100 ACRES</h2>
                    <h2 style="font-size: 1.58rem; font-weight: bold !important">OF FESTIVAL</h2>
                </div>
                <div class="col-md-border"></div>
                <div class="col-md-3 m-auto p-5 text-center">
                    <h2 style="font-size: 1.58rem; font-weight: bold !important" class="mb-0 mt-4">ARTIST NIGHTS</h2>
                    <p>LOCAL TRAIN RITVIZ<br /> COKE STUDIO</p>
                </div>
                <div class="col-md-border"></div>
                <div class="col-md-3 p-5 m-auto text-center">
                    <h2 style="font-size: 1.58rem; font-weight: bold !important" class="mb-0">INTERNATIONAL</h2>
                    <h2 style="font-size: 1.58rem; font-weight: bold !important">AUDIENCE</h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mb-5">
                <!-- <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="site-section-heading">
              <h2>Chairpersons</h2>
            </div>
          </div>
          <div class="col-lg-5 mt-5 pl-lg-5" data-aos="fade-up" data-aos-delay="200">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus error deleniti dolores necessitatibus eligendi. Nesciunt repellendus ab voluptatibus. Minima architecto impedit eaque molestiae dicta quam. Cum ducimus. Culpa distinctio aperiam</p>
          </div>
        </div> -->

                <div class="row align-items-center speaker">
                    <div class="col-lg-5 mb-5 mb-lg-0 mt-4" data-aos="fade" data-aos-delay="150">
                        <img src="images/fest-banner.jpg" alt="Image" class="img-fluid mt-5">
                    </div>
                    <div class="col-lg-1 border border-top-0 border-bottom-0 border-left-0 border-danger text-right" data-aos="fade" data-aos-delay="50">
                        <span></span>
                    </div>
                    <div class="col-lg-6 ml-auto">
                        <h1 class="text-white mb-4 text-primary text-lg-left ml-5" data-aos="fade-right" data-aos-delay="250">About Us</h1>
                        <div class="bio pl-lg-5">
                            <p class="mb-4 text-justify" data-aos="fade-right" data-aos-delay="400">Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus error deleniti dolores necessitatibus eligendi. Nesciunt repellendus ab voluptatibus. Minima architecto impedit eaque molestiae dicta quam. Cum ducimus. Culpa
                                distinctio aperiam.Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus error deleniti dolores necessitatibus eligendi. Nesciunt repellendus ab voluptatibus. Minima architecto impedit eaque molestiae dicta
                                quam. Cum ducimus. Culpa distinctio aperiam</p>
                            <p data-aos="fade-right" data-aos-delay="500">
                                <a href="#chairpersons" class="btn-custom" data-aos="fade-up" data-aos-delay="800"><span>Our Team</span></a>

                            </p>
                        </div>
                    </div>
                </div>



            </div>
        </div>

        <div class="site-section py-5" id="sponsors">
            <div class="container-fluid">
                <div class="row mb-5 justify-content-center">
                    <div class="col-lg-8 ">
                        <div class="site-section-heading" data-aos="fade-up">
                            <h2 class="text-center">Few Previous Sponsors</h2>
                        </div>
                    </div>
                </div>
                <div class="row p-5 mb-5 mx-3" style="background-color: #fff;">
                    <div class="col-md-6 col-lg-2 col-sm-6 mb-5 mb-lg-0 spons" data-aos="fade" data-aos-delay="300">
                        <img src="images/jio.png" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-md-6 col-lg-2 mb-5 mb-lg-0 spons" data-aos="fade" data-aos-delay="300">
                        <img src="images/sodexo.png" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-md-6 col-lg-2 mb-5 mb-lg-0 spons" data-aos="fade" data-aos-delay="400">
                        <img src="images/cocacola.png" alt="Image" class="img-fluid">
                    </div>

                    <div class="col-md-6 col-lg-2 mb-5 mb-lg-0 spons" data-aos="fade" data-aos-delay="300">
                        <img src="images/jsw.png" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-md-6 col-lg-2 mb-5 mb-lg-0 spons" data-aos="fade" data-aos-delay="300">
                        <img src="images/vodafone.png" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-md-6 col-lg-2 mb-5 mb-lg-0 spons" data-aos="fade" data-aos-delay="400">
                        <img src="images/tcs.png" alt="Image" class="img-fluid">
                    </div>

                    <div class="col-md-6 col-lg-2 mb-5 mb-lg-0 spons" data-aos="fade" data-aos-delay="300">
                        <img src="images/gail.png" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-md-6 col-lg-2 mb-5 mb-lg-0 spons" data-aos="fade" data-aos-delay="300">
                        <img src="images/saavn.png" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-md-6 col-lg-2 mb-5 mb-lg-0 spons" data-aos="fade" data-aos-delay="400">
                        <img src="images/maruti.png" alt="Image" class="img-fluid">
                    </div>

                    <div class="col-md-6 col-lg-2 mb-5 mb-lg-0 spons" data-aos="fade" data-aos-delay="300">
                        <img src="images/britannica.png" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-md-6 col-lg-2 mb-5 mb-lg-0 spons" data-aos="fade" data-aos-delay="300">
                        <img src="images/oilindia.png" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-md-6 col-lg-2 mb-5 mb-lg-0 spons" data-aos="fade" data-aos-delay="400">
                        <img src="images/collpoll.png" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-md-6 col-lg-2 mb-5 mb-lg-0 spons" data-aos="fade" data-aos-delay="300">
                        <img src="images/career.png" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-md-6 col-lg-2 mb-5 mb-lg-0 spons" data-aos="fade" data-aos-delay="300">
                        <img src="images/boi.png" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-md-6 col-lg-2 mb-5 mb-lg-0 spons" data-aos="fade" data-aos-delay="400">
                        <img src="images/coke.png" alt="Image" class="img-fluid">
                    </div>

                    <div class="col-md-6 col-lg-2 mb-5 mb-lg-0 spons" data-aos="fade" data-aos-delay="300">
                        <img src="images/redbull.png" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-md-6 col-lg-2 mb-5 mb-lg-0 spons" data-aos="fade" data-aos-delay="300">
                        <img src="images/kotak.png" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-md-6 col-lg-2 mb-5 mb-lg-0 spons" data-aos="fade" data-aos-delay="400">
                        <img src="images/monster.png" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-md-6 col-lg-2 mb-5 mb-lg-0 spons" data-aos="fade" data-aos-delay="300">
                        <img src="images/ongc.png" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-md-6 col-lg-2 mb-5 mb-lg-0 spons" data-aos="fade" data-aos-delay="300">
                        <img src="images/cozzet.png" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-md-6 col-lg-2 mb-5 mb-lg-0 spons" data-aos="fade" data-aos-delay="400">
                        <img src="images/gigantic.png" alt="Image" class="img-fluid">
                    </div>

                    <div class="col-md-6 col-lg-2 mb-5 mb-lg-0 spons" data-aos="fade" data-aos-delay="300">
                        <img src="images/paytm.png" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-md-6 col-lg-2 mb-5 mb-lg-0 spons" data-aos="fade" data-aos-delay="300">
                        <img src="images/washex.png" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-md-6 col-lg-2 mb-5 mb-lg-0 spons" data-aos="fade" data-aos-delay="400">
                        <img src="images/indianoil.png" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-md-6 col-lg-2 mb-5 mb-lg-0 spons" data-aos="fade" data-aos-delay="300">
                        <img src="images/icici.png" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-md-6 col-lg-2 mb-5 mb-lg-0 spons" data-aos="fade" data-aos-delay="300">
                        <img src="images/tech.png" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-md-6 col-lg-2 mb-5 mb-lg-0 spons" data-aos="fade" data-aos-delay="400">
                        <img src="images/finolex.png" alt="Image" class="img-fluid">
                    </div>

                    <div class="col-md-6 col-lg-2 mb-5 mb-lg-0 spons" data-aos="fade" data-aos-delay="300">
                        <img src="images/baidya.png" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-md-6 col-lg-2 mb-5 mb-lg-0 spons" data-aos="fade" data-aos-delay="300">
                        <img src="images/wwf.png" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-md-6 col-lg-2 mb-5 mb-lg-0 spons" data-aos="fade" data-aos-delay="400">
                        <img src="images/jal.png" alt="Image" class="img-fluid">
                    </div>
                </div>
                <div class="row" data-aos="fade-up" data-aos-delay="500">
                    <div class="col-12 text-center pt-3 pb-5">
                        <!-- <button type="button" class="btn btn-" data-aos="fade-up" data-aos-delay="800" onclick="document.getElementById('hidep').innerHTML='Thank you for showing interest to be a Sponsor for our fest.\nPlease Reach out to us using this CONTACT US form.'">Be a Sponsor</button> -->
                        <a class="btn-custom" data-aos="fade-up" data-aos-delay="800" data-toggle="modal" data-target="#sponsorModal" style="cursor: pointer;"><span>Be a Sponsor</span></a>
                    </div>
                </div>

                <div class="modal fade" id="sponsorModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body mx-5 p-5 ">
                            <h5>Thank you for showing interest to be a Sponsor for our fest.<br/>Please Reach out to us using this CONTACT US form or using the contact details.</h5>
                        </div>
                    </div>
                </div>
            </div>

            </div>
        </div>
        <div class="site-section py-5" id="contact">
            <p id="hidep" class="mx-auto text-center bg-white text-dark w-75"></p>
            <div class="container">
                <div class="row pb-5">
                    <div class="col-md-6 mt-5" data-aos="fade-up">
                        <form method="POST" action="message.php">
                            <div class="row form-group">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <label class="" for="fname">First Name</label>
                                    <input type="text" id="fname" name="fname" class="form-control bg-white">
                                </div>
                                <div class="col-md-6">
                                    <label class="" for="lname">Last Name</label>
                                    <input type="text" id="lname" name="lname" class="form-control bg-white">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="" for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control bg-white">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="" for="subject">Subject</label>
                                    <input type="subject" id="subject" name="subject" class="form-control bg-white">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="" for="message">Message</label>
                                    <textarea name="message" id="message" name="message" cols="30" rows="4" class="form-control bg-white"></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <input type="submit" value="Get in Touch" name="submit" onclick="mypop()" class="btn btn-primary py-2 px-4 text-white">
                                    <script>
                                        function mypop() {
                                            alert('Thank you for Submitting the details\n We will get back to you at the earliest.')
                                        }
                                    </script>
                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="col-md-5 ml-auto mt-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="p-4 mb-3">
                            <p class="mb-0 font-weight-bold text-secondary text-uppercase mb-3">Address</p>
                            <p class="mb-4"> O.P. Jindal Global University Sonipat, Narela Road Near Jagdishpur village Sonipat, Haryana-131001, NCR of Delhi, India</p>
                            <p class="mb-0 font-weight-bold text-secondary text-uppercase mb-3">Phone</p>
                            <p class="mb-4"><a href="#">+91 7340064244</a></p>
                            <p class="mb-4"><a href="#">+91 8082198981</a></p>
                            <p class="mb-0 font-weight-bold text-secondary text-uppercase mb-3">Email Address</p>
                            <p class="mb-0"><a href="magnus@jgu.edu.in?Subject=Enquiry%20Magnus" target="_top">magnus@jgu.edu.in</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="site-footer pt-5 pb-0">
            <div class="container">
                <div class="row mb-5 ml-5">
                    <div class="col-md-6 mt-3">
                        <h2 class="footer-heading text-uppercase mb-4">About Event</h2>
                        <p>THIS FEST IS CALLED MAGNUS EVENT. THUS MAGNUS IS A FEST.</p>
                    </div>
                    <div class="col-md-3 ml-auto mt-3">
                        <h2 class="footer-heading text-uppercase mb-4">Quick Links</h2>
                        <ul class="list-unstyled">
                            <li><a href="#about-us">About Us</a></li>
                            <li><a href="#chairpersons">Speakers</a></li>
                            <li><a href="#sponsors">Sponsors</a></li>
                            <li><a href="#contact">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 mt-3">
                        <h2 class="footer-heading text-uppercase mb-4">Connect with Us</h2>
                        <p>
                            <a href="https://www.facebook.com/jindalmagnus/" class="p-2" target="_blank"><span class="icon-facebook"></span></a>
                            <a href="" class="p-2" target="_blank"><span class="icon-twitter"></span></a>
                            <a href="https://www.youtube.com/user/jguvideo" class="p-2" target="_blank"><span class="icon-youtube"></span></a>
                            <a href="https://www.instagram.com/magnus.jgu/" class="p-2" target="_blank"><span class="icon-instagram"></span></a>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center text-white-50">
                        <div class="border-top pt-3 mb-2">
                            <p>Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made with <i class="icon-heart text-primary" aria-hidden="true"></i> by <a href="#" target="_blank">SKYHIT </a>& <a href="">MAHI</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
<?php
}
?>