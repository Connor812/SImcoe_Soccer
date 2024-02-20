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
  <title>Parents Page</title>
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
  require_once("php/header.php");
  ?>
  <!--topblurb-->
  <div style="text-align: center; margin-top: 0%;">
    <img src="images/parentsjumbo.png"
         style="width: 100%;">
    <br>
    <br>

    <!--topblurb-->
    <h2 style="text-align: center">PARENTS</h2>
    <div style="text-align: left; padding: 0% 1% 0% 1%; margin: 0% 1%;">Soccer is really a sport for all ages and great
      summer fun. Team building and new friendships are a great way to develop physical and social skills. You don't
      need alot of equiptment or special facilities to kick a ball around a field and learn the basics. Our soccer
      fields just west of Simcoe have 10 fields and practice areas are a great environment for "The beautiful game".
      </p>
      <blockquote class="blockquote px-5"
                  style="color: blue; text-align: center;">
        <p>Your child can start at 4 years playing on kid size fields and we provide the team shirts. We play Co-ed
          leagues at the early ages and move to boys and girls leages at 11.</p>
        <p>Dont worry if you don't know about soccer rules and regulations or much about the game. It is easy, you just
          try to kick the ball into the net with the help of your team.</p>
      </blockquote>
      <div class="alert alert-success px-5"
           style="text-align: center;">
        <h6>Having your children on a soccer team teaches them to work with others while getting lots of quality
          excersise. Here are some ideas to get you started at home learning skills and some advice about soccer
          parenting.</h6>
        <div class="row">
          <div class="col-sm-6 p-1"><img src="images/momand-balls.jpg"
                 style="width: 90%;"></div>
          <div class="col-sm-6 p-1"> <a
               href="https://cdn1.sportngin.com/attachments/document/0112/8170/Active-Start-Brochure.pdf?_gl=1*bcr0cu*_ga*MTA0Njc5MTczNi4xNjgzMzk2ODAw*_ga_PQ25JN9PJ8*MTY4MzY0NDAzMC4zLjAuMTY4MzY0NDAzMC4wLjAuMA..#_ga=2.137137072.1042781787.1683644030-1046791736.1683396800">ACTIVE
              START - First Kicks</a>
            <br>
            <a
               href="https://cdn1.sportngin.com/attachments/document/0112/8178/FUNdamentals-Brochure.pdf?_gl=1*1u2843w*_ga*MTA0Njc5MTczNi4xNjgzMzk2ODAw*_ga_PQ25JN9PJ8*MTY4MzY0NDAzMC4zLjEuMTY4MzY0NDA0Mi4wLjAuMA..#_ga=2.242722690.1042781787.1683644030-1046791736.1683396800">FUNDAMENTALS
              - Ages 6-8</a>
            <br>
            <a href="https://www.soccerwire.com/resources/five-mistakes-soccer-parents-make-with-their-players/">Advice
              for soccer parents</a>
          </div>
        </div>
      </div>
      <!--infowrapper-->
      <div class="wrapper">
        <h4 style="text-align: center;">THIS IS WHAT YOU NEED TO KNOW</h4>
        <h5 class="container-fluid px-3"> </h5>
        <div class="alert alert-primary"
             style="padding: 5% 5% 5% 5%;">
          <div class="container-fluid"
               style="text-align: center;">
            <div style=" text-align: center;"></div>
            <h5><b>PARENTS CHECK LIST</b></h5>
            <h6 style="text-align: center; padding: 0% 10%;">All parents must sign a Concussion Code of Conduct form to
              show they are aware of the dangers of head injuries.
              <br>
              <div style="text-align: center;">
                <br>
                <h6>CONCUSSION CODE OF CONDUCT</h6>
                <a>Print the form and submit to our club manager</a>
                <br>
                <?php
                require_once("db/db_config.php");

                $sql = "SELECT * FROM `code_of_conduct`;";

                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    $form = $row["pdf"];
                    ?>
                    <a href="files/<?php echo $form ?>">Click here to get the form</a>
                    <?php
                  }
                } else {
                  // ! No data found
                  echo "No Form Found. Please Try Again Later.";
                }

                ?>

                <br>
                <hr>
                <div class="row px-1">
                  <div class="col-sm-12 col-lg-6"
                       style=" text-align: center;">
                    <img src="images/redcard.jpg"
                         style="width: 50%; padding: 5%">
                  </div>
                  <div class="col-sm-12 col-lg-6"
                       style="text-align: left;">
                    <h3 style="color: red; text-align: center;">RED CARD</h3>
                    <div>Disapline panel meeting will the first Thursday of each month. Should this occur we will
                      contact you.</div>
                  </div>
                </div>
                <hr>
                <h5 style="padding: 2%;">Please sit on the opposite side of the field<br>from the coaches and players
                  bench</h5>
                <hr>
                <br>

                <a>Any inquiries can be submitted to <a
                     href="mailto:someone@example.com">clubmanager@simcoesoccer.ca</a>
                  <br>
                </a>
                <br>
                <div class="container-fluid">
                  <img src="images/littleboyandmom.jpg"
                       style="width: 80%;">
                </div>
              </div>
          </div>
        </div>
      </div>
      <!--Footer-->
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