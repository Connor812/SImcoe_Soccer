<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/selection.css" rel="stylesheet">
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
require_once("php/header.php");
require_once("db/db_config.php");

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

<body>
    <div class="wrapper" style="width: 100%;">
        <!--JumboImage-->
        <img src="<?php echo empty($hero_image) ? 'images/jumbo1.jpg' : "images/$hero_image"; ?>" class="img-fluid"
            width="100%" alt="50 Years of Soccer">
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
                            <?php echo $registration_year ?><br>
                            <?php echo $registration_start_date ?>
                        </div>
                        <div style="font-size: 2.5vw;"> </div>
                        <!--<div style="font-size: 2vw;">ONLY GIRLS U13 and U18 AVAILABLE</div>
                        <div style="font-size: 2vw;">WAITING LIST IS CLOSED</div>-->


                        <hr> <!-- Button to Open the Join Modal -->
                        <!-- Button to Open the Modal -->
                        <?php
                        if ($registration_btn_status == "closed") {
                            $disabled = 'disabled';
                        } else {
                            $disabled;
                        }
                        ?>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#register"
                            <?php echo $disabled ?>>
                            REGISTRATION
                            <?php echo strtoupper($registration_btn_status) ?>
                        </button>

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
                                            contact us: clubmanager@simcoesoccer.ca</p>

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
                        <img src="images/parkmap.jpg" style="width: 90%;">
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
                        new friends and have fun learing and playing on your team. Developing skills and working
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
                        <a href="/parents.php"><button type="button" class="btn btn-primary btn-sm">Go To Parents
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
    <div class="px-5 py-2 my-3 text-center">
        <h1 class="pb-0 text-center">
            <?php echo $section_1_heading ?>
        </h1>
        <div class="col-lg-8 mx-auto">
            <p class="lead mb-0 px-2">
                <?php echo $section_1_text ?>
            </p>
        </div>
    </div>
    <div class="bg-dark text-white py-3">
        <div style="text-align: center;">
            <h3>
                <?php echo $registration_info_heading ?>
            </h3>
            <h4>
                <?php echo $registration_info_date ?>
            </h4>
            <h6>ONLINE REGISTRATION ONLY</h6>
            <img src="images/outdoorseason.png" style="width: 60%; height:auto;">
            <div class="px-5">
                <p style="text-align: center;">
                    <small>
                        All age groups are set from January to December of year of birth.
                    </small>
                    <hr>
                </p>
                <p style="text-align: center;">
                    Log in or sign up in Power up.
                </p>

                <p>
                    Make sure you tick opt in so you can receive information on the team and schedules when available.
                </p>

                <h5>
                    <?php echo $season_start_date ?><br>
                    <?php echo $u6_start_date ?> <br>
                    JOIN EARLY!<br>
                </h5>
                <p> Once all divisions are full a waiting list will be kept for all divisions, no fee is required to go
                    on waiting list.</p>

            </div>
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
        <div class="p-0 m-0">
            <img src="images/parkpano.jpg" class="img-fluid" style="width: 100%; height:auto" alt="...">
        </div>
    </div>
    <div class="row py-3 px-5">
        <div class="col-4">
            <img src="images/aud2.jpg" class="img-fluid" style="width: 100%; height:auto" alt="...">
        </div>
        <div class="col-4 pt-3" style="text-align: center;">
            <h3>
                OUTDOOR
            </h3>
            <p>
                <b>
                    Norfolk County Youth Soccer Fields
                </b><br>
                660 West Street, Simcoe ON, N3Y 4K5
            </p>
            <h3>
                INDOOR
            </h3>
            <p>
                <b>
                    The Aud
                </b>
                <br>
                172 South Drive, Simcoe On
            </p>

        </div>

        <div class="col-4">
            <img src="images/<?php echo $field_image ?>" class="img-fluid" style="width: 100%; height:auto" alt="...">
        </div>
    </div>
    </div>
    <!--news-->
    <div class="row row-col-3 bg-body-tertiary" style="text-align: center; padding: 1% 5%;">
        <hr style="color: blue;">
        <h1 class="p-0 text-center">CLUB NEWS</h1>
        <hr style="color: blue;">
        <div id="card-section" class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 justify-content-center">

                <?php if (!empty($card_image_1) || !empty($card_heading_1) || !empty($card_text_1) || !empty($card_link_1)) { ?>
                    <!-- Card 1 -->
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
                            </div>
                        </div>
                    </div>
                <?php } else {
                    echo "";
                } ?>

                <?php if (!empty($card_image_2) || !empty($card_heading_2) || !empty($card_text_2) || !empty($card_link_2)) { ?>
                    <!-- Card 2 -->
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
                            </div>
                        </div>
                    </div>
                <?php } else {
                    echo "";
                } ?>

                <?php if (!empty($card_image_3) || !empty($card_heading_3) || !empty($card_text_3) || !empty($card_link_3)) { ?>
                    <!-- Card 3 -->
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
                            </div>
                        </div>
                    </div>
                <?php } else {
                    echo "";
                } ?>
            </div>
        </div>
        <hr>
        <!--lower News-->
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 justify-content-center">
                <?php if (!empty($card_image_4) || !empty($card_heading_4) || !empty($card_text_4) || !empty($card_link_4)) { ?>
                    <!-- Card 4 -->
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
                            </div>
                        </div>
                    </div>
                <?php } else {
                    echo "";
                } ?>

                <?php if (!empty($card_image_5) || !empty($card_heading_5) || !empty($card_text_5) || !empty($card_link_5)) { ?>
                    <!-- Card 5 -->
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
                            </div>
                        </div>
                    </div>
                <?php } else {
                    echo "";
                } ?>

                <?php if (!empty($card_image_6) || !empty($card_heading_6) || !empty($card_text_6) || !empty($card_link_6)) { ?>
                    <!-- Card 6 -->
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
                            </div>
                        </div>
                    </div>
                <?php } else {
                    echo "";
                } ?>
            </div>
        </div>
    </div>

    <!-- Rules and Regulations button link -->
    <div class="container-fluid" style="text-align: center;">
        <hr style="color: blue;">
        <a href="files/<?php echo $link_rules_pdf ?>"><button type="button" class="btn btn-primary m-1"
                data-bs-toggle="collapse" data-bs-target="#demo1">
                <?php echo $link_rules_text ?>
            </button></a>
        <hr style="color: blue;">
    </div>


    <div class="row p-3">

        <!-- Ad 1 -->
        <div class="col-lg-6 col-sm-12">
            <div class="container-fluid" style="text-align: center; width:80%; height:auto">
                <a href="<?php echo $ad_link_1 ?>" style="width:100%; height: auto;">
                    <img src="images/<?php echo $ad_image_1 ?>" style="width: 100%; height: auto;">
                </a>
                <br>
                <p style="text-align: center;">
                    <?php echo $ad_text_1 ?>
                </p>
            </div>
        </div>

        <!-- Ad 2 -->
        <div class="col-lg-6 col-sm-12" id="indoor">
            <div class="container-fluid" style="text-align: center; width:80%; height:auto">
                <a href="<?php echo $ad_link_2 ?>" style="width:100%; height: auto;">
                    <img src="images/<?php echo $ad_image_2 ?>" style="width: 100%; height: auto;">
                </a>
            </div>
            <p style="text-align: center;">
                <?php echo $ad_text_2 ?>
            </p>
        </div>

    </div>
    <!--indoor -->
    <div class="row p-3 mx-5">

        <div style="text-align: center; color:white; background-color:blue;">
            <h1>Thanks to our local sponsors who make it all possible</h1>
        </div>
        <hr>
        <h3 style="text-align: center;">INDOOR SPONSORS</h3>
        <div class="indoorsponsor bg-white px-4">
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
                        PRESIDENT: <a href="mailto:<?php echo $president_email ?>">
                            <?php echo $president_name ?>
                        </a> <br>
                        MANAGER: <a href="mailto:<?php echo $manager_email ?>">
                            <?php echo $manager_name ?>
                        </a><br>
                        REFEREES: <a href="mailto:<?php echo $referees_email ?>">
                            <?php echo $referees_name ?>
                        </a> <br>
                        E TRANSFERS: </a>
                        <?php echo $e_transfer_email ?></a>
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

    <!--end-->
    <script src="<?php echo BASE_URL ?>js/index.js"></script>

</body>

</html>