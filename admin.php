<?php

require_once "config-url.php";
session_start();

if (!isset($_SESSION["admin_username"])) {
    header("Location: " . BASE_URL . "admin.php?error=access_denied");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/selection.css" rel="stylesheet">
    <link href="css/admin.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
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

    #sponsor {
        height: auto;
        column-count: 2;
        column-gap: 5px;
        font-size: 1em;
    }
</style>

<?php
require_once("php/admin-header.php");
require_once("db/db_config.php");
require_once("admin-functions/error-handlers.php");
require_once("config-url.php");

?>

<body>
    <div class="wrapper" style="width: 100%;">
        <!--JumboImage-->
        <?php
        $sql = "SELECT *
        FROM `index_page`
        LEFT JOIN `rules_regulations` ON `index_page`.`id` = `rules_regulations`.`id`
        WHERE `index_page`.`id` = 1;";

        $stmt = $conn->prepare($sql);

        // Check if the statement preparation was successful
        if (!$stmt) {
            echo "Error preparing statement: " . $conn->error;
            $conn->close();
            exit;
        }

        $stmt->execute();

        // Check if the statement execution was successful
        if (!$stmt) {
            echo "Error executing statement: " . $stmt->error;
            $stmt->close();
            $conn->close();
            exit;
        }

        // Get the result set
        $result = $stmt->get_result();

        // Fetch the row as an associative array
        $row = $result->fetch_assoc();

        // Check if any rows were returned
        if (!$row) {
            echo "Error With Admin Site.";
        }

        $hero_image = $row["hero_image"];
        $registration_year = $row["registration_year"];
        $registration_start_date = $row["registration_start_date"];
        $registration_btn_status = $row["registration_btn_status"];
        $section_1_heading = $row["section_1_heading"];
        $section_1_text = $row["section_1_text"];
        $registration_info_heading = $row["registration_info_heading"];
        $registration_info_date = $row["registration_info_date"];
        $registration_info_image = $row["registration_info_image"];
        $season_start_date = $row["season_start_date"];
        $u6_start_date = $row["u6_start_date"];
        $field_image = $row["field_image"];
        $card_heading_1 = $row["card_heading_1"];
        $card_text_1 = $row["card_text_1"];
        $card_link_1 = $row["card_link_1"];
        $card_image_1 = $row["card_image_1"];
        $card_heading_2 = $row["card_heading_2"];
        $card_text_2 = $row["card_text_2"];
        $card_link_2 = $row["card_link_2"];
        $card_image_2 = $row["card_image_2"];
        $card_heading_3 = $row["card_heading_3"];
        $card_text_3 = $row["card_text_3"];
        $card_link_3 = $row["card_link_3"];
        $card_image_3 = $row["card_image_3"];
        $card_heading_4 = $row["card_heading_4"];
        $card_text_4 = $row["card_text_4"];
        $card_link_4 = $row["card_link_4"];
        $card_image_4 = $row["card_image_4"];
        $card_heading_5 = $row["card_heading_5"];
        $card_text_5 = $row["card_text_5"];
        $card_link_5 = $row["card_link_5"];
        $card_image_5 = $row["card_image_5"];
        $card_heading_6 = $row["card_heading_6"];
        $card_text_6 = $row["card_text_6"];
        $card_link_6 = $row["card_link_6"];
        $card_image_6 = $row["card_image_6"];
        $link_rules_pdf = $row["link_rules_pdf"];
        $link_rules_text = $row["link_rules_text"];
        $ad_image_1 = $row["ad_image_1"];
        $ad_text_1 = $row["ad_text_1"];
        $ad_link_1 = $row["ad_link_1"];
        $ad_image_2 = $row["ad_image_2"];
        $ad_text_2 = $row["ad_text_2"];
        $ad_link_2 = $row["ad_link_2"];
        $president_name = $row["president_name"];
        $president_email = $row["president_email"];
        $manager_name = $row["manager_name"];
        $manager_email = $row["manager_email"];
        $referees_name = $row["referees_name"];
        $referees_email = $row["referees_email"];
        $e_transfer_email = $row["e_transfer_email"];


        // Close the statement
        $stmt->close();

        ?>
        <img id="hero-img" src="<?php echo empty($hero_image) ? 'images/jumbo1.jpg' : "images/$hero_image"; ?>"
            class="img-fluid" width="100%" alt="50 Years of Soccer">
        <form class="hero-img-container" action="admin-functions/update-hero-img.php" method="post"
            enctype="multipart/form-data">
            <h2>Upload a New Home Page Image</h2>
            <div class="input-group mb-3 hero-img-upload">
                <input type="file" class="form-control" name="hero-img" id="new-hero-img" accept="image/*">
            </div>

            <div id="hero-upload-btn" class="hero-upload-btn">
            </div>
        </form>


        <!--sections-->
        <div class="container-fluid h2 p-2 m-0" style="text-align: center; background-color: blue; color: white;">SIMCOE
            DISTRICT YOUTH SOCCER CLUB</div>
        <div class="container-fluid p-0 m-0" style="width: 100%;">
            <button class="tablink" onclick="openPage('registration', this, 'red')"
                id="defaultOpen">REGISTRATION</button>
            <button class="tablink" onclick="openPage('games', this, 'green')">TODAYS GAMES</button>
            <button class="tablink" onclick="openPage('players', this, 'blue')">PLAYERS &amp; PARENTS</button>
            <button class="tablink" onclick="openPage('coaches', this, 'orange')">COACHES &amp; OFFICIALS</button>
            <!--Registration-->
            <div class="tabcontent p-2" id="registration">
                <div class="row px-5 py-3" style="text-align: center;">
                    <div class="col col-lg-3 col-sm-7 p-0 center">
                        <img src="images/CrestLOGO1.png" width="80%" height="mx-auto">
                    </div>
                    <div class="col">
                        <div style="font-size: 3vw;">
                            <span id="registration-year">
                                <?php echo $registration_year ?>
                            </span><br>
                            <span id="registration-start-date">
                                <?php echo $registration_start_date ?>
                            </span>
                        </div>
                        <div style="font-size: 2.5vw;"> </div>
                        <!--<div style="font-size: 2vw;">ONLY GIRLS U13 and U18 AVAILABLE</div>
                        <div style="font-size: 2vw;">WAITING LIST IS CLOSED</div>-->

                        <hr> <!-- Button to Open the Join Modal -->
                        <form id="registration-date-form" class="registration-date-form" method="post"
                            action="admin-functions/registration-date.php">
                            <input id="registration-year-input" name="registration_year" class="form-control"
                                type="text" value="<?php echo $registration_year ?>">
                            <input id="registration_start_date-input" name="registration_start_date"
                                class="form-control" type="text" value="<?php echo $registration_start_date ?>">
                            <div id="registration-submit-btn-container"></div>
                        </form>

                        <!-- Button to Open the Modal -->
                        <?php
                        if ($registration_btn_status == "closed") {
                            $disabled = 'disabled';
                        } else {
                            $disabled;
                        }
                        ?>
                        <button id="registration-btn" type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#register" <?php echo $disabled ?>>
                            REGISTRATION
                            <?php echo $registration_btn_status ?>
                        </button>

                        <div class="registration-input">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle fs-5" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Select Registration state
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" value="open">Open</a></li>
                                    <li><a class="dropdown-item" value="closed">Closed</a></li>
                                </ul>
                            </div>
                        </div>
                        <div id="registration-state-result-container">

                            <div class="fs-5" id="registration-state-result"></div>

                        </div>
                        <!-- The Register Modal -->
                        <div class="modal" id="register">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title" style="color: blue; text-align: center;">
                                            REGISTRATION
                                            INFORMATION</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <p style="color: black; text-align: left;">We use PowerUp Sports for
                                            registration, just click on the button below and enter your email and
                                            the
                                            password you want to use.</p>
                                        <a href="https://simcoesoccer.powerupsports.com/index.php?page=LOGIN"><img
                                                src="images/powerupscreen.png" class="mx-auto d-block" width="50%"></a>
                                        <br>
                                        <p style="color: black; text-align: center;">Our soccer fields are located
                                            in
                                            Southern Ontario near Lake Erie</p>
                                        <p style="color: black; text-align: center;">If you have any questions
                                            please
                                            contact us: admin@simcoesoccer.com</p>

                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <img src="images/PowerUp_logo.png">
                                        <a href="https://simcoesoccer.powerupsports.com/index.php?page=LOGIN"
                                            class="btn btn-success">CONTINUE TO POWERUP</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Games-->
            <div class="tabcontent p-3" style="text-align: center;" id="games">
                <br>
                <div style="color: white;">
                    <div class="row py-2">
                        <h3 style="text-align: center;">Choose a team</h3>
                        <p><small>PLEASE TURN YOUR PHONE SIDEWAYS</small></p>
                        <div class="col" style="text-align: right;">
                            <p> Division:
                                <select autocomplete="off" id="select1">
                                    <option value="" disabled selected>Select Division</option>
                                    <?php
                                    $sql = "SELECT DISTINCT(division_name) FROM  tableone";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            ?>

                                            <option value="<?php echo $row['division_name']; ?>">
                                                <?php echo $row['division_name']; ?>
                                            </option>
                                            <?php
                                        }
                                    }

                                    ?>
                                </select>
                            </p>
                            <p> Team:
                                <select autocomplete="off" id="select2">
                                    <option value="" disabled selected>Select Team</option>
                                    <?php

                                    $sql = "SELECT home_team_name, away_team_name FROM tableone";
                                    $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                            <option value="<?php echo $row['home_team_name']; ?>">
                                                <?php echo $row['home_team_name']; ?>
                                            </option>
                                            <option value="<?php echo $row['away_team_name']; ?>">
                                                <?php echo $row['away_team_name']; ?>
                                            </option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </p>
                        </div>
                        <div class="col" style="text-align: left;">
                            <p><span class="output"></span></p>
                            <input type="submit" name="submit" id="submit" value="SHOW GAMES" />
                            <div></div>
                            <input type="submit" name="reset" id="reset" value="Reset" />
                        </div>
                    </div>


                    <div class="alert alert-success p-1">
                        <div class="container mt-1 p-1" style="width: 100%; height:auto;">
                            <table class="table table-bordered" style="width: 100%; height:auto;">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Field</th>
                                        <th>Opposition</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody class="test">
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col"><button type="button" class="btn btn-success btn-sm"
                                        data-bs-toggle="modal" data-bs-target="#fieldmap">Map of fields</button>
                                </div>
                                <!--<div class="col"><button class="btn btn-success btn-sm" id="calendar_ics">Add to your calendar</button>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- The FieldMapModal -->
        <div class="modal" id="fieldmap">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 style="text-align: center;">FIELD MAP</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body" style="text-align: center;">
                        <img src="images/<?php echo $field_image ?>" style="width: 90%;">
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!--players-->
        <div class="tabcontent p-5" id="players">
            <div class="row">
                <div class="col p-3">
                    <h3 style="text-align: center;">Players</h3>
                    <div style="border-style: solid; border-radius: 5px; border-color: white; padding: 3%; margin: 3%;">
                        Soccer is all about out players and we are proud to welcome everyone to the pitch. You will
                        meet
                        new friends and have fun learning and playing on your team. Developing skills and working
                        together is a great way to make memories. Our players page will tell you all about our
                        program.
                    </div>
                    <div class="container-fluid" style="text-align: center;">
                        <a href="/players.html"><button type="button" class="btn btn-primary btn-sm">Go To Players
                                Page</button></a>
                    </div>
                    <br><img src="images/kidsrunning.jpg" style="width: 100%">
                </div>
                <div class="col p-3">
                    <h3 style="text-align: center;">Parents</h3>
                    <div style="border-style: solid; border-radius: 5px; border-color: white; padding: 3%; margin: 3%;">
                        Everyone in the family can get involved in the game. We work hard to make sure all of our
                        players have a safe and active environment to learn skills that will last a lifetime. Our
                        parents page will give you the info you need and if you have any questions or suggestions we
                        are
                        there to listen.
                    </div>
                    <div class="container-fluid" style="text-align: center;">
                        <a href="/parents.html"><button type="button" class="btn btn-primary btn-sm">Go To Parents
                                Page</button></a>
                    </div>
                    <br>
                    <img src="images/soccermoms.jpg" style="width: 100%;">
                </div>
                <br>
            </div>
        </div>
        <!--coaches-->
        <div class="tabcontent p-2" id="coaches">
            <div class="row">
                <div class="col p-3">
                    <h3 style="text-align: center;">Coaches</h3>
                    <div style="border-style: solid; border-radius: 5px; border-color: white; padding: 2%; margin: 3%;">
                        Our coaches volunteer their time to in true community spirit. Helping our kids learn the
                        game at
                        every level and showing them by example how to contribute to our community.
                        the coaches page has information about our program.
                        <div class="container-fluid p-3" style="text-align: center;">
                            <a href="/coaches.html"><button type="button" class="btn btn-primary btn-sm">Go To
                                    Coaches
                                    Page</button></a>
                        </div>
                    </div>

                    <br><img src="images/coach.jpg" style="width: 100%">
                </div>
                <div class="col p-3">
                    <h3 style="text-align: center;">Officials</h3>
                    <div style="border-style: solid; border-radius: 5px; border-color: white; padding: 2%; margin: 3%;">
                        Being a good referee is more than blowing a whistle. Keeping things fair and encouraging
                        sportsmanship are a part of the job. You can train to be a ref and officiate games or watch
                        the
                        line and wave the flag at our SDYSC park. Our officials page has more info.
                        <div class="container-fluid p-3" style="text-align: center;">
                            <a href="/officials.html"><button type="button" class="btn btn-primary btn-sm">Go To
                                    Officials Page</button></a>
                        </div>
                    </div><br>
                    <img src="images/referee.jpg" style="width: 100%;">
                </div>
                <br>

            </div>
        </div>
    </div>
    <!--center blurb-->
    <div id="section-1" class="px-5 py-2 my-3 d-flex flex-column justify-content-center align-items-center">
        <h1 id="section-1-heading" class="pb-0">
            <?php echo $section_1_heading ?>
        </h1>
        <div class="col-lg-8 mx-auto">
            <p id="section-1-text" class="lead mb-0 px-2">
                <?php echo $section_1_text ?>
            </p>
        </div>
        <!-- Section 1 Form -->
        <form id="section-1-form" class="section-1-input-container" method="post"
            action="admin-functions/update-section-1.php">
            <h4 for="section-1-heading-input">Heading Text</h4>
            <div class="form-floating">
                <textarea name="section-1-heading" class="form-control" placeholder="Leave a comment here"
                    id="section-1-heading-input" style="height: 100px"><?php echo $section_1_heading ?></textarea>

            </div>
            <h4 for="section-1-text-input">Paragraph Text</h4>
            <div class="form-floating">
                <textarea name="section-1-text" class="form-control" placeholder="Leave a comment here"
                    id="section-1-text-input" style="height: 100px"><?php echo $section_1_text ?></textarea>
            </div>
            <div class="section-1-submit-btn-container d-flex justify-content-center"
                id="section-1-submit-btn-container">
            </div>
        </form>
    </div>
    <div id="registration-info"
        class="bg-dark text-white py-3 d-flex flex-column justify-content-center align-items-center">
        <h3 id="registration-heading">
            <?php echo $registration_info_heading ?>
        </h3>
        <h4 id="registration-date">
            <?php echo $registration_info_date ?>
        </h4>
        <h6>ONLINE REGISTRATION ONLY</h6>

        <!-- Section 1 Form -->
        <div class="registration-container">
            <form id="registration-form" class="registration-form p-4" method="post"
                action="admin-functions/update-registration-date-text.php">
                <h4 for="registration-heading-input">Heading Text</h4>
                <div class="form-floating">

                    <textarea name="registration_info_heading" class="form-control"
                        placeholder="Please Enter New Heading" id="registration-heading-input"
                        style="height: 100px"><?php echo $registration_info_heading ?></textarea>

                </div>
                <h4 for="registration-date-input">Date</h4>
                <div class="form-floating">
                    <textarea name="registration_info_date" class="form-control" placeholder="Enter New Date"
                        id="registration-date-input"
                        style="height: 100px"><?php echo $registration_info_date ?></textarea>
                </div>
                <div class="m-3 registration-submit-btn-container d-flex justify-content-center"
                    id="registration-info-submit-btn-container">
                </div>
            </form>
        </div>

        <img id="registration-info-image"
            src="<?php echo empty($registration_info_image) ? 'images/outdoorseason.png' : "images/$registration_info_image"; ?>"
            style="width: 60%; height:auto;">

        <!-- Upload Registration Info Image -->
        <form class="registration-info-image-input" action="admin-functions/registration-info-image.php" method="post"
            enctype="multipart/form-data">
            <h2>Upload a New Image</h2>
            <div class="input-group mb-3 hero-img-upload">
                <input type="file" class="form-control" name="new-registration-info-image"
                    id="new-registration-info-image" accept="image/*">
            </div>

            <div id="registration-image-upload-btn-container" class="registration-image-upload-btn">
            </div>
        </form>

        <div class="px-5 text-center">
            <p style="text-align: center;"><small>All age groups are set from January to December of year of birth.
                </small>
                <hr>
                Log in or sign up in Power up.
            <p> Make sure you tick opt in so you can receive information on the team and schedules when available.
            <p>
            <form id="season_date" action="admin-functions/season-date.php" class="season-data" method="post">
                <h5 id="season_start_date_text">
                    <?php echo $season_start_date ?>
                </h5><br>
                <textarea name="season_start_date" class="form-control" placeholder="Enter New Date"
                    id="season_start_date_input" style="height: 100px"><?php echo $season_start_date ?></textarea>
                <h5 id="u6_start_date_text">
                    <?php echo $u6_start_date ?>
                </h5><br>
                <textarea name="u6_start_date" class="form-control" placeholder="Enter New Date"
                    id="u6_start_date_input" style="height: 100px"><?php echo $u6_start_date ?></textarea>
                <div id="season_start_date_submit_btn" class="season_start_date_submit_btn m-3"></div>
                <h5>JOIN EARLY!<br>
                </h5>
            </form>
            <p> Once all divisions are full a waiting list will be kept for all divisions, no fee is required to go
                on waiting list.</p>
            </p>
        </div>

    </div>
    <div>
        <div class="row py-3">
            <div class="col-3" style="text-align: right;">
                <img src="images/ball.png" style=" width: 50px; height: auto;">
            </div>
            <div class="col-6">
                <h1 style="text-align:center;">WHERE WE PLAY</h1>
            </div>
            <div class="col-3" style="text-align: left;">
                <img src="images/ball.png" style=" width: 50px; height: auto;">
            </div>
        </div>
        <div class="p-0 m-0"><img src="images/parkpano.jpg" class="img-fluid" style="width: 100%; height:auto"
                alt="..."></div>
    </div>
    <div class="row py-3 px-5">
        <div class="col-4">
            <img src="images/aud2.jpg" class="img-fluid" style="width: 100%; height:auto" alt="...">
        </div>
        <div class="col-4 pt-3" style="text-align: center;">
            <h3>OUTDOOR</h3>
            <p><b>Norfolk County Youth Soccer Fields</b><br>660 West Street, Simcoe ON, N3Y 4K5</p>
            <h3>INDOOR</h3>
            <p><b>The Aud</b><br>172 South Drive, Simcoe On</p>
            <!-- Field Image Upload -->
            <form id="field-image-form" class="" method="post" action="admin-functions/field-image.php"
                enctype="multipart/form-data">
                <h2 class="text-start">Upload New Field Image</h2>
                <input type="file" class="form-control" name="field-image" id="new-field-image" accept="image/*">
                <div id="field-img-submit-container" class="m-4"></div>
            </form>
        </div>

        <div class="col-4">
            <img id="field-image" src="images/<?php echo $field_image ?>" class="img-fluid"
                style="width: 100%; height:auto" alt="...">
        </div>
    </div>
    </div>
    <!--news-->
    <div class="row row-col-3 bg-body-tertiary" style="text-align: center; padding: 1% 5%;">
        <hr style="color: blue;">
        <h1 class="p-0 text-center">CLUB NEWS</h1>
        <hr style="color: blue;">
        <div id="card-section" class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="container-fluid">
                            <img id="card_1_image" src="images/<?php echo $card_image_1 ?>"
                                style="width:100%; height:auto;" alt="">
                        </div>
                        <div class="card-body">
                            <p id="card_1_heading" class="card-text"><b>
                                    <?php echo $card_heading_1 ?>
                                </b></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <ul style="text-align: center; list-style-type: none;">
                                    <small id="card_1_text">
                                        <?php echo $card_text_1 ?>
                                    </small>
                                </ul>
                            </div>
                            <?php if (!empty($card_link_1)) { ?>
                                <div class="d-flex justify-content-start">
                                    <a href="<?php echo $card_link_1 ?>"> <button type="button"
                                            class="btn btn-sm btn-outline-secondary">View</button></a>
                                </div>
                            <?php } ?>
                            <div>
                                <a href="<?php echo BASE_URL ?>admin.php?card=1#card-section"><button type="button"
                                        class="btn btn-sm btn-outline-secondary px-5">Edit</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="container-fluid">
                            <img id="card_2_image" src="images/<?php echo $card_image_2 ?>"
                                style="width:100%; height:auto;" alt="">
                        </div>
                        <div class="card-body">
                            <p id="card_2_heading" class="card-text"><b>
                                    <?php echo $card_heading_2 ?>
                                </b></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <ul style="text-align: center; list-style-type: none;">
                                    <small id="card_2_text">
                                        <?php echo $card_text_2 ?>
                                    </small>
                                </ul>
                            </div>
                            <?php
                            if (!empty($card_link_2)) { ?>
                                <div class="d-flex justify-content-start">
                                    <a href="<?php echo $card_link_2 ?>"> <button type="button"
                                            class="btn btn-sm btn-outline-secondary">View</button></a>
                                </div>
                            <?php } ?>
                            <div>
                                <a href="<?php echo BASE_URL ?>admin.php?card=2#card-section"><button type="button"
                                        class="btn btn-sm btn-outline-secondary px-5">Edit</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="container-fluid">
                            <img id="card_3_image" src="images/<?php echo $card_image_3 ?>"
                                style="width:100%; height:auto;" alt="">
                        </div>
                        <div class="card-body">
                            <p id="card_3_heading" class="card-text"><b>
                                    <?php echo $card_heading_3 ?>
                                </b></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <ul style="text-align: center; list-style-type: none;">
                                    <small id="card_3_text">
                                        <?php echo $card_text_3 ?>
                                    </small>
                                </ul>
                            </div>
                            <?php if (!empty($card_link_3)) { ?>
                                <div class="d-flex justify-content-start">
                                    <a href="<?php echo $card_link_3 ?>"> <button type="button"
                                            class="btn btn-sm btn-outline-secondary">View</button></a>
                                </div>
                            <?php } ?>
                            <div>
                                <a href="<?php echo BASE_URL ?>admin.php?card=3#card-section"><button type="button"
                                        class="btn btn-sm btn-outline-secondary px-5">Edit</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <!--lower News-->
        <div id="card-section" class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="container-fluid">
                            <img id="card_4_image" src="images/<?php echo $card_image_4 ?>"
                                style="width:100%; height:auto;" alt="">
                        </div>
                        <div class="card-body">
                            <p id="card_4_heading" class="card-text"><b>
                                    <?php echo $card_heading_4 ?>
                                </b></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <ul style="text-align: center; list-style-type: none;">
                                    <small id="card_4_text">
                                        <?php echo $card_text_4 ?>
                                    </small>
                                </ul>
                            </div>
                            <?php if (!empty($card_link_4)) { ?>
                                <div class="d-flex justify-content-start">
                                    <a href="<?php echo $card_link_4 ?>"> <button type="button"
                                            class="btn btn-sm btn-outline-secondary">View</button></a>
                                </div>
                            <?php } ?>
                            <div>
                                <a href="<?php echo BASE_URL ?>admin.php?card=4#card-section"><button type="button"
                                        class="btn btn-sm btn-outline-secondary px-5">Edit</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="container-fluid">
                            <img id="card_5_image" src="images/<?php echo $card_image_5 ?>"
                                style="width:100%; height:auto;" alt="">
                        </div>
                        <div class="card-body">
                            <p id="card_5_heading" class="card-text"><b>
                                    <?php echo $card_heading_5 ?>
                                </b></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <ul style="text-align: center; list-style-type: none;">
                                    <small id="card_5_text">
                                        <?php echo $card_text_5 ?>
                                    </small>
                                </ul>
                            </div>
                            <?php
                            if (!empty($card_link_5)) { ?>
                                <div class="d-flex justify-content-start">
                                    <a href="<?php echo $card_link_5 ?>"> <button type="button"
                                            class="btn btn-sm btn-outline-secondary">View</button></a>
                                </div>
                            <?php } ?>
                            <div>
                                <a href="<?php echo BASE_URL ?>admin.php?card=5#card-section"><button type="button"
                                        class="btn btn-sm btn-outline-secondary px-5">Edit</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="container-fluid">
                            <img id="card_6_image" src="images/<?php echo $card_image_6 ?>"
                                style="width:100%; height:auto;" alt="">
                        </div>
                        <div class="card-body">
                            <p id="card_6_heading" class="card-text"><b>
                                    <?php echo $card_heading_6 ?>
                                </b></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <ul style="text-align: center; list-style-type: none;">
                                    <small id="card_6_text">
                                        <?php echo $card_text_6 ?>
                                    </small>
                                </ul>
                            </div>
                            <?php if (!empty($card_link_6)) { ?>
                                <div class="d-flex justify-content-start">
                                    <a href="<?php echo $card_link_6 ?>"> <button type="button"
                                            class="btn btn-sm btn-outline-secondary">View</button></a>
                                </div>
                            <?php } ?>
                            <div>
                                <a href="<?php echo BASE_URL ?>admin.php?card=6#card-section"><button type="button"
                                        class="btn btn-sm btn-outline-secondary px-5">Edit</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="edit-card-section">
            <?php
            if (isset($_GET["card"])) {
                $card_num = $_GET["card"];
                if ($card_num != "1" && $card_num != "2" && $card_num != "3" && $card_num != "4" && $card_num != "5" && $card_num != "6") {
                    echo "invalid card Number";
                } else {
                    if ($card_num == "1") {
                        $card_heading = $card_heading_1;
                        $card_text = $card_text_1;
                        $card_image = $card_image_1;
                        $card_link = $card_link_1;
                    } elseif ($card_num == "2") {
                        $card_heading = $card_heading_2;
                        $card_text = $card_text_2;
                        $card_image = $card_image_2;
                        $card_link = $card_link_2;
                    } elseif ($card_num == "3") {
                        $card_heading = $card_heading_3;
                        $card_text = $card_text_3;
                        $card_image = $card_image_3;
                        $card_link = $card_link_3;
                    } elseif ($card_num == "4") {
                        $card_heading = $card_heading_4;
                        $card_text = $card_text_4;
                        $card_image = $card_image_4;
                        $card_link = $card_link_4;
                    } elseif ($card_num == "5") {
                        $card_heading = $card_heading_5;
                        $card_text = $card_text_5;
                        $card_image = $card_image_5;
                        $card_link = $card_link_5;
                    } elseif ($card_num == "6") {
                        $card_heading = $card_heading_6;
                        $card_text = $card_text_6;
                        $card_image = $card_image_6;
                        $card_link = $card_link_6;
                    }


                    ?>
                    <div id="card_section" card_num="<?php echo $card_num ?>" class="card-edit-section">
                        <form id="card-form" class="card-form" method="post" enctype="multipart/form-data"
                            action="admin-functions/card-section.php?card_num=<?php echo $card_num ?>">
                            <a class="btn btn-danger card-reset-btn" href="<?php echo BASE_URL . "admin-functions/reset-card.php?card_num=$card_num" ?>">Reset Card</a>
                            <h2>Edit Card
                                <?php echo $card_num ?>
                            </h2>
                            <hr>
                            <h3 class="text-start">Card Image</h3>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control mx-4" name="card_image"
                                    id="card_<?php echo $card_num ?>_image_input" accept="image/*">
                                <input type="hidden" value="<?php echo $card_image ?>" name="old_image">
                            </div>
                            <h3 class="text-start">Card Title</h3>
                            <textarea class="form-control mx-4" placeholder="Please Enter Card Title"
                                id="card_<?php echo $card_num ?>_heading_input" name="card_heading"
                                style="height: 100px"><?php echo $card_heading ?></textarea>
                            <h3 class="text-start">Card Text</h3>
                            <textarea class="form-control mx-4" placeholder="Please Enter Card Title"
                                id="card_<?php echo $card_num ?>_text_input" name="card_text"
                                style="height: 100px"><?php echo $card_text ?></textarea>
                            <h3 class="text-start">Card Text</h3>
                            <div class="fs-6 text-start">Optional:</div>
                            <textarea class="form-control mx-4" placeholder="Please Enter Link"
                                id="card_<?php echo $card_num ?>_link" name="card_link"
                                style="height: 100px"><?php echo $card_link ?></textarea>
                            <div id="card-submit-btn-container" class="m-4"></div>
                        </form>
                    </div>
                    <?php
                }
            }

            ?>
        </div>
    </div>
    <div id="rules_regulations-section" class="container-fluid" style="text-align: center;">
        <hr style="color: blue;">
        <a href="files/<?php echo $link_rules_pdf ?>">
            <button id="link-pdf-btn" type="button" class="btn btn-primary m-1" data-bs-toggle="collapse"
                data-bs-target="#demo1">
                <?php echo $link_rules_text ?>
            </button>
        </a>
        <form id="rules-regulations-form" class="regulation-rules-container" method="post" enctype="multipart/form-data"
            action="admin-functions/rules-regulations.php">
            <h3>
                Upload New PDF
            </h3>
            <input type="file" class="form-control regulation-rules-input mx-4" name="rules_regulations_pdf"
                id="rules_regulations_pdf" accept=".pdf">
            <input type="hidden" name="old_pdf" value="<?php echo $link_rules_pdf ?>">
            <h3 class="align-items-start">
                Enter New Text For Button
            </h3>
            <div class="input-group mb-3 regulation-rules-input">
                <input id="link-rules-text" type="text" class="form-control" placeholder="Please Enter Text For Button"
                    aria-label="Example text with button addon" name="link_rules_text" aria-describedby="button-addon1"
                    value="<?php echo $link_rules_text ?>">
            </div>
            <div id="rules-regulations-submit-btn-container">

            </div>
        </form>
        <hr style="color: blue;">
    </div>
    <div id="ad-section" class="row p-3">
        <div class="col-lg-6 col-sm-12 d-flex flex-column justify-content-between">
            <div class="container-fluid" style="text-align: center; width:90%; height:auto">
                <a href="/<?php echo $ad_link_1 ?>" style="width:70%">
                    <img id="ad-image-1" style="width: 350px;" src="images/<?php echo $ad_image_1 ?>">
                </a>
                <br>
                <p id="ad-text-1" style="text-align: center;">
                    <?php echo $ad_text_1 ?>
                </p>
            </div>
            <form id="ad-1-form" class="ad-form" method="post" enctype="multipart/form-data"
                action="admin-functions/ad-1.php">
                <h4>
                    Upload New Image
                </h4>
                <input id="ad-image-1-input" type="file" class="form-control" name="ad_image_1" accept="image/*">
                <input type="hidden" name="old_img" value="<?php echo $ad_image_1 ?>">
                <h4>
                    Upload New Text
                </h4>
                <input id="ad-text-1-input" class="form-control" name="ad_text_1" type="text"
                    placeholder="Please Enter Text For Ad 1" value="<?php echo $ad_text_1 ?>">
                <h4>
                    Upload New Link
                </h4>
                <input id="ad-link-1-input" class="form-control" name="ad_link_1" type="text"
                    placeholder="Please Enter Link For Ad 1" value="<?php echo $ad_link_1 ?>">
                <div id="ad_1_submit_btn_container"></div>
            </form>
        </div>
        <div class="col-lg-6 col-sm-12 d-flex flex-column justify-content-between" id="indoor">
            <div class="container-fluid" style="text-align: center; width:90%; height:auto">
                <a href="/<?php echo $ad_link_2 ?>">
                    <img id="ad-image-2" src="images/<?php echo $ad_image_2 ?>" style="width:80%">
                </a>

                <br>
                <p id="ad-text-2" style="text-align: center;">
                    <?php echo $ad_text_2 ?>
                </p>
            </div>
            <form id="ad-2-form" class="ad-form" method="post" enctype="multipart/form-data"
                action="admin-functions/ad-2.php">
                <h4>
                    Upload New Image
                </h4>
                <input id="ad-image-2-input" type="file" class="form-control" name="ad_image_2" accept="image/*">
                <input type="hidden" name="old_img" value="<?php echo $ad_image_2 ?>">
                <h4>
                    Upload New Text
                </h4>
                <input id="ad-text-2-input" class="form-control" name="ad_text_2" type="text"
                    placeholder="Please Enter Text For Ad 2" value="<?php echo $ad_text_2 ?>">
                <h4>
                    Upload New Link
                </h4>
                <input id="ad-link-2-input" class="form-control" name="ad_link_2" type="text"
                    placeholder="Please Enter Link For Ad 2" value="<?php echo $ad_link_2 ?>">
                <div id="ad_2_submit_btn_container"></div>
            </form>
        </div>
    </div>
    <!--indoor -->
    <div id="sponsors" class="row p-3 mx-5">

        <div style="text-align: center; color:white; background-color:blue;">
            <h1>
                Thanks to our local sponsors who make it all possible
            </h1>
        </div>
        <hr>
        <h3 style="text-align: center;">INDOOR SPONSORS</h3>
        <div class="indoorsponsor bg-white px-4">
            <!-- Button trigger modal -->
            <center>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#indoor-sponsors">
                    Add New Sponsor
                </button>
            </center>

            <!-- Indoor Sponsor Modal -->
            <div class="modal fade" id="indoor-sponsors" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Indoor Sponsor</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="indoor-sponsors" class="" method="post" enctype="multipart/form-data"
                                action="admin-functions/indoor-sponsors.php">
                                <h4>
                                    Upload New Image
                                </h4>
                                <input id="indoor-sponsor-image" type="file" class="form-control"
                                    name="indoor_sponsor_image" accept="image/*">
                                <h4>
                                    Sponsor's Name
                                </h4>
                                <input id="indoor-sponsor-name" class="form-control" name="indoor_sponsor_name"
                                    type="text" placeholder="Please Enter In Sponsor Company Name" value="">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row p-3">

                <?php
                // Fetch sponsors from the indoor_sponsors table
                $sql = "SELECT * FROM indoor_sponsors";
                $result = $conn->query($sql);

                // Check if there are any sponsors
                if ($result->num_rows > 0) {
                    // Loop through each row
                    while ($row = $result->fetch_assoc()) {
                        // Display the HTML structure
                
                        $image = $row["image"];
                        $name = $row["name"];
                        ?>
                        <div class="sponpic p-2" style="width: 20%;">
                            <img src="sponsors/<?php echo $image ?>" alt="<?php echo $name ?>" style="width: 100%;">
                        </div>
                        <?php
                    }
                } else {
                    echo "No sponsors found.";
                }

                ?>
            </div>
        </div>

    </div>
    <h3 style="text-align: center;">OUTDOOR SPONSORS</h3>
    <!--Sponsors-->
    <div class="px-5">
        <div class="container-fluid px-5" style="text-align: center;">
            <center>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#outdoor-sponsors">
                    Add New Sponsor
                </button>
            </center>

            <!-- outdoor Sponsor Modal -->
            <div class="modal fade" id="outdoor-sponsors" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Outdoor Sponsor</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="outdoor-sponsors" class="" method="post" enctype="multipart/form-data"
                                action="admin-functions/outdoor-sponsors.php">
                                <h4 class="text-start">
                                    Upload New Image
                                </h4>
                                <input id="outdoor-sponsor-image" type="file" class="form-control"
                                    name="outdoor_sponsor_image" accept="image/*">
                                <h4 class="text-start">
                                    Sponsor's Name
                                </h4>
                                <input id="outdoor-sponsor-name" class="form-control" name="outdoor_sponsor_name"
                                    type="text" placeholder="Please Enter In Sponsor Company Name" value="">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-cols-5">
                <?php
                // Fetch sponsors from the indoor_sponsors table
                $sql = "SELECT * FROM outdoor_sponsors";
                $result = $conn->query($sql);

                // Check if there are any sponsors
                if ($result->num_rows > 0) {
                    // Loop through each row
                    while ($row = $result->fetch_assoc()) {
                        // Display the HTML structure
                
                        $image = $row["image"];
                        $name = $row["name"];
                        ?>
                        <div class="sponpic p-2" style="width: 20%;">
                            <img src="sponsors/<?php echo $image ?>" alt="<?php echo $name ?>" style="width: 100%;">
                        </div>
                        <?php
                    }
                } else {
                    echo "No sponsors found.";
                }

                // Close the database connection
                $conn->close();
                ?>
            </div>
        </div>
    </div>
    </div>
    <!--Footer-->
    <div id="footer" class="container-fluid bg-primary text-center" style="width: 100%; padding: 3% 5%;">
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
                <form id="footer-form" class="col pt-2" style="text-align: center; line-height: 2.; color: black;"
                    method="post" action="admin-functions/footer-update.php">
                    <p class="contacttext">
                        MAIL<br>Club Manager PO Box 1012<br>Simcoe, ON N3Y 5B3
                        <hr style="color: blue;">
                        PRESIDENT: <a href="mailto:<?php echo $president_email ?>">
                            <?php echo $president_name ?>
                        </a>
                        <br>
                    <h5 class="text-start">
                        President Name:
                    </h5>
                    <input id="president_name" name="president_name" type="text" class="form-control"
                        value="<?php echo $president_name ?>">
                    <h5 class="text-start">
                        President Email:
                    </h5>
                    <input id="president_email" name="president_email" type="text" class="form-control"
                        value="<?php echo $president_email ?>">

                    MANAGER: <a href="mailto:<?php echo $manager_email ?>">
                        <?php echo $manager_name ?>
                    </a>
                    <br>
                    <h5 class="text-start">
                        Manager Name:
                    </h5>
                    <input id="manager_name" name="manager_name" type="text" class="form-control"
                        value="<?php echo $manager_name ?>">
                    <h5 class="text-start">
                        Manager Email:
                    </h5>
                    <input id="manager_email" name="manager_email" type="text" class="form-control"
                        value="<?php echo $manager_email ?>">

                    REFEREES: <a href="mailto:<?php echo $referees_email ?>">
                        <?php echo $referees_name ?>
                    </a>
                    <br>
                    <h5 class="text-start">
                        Referees Name:
                    </h5>
                    <input id="referees_name" name="referees_name" type="text" class="form-control"
                        value="<?php echo $referees_name ?>">
                    <h5 class="text-start">
                        Referees Email:
                    </h5>
                    <input id="referees_email" name="referees_email" type="text" class="form-control"
                        value="<?php echo $referees_email ?>">


                    E TRANSFERS: <a>
                        <?php echo $e_transfer_email ?>
                    </a>
                    <h5 class="text-start">
                        E Transfer Email:
                    </h5>
                    <input id="e_transfer_email" name="e_transfer_email" type="text" class="form-control"
                        value="<?php echo $e_transfer_email ?>">


                    <button id="footer-submit-btn" type="submit" class="btn btn-primary mt-3 fs-5">Update</button>
                </form>
            </div>
        </div>
        <div class="linkchange" style="text-align: center;">
            <small><a href="http://www.businesslore.com">- CREATED BY BUSINESSLORE - </a></small>
        </div>
    </div>

    <!--end-->
    <script src="<?php echo BASE_URL ?>js/index.js"></script>
    <script src="<?php echo BASE_URL ?>js/admin.js"></script>
    <script src="<?php echo BASE_URL ?>js/section-1.js"></script>
    <script src="<?php echo BASE_URL ?>js/registration-date-text-img.js"></script>
    <script src="<?php echo BASE_URL ?>js/registration-info-image.js"></script>
    <script src="<?php echo BASE_URL ?>js/season-start-date.js"></script>
    <script src="<?php echo BASE_URL ?>js/field-image.js"></script>
    <script src="<?php echo BASE_URL ?>js/card-section.js"></script>
    <script src="<?php echo BASE_URL ?>js/rules-regulations.js"></script>
    <script src="<?php echo BASE_URL ?>js/registration-year.js"></script>
    <script src="<?php echo BASE_URL ?>js/ad_1.js"></script>
    <script src="<?php echo BASE_URL ?>js/ad_2.js"></script>

</body>

</html>