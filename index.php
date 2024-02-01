
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/selection.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
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
?>

<body>
    <div class="wrapper" style="width: 100%;">
        <!--JumboImage-->
        <img src="images/jumbo1.jpg" class="img-fluid" width="100%" alt="50 Years of Soccer">
        <!--sections-->
        <div class="container-fluid h2 p-2 m-0" style="text-align: center; background-color: blue; color: white;">SIMCOE
            DISTRICT YOUTH SOCCER CLUB</div>
        <div class="container-fluid p-0 m-0" style="width: 100%;">
            <button class="tablink" onclick="openPage('registration', this, 'red')" id="defaultOpen">REGISTRATION</button>
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
                        <div style="font-size: 3vw;">2024 Outdoor Soccer Registration<br>Starts January 15</div>
                        <div style="font-size: 2.5vw;"> </div>
                        <!--<div style="font-size: 2vw;">ONLY GIRLS U13 and U18 AVAILABLE</div>
                        <div style="font-size: 2vw;">WAITING LIST IS CLOSED</div>-->


                        <hr> <!-- Button to Open the Join Modal -->
                        <!-- Button to Open the Modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#register">
                            REGISTRATION OPEN
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
                                        <a href="https://simcoesoccer.powerupsports.com/index.php?page=LOGIN"><img src="images/powerupscreen.png" class="mx-auto d-block" width="50%"></a>
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
                                        <a href="https://simcoesoccer.powerupsports.com/index.php?page=LOGIN" class="btn btn-success">CONTINUE TO POWERUP</a>
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
                                    require_once("db/db_config.php");
                                    $sql = "SELECT DISTINCT(division_name) FROM  tableone";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>

                                            <option value="<?php echo $row['division_name']; ?>">
                                                <?php echo $row['division_name']; ?></option>
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
                                    require_once("db/db_config.php");

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
                                <div class="col"><button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#fieldmap">Map of fields</button>
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
    <div class="px-5 py-2 my-3 text-center">
        <h1 class="pb-0 text-center">51 Great Years Of Soccer</h1>
        <div class="col-lg-8 mx-auto">
            <p class="lead mb-0 px-2">
                It seems like yesterday when the first whistle blew to start the first game. Since then we have
                built a
                large organization that is still growing day by day. We have great people, great facilities and a
                true love of the beautiful game.
            </p>
        </div>
    </div>
    <div class="bg-dark text-white py-3">
        <div style="text-align: center;">
            <h3>2024 OUTDOOR SOCCER REGISTRATON</h3>
            <h4>Starts January 15, 2024</h4>
            <h6>ONLINE REGISTRATION ONLY</h6>
            <img src="images/outdoorseason.png" style="width: 60%; height:auto;">
            <div class="px-5">
                <p style="text-align: center;"><small>All age groups are set from January to December of year of birth. </small>
                    <hr>
                <p style="text-align: center;"> SDYSC INC. ARE CELEBRATING 51 YEARS THIS UP COMING SEASON!<br>
                    Log in or sign up in Power up.
                <p> Make sure you tick opt in so you can receive information on the team and schedules when available.
                <p>

                <h5> Season will start the week of May 13, 2024<br>
                    U4, U5, U6 start May 25, 2024.<br>
                    JOIN EARLY!<br>
                </h5>
                <p> Once all divisions are full a waiting list will be kept for all divisions, no fee is required to go on waiting list.</p>
                </p>
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
        <div class="p-0 m-0"><img src="images/parkpano.jpg" class="img-fluid" style="width: 100%; height:auto" alt="..."></div>
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

        </div>

        <div class="col-4"><img src="images/parkmap.jpg" class="img-fluid" style="width: 100%; height:auto" alt="..."></div>
    </div>
    </div>
    <!--news-->
    <div class="row row-col-3 bg-body-tertiary" style="text-align: center; padding: 1% 5%;">
        <hr style="color: blue;">
        <h1 class="p-0 text-center">CLUB NEWS</h1>
        <hr style="color: blue;">
        <div class="row p-0">
            <div class="col-sm-12 col-md-3 px-0" style="text-align: center;">
                <!-- <div class="0-1 text-center">
                    <h5>ANNUAL GENERAL MEETING</h5>
                    <h5><b>NOVEMBER 15 <br>6:30 pm</b><br>
                        <br>
                        BASEMENT ROOM<br>
                        NORFOLK COUNTY PUBLIC LIBRARY<br>
                        46 COLBORNE ST. S, SIMCOE
                    </h5>
                </div> 
                <H5>TOURNAMENT DATES</H5>
                <ul style="text-align: center; list-style-type: none;">
                    <li>U18 Boys & U11 June 2, 3</li>
                    <li>U18 Girls & U13 Boys June 9, 10</li>
                    <li>U13 Girls, U9 & U7 June 16, 17</li>
                    <li>Woman 19+ and U8 June 23, 24</li>
                </ul>
                <br>-->
            </div>
            <div class="col-sm-12 col-md-6  px-0" style="text-align: center;">
                <!--<h4>FUN DAY</h4>
                <h5>U4-U5-U6<br>Sat. JULY 29th</h5>
                <h5 style="color: green;">GAMES<br>AWARDS<br>NORFOLK BOUNCY CASTLES</h5>
                <br>-->

                <h5>TOURNAMENT CHAMPS FOR 2023 OUTDOOR SEASON</h5>
                <ul style="list-style-type:none;">
                    <li>U18 Boys: Norfolk Dental Hygiene</li>
                    <li>U11: Norfolk Dental Hygiene</li>
                    <li>U18 Girls: Suprun Psychotherapy</li>
                    <li>U13 Girls: Simcoe Lions Club</li>
                    <li>U13 Boys: Port Dover Chiropractic & Rehab Ctr </li>
                    <li>U9: Springview Farms Golf Course</li>
                    <li>U8: Roulstons Pharmacy</li>
                    <li>ALL U& TEAMS ARE CHAMPIONS!!!!</li>
                    <li>Women 19+: The Functional Approach Chiro & Physio</li>
                    <hr style="width: 90%; text-align: center;">
                    <li>FUN DAY All teams are sponsored by Tim Hortons in
                        U4, U5 & U6</li>

                </ul>
            </div>
            <div class=" col-sm-12 col-md-3 px-0" style="text-align: center;">
                <h5>THANK YOU TOURNAMENT SPONSORS</h5>
                <div id="sponsor">
                    <ul style="text-align: center; list-style-type: none;">
                        <li>Childs Financial</li>
                        <li>Mike's No Frills</li>
                        <li>Dominoes Pizza</li>
                        <li>Brian's Handyman Services</li>
                        <li>Unilever Canada</li><br>
                        <li>Scotlynn Group</li>
                        <li>Michelle Millson </li>
                        <li>Norfolk Bouncy Castles</li>
                        <li>Figueiredo Group</li>
                        <li>Tim Hortons</li>
                    </ul>
                </div>
            </div>
        </div>
        <hr>
        <!--lower News-->
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="row">
                            <div class="col-6 m-0 p-0"><img src="images/bereferee.jpg" style="width: 100%; height:auto" alt="Soccer Reveree"></div>
                            <div class="col-6 m-0 p-0"> <img src="images/asstcoach.png" style="width: 100%; height:auto" alt="Soccer coach"></div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-text"><b>BE A COACH OR ASSISTANT REFEREE</b></h5>
                            <p>Complete online application for Team Official <br>contact Club Manager: Bev Suggett clubmanager@simcoesoccer.ca<br>
                                If you are interested in becoming an Official (Ref) complete online Official application <br>contact Ref Coordinator: Joe Estrela joe.estrela@hotmail.com</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="/officials.html"><button type="button" class="btn btn-sm btn-outline-secondary">View Information</button></a>
                                </div>
                                <small class="text-body-secondary"></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="container-fluid"> <img src="images/balltrophy.jpg" style="width:100%; height:auto;" alt=""></div>
                        <div class="card-body">
                            <p class="card-text"><b>Here are the 2023 League Champions</b></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <ul style="text-align: center; list-style-type: none;">
                                    <small>
                                        <li>U8 - COBB & JONES LLP</li>
                                        <li>U9 - SPRINGVIEW FARM GOLF COURSE</li>
                                        <li>U11 - NORFOLK DENTAL HYGIENE</li>
                                        <li>U13 GIRLS - BRODY'S MECHANICAL SERVICES INC.</li>
                                        <li>U13 BOYS - PORT DOVER CHIROPRACTIC & REHABILITATION CENTRE</li>
                                        <li>U18 GIRLS - SUPRUN PSYCHOTHERAPY</li>
                                        <li>U18 BOYS - TOWNSEND BUTCHERS </li>
                                        <li>WOMEN 19+ - NORFOLK DENTAL HYGIENE</li>
                                    </small>
                                </ul>
                                <small class="text-body-secondary"></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="images/bursary2023.jpg" style="width:100%; height:auto;" alt="">
                        <div class="card-body">
                            <p class="card-text">SDYSC RYAN CATTRYSSE MEMORIAL BURSARY AWARD
                                <br> <b>Congratulations Natalie Suprun! </b>
                                <br>Michelle Millson Vice President presented a cheque for $500 to Natalie Suprun for her submission for the 2023.
                                <br><small>BURSARY CLOSED UNTIL MAY 2024</small>
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="/ryanaward.html"> <button type="button" class="btn btn-sm btn-outline-secondary">View</button></a>
                                </div>
                                <small class="text-body-secondary"></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="text-align: center;">
        <hr style="color: blue;">
        <a href="files/2023constitution.pdf"><button type="button" class="btn btn-primary m-1" data-bs-toggle="collapse" data-bs-target="#demo1">2023 Rules and Constitution</button></a>
        <hr style="color: blue;">
    </div>
    <div class="row p-3">
        <div class="col-lg-6 col-sm-12">
            <div class="container-fluid" style="text-align: center; width:90%; height:auto"><a href="/ryanaward.html" style="width:70%"><img src="images/bursary.jpg"></a><br>
                <p style="text-align: center;">Bursary closed until the 2024 outdoor season</p>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12" id="indoor">
            <div class="container-fluid" style="text-align: center; width:90%; height:auto"><img src="images/conveeners.jpg" style="width:80%"></div>
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
                <div class="sponpic p-2" style="width: 20%;"><img src="sponsors/timslogo.jpg" alt="tims" style="width: 100%;"></div>
                <div class="sponpic p-2" style="width: 20%;"><img src="sponsors/lions.jpg" alt="lions" style="width: 100%;"></div>
                <div class="sponpic p-2" style="width: 20%;"><img src="sponsors/victor.jpg" alt="victor pools" style="width: 100%;"></div>
                <div class="sponpic p-2" style="width: 20%;"><img src="sponsors/mitandroby.jpg" alt="Mit and roby" style="width: 100%;"></div>
                <div class="sponpic p-2" style="width: 20%;"><img src="sponsors/NACL.jpg" alt="NACL" style="width: 100%;"></div>
                <div class="sponpic p-2" style="width: 20%;"><img src="sponsors/brianlogo.jpg" alt="Brians Handyman" style="width: 100%;"></div>
                <div class="sponpic p-2" style="width: 20%;"><img src="sponsors/barrel.jpg" alt="Barrel" style="width: 100%;"></div>
                <div class="sponpic p-2" style="width: 20%;"><img src="sponsors/toyota.jpg" alt="Toyota" style="width: 100%;"></div>
                <div class="sponpic p-2" style="width: 20%;"><img src="sponsors/jarja.jpg" alt="Jarja" style="width: 100%;"></div>
                <div class="sponpic p-2" style="width: 20%;"><img src="sponsors/TnT.jpg" alt="Tacos and tequila" style="width: 100%;"></div>
            </div>
        </div>

    </div>
    <h3 style="text-align: center;">OUTDOOR SPONSORS</h3>
    <!--Sponsors-->
    <div class="px-5">
        <div class="container-fluid px-5" style="text-align: center;">
            <div class="row row-cols-5">
                <div class="col p-2"><img src="sponsors/arbor.jpg" style="width: 100%;"></div>
                <div class="col p-2"><img src="sponsors/bachmann.jpg" style="width: 100%;"></div>
                <div class="col p-2"><img src="sponsors/barrel.jpg" style="width: 100%;"></div>
                <div class="col p-2"><img src="sponsors/bml.jpg" style="width: 100%;"></div>
                <div class="col p-2"><img src="sponsors/boer.jpg" style="width: 100%;"></div>
                <div class="col p-2"><img src="sponsors/bulkbarn.jpg" style="width: 100%;"></div>
                <div class="col p-2"><img src="sponsors/cojo.jpg" style="width: 100%;"></div>
                <div class="col p-2"><img src="sponsors/countrytro.jpg" style="width: 100%;"></div>
                <div class="col p-2"><img src="sponsors/demyer.jpg" style="width: 100%;"></div>
                <div class="col p-2"><img src="sponsors/doverchiro.jpg" style="width: 100%;"></div>
                <div class="col p-2"><img src="sponsors/eastlink.jpg" style="width: 100%;"></div>
                <div class="col p-2"><img src="sponsors/edgehill.jpg" style="width: 100%;"></div>
                <div class="col p-2"><img src="sponsors/eriebeach.jpg" style="width: 100%;"></div>
                <div class="col p-2"><img src="sponsors/firstchoice.jpg" style="width: 100%;"></div>
                <div class="col p-2"><img src="sponsors/goodred.jpg" style="width: 100%;"></div>
                <div class="col p-2"><img src="sponsors/homehardwt.jpg" style="width: 100%;"></div>
                <div class="col p-2"><img src="sponsors/jarja.jpg" style="width: 100%;"></div>
                <div class="col p-2"><img src="sponsors/KofC.jpg" style="width: 100%;"></div>
                <div class="col p-2"><img src="sponsors/lilceas.jpg" style="width: 100%;"></div>
                <div class="col p-2"><img src="sponsors/lions.jpg" style="width: 100%;"></div>
                <div class="col p-2"><img src="sponsors/mitandroby.jpg" style="width: 100%;"></div>
                <div class="col p-2"><img src="sponsors/NACL.jpg" style="width: 100%;"></div>
                <div class="col p-2"><img src="sponsors/Nordelhyg.jpg" style="width: 100%;"></div>
                <div class="col p-2"><img src="sponsors/opg.jpg" style="width: 100%;"></div>
                <div class="col p-2"><img src="sponsors/randt.jpg" style="width: 100%;"></div>
                <div class="col p-2"><img src="sponsors/RCL.jpg" style="width: 100%;"></div>
                <div class="col p-2"><img src="sponsors/rolstons.jpg" style="width: 100%;"></div>
                <div class="col p-2"><img src="sponsors/springfarm.jpg" style="width: 100%;"></div>
                <div class="col p-2"><img src="sponsors/suprin.jpg" style="width: 100%;"></div>
                <div class="col p-2"><img src="sponsors/timbits.jpg" style="width: 100%;"></div>
                <div class="col p-2"><img src="sponsors/timslogo.jpg" style="width: 100%;"></div>
                <div class="col p-2"><img src="sponsors/tirecraft.jpg" style="width: 100%;"></div>
                <div class="col p-2"><img src="sponsors/TnT.jpg" style="width: 100%;"></div>
                <div class="col p-2"><img src="sponsors/townsend.jpg" style="width: 100%;"></div>
                <div class="col p-2"><img src="sponsors/toyota.jpg" style="width: 100%;"></div>
                <div class="col p-2"><img src="sponsors/viceldercare.jpg" style="width: 100%;"></div>
                <div class="col p-2"><img src="sponsors/victor.jpg" style="width: 100%;"></div>
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
                    <div class="container-fluid"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d17894.89103267856!2d-80.34367718384985!3d42.82865397385058!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882c4c3f274267a5%3A0x1068c11fe4ce3ea9!2sNorfolk%20County%20Youth%20Soccer%20Park!5e0!3m2!1sen!2sca!4v1682873399185!5m2!1sen!2sca" width="80%" height="auto" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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

    <!--end-->
    <script src="<?php echo BASE_URL ?>js/index.js"></script>

</body>

</html>