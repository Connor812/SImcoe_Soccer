<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport"
        content="width=device-width, initial-scale=1">
  <link href="css/selection.css"
        rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp"
        crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <title>Coaches</title>
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
  <!--navbar-->
  <?php
  require_once("php/header.php");
  ?>
  <!--Image-->
  <div style="text-align: center; margin-top: 0%;">
    <img src="images/coachjumbo.png"
         style="width: 100%;">
  </div>
  <br>
  <!--topblurb-->
  <h2 style="text-align: center">COACHES</h2>
  <div style="text-align: left; padding: 0% 5% 0% 5%; margin: 0% 5%;">Our Coaches are local parents and youth players
    who volunteer their time to help our players learn about teamwork and sportsmanship and most of all FUN!
    It is not always easy to handle 7 to 18 players who just want to run and kick balls and have fun!
    </p>
    <blockquote class="blockquote"
                style="color: blue; text-align: center; padding: 0% 2%">
      <p>The game itself makes it easy to participate at every level and our coaches take pride in the achievements of
        every player.</p>
      <p>Learning about soccer is as much fun for the coach as it is for the players.</p>
    </blockquote>
    <hr>
    <div class="container-fluid"
         style="text-align: center;">
      <a href="files/2023constitution.pdf"> <button type="button"
                class="btn btn-primary m-1">SDYSC 2023 Constitution &amp; Rules and Regulations</button></a>
    </div>
    <hr>
    <!--buttons-->
    <div class="container-fluid">
      <div style="text-align: center;">
        <h5>Division buttons show an outline of game at each age. </h5>
        <p><small>Field size, number of players and rules... etc.</small></p>
      </div>
      <div class="container m-3"
           style="text-align: center;">

        <?php
        require_once("db/db_config.php");

        $sql = "SELECT * FROM `divisions` WHERE id = 1;";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            $u4 = $row["u4"];
            $u5 = $row["u5"];
            $u7 = $row["u7"];
            $u8 = $row["u8"];
            $u9 = $row["u9"];
            $u11 = $row["u11"];
            $u13 = $row["u13"];
            $u18 = $row["u18"];

            ?>

            <!-- // $ Button For U4 -->
            <button type="button"
                    class="btn btn-primary m-1"
                    data-bs-toggle="collapse"
                    data-bs-target="#demo1">U4 DIVISION</button>

            <!-- // $ Modal For U4 -->
            <div id="demo1"
                 class="collapse">
              <hr>
              <?php echo $u4 ?>
              <hr>
            </div>

            <!-- // ! Button For U5 & U6 -->
            <button type="button"
                    class="btn btn-primary m-1"
                    data-bs-toggle="collapse"
                    data-bs-target="#demo2">U5 & U6 DIVISION</button>

            <!-- // ! Modal For U5 & U6 -->
            <div id="demo2"
                 class="collapse">
              <hr>
              <?php echo $u5 ?>
              <hr>
            </div>

            <!-- // # Button For U7 -->
            <button type="button"
                    class="btn btn-primary m-1"
                    data-bs-toggle="collapse"
                    data-bs-target="#demo3">U7 DIVISION</button>

            <!-- // # Modal For U7 -->
            <div id="demo3"
                 class="collapse">
              <hr>
              <?php echo $u7 ?>
              <hr>
            </div>

            <!-- // ^ Button For U8 -->
            <button type="button"
                    class="btn btn-primary m-1"
                    data-bs-toggle="collapse"
                    data-bs-target="#demo3">U8 DIVISION</button>

            <!-- // ^ Button For U8 -->
            <div id="demo4"
                 class="collapse">
              <hr>
              <?php echo $u8 ?>
              <hr>
            </div>

            <!-- // & Button For U9 -->
            <button type="button"
                    class="btn btn-primary m-1"
                    data-bs-toggle="collapse"
                    data-bs-target="#demo5">U9 DIVISION</button>

            <!-- // & Modal For U9 -->
            <div id="demo5"
                 class="collapse">
              <hr>
              <?php echo $u9 ?>
              <hr>
            </div>

            <!-- // % Button For U11 -->
            <button type="button"
                    class="btn btn-primary m-1"
                    data-bs-toggle="collapse"
                    data-bs-target="#demo6">U11 DIVISION</button>

            <!-- // % Modal For U11 -->
            <div id="demo6"
                 class="collapse">
              <hr>
              <?php echo $u11 ?>
              <hr>
            </div>

            <!-- // @ Button For U13 -->
            <button type="button"
                    class="btn btn-primary m-1"
                    data-bs-toggle="collapse"
                    data-bs-target="#demo7">U13 BOYS, U13 GIRLS DIVISION</button>

            <!-- // @ Modal For U13 -->
            <div id="demo7"
                 class="collapse">
              <hr>
              <?php echo $u13 ?>
              <hr>
            </div>

            <!-- // ! Button for U18 -->
            <button type="button"
                    class="btn btn-primary m-1"
                    data-bs-toggle="collapse"
                    data-bs-target="#demo8">U18 BOYS, GIRLS, WOMEN DIVISION</button>

            <!-- // ! Button for U18 -->
            <div id="demo8"
                 class="collapse">
              <hr>
              <?php echo $u18 ?>
              <hr>
            </div>
            <?php
          }
        } else {
          // ! No data found
          echo "No Division Information Found. Please Try Again Later";
        }
        ?>

      </div>
    </div>
  </div>
  <div class="container-fluid"
       style="text-align: center;">
    <hr>
    <a href="files/IndoorSoccerInfo.pdf"> <button type="button"
              class="btn btn-primary m-1">Indoor Soccer Coach Information</button></a>
    <hr>
  </div>
  <div class="alert alert-success"
       style="text-align: center; padding: 2% 3%; margin: 2% 3%;">
    <div class="row">
      <div class="col-sm-12 col-lg-6 p-2"><img src="images/kidcoach.png"
             width="33%"></div>
      <div class="col-sm-12 col-lg-6 p-3">
        <h6>Here are links from Soccer Canada that will give you an outline of the fundimentals.</h6>
        <a
           href="https://canadasoccer.com/wp-content/uploads/resources/Pathway/EN/CanadaSoccerPathway_CoachsToolKit_ActiveStart_EN.pdf">CANADA
          SOCCER COACHES TOOL KIT ONE</a>
        <br>
        <a
           href="https://www.canadasoccer.com/wp-content/uploads/resources/Pathway/EN/CanadaSoccerPathway_CoachsToolKit_FUNdamentals_EN.pdf">CANADA
          SOCCER COACHES TOOL KIT TWO</a>
        <br>
        <a
           href="https://www.canadasoccer.com/wp-content/uploads/resources/Pathway/EN/CanadaSoccerPathway_CoachsToolKit_LearnToTrain_EN.pdf">CANADA
          SOCCER COACHES TOOL KIT THREE</a>

      </div>
    </div>
  </div>

  <!--infowrapper-->
  <div class="wrapper">
    <h4 style="text-align: center;">THIS IS WHAT YOU NEED TO KNOW</h4>
    <div class="container-fluid"
         style="text-align: center; padding: 0% 10%;">
      <h5>If you are interested in coaching please let us know after you read the check list below. We can guide you
        through every step of the way and help you to learn to be a great soccer coach.</h5>
    </div>
    <div class="alert alert-primary m-4"
         style="padding: 3%;">
      <h6 class="container-fluid"
          style="text-align: center;">
        <div style=" text-align: center;"></div>
        <b>NEW COACHES CHECK LIST</b>
      </h6>
      <h6 style="text-align: left; padding: 0% 3%">All house league coaches must have a valid Police Check and hand in
        to Club Manager to be able to coach a team.
        All Coaches must sign a Code of Conduct form to be able to coach.
        We also encourage coaches to take Respect in Sports at the link below. The cost will be refunded to you so long
        as you send copy of certificate and receipt of course.
        <br>
        <div style="text-align: center;">
          <br>
          <h6>POLICE CHECKS</h6>
          <a>A police check is necessary for all our volunteers</a>
          <br>
          <a href="https://www.opp.ca/index.php?id=147&lng=en">Click here for all info and forms</a>
          <br><br>
          <h6>CODE OF CONDUCT</h6>
          <a>Print the form and submit to our club manager</a>
          <br>
          <a href="files/COACH-CODE-OF-CONDUCT.pdf">Click here to get the form</a>
          <br><br>
          <h6>ROWANS LAW</h6>
          <a>Print the form and submit to our club manager</a>
          <br>
          <a href="/files/rowanslaw.pdf">Click here to get the form</a>
          <br><br>
          <h6>RESPECT IN SPORT</h6>
          <a>The Respect in Sport Program assists coaches, referees, trainers and managers with identifying and dealing
            with abuse, neglect, harassment and bullying in sport. </a>
          <br>
          <a href="https://www.ontariosoccer.net/respect-in-sport">Click here to go to the site</a>
          <br><br>
          <a>Any inquiries can be submitted to <a
               href="mailto:clubmanager@simcoesoccer.ca">clubmanager@simcoesoccer.ca</a>
            <br>
          </a>
          <br>
          <div class="container-fluid">
            <img src="images/refphoto.jpg"
                 style="width: 80%;">
          </div>
        </div>
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