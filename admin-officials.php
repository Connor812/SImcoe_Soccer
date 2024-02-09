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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/selection.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Officials</title>
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
    <?php require_once("php/admin-header.php") ?>
    <!--topblurb-->
    <img src="images/officaljumbo.png" style="width: 100%;">
    <h1 style="text-align: center; padding: 1% 0%;">Officials</h1>
    <p style="text-align: center; padding: 0% 5%"> The referees and linesmen are an essential part of the game. Even
        though the basic rules of soccer are simple there are rules that make the game safe and exciting. Keeping a
        sharp eye on the players and working as a team with the linesmen the referee assures fairness and equality on
        the field.
    </p>
    <div class="row px-5">
        <div class="col-sm-4 col-lg-3 p-1" style="text-align: center;"><img src="images/norefnogame.jpg"
                style="width: 90%;"><img src="images/yellotokid.jpg"
                style="width: 90%; margin-top: 10%; margin-bottom: 5%;"> </div>
        <div class="col-sm-8 col-lg-9 px-4" style="text-align: center;">
            <h5 style="color: blue;">Keeping the play fair and promoting good sportsmanship are the goals of our
                officials</h5>
            <ul style="text-align: left; padding-left: 5%;">
                <hr style="color: blue;">
                <li><small>Be an important part of the game and the club.</small></li>
                <li><small>Learn the value of teamwork, authority, decision making and responsibility.</small></li>
                <li><small>Education, training and mentorships provided.</small></li>
                <li><small>Become Ontario Soccer or Canadian Soccer certified.</small></li>
                <li><small>Generous fees paid monthly.</small></li>
                <li><small>Work matches according to your availability, skill and
                        comfort level.</small></li>
                <li><small>Enjoy the benefits of the exercise.</small></li>
                <li><small>Have fun in another aspect of the sport you enjoy!</small></li>
                <li><small>Indoor season and Outdoor season available</small></li>
                <li><small>To become an official with SDYSC contact: Joe Estrela email: joe.estrela@hotmail.com</small>
                </li>
            </ul>
        </div>
    </div>
    <div class="container-fluid" style="text-align: center;">
        <hr style="color: blue;">
        <a href="files/2023constitution.pdf"><button type="button" class="btn btn-primary m-1" data-bs-toggle="collapse"
                data-bs-target="#demo1">2023 Rules and Constitution</button></a>

        <hr style="color: blue;">
    </div>

    <!--buttons-->
    <div class="container-fluid" style="text-align: center;">
        <h5>Division buttons show an outline of game at each age. </h5>
        <p><small>Field size, number of players and rules... etc.</small></p>
    </div>
    <div class="container p-3" style="text-align: center;">
        <button type="button" class="btn btn-primary m-1" data-bs-toggle="collapse" data-bs-target="#demo1">U4
            DIVISION</button>
        <div id="demo1" class="collapse">
            <hr>
            U4 PLAY 3 aside (3 v 3) No goalkeeper.<br>
            Players have a 15-minute practice.<br>
            5-minute break<br>
            2 x 10-minute game with a 5-minute half time break.<br>
            No offside, all free kicks are indirect and kick in only. No refs, a coach from each team can be on field
            with players.<br>
            Last game of season they will have a Fun Day.<br>
            <hr>
        </div>
        <button type="button" class="btn btn-primary m-1" data-bs-toggle="collapse" data-bs-target="#demo2">U5 & U6
            DIVISION</button>
        <div id="demo2" class="collapse">
            <hr>
            U5 & U6 PLAY 5 aside (5 v 5) with a goalkeeper.<br>
            Players have a 15-minute practice.<br>
            5-minute break<br>
            2 x 15-minute game with a 5-minute half time break.<br>
            No offside, all free kicks are indirect, kick in only. All attacking players must retreat to centre retreat
            line once goalkeeper has ball. Attacking team can move forward once ball has been played by goalie. No refs,
            a coach from each team can be on field with players. Only one coach will ref a half a game.<br>
            Total 55 minutes<br>
            Last game of season they will have a Fun Day<br>
            Thunder and lightening the games must stop and players must leave the field of play. If you see
            thunder/lightening and have no refs Coaches, please call the game and get players to safety. If you have an
            Official, please bring to their attention so they can let players know that the game is over and get players
            to safety. If it is only raining, we continue to play game is not stopped.<br>
            If we have extreme heat and it is over 30 degrees water breaks are mandatory for all divisions.<br>
            <hr>
        </div>
        <button type="button" class="btn btn-primary m-1" data-bs-toggle="collapse" data-bs-target="#demo3">U7
            DIVISION</button>
        <div id="demo3" class="collapse">
            <hr>
            U7 PLAY 5 aside (5 v 5) with a goalkeeper.<br>
            No refs except on tournament days<br>
            Players have a practice on a different day to their game night.<br>
            2 x 20-minute game with a 5-minute half time break.<br>
            No offside, all free kicks are indirect, kick in only. All attacking players must retreat to centre retreat
            line once goalkeeper has ball. Attacking team can move forward once ball has been played by goalie. No refs.
            A coach from each team may ref a half a game. Players do not have coaches with them on field of play only as
            a ref.<br>
            Total 45 minutes. The games will have refs for tournament on a Friday and Saturday in June.<br>
            <hr>
        </div>
        <button type="button" class="btn btn-primary m-1" data-bs-toggle="collapse" data-bs-target="#demo3">U8
            DIVISION</button>
        <div id="demo4" class="collapse">
            <hr>
            U8 PLAY 7 aside 7 v 7 with goalkeeper.<br>
            Players have a practice on a different day to their game night.<br>
            2 x 25-minute game with a 5-minute half time break.<br>
            No offside, all free kicks are indirect, kick in only. All attacking players must retreat to retreat line
            once goalie has ball. Attacking team can move forward once ball has been played by goalie. <br>
            Total 55 minutes. Refs for each game. Tournament in June<br>
            <hr>
        </div>
        <button type="button" class="btn btn-primary m-1" data-bs-toggle="collapse" data-bs-target="#demo5">U9
            DIVISION</button>
        <div id="demo5" class="collapse">
            <hr>
            U9 PLAY 9 aside 9 v 9with goalkeeper.<br>
            Players have a practice on a different day to their game night.<br>
            2 x 25-minute game with a 5-minute half time break.<br>
            No offside, all free kicks are indirect, kick in only. All attacking players must retreat to retreat line
            once goalie has ball. Attacking team can move forward once ball has been played by goalie. <br>
            Total 55 minutes. Refs for each game. Tournament in June<br>
            <hr>
        </div>
        <button type="button" class="btn btn-primary m-1" data-bs-toggle="collapse" data-bs-target="#demo6">U11
            DIVISION</button>
        <div id="demo6" class="collapse">
            <hr>
            U11 PLAY 11 aside 11 v 11 FIFA Laws apply.<br>
            2 x 30-minute game with a 5-minute half time break.<br>
            Total 65 minutes. 3 Officials for each game, Tournament in June<br>
            <hr>
        </div>
        <button type="button" class="btn btn-primary m-1" data-bs-toggle="collapse" data-bs-target="#demo7">U13 BOYS,
            U13 GIRLS DIVISION</button>
        <div id="demo7" class="collapse">
            <hr>
            U13, PLAY 11 aside 11 v 11 FIFA Laws apply.<br>
            2 x 35-minute game with a 5-minute half time break.<br>
            Total 75 minutes. 3 Officials for each game, Tournament in June<br>
            <hr>
        </div>
        <button type="button" class="btn btn-primary m-1" data-bs-toggle="collapse" data-bs-target="#demo8">U18 BOYS,
            GIRLS, WOMEN DIVISION</button>
        <div id="demo8" class="collapse">
            <hr>
            U18, Women PLAY 11 aside 11 v 11 FIFA Laws apply.<br>
            2 x 45-minute game with a 5-minute half time break.<br>
            Total 90 minutes. 3 Officials for each game, Tournament in June.<br>
            <hr>
        </div>
        <hr style="color: blue;">
        <!--lower buttonset-->
        <h5>These buttons will show support documents for officials</h5>
        <button type="button" class="btn btn-primary m-1" data-bs-toggle="collapse" data-bs-target="#demo9">Rowans
            Law</button>
        <div id="demo9" class="collapse">
            <hr>
            <a href="/files/rowanslaw.pdf">Link To Rowans Law</a>
            <hr>
        </div>
        <button type="button" class="btn btn-primary m-1" data-bs-toggle="collapse" data-bs-target="#demo10">FIFA
            Rules</button>
        <div id="demo10" class="collapse"><a href="/laws.html"><img src="images/lawslink.jpg"><br>CLICK TO VIEW</a>
            <hr>
        </div>
        <button type="button" class="btn btn-primary m-1" data-bs-toggle="collapse" data-bs-target="#demo11">Offical
            Fees</button>
        <div id="demo11" class="collapse"> <img src="images/officialfees.jpg" width="80%"></div>


        <button type="button" class="btn btn-primary m-1" data-bs-toggle="collapse" data-bs-target="#demo12">Park
            Map</button>
        <div id="demo12" class="collapse">
            <hr>
            <img src="images/parkmap.jpg" width="60%">
            <hr>
        </div>
        <button type="button" class="btn btn-primary m-1" data-bs-toggle="collapse" data-bs-target="#demo13">Code of
            Conduct</button>
        <div id="demo13" class="collapse">
            <hr>
            <a href="/files/coachconduct.pdf">Coaches code of conduct</a>
            <hr>
        </div>
    </div>

    </div>
    <!--Footer-->
    <a id="footer"></a>
    <div class="container-fluid bg-primary text-center" style="width: 100%; padding: 3% 5%;">
        <div class="contactalert">
            <div class="row">
                <div class="col-sm-12 p-2">
                    <h3 style="color: black ;">Contact Us</h3>
                    <div class="container-fluid"><iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d17894.89103267856!2d-80.34367718384985!3d42.82865397385058!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882c4c3f274267a5%3A0x1068c11fe4ce3ea9!2sNorfolk%20County%20Youth%20Soccer%20Park!5e0!3m2!1sen!2sca!4v1682873399185!5m2!1sen!2sca"
                            width="80%" height="auto" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col pt-2" style="text-align: center; line-height: 2.; color: black;">
                    <p class="contacttext">
                        MAIL<br>Club Manager PO Box 1012<br>Simcoe, ON N3Y 5B3
                        <hr style="color: blue;">
                        PRESIDENT: <a href="mailto:president@simcoesoccer.ca">Brian Suggett</a> <br>
                        MANAGER: <a href="mailto:clubmanager@simcoesoccer.ca">Bev Suggett </a><br>
                        REFEREES: <a href="mailto:joe.estrela@hotmail.com">Joe Estrela</a> <br>
                        E TRANSFERS: </a>sdysc.treasurer@gmail.com</a>
                    </p>
                    <small><a href="http://www.businesslore.com" style="text-decoration: none; ">- CREATED BY
                            BUSINESSLORE - </a></small>
                </div>
            </div>
        </div>
        <div class="linkchange" style="text-align: center;">
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