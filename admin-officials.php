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
    <link href="css/admin.css"
          rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp"
          crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
            integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
            crossorigin="anonymous"></script>
    <!--  Tiny Cloud Text Area Script -->
    <script src="https://cdn.tiny.cloud/1/zhb46ft1zqpmyb99d0lz5r1e5zt4nip43uccz5hw15w7voz0/tinymce/6/tinymce.min.js"
            referrerpolicy="origin"></script>

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
    <?php
    require_once("php/admin-header.php");
    require_once("admin-functions/error-handlers.php");
    require_once("db/db_config.php");
    ?>
    <!-- initialize the textarea -->
    <script>
        tinymce.init({
            selector: '.textarea',
            plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons link lists searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [
                { value: 'First.Name', title: 'First Name' },
                { value: 'Email', title: 'Email' },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
        });
    </script>


    <!--topblurb-->
    <img src="images/officaljumbo.png"
         style="width: 100%;">
    <h1 style="text-align: center; padding: 1% 0%;">Officials</h1>
    <p style="text-align: center; padding: 0% 5%"> The referees and linesmen are an essential part of the game. Even
        though the basic rules of soccer are simple there are rules that make the game safe and exciting. Keeping a
        sharp eye on the players and working as a team with the linesmen the referee assures fairness and equality on
        the field.
    </p>
    <div class="row px-5">
        <div class="col-sm-4 col-lg-3 p-1"
             style="text-align: center;"><img src="images/norefnogame.jpg"
                 style="width: 90%;"><img src="images/yellotokid.jpg"
                 style="width: 90%; margin-top: 10%; margin-bottom: 5%;"> </div>
        <div class="col-sm-8 col-lg-9 px-4"
             style="text-align: center;">
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
    <div class="container-fluid"
         style="text-align: center;">
        <hr style="color: blue;">
        <?php
        $sql = "SELECT * FROM `rules_regulations` WHERE id = 1;";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $link_rules_pdf = $row["link_rules_pdf"];
                $link_rules_text = $row["link_rules_text"];

                ?>
                <a href="files/<?php echo $link_rules_pdf ?>"><button type="button"
                            class="btn btn-primary m-1"
                            data-bs-toggle="collapse"
                            data-bs-target="#demo1">
                        <?php echo $link_rules_text ?>
                    </button></a>
                <div>
                    <a class="btn btn-success"
                       href="<?php echo BASE_URL . "admin.php#rules_regulations-section" ?>">Edit</a>
                </div>
                <?php

            }
        } else {
            // ! No data found
            echo "Error No pdf found";
        }
        ?>

        <hr style="color: blue;">
    </div>

    <!--buttons-->
    <div class="container-fluid"
         style="text-align: center;">
        <h5>Division buttons show an outline of game at each age. </h5>
        <p><small>Field size, number of players and rules... etc.</small></p>
    </div>

    <div class="container p-3"
         style="text-align: center;">
        <?php

        require_once("db/db_config.php");

        $sql = "SELECT * FROM `divisions` WHERE `id` = 1;";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                $u4_text = $row["u4"];
                $u5_text = $row["u5"];
                $u7_text = $row["u7"];
                $u8_text = $row["u8"];
                $u9_text = $row["u9"];
                $u11_text = $row["u11"];
                $u13_text = $row["u13"];
                $u18_text = $row["u18"];

                ?>

                <!-- // ^ Button For U4 -->
                <button type="button"
                        class="btn btn-primary m-1"
                        data-bs-toggle="collapse"
                        data-bs-target="#demo1">U4
                    DIVISION</button>

                <!-- // ^ Drop Down For U4 -->
                <div id="demo1"
                     class="collapse">
                    <hr>
                    <?php echo $u4_text ?>
                    <form method="post"
                          action="admin-functions/update-division.php">
                        <h3 class="text-start">Edit Text</h3>
                        <div class="shadow">

                            <textarea name="u4"
                                      class="textarea "
                                      cols="30"
                                      rows="10"><?php echo $u4_text ?></textarea>
                        </div>
                        <button class="btn btn-success m-3"
                                type="submit">Save Changes</button>
                    </form>

                    <hr>
                </div>

                <!-- // # Button for U5 -->
                <button type="button"
                        class="btn btn-primary m-1"
                        data-bs-toggle="collapse"
                        data-bs-target="#demo2">U5 & U6
                    DIVISION</button>

                <!-- // # Drop Down for U5 -->
                <div id="demo2"
                     class="collapse">
                    <hr>
                    <?php echo $u5_text ?>
                    <hr>
                    <form method="post"
                          action="admin-functions/update-division.php">
                        <h3 class="text-start">Edit Text</h3>
                        <div class="shadow">

                            <textarea name="u5"
                                      class="textarea "
                                      cols="30"
                                      rows="10"><?php echo $u5_text ?></textarea>
                        </div>
                        <button class="btn btn-success m-3"
                                type="submit">Save Changes</button>
                    </form>
                </div>

                <!-- // $ Button For U7 -->
                <button type="button"
                        class="btn btn-primary m-1"
                        data-bs-toggle="collapse"
                        data-bs-target="#demo3">U7
                    DIVISION</button>

                <!-- // $ Drop Down For U7 -->
                <div id="demo3"
                     class="collapse">
                    <hr>
                    <?php echo $u7_text ?>
                    <hr>
                    <form method="post"
                          action="admin-functions/update-division.php">
                        <h3 class="text-start">Edit Text</h3>
                        <div class="shadow">

                            <textarea name="u7"
                                      class="textarea "
                                      cols="30"
                                      rows="10"><?php echo $u7_text ?></textarea>
                        </div>
                        <button class="btn btn-success m-3"
                                type="submit">Save Changes</button>
                    </form>
                </div>

                <!-- // % Button For U8 -->
                <button type="button"
                        class="btn btn-primary m-1"
                        data-bs-toggle="collapse"
                        data-bs-target="#demo3">U8
                    DIVISION</button>

                <!-- // % Drop Down For U8 -->
                <div id="demo4"
                     class="collapse">
                    <hr>
                    <?php echo $u8_text ?>
                    <hr>
                    <form method="post"
                          action="admin-functions/update-division.php">
                        <h3 class="text-start">Edit Text</h3>
                        <div class="shadow">

                            <textarea name="u8"
                                      class="textarea "
                                      cols="30"
                                      rows="10"><?php echo $u8_text ?></textarea>
                        </div>
                        <button class="btn btn-success m-3"
                                type="submit">Save Changes</button>
                    </form>
                </div>

                <!-- // & Button For U9 -->
                <button type="button"
                        class="btn btn-primary m-1"
                        data-bs-toggle="collapse"
                        data-bs-target="#demo5">U9
                    DIVISION</button>

                <!-- // & Drop Down for U9 -->
                <div id="demo5"
                     class="collapse">
                    <hr>
                    <?php echo $u9_text ?>
                    <hr>
                    <form method="post"
                          action="admin-functions/update-division.php">
                        <h3 class="text-start">Edit Text</h3>
                        <div class="shadow">

                            <textarea name="u9"
                                      class="textarea "
                                      cols="30"
                                      rows="10"><?php echo $u9_text ?></textarea>
                        </div>
                        <button class="btn btn-success m-3"
                                type="submit">Save Changes</button>
                    </form>
                </div>

                <!-- // @ Button For U11 -->
                <button type="button"
                        class="btn btn-primary m-1"
                        data-bs-toggle="collapse"
                        data-bs-target="#demo6">U11
                    DIVISION</button>

                <!-- // @ Drop Down For U11 -->
                <div id="demo6"
                     class="collapse">
                    <hr>
                    <?php echo $u11_text ?>
                    <hr>
                    <form method="post"
                          action="admin-functions/update-division.php">
                        <h3 class="text-start">Edit Text</h3>
                        <div class="shadow">

                            <textarea name="u11"
                                      class="textarea "
                                      cols="30"
                                      rows="10"><?php echo $u11_text ?></textarea>
                        </div>
                        <button class="btn btn-success m-3"
                                type="submit">Save Changes</button>
                    </form>
                </div>

                <!-- // ! Button For u13 -->
                <button type="button"
                        class="btn btn-primary m-1"
                        data-bs-toggle="collapse"
                        data-bs-target="#demo7">U13 BOYS,
                    U13 GIRLS DIVISION</button>

                <!-- // ! Drop Down For u13 -->
                <div id="demo7"
                     class="collapse">
                    <hr>
                    <?php echo $u13_text ?>
                    <hr>
                    <form method="post"
                          action="admin-functions/update-division.php">
                        <h3 class="text-start">Edit Text</h3>
                        <div class="shadow">

                            <textarea name="u13"
                                      class="textarea "
                                      cols="30"
                                      rows="10"><?php echo $u13_text ?></textarea>
                        </div>
                        <button class="btn btn-success m-3"
                                type="submit">Save Changes</button>
                    </form>
                </div>

                <!-- // # Button For U18 -->
                <button type="button"
                        class="btn btn-primary m-1"
                        data-bs-toggle="collapse"
                        data-bs-target="#demo8">U18 BOYS,
                    GIRLS, WOMEN DIVISION</button>

                <!-- // # Drop Down For U18 -->
                <div id="demo8"
                     class="collapse">
                    <hr>
                    <?php echo $u18_text ?>
                    <hr>
                    <form method="post"
                          action="admin-functions/update-division.php">
                        <h3 class="text-start">Edit Text</h3>
                        <div class="shadow">

                            <textarea name="u18"
                                      class="textarea "
                                      cols="30"
                                      rows="10"><?php echo $u18_text ?></textarea>
                        </div>
                        <button class="btn btn-success m-3"
                                type="submit">Save Changes</button>
                    </form>
                </div>



                <?php

            }
        } else {
            // ! No data found
        }

        ?>








        <hr style="color: blue;">
        <!--lower buttonset-->
        <h5>These buttons will show support documents for officials</h5>
        <button type="button"
                class="btn btn-primary m-1"
                data-bs-toggle="collapse"
                data-bs-target="#demo9">Rowans
            Law</button>
        <div id="demo9"
             class="collapse">
            <hr>
            <a href="/files/rowanslaw.pdf">Link To Rowans Law</a>
            <hr>
        </div>
        <button type="button"
                class="btn btn-primary m-1"
                data-bs-toggle="collapse"
                data-bs-target="#demo10">FIFA
            Rules</button>
        <div id="demo10"
             class="collapse"><a href="/laws.html"><img src="images/lawslink.jpg"><br>CLICK TO VIEW</a>
            <hr>
        </div>
        <button type="button"
                class="btn btn-primary m-1"
                data-bs-toggle="collapse"
                data-bs-target="#demo11">Offical
            Fees</button>
        <div id="demo11"
             class="collapse"> <img src="images/officialfees.jpg"
                 width="80%"></div>


        <button type="button"
                class="btn btn-primary m-1"
                data-bs-toggle="collapse"
                data-bs-target="#demo12">Park
            Map</button>
        <div id="demo12"
             class="collapse">
            <hr>
            <img src="images/parkmap.jpg"
                 width="60%">
            <hr>
        </div>
        <button type="button"
                class="btn btn-primary m-1"
                data-bs-toggle="collapse"
                data-bs-target="#demo13">Code of
            Conduct</button>
        <div id="demo13"
             class="collapse">
            <hr>
            <a href="/files/coachconduct.pdf">Coaches code of conduct</a>
            <hr>
        </div>
    </div>

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
                           style="text-decoration: none; ">- CREATED BY
                            BUSINESSLORE - </a></small>
                </div>
            </div>
        </div>
        <div class="linkchange"
             style="text-align: center;">
            <small><a href="http://www.businesslore.com">- CREATED BY BUSINESSLORE - </a></small>
        </div>
    </div>

    <script src="js/admin.js"></script>

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