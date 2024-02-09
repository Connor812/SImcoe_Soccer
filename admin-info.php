<?php

require_once "config-url.php";
session_start();

if (!isset($_SESSION["admin_username"])) {
    header("Location: " . BASE_URL . "admin-login.php?error=access_denied");
    exit;
}

require_once("php/admin-header.php");
require_once("admin-functions/error-handlers.php");
require_once("db/db_config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/selection.css" rel="stylesheet">
    <link href="css/info.css" rel="stylesheet">
    <link href="css/admin.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Information</title>
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

    .texttiny {
        font-size: small;
    }

    .texttinier {
        font-size: x-small;
    }

    .active .btn:hover {
        background-color: white;
        color: blue;
    }
</style>

<body>
    <!--topblurb-->

    <img src="images/info.jpg" style="width: 100%;">
    <div class="container-fluid" style="text-align: center;">
        <div class="row p-3">
            <div class="col-sm-12  col-md-5 px-2" style="text-align: center">
                <h4>BOARD OF DIRECTORS</h4>
                <hr>
                <ul style="list-style-type:none;">
                    <?php

                    $sql = "SELECT * FROM `current_presidents`;";

                    $stmt = $conn->prepare($sql);

                    if (!$stmt) {
                        echo "<li>Failed to get Directors. Please Try Again</li>";
                    }

                    // Execute the statement
                    $stmt->execute();

                    // Get the result set
                    $result = $stmt->get_result();

                    // Check if there are any results
                    if ($result->num_rows > 0) {
                        // Fetch data and display it
                        while ($directors_row = $result->fetch_assoc()) {
                            // Assuming you have columns named 'name' and 'position'
                            $id = $directors_row["id"];
                            $name = $directors_row['name'];
                            $position = $directors_row['position'];

                            ?>
                            <li>
                                <button value="<?php echo $id ?>" name="<?php echo $name ?>" position="<?php echo $position ?>"
                                    class="director" type="button" data-bs-toggle="modal"
                                    data-bs-target="#presidents-action-modal">
                                    <?php echo strtoupper($position) ?> -
                                    <?php echo strtoupper($name) ?>
                                </button>
                            </li>
                            <?php
                        }
                    } else {
                        echo "<li>No Presidents found.</li>";
                    }

                    // Close the result set
                    $result->close();

                    // Close the statement
                    $stmt->close();

                    ?>
                </ul>
                <!-- Button trigger Change the Board of Directors modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#adding-director">
                    Adding Director
                </button>

                <!-- Button to Open the View all past presidents Modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#presidents">
                    Past Presidents
                </button>


                <!-- Change Current Presidents -->
                <div class="modal fade" id="adding-director" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Adding Director</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="admin-functions/add-director.php">
                                    <h5 class="text-start">
                                        Position
                                    </h5>
                                    <input id="position" class="form-control"
                                        placeholder="Please Enter The Directors Position" name="position" type="text">
                                    <h5 class="text-start">
                                        Directors Name
                                    </h5>
                                    <input id="vice-president" class="form-control"
                                        placeholder="Please Enter A The Directors Name" name="name" type="text">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Action modal for the presidents -->
                <div class="modal fade" id="presidents-action-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Or Delete</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="delete-director-form" method="post">
                                    <button class="btn btn-danger" type="submit">Delete Director</button>
                                </form>
                                <form id="update-director-form" method="post">
                                    <h4 class="text-start">Change Position</h4>
                                    <input id="new-position" type="text" class="form-control" name="new_position"
                                        value="">
                                    <h4 class="text-start">Change Name</h4>
                                    <input id="new-name" type="text" class="form-control" name="new_name" value="">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action modal for the past presidents -->
                <div class="modal fade" id="past-presidents-action-modal" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Or Delete</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <form id="delete-past-president-form" method="post">
                                    <button class="btn btn-danger" type="submit">Delete Past President</button>
                                </form>
                                <form id="update-past-president-form" method="post">
                                    <h4 class="text-start">Change Year</h4>
                                    <input id="new-past-year" type="text" class="form-control" name="new_year" value="">
                                    <h4 class="text-start">Change Name</h4>
                                    <input id="new-past-name" type="text" class="form-control" name="new_name" value="">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- The Modal -->
                <div class="modal" id="presidents">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Past Presidents</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body" style="text-align: left; padding-left: 10%;">
                                <ul style="list-style-type:none;">
                                    <?php

                                    $sql = "SELECT * FROM `past_presidents`;";

                                    $stmt = $conn->prepare($sql);

                                    if (!$stmt) {
                                        echo "<li>Failed to get Past Presidents. Please Try Again</li>";
                                    }

                                    // Execute the statement
                                    $stmt->execute();

                                    // Get the result set
                                    $result = $stmt->get_result();

                                    // Check if there are any results
                                    if ($result->num_rows > 0) {
                                        // Fetch data and display it
                                        while ($past_directors_row = $result->fetch_assoc()) {
                                            // Assuming you have columns named 'name' and 'position'
                                            $id = $past_directors_row["id"];
                                            $name = $past_directors_row['name'];
                                            $year = $past_directors_row['year'];

                                            ?>
                                            <li>
                                                <button value="<?php echo $id ?>" name="<?php echo $name ?>"
                                                    year="<?php echo $year ?>" class="past_president" type="button"
                                                    data-bs-toggle="modal" data-bs-target="#past-presidents-action-modal">
                                                    <?php echo strtoupper($year) ?> -
                                                    <?php echo strtoupper($name) ?>
                                                </button>
                                            </li>
                                            <?php
                                        }
                                    } else {
                                        echo "<li>No Presidents found.</li>";
                                    }

                                    // Close the result set
                                    $result->close();

                                    // Close the statement
                                    $stmt->close();

                                    ?>
                                </ul>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">

                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-7 pt-3" style="text-align: left;">
                <h4 style="text-align: center;">OUR STORY</h4>

                In 1973 there were 83 children registered in that first year! The Club grew slowly and steadily over the
                next 20
                years to around 400 participants. In 1996 the organization was incorporated as a not-for-profit
                organization.
                Then, with the growing popularity of soccer in North America, we began experiencing exponential growth
                in the
                next decade. By 2006, 1200 children, youth and adults were playing soccer with our Club. Today, we
                continue to
                see registrations of around 1,000 participants. Many other developments have occurred since we welcomed
                in the
                new millennium. In 2000 we started an indoor soccer season at the Aud in Simcoe, prior we did used
                school gyms.
                We continue to draw 192 participants a year with 3 divisions.
            </div>
        </div>
        <img img-class="img-fluid" src="images/teamstrip.jpg" style="width: 100%; height: auto;">
        <div id="accordion">
            <div class="card" style="border-color: white;">
                <div class="card-header" style="background-color: white; border-color: white;">
                    <a class="btn" data-bs-toggle="collapse" href="#collapseOne"
                        style="background-color: blue; width: 100%; color: white;">
                        CLICK HERE TO LEARN ALL ABOUT OUR SOCCER PARK
                    </a>
                </div>
                <div id="collapseOne" class="collapse" data-bs-parent="#accordion">
                    <div class="card-body py-0">
                        <h4>Norfolk County Youth Soccer Park, 660 West St</h4>
                        <div class="container-fluid"><img class="img-fluid" src="images/parkmap.jpg" alt="park map"
                                style="float: right; margin: 2%; transition-duration: 0.4s;
            cursor: pointer;"></div>
                        <p style="text-align: left;">The rapid rise on player numbers and teams forced the realization
                            that the
                            number of fields and
                            their condition, where no longer adequate to support our Club. A small group of determined
                            Board members,
                            along with supporters from Norfolk County Mayor, Councillors and Staff along with our
                            community embarked
                            on an ambitious project to build a new soccer Norfolk County Youth Soccer Park, 660 West St,
                            The dream of a new Soccer Park came true in 2003 Norfolk County and Simcoe & District Youth
                            Soccer Park
                            purchased the property each paying 50% of the total cost . In 2006 the Simcoe and District
                            Youth Soccer
                            Club had its Grand Opening at the new Norfolk County Youth Soccer Park on July 23rd of that
                            year. In a
                            period of 4 years the Club raised $450,000 and created an important partnership with Norfolk
                            County’s
                            Community Services Department and the Norfolk Pros Foundation. Literally dozens of service
                            clubs and local
                            businesses came to the club’s aid and supported the community’s shared dream for a
                            state-of-the-art soccer
                            park to better provide Norfolk’s youth the opportunity to play soccer on high quality
                            fields.
                            In 2008 the Club embarked in development of Phase II, which will include development of 3
                            new fields on
                            the west side of the park, which begin in September. They consist of 2 regulation size
                            fields and one
                            intermediate size field. As well new parking was developed, and irrigation to water the new
                            fields
                            installed.
                            In 2012 the club embarked on Phase III a building with washroom facilities. Also, a Pavilion
                            was erected
                            with the help of Lions Club of Simcoe where players, coaches, officials, and parents can
                            enjoy! The Board
                            of Directors have raised (with help from many in our membership and businesses) and repaid
                            Norfolk County
                            over $1 million to date.
                            The Norfolk County Youth Soccer Park could not have been finished to the point it is for all
                            to enjoy
                            without Norfolk County Mayor, Councillors and Norfolk County Staff with their help with this
                            big project
                            went from a dream to reality within 10 years and The Board of Directors of the SDYSC and
                            members are very
                            much appreciative of Norfolk County help along with our many fantastic sponsors and
                            businesses!
                            With the help of our many supporters and our dedicated Board of Directors and Club Manager,
                            we continue to
                            forge ahead in providing opportunities for children and youth in Simcoe, Waterford, Port
                            Dover, and
                            surrounding areas, regardless of financial, physical, or mental ability, gender, or cultural
                            background,
                            to play recreational soccer. All outdoor soccer games are played at this wonderful Norfolk
                            Country Youth
                            Soccer Park.</p>
                        <hr>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-5 pt-3" style="background-color: aliceblue;">
                <h2>Announcements</h2>
                <hr style="color: blue;">
                <h5>Ryan Cattrysse Memorial Bursary Award</h5>
                <div class="container-fluid" style="text-align: center;"><img src="images/Ryan.jpg" style="width: 33%;">
                </div>
                <p><a href="/ryanaward.html">Learn how you can participate.</a></p>
                <img img-class="img-fluid" src="images/ball200x200.gif" style="width: 25%;">
                <HR>
                <H6>2007 ONTARIO CUP FINALISTS</H6>
                <img src="images/2007finalists.png" style="text-align: center;">
                <div class="texttiny">Coach: Zvonko Horvat </div>
                <div class="texttinier">Back row left to right in the photo w/o flags; Assistant coach; Bill
                    Baskerville,
                    trainer; Maureen Sloot, Christian Vos, Dean Marshall, Ryan Horvat, Kurt Wilson, Andrew Sloot, Jake
                    Durant,
                    coach, Zvonko Horvat,
                    Front left to right; Andre Breda, Braden St-Amand, Sam Baskerville, Justin Lopes, Mark Whitworth,
                    Alex
                    Miranda, Matt Ruby, Cody Lyons, Andrew Miranda
                    Centre; Josh Ternowski</div>
                <hr>
                <div class="container-fluid">
                    <h4>1973 Original Executive</h4>
                    <p><small>Simcoe and District Youth Soccer Club was formed in 1973 by a small group of enthusiastic
                            soccer
                            parents.</small> </p>
                    <ul style="list-style-type:none;">
                        <li>Al Jackson</li>
                        <li> Ray Kallie</li>
                        <li>Brian Cook
                        <li>Archie Hughes
                        <li>Eddie Hildebrandt</li>
                        <li> Antonio Lourenco</li>
                        <li>Armando Carvalho</li>
                    </ul>
                </div>
                <img img-class="img-fluid" src="images/50jumbo.jpg" style="width: 100%; height:auto;">
                <hr>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-7 pt-3">
                <a id="right"></a>
                <h2>Latest News</h2>
                <hr style="color: blue;">
                <h5>INDOOR SOCCER CHAMPS 2022</h5>
                <div class="container-fluid p-2"><img src="images/U10-IndoorChampsPurpleTimHortons.jpg"
                        style="width: 80%;">
                </div>
                <p>U10 Indoor Champs Purple Tim Hortons</p>
                <div class="container-fluid p-2"><img src="images/U13Indoorlions.jpg" style="width:80%;"></div>
                <p>U13 Indoor Champs Simcoe Lions Club</p>
                <div class="container-fluid px-2"><img src="images/U18indoorBrian.jpg" style="width: 80%;"></div>
                <p>U18 Indoor Champs Brian's Handyman Services</p>
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
                            BUSINESSLORE -
                        </a></small>
                </div>
            </div>
        </div>
        <div class="linkchange" style="text-align: center;">
            <small><a href="http://www.businesslore.com">- CREATED BY BUSINESSLORE - </a></small>
        </div>
    </div>



    <script src="js/admin.js"></script>
    <script src="js/directors.js"></script>
    <script src="js/past-presidents.js"></script>
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