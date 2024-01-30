<?php
require_once ("php/header.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/selection.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<title>Simcoe Soccer Home Page</title></head>
<style>
</style>
<body>
  <div id="navbar" style="z-index: 3;">
    <a href="/index.php"><img fluid src="images/ball.png" style="width: 50%" alt="Ball"></a>    
    <a href="/players.html">Players</a>
    <a href="/parents.html">Parents</a>
    <a href="/coaches.html">Coaches</a>
    <a href="/officials.html">Officials</a>
    <a href="/info.html">Info</a>
    <a href="#footer">Contact Us</a>
  </div>
    <!--JumboImage-->
<div class="wrapper" style="width: 100%;">
    <img src="images/50jumbo.jpg" class="img-fluid" width="100%" alt="50 Years of Soccer">
    <!--sections-->
<div class="container-fluid h2 p-2 m-0" style="text-align: center; background-color: blue; color: white;">SIMCOE DISTRICT YOUTH SOCCER CLUB</div>
  <div class="container-fluid p-0 m-0" style="width: 100%;">
    <button class="tablink" onclick="openPage('registration', this, 'red')"  id="defaultOpen">REGISTRATION</button>
    <button class="tablink" onclick="openPage('games', this, 'green')">TODAYS GAMES</button>
    <button class="tablink" onclick="openPage('players', this, 'blue')">PLAYERS &amp; PARENTS</button>
    <button class="tablink" onclick="openPage('coaches', this, 'orange')">COACHES &amp; OFFICIALS</button>
    <!--Registration-->
    <div class="tabcontent p-2" id="registration" >
      <div class="row px-5 py-3" style="text-align: center;" >
        <div class="col col-lg-3 col-sm-7 p-0 center">
          <img src="images/CrestLOGO1.png" width="80%" height="mx-auto">
        </div>
        <div class="col">
          <div style="font-size: 3vw;">2023 SEASON STARTS MAY 15th</div>
          <div style="font-size: 2.5vw;">WE ARE FULLY BOOKED</div>
          <div style="font-size: 2vw;">ONLY GIRLS U13 and U18 AVAILABLE</div>
          <div style="font-size: 2vw;">WAITING LIST IS CLOSED</div>
         <hr>  <!-- Button to Open the Join Modal -->
      <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#register">
            REGISTER NOW
            </button>
            <!-- The Register Modal -->
            <div class="modal" id="register">
              <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title" style="color: blue; text-align: center;">REGISTRATION INFORMATION</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                    <p style="color: black; text-align: left;">We use PowerUp Sports for registration, just click on the button below and enter your email and the password you want to use.</p>
                    <a href="https://simcoesoccer.powerupsports.com/index.php?page=LOGIN"><img src="images/powerupscreen.png" class="mx-auto d-block" width="50%"></a>
                    <br>
                    <p style="color: black; text-align: center;">Our soccer fields are located in Southern Ontario near Lake Erie</p>
                    <p style="color: black; text-align: center;">If you have any questions pleasea contact us: admin@simcoesoccer.com</p>
                  
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
            <p style="text-align: center;">Choose a team</p>
            <div class="col" style="text-align: right;"> 
              <p> Category:
                  <select id="select1">
                  <option value="">Select Category</option>
                  <?php
                    $conn = mysqli_connect('sql5c0f.megasqlservers.com', 'simcoesocc591341', 'Abdul@123', 'soccertables_simcoesocc591341');
                    $sql = "SELECT DISTINCT(category_name) FROM  tableone";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) 
                        {
                  ?>
                  
                  <option value="<?php echo $row['category_name']; ?>"><?php echo $row['category_name']; ?></option>
                
                  <?php
                    }
                  } 
                    mysqli_close($conn);
                  ?>
                  </select>
                  </p>
                  <p> Division:
                    <select id="select2">
                    <option value="">Select Division</option>
                    </select>
                    </p>
                    <p> Team:
                    <select id="select3">
                    <option value="">Select Team</option>
                    </select>
                    </p>
                </div>
              <div class="col" style="text-align: left;">
                <p><span class="output"></span></p>
                  <input type="submit" name="submit" id="submit" value="SHOW GAMES" /><div></div>
                <input type="submit" name="reset" id="reset" value="Reset" />
              </div>
          </div>
          <div class="alert alert-success">
            <div class="container mt-1">
              <table class="table table-bordered table-sm">
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
    <div  class="tabcontent p-5" id="players">
      <div class="row">
        <div class="col p-3">
          <h3  style="text-align: center;">Players</h3>
          <div style="border-style: solid; border-radius: 5px; border-color: white; padding: 3%; margin: 3%;">Soccer is all about out players and we are proud to welcome everyone to the pitch. You will meet new friends and have fun learing and playing on your team. Developing skills and working together is a great way to make memories. Our players page will tell you all about our program.
          </div>
          <div class="container-fluid" style="text-align: center;">
           <a href="/players.html"><button type="button" class="btn btn-primary btn-sm">Go To Players Page</button></a>
          </div>
          <br><img src="images/kidsrunning.jpg" style="width: 100%">
        </div>
        <div class="col p-3">
          <h3  style="text-align: center;">Parents</h3>
          <div style="border-style: solid; border-radius: 5px; border-color: white; padding: 3%; margin: 3%;">Everyone in the family can get involved in the game. We work hard to make sure all of our players have a safe and active environment to learn skills that will last a lifetime.  Our parents page will give you the info you need and if you have any questions or suggestions we are there to listen. 
          </div>
          <div class="container-fluid" style="text-align: center;">
          <a href="/parents.html"><button type="button" class="btn btn-primary btn-sm">Go To Parents Page</button></a> 
        </div>
          <br>
          <img src="images/soccermoms.jpg" style="width: 100%;">
        </div>
        <br>
        </div>
    </div>
    <!--coaches-->
    <div class="tabcontent p-2" id="coaches" >
      <div class="row">
        <div class="col p-3">
          <h3  style="text-align: center;">Coaches</h3>
          <div style="border-style: solid; border-radius: 5px; border-color: white; padding: 2%; margin: 3%;">Our coaches volunteer their time to in true community spirit. Helping our kids learn the game at every level and showing them by example how to contribute to our community.
            the coaches page has information about our program.
            <div class="container-fluid p-3" style="text-align: center;">
            <a href="/coaches.html"><button type="button" class="btn btn-primary btn-sm">Go To Coaches Page</button></a>
          </div>
            </div>
          
          <br><img src="images/coach.jpg" style="width: 100%">
        </div>
        <div class="col p-3">
          <h3  style="text-align: center;">Officials</h3>
          <div style="border-style: solid; border-radius: 5px; border-color: white; padding: 2%; margin: 3%;">Being a good referee is more than blowing a whistle. Keeping things fair and encouraging sportsmanship are a part of the job. You can train to be a ref and officiate games or watch the line and wave the flag at our SDYSC park. Our officials page has more info.
            <div class="container-fluid p-3" style="text-align: center;">
             <a href="/officials.html"><button type="button" class="btn btn-primary btn-sm">Go To Officials Page</button></a></div>
            </div><br>
          <img src="images/referee.jpg" style="width: 100%;">
        </div>
        <br>
        </div>
    </div>
    </div>
    <!--center blurb-->
    <div class="px-5 py-2 my-3 text-center">
      <h1 class="pb-0 text-center">50 Great Years Of Soccer</h1>
      <div class="col-lg-8 mx-auto">
        <p class="lead mb-0 px-4">
         It seems like yesterday when the first whistle blew to start the first game. Since then we have built a large organization that is still growing day by day. We have great people, great facilities and a true love of the beautiful game. 
        </p>
      </div>
    </div>
    <!--news-->
    <div class="row row-col-3 bg-body-tertiary" style="text-align: center; padding: 2% 5%;">
      <h1 class="pb-0 text-center">CLUB NEWS</h1>
      <div class="container-fluid p-3 mb-3" style="background-color: white; border-style: solid;">
        <div class="row">
          <div class="col-4 small">
            <H4>TOURNAMENT DATES</H4>
            <ul style="text-align: left;">
              <li>U18 Boys & U11 June 2, 3</li>
              <li>U18 Girls & U13 Boys June 9, 10</li>
              <li>U13 Girls, U9 & U7 June 16, 17</li>
              <li>Woman 19+ and U8 June 23, 24</li>
            </ul>
            <P style="color: blue;">ALL GAMES PLAYED AT THE PARK</P>
          </div>
        <div class="col-4 small">
            <h4>FUN DAY</h4>
            <h5>U4-U5-U6<br>Sat. JULY 29th</h5>
            <p>GAMES<br>AWARDS<br></p>
            
          </div>
          <div class="col">
            <h4>SEASON</h4>
            <h4>2023</h4>
            <h4>HAS STARTED!</h4>
          </div>
      </div>
        
      </div>
      <!--lower News-->
      <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          <div class="col">
            <div class="card shadow-sm">
              <img src="images/IndoorSoccer.jpg" alt="">
              <div class="card-body">
                <p class="card-text">The results are in and we are announcing last years winners.</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                   <a href="/info.html"><button type="button" class="btn btn-sm btn-outline-secondary">View</button></a> 
                  </div>
                  <small class="text-body-secondary"></small>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card shadow-sm">
              <img src="images/balltrophy.jpg" alt="">
              <div class="card-body">
                <p class="card-text">Last year was a recod year and our teams played better than ever. Here are the winners.</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="/info.html"><button type="button" class="btn btn-sm btn-outline-secondary">View</button></a> 
                  </div>
                  <small class="text-body-secondary"></small>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card shadow-sm">
              <img src="images/bursarywinners.jpg" alt="">
              <div class="card-body">
                <p class="card-text">Congratulations to Zachary Lingard and Kiley Long on you both winning 2022 SDYSC RYAN CATTRYSSE MEMORIAL BURSARY AWARD</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                  </a>  <button type="button" class="btn btn-sm btn-outline-secondary">View</button></a>
                  </div>
                  <small class="text-body-secondary"></small>
                </div>
              </div>
            </div>
          </div>
       
        </div>
      </div> 
    </div>
    <div class="row p-3">
      <div class="col-6"><a href="/news/ryanaward.html"><img src="images/bursary.jpg" style="width: 90%;"></a></div>
      <div class="col-6"><img src="images/conveeners.jpg"  style="width: 90%;"></div>
    </div>
    <hr>
    <div class="row p-3 mx-5">
      <div class="col-sm-4 bg-primary text-white px-3" style="text-align: center;">
         At The AUD 
         <img src="images/aud.jpg" style="width: 100%; height: auto; padding-top: 1%;">
         <b>Fairgrounds in Simcoe</b>
      </div>
      
      <div class="col-sm-8 bg-dark text-white py-3"> <h3>INDOOR SOCCER</h3>
          <h6>Registration starts on October 1st and the season is from the end of November through end of March.</h6>
          <h6>U10, U13 & U18 mixed gender</h6>
      </div>
  </div>
   <hr>
   

    <!--Sponsors-->
    <div class="container-fluid px-5" style="text-align: center;">
      <h2>Thanks to our local sponsors who make it all possible</h2>
      <div class="row row-cols-5">
        <div class="col p-2"><img src="sponsors/arbor.jpg" style="width: 100%;"></div>
        <div class="col p-2"><img src="sponsors/bachmann.jpg" style="width: 100%;"></div>
        <div class="col p-2"><img src="sponsors/barrel.jpg" style="width: 100%;"></div>
        <div class="col p-2"><img src="sponsors/bml.jpg" style="width: 100%;"></div>
        <div class="col p-2"><img src="sponsors/boer.jpg" style="width: 100%;"></div>
        <div class="col p-2"><img src="sponsors/bulkbarn.jpg" style="width: 100%;"></div>
        <div class="col p-2"><img src="sponsors/cojo.jpg" style="width: 100%;"></div>
        <div class="col p-2"><img src="sponsors/countrytro.jpg" style="width: 100%;"></div>
        <div class="col p-2"><img src="sponsors/ddenval.jpg" style="width: 100%;"></div>
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
     
  <!--Footer-->
  <a  id="footer"></a>
  <div class="container-fluid p-3 text-white text-center" style="width: 100%; background-color: blue;">
    <div class="row">
      <div class="col p-2">
        <div class="container-fluid"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d17894.89103267856!2d-80.34367718384985!3d42.82865397385058!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882c4c3f274267a5%3A0x1068c11fe4ce3ea9!2sNorfolk%20County%20Youth%20Soccer%20Park!5e0!3m2!1sen!2sca!4v1682873399185!5m2!1sen!2sca" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
      <div class="col pt-2" style="text-align: center; line-height: 2.;">
        <h4 class="">Contact Us</h4>
        <p class="">
         <small> MAIL<br></small> Club Manager PO Box 1012<br>Simcoe, ON N3Y 5B3<br>
         <small> President<br></small> Brian Suggett - president@simcoesoccer.ca <br> 
        <small> EMAIL<br></small> Bev Suggett - clubmanager@simcoesoccer.ca <br> 
         <small> REFEREES<br></small> Joe Estrela: joe.estrela@hotmail.com<br>
         <small> * E TRANSFERS only:<br></small> sdysc.treasurer@gmail.com * 
        </p>
      </div>
    </div>
    <div style="text-align: center;">
        <small>- CREATED BY BUSINESSLORE -</small>
    </div>
  </div>
</div>
    <!--end-->
      <script>
        // When the user scrolls down 20px from the top of the document, slide down the navbar
      window.onscroll = function() {scrollFunction()};

      function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
          document.getElementById("navbar").style.top = "0";
        } else {
          document.getElementById("navbar").style.top = "-50px";
        }
      }

      function openPage(pageName,elmnt,color) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < tablinks.length; i++) {
          tablinks[i].style.backgroundColor = "";
        }
        document.getElementById(pageName).style.display = "block";
        elmnt.style.backgroundColor = color;
      }

      // Get the element with id="defaultOpen" and click on it
      document.getElementById("defaultOpen").click();

      function getOption()
        {
            selectElement = document.querySelector('#select1');
            output = selectElement.options[selectElement.selectedIndex].value;
            document.querySelector('.output').textContent = output;
        }



        // jquery calls

        // $("#facilityname").keyup(function()
        $("#submit").click(function()
        {
          var women = $("#select1").val();
          var boys = $("#select2").val();
          var co_ed = $("#select3").val();
          // var facility_name = $("#facilityname").val();

          $.ajax({ 
            url: "today_game.php",
            type: "POST",
            data: {
              cat: women,
              division: boys,
              team: co_ed,
              // facility_name: facility_name,
            },
            success: function(response)
            {
              console.log("Hello", response);
              var data = JSON.parse(response);
              var tbody = $("table tbody");
              tbody.empty();
              if (data.length > 0) {
                $.each(data, function(index, row)
                {
                  var tr = $("<tr>");
                  tr.append("<td>" + row.date + "</td>");
                tr.append("<td>" + row.time + "</td>");
                tr.append("<td>" + row.field + "</td>");
                tr.append("<td>" + row.opposition + "</td>");
                tr.append("<td>" + row.status + "</td>");
                  tbody.append(tr);
                });
              } else 
              {
                var tr = $("<tr>");
                tr.append("<td colspan='5'>No records found.</td>");
                tbody.append(tr);
              }
            }
          });
        });

        $("#reset").click(function()
        {
          $("#select1").prop('selectedIndex',0);
          $("#select2").prop('selectedIndex',0);
          $("#select3").prop('selectedIndex',0);
       //   $("#facilityname").val('')='';
		  $(".test tr").remove();
        })
        $("#calendar_ics").click(function()
        {
          var women = $("#select1").val();
          var boys = $("#select2").val();
          var co_ed = $("#select3").val();
          var facility_name = $("#calendar_ics").val();

          $.ajax({ 
            url: "ics_file.php",
            type: "POST",
            data: {
              cat: women,
              division: boys,
              team: co_ed,
              // facility_name: facility_name,
            },
            success: function(data) {
              console.log(data)
              // on success, download the ICS file
              var link = document.createElement('a');
              link.href = 'data:text/calendar;charset=utf-8,' + encodeURIComponent(data);
              link.download = 'calendar.ics';
              document.body.appendChild(link);
              link.click();
              document.body.removeChild(link);
            },
          });
        });



        $("#select1").change(function ()
        {
          // alert("ok")
          var select1 = this.value;
          console.log(select1)
          $.ajax({ 
            url: "fetch_category.php",
            type: "POST",
            data: {
              select1: select1,
            },
            success: function(data) 
            {
              console.log(data)
              $("#select3").val('');
              var data = JSON.parse(data);
              var tbody = $("#select2");
              tbody.empty();
              if (data.length > 0) {
                var tr = $("<option value=''>Select Division</option>");
                tbody.append(tr);
                $.each(data, function(index, row)
                {
                  var tr = $("<option value='"+ row.division_name +"'>"+row.division_name+"</option>");
                  tbody.append(tr);
                });
              } else 
              {
                var tr = $("<option value=''>Select Division</option>");
                tbody.append(tr);
              }
             
            },
          });
        })


        $("#select2").change(function ()
        {
          var select2 = this.value;
          console.log(select2)
          $.ajax({ 
            url: "fetch_team.php",
            type: "POST",
            data: {
              select2: select2,
            },
            success: function(data) {
              console.log("return", data)
              $("#select3").val();
              var data = JSON.parse(data);
              var tbody = $("#select3");
             
              tbody.empty();
              if (data.length > 0) 
              {
                var tr = $("<option value=''>Select Team</option>");
                tbody.append(tr);
                $.each(data, function(index, row)
                {
                  var tr = $("<option value='"+ row.team_name +"'>"+row.team_name+"</option>");
                  tbody.append(tr);
                });
              } else 
              {
                var tr = $("<option value=''>Select Team</option>");
                tbody.append(tr);
              }
            },
          });
        })
      </script>
              
</body>
</html> 
