<?php

require_once "config-url.php";
session_start();

if (!isset($_SESSION["admin_username"])) {
    header("Location: " . BASE_URL . "admin-login.php?error=access_denied");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <link href="css/selection.css"
          rel="stylesheet">
    <link href="css/soccer.css"
          rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp"
          crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Simcoe Soccer Home Page</title>
</head>
<style>
    .linkchange {
        color: white;
    }

    .contacttext {
        color: black;
    }

    .contactalert {
        background-color: white;
        border-style: solid;
        border-color: darkblue;
        border-radius: 20px;
        padding: 3% 5%;
        margin: 1% 5%;
    }
</style>

<body>

    <?php
    require_once("php/admin-header.php");
    ?>

    <!--topblurb-->
    <img src="images/playersjumbo.jpg"
         style="width: 100%;">
    <div style="text-align: center; margin-top: 1%;">
        <h1>PLAYERS</h1>
        <div class="container-fluid px-2">
            <h5>The year of birth determines what age group your child will play in dates start January 1st to December
                31st of year of birth.</h5>
            <ul style="list-style-type: none;">
                <li>Youngest players start at 4 years old can play in <strong>LTPD</strong> (Long Term Player
                    Development) until player reaches 9 years old after which they move into Youth Soccer at age of 10
                    years and older. </li>
                <li>Division 11 is age 10 & 11 for both boys and girls</li>
                <li>Division 13 is age 12 & 13 for both boys and girls. </li>
                <li>Division 18 year age 14, 15, 16, 17 & 18 for both boys and girls. </li>
                <li>Womens Division for female players 19+</li>

            </ul>
            <div class="container-fluid">
                <div class="alert alert-primary p-2 mx-1">
                    <h6 class="container-fluid"
                        style="text-align: center;"><b>DIVISIONS</b></h6>
                    <h6 style="text-align: center;">All our players 9 or under play <b>LTPD</b>
                        <small>(Long Term Player Development)</small>
                        <br>
                        Side sizes vary:<br> 3 v 3, 5 v 5, 7 v 7 or 9 v 9 a side depending on age group.
                        <h6 class="container-fluid"
                            style="text-align: center;"><b>OVER 11 BOYS AND GIRLS DIVISIONS</b></h6>
                        <h6>Players once they reach 11 years of age or older, play 11 v 11 and play either in a boys or
                            girls division
                        </h6>
                </div>
            </div>
            <div class="container-fluid px-1">
                <div class="row">
                    <div class="col-sm-12 col-lg-6 p-1">
                        <h3>UNIFORMS</h3>
                        Everyone gets a team shirt, shorts and sox.<br>
                        <img src="images/kit.jpg"
                             style="width: 60%;">
                        <p>All you need are shinguard and cleats.</p>
                        <img src="images/shoeshin.jpg"
                             style="width: 60%;">
                        <h5 style="color: blue;">ALL PLAYERS ABOVE 5 MUST HAVE CLEATS AND SHINPADS </h5>

                    </div>
                    <div class="col-sm-12 col-lg-6 p-4">
                        <div class="col">
                            <h3>YOUR COACH</h3>
                            <p style="text-align: left; padding: 0% 5%;">On your first day at the field you will pick up
                                your kit and meet the coach and teammates.
                                Make sure you get a chance to talk with the coach and get to know him. If you can help
                                out at practice or games let him know. </p>
                            <img src="images/coachessquare.jpg"
                                 style="width: 50%; padding: 5%;">
                            <p style="text-align: left;">Also please make sure that team members are on time and ready
                                to go with all of the necessary kit. Remember our staff is volunteer and deserve our
                                respect at all times. We are dedicated to keeping every one safe and happy.</p>
                            </p>
                        </div>
                    </div>
                </div>
                <!--Rowans Law-->
                <hr style="width: 100%; color: blue; text-align: center;">
                <div class="row">
                    <div class="col-sm-12 col-lg-6 px-4">
                        <h3>Rowans Law</h3>
                        <h6>Concussion Awareness Resources</h6>
                        <p small
                           style="text-align: left;">Learn about the Concussion Awareness Resources that amateur
                            athletes, parents, coaches, team trainers and officials are required to review.
                        </p>
                    </div>
                    <div class="col-sm-12 col-lg-6 px-4"
                         style="text-align: center;"><a
                           href="https://www.ontario.ca/page/rowans-law-concussion-awareness-resources"><img
                                 src="images/brainball.jpg"
                                 width="60%"><br>More Information on Rowans Law</a></div>
                </div>
                <hr style="width: 100%; color: blue; text-align: center;">
                <div class="row p-3">
                    <div class="col-sm-12 col-lg-6 p-1 bg-primary text-white p-2"
                         style="text-align: center;"> At The AUD <img src="images/aud.jpg"
                             style="width: 100%; height: auto; padding-top: 1%;"><b>Fairgrounds in Simcoe</b>
                    </div>
                    <div class="col-sm-12 col-lg-6 bg-dark text-white py-3">
                        <h3>INDOOR SOCCER</h3>
                        <h6>Registration starts on October 1st and the season is from the end of November through end of
                            March.</h6>
                        <h6>U10, U13 & U18 mixed gender</h6>
                    </div>
                </div>
            </div>
        </div>
        <!--infowrapper-->
        <div class="wrapper">

        </div>
        <!--Footer-->
        <a id="footer"></a>
        <div class="container-fluid bg-primary text-center"
             style="width: 100%; padding: 3% 5%;">
            <div class="contactalert">
                <div class="row">
                    <div class="col-sm-12 p-2">
                        <h3 style="color: black ;">Contact Us</h3>
                        <div class="container-fluid"><iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d17894.89103267856!2d-80.34367718384985!3d42.82865397385058!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882c4c3f274267a5%3A0x1068c11fe4ce3ea9!2sNorfolk%20County%20Youth%20Soccer%20Park!5e0!3m2!1sen!2sca!4v1682873399185!5m2!1sen!2sca"
                                    width="80%"
                                    height="auto"
                                    style="border:0;"
                                    allowfullscreen=""
                                    loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    <div class="col pt-2"
                         style="text-align: center; line-height: 2.; color: black;">
                        <p class="contacttext">
                            MAIL<br>Club Manager PO Box 1012<br>Simcoe, ON N3Y 5B3
                            <hr style="color: blue;">
                            PRESIDENT: <a href="mailto:president@simcoesoccer.ca">Brian Suggett</a> <br>
                            MANAGER: <a href="mailto:clubmanager@simcoesoccer.ca">Bev Suggett </a><br>
                            REFEREES: <a href="mailto:joe.estrela@hotmail.com">Joe Estrela</a> <br>
                            E TRANSFERS: </a>sdysc.treasurer@gmail.com</a>
                        </p>
                        <small><a href="http://www.businesslore.com"
                               style="text-decoration: none; ">- CREATED BY BUSINESSLORE - </a></small>
                    </div>
                </div>
            </div>
            <div class="linkchange"
                 style="text-align: center;">
                <small><a href="http://www.businesslore.com">- CREATED BY BUSINESSLORE - </a></small>
            </div>
        </div>

        <script>
            // When the user scrolls down 20px from the top of the document, slide down the navbar
            window.onscroll = function () { scrollFunction() };

            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    document.getElementById("navbar").style.top = "0";
                } else {
                    document.getElementById("navbar").style.top = "-50px";
                }
            }
        </script>
</body>

</html>