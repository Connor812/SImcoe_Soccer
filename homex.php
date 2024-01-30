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
    <a href="/index.html"><img fluid src="images/ball.png" style="width: 50%" alt="Ball"></a>
    <a href="/news.html">News</a>
    <a href="/players.html">Players</a>
    <a href="/parents.html">Parents</a>
    <a href="/coaches.html">Coaches</a>
    <a href="/officials.html">Officials</a>
    <a href="/info.html">Info</a>
    <a href="#footer">Contact Us</a>
  </div>
  
<div class="wrapper" style="width: 100%;">
    <!--JumboImage-->
    <img src="images/50jumbo.jpg" class="img-fluid" width="100%" alt="50 Years of Soccer">
    <!--sections-->
  <div class="container-fluid p-0 m-0" style="width: 100%;">
    <button class="tablink" onclick="openPage('registration', this, 'red')"  id="defaultOpen">REGISTRATION</button>
    <button class="tablink" onclick="openPage('games', this, 'green')">TODAYS GAMES</button>
    <button class="tablink" onclick="openPage('players', this, 'blue')">PLAYERS &amp; PARENTS</button>
    <button class="tablink" onclick="openPage('coaches', this, 'orange')">COACHES &amp; OFFICIALS</button>
    <!--Registration-->
    <div class="tabcontent p-2" id="registration" >
      <div class="row px-5 py-3" style="text-align: center;" >
        <div class="col col-lg-4 col-sm-5 p-0 center">
          <img src="images/CrestLOGO1.png" width="80%" height="mx-auto">
        </div>
        <div class="col">
          <h2 style="font-size: 3vw;">2023 SUMMER SEASON</h2>
          <p>res qui perferendis itaque et sint alias et reprehenderit dolores et nihil rerum a nemo rerum. In molestiae cumque non amet molestiae </p>
          <h4 style="font-size: 2vw;">Lorem ipsum dolor sit amet. Quo asperiores dolores qui perferendis itaque et sint alias et reprehenderit dolores et nihil rerum a nemo.
          </h4>
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
                    <div><img src="images/powerupscreen.png" class="mx-auto d-block" width="50%"></div>
                    <br>
                    <p style="color: black; text-align: center;">Our soccer fields are located in Southern Ontario near Lake Erie</p>
                    <p style="color: black; text-align: center;">If you have any questions pleasea contact us: admin@simcoesoccer.com</p>
                  
                  </div>

                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">CONTINUE</button>
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
            <p style="text-align: center;">Choose a division</p>
            <div class="col" style="text-align: right;"> 
              <p> Women and Girls:
              <select id="select1">
                <option value="">Divisions</option>
                <option value="U13 Girls">U13 Girls</option>
                <option value="Women 19+">Women 19+</option>
                <option value="U18 Girls">U18 Girls</option>
              </select>
              </p>
              <p> Boys:
              <select id="select2">
                <option value="">Divisions</option>
                <option value="U18 Boys">U18 Boys</option>
                <option value="U13 Boys">U13 Boys</option>
                </select>
                </p>
              <p> CoEd:
              <select id="select3">
                <option value="">Divisions</option>
                <option value="U11 Co Ed">U11 CoEd</option>
                <option value="U8 CoEd">U8 CoEd</option>
                <option value="U9 CoEd">U9 CoEd</option>
                <option value="U4 CoEd">U4 CoEd</option>
                <option value="U5 CoEd">U5 CoEd</option>
                <option value="U6 CoEd">U6 CoEd</option>
                <option value="U7 CoEd">U7 CoEd</option>
                </select>
                </p>
            </div>
            <div class="col" style="text-align: left;">
              <p><span class="output"></span></p>
              <input type="text" placeholder="Enter Home Team Name" id="facilityname" style="text-align: center;">
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
                <tbody> 
                </tbody>
              </table>

              <div class="row">
                <div class="col"><button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#fieldmap">Map of fields</button>
                </div>
                <div class="col"><button class="btn btn-success btn-sm" id="calendar_ics">Add to your calendar</button>
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
              <h4 class="modal-title" style="text-align: center;">FIELD MAP</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" style="text-align: center;">
              <img src="images/fieldmap.jpg" style="width: 90%;">
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

          </div>
        </div>
      </div>
    <!--players-->
    <div  class="tabcontent p-2" id="players">
      <div class="row">
        <div class="col p-3">
          <h3  style="text-align: center;">Players</h3>
          <p>Lorem ipsum dolor sit amet. Quo asperiores dolores qui perferendis itaque et sint alias et reprehenderit dolores et nihil rerum a nemo rerum. In molestiae cumque non amet molestiae non quidem quasi.
          </p>
          <div class="container-fluid" style="text-align: center;">
            <button type="button" class="btn btn-primary btn-sm">Go To Players Page</button></div>
          <br><img src="images/kidsrunning.jpg" style="width: 100%">
        </div>
        <div class="col p-3">
          <h3  style="text-align: center;">Parents</h3>
          <p>Lorem ipsum dolor sit amet. Quo asperiores dolores qui perferendis itaque et sint alias et reprehenderit dolores et nihil rerum a nemo rerum. In molestiae cumque non amet molestiae non quidem quasi.
          </p>
          <div class="container-fluid" style="text-align: center;">
            <button type="button" class="btn btn-primary btn-sm">Go To Parents Page</button></div>
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
          <p>Lorem ipsum dolor sit amet. Quo asperiores dolores qui perferendis itaque et sint alias et reprehenderit dolores et nihil rerum a nemo rerum. In molestiae cumque non amet molestiae non quidem quasi.
          </p>
          <div class="container-fluid" style="text-align: center;">
            <button type="button" class="btn btn-primary btn-sm">Go To Coaches Page</button></div>
          <br><img src="images/coach.jpg" style="width: 100%">
        </div>
        <div class="col p-3">
          <h3  style="text-align: center;">Officials</h3>
          <p>Lorem ipsum dolor sit amet. Quo asperiores dolores qui perferendis itaque et sint alias et reprehenderit dolores et nihil rerum a nemo rerum. In molestiae cumque non amet molestiae non quidem quasi.
          </p>
          <div class="container-fluid" style="text-align: center;">
            <button type="button" class="btn btn-primary btn-sm">Go To Officials Page</button></div>
          <br>
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
          Hic mollitia necessitatibus et alias galisum non repellendus quia a consequatur excepturi ut fugit reprehenderit quo animi repudiandae. Aut aliquam quidem sed minima quod ut consequuntur nemo. Rem soluta provident et molestiae laborum ut voluptatem sint 33 rerum deleniti ex numquam nobis ut facilis blanditiis. Et aspernatur vitae et facilis necessitatibus aut adipisci sequi.
        </p>
      </div>
    </div>
    <!--news-->
    <div class="album py-3 bg-body-tertiary">
      <h1 class="pb-0 text-center">CLUB NEWS</h1>
      <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 row-cols-lg-4 g-4">
          <div class="col">
            <div class="card shadow-sm">
              <img src="images/kidref.png" alt="">
              <div class="card-body">
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  </div>
                  <small class="text-body-secondary"></small>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card shadow-sm">
              <img src="images/kidref.png" alt="">
              <div class="card-body">
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  </div>
                  <small class="text-body-secondary"></small>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card shadow-sm">
              <img src="images/kidref.png" alt="">
              <div class="card-body">
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  </div>
                  <small class="text-body-secondary"></small>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card shadow-sm">
              <img src="images/kidref.png" alt="">
              <div class="card-body">
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      
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
      <div class="col-6"><img src="images/bursary.jpg" style="width: 90%;"></div>
      <div class="col-6"><img src="images/coachesneeded.jpg"  style="width: 90%;"></div>
    </div>
    <div style="text-align: center;">
      <hr>
    </div>
    <!--Sponsors-->
   <div style="text-align: center;">
      <h2>Thanks to our local sponsors who make it all possible</h2>
      <div class="rowi">
        <div class="columni">
          <img src="sponsors/springview.jpg"  class="responsive center">
          <img src="sponsors/sponsorDemeyre.jpg"  class="responsive center">
        </div>
        <div class="columni">
          <img src="sponsors/koncir.jpg" class="responsive center">
          <img src="sponsors/Home-Building-Centre-1.png" class="responsive center">
          <img src="" class="responsive center">
        </div>
        <div class="columni">
          <img src="sponsors/sponserEldercare.jpg"  class="responsive center">
          <img src="sponsors/goodRed.jpg" class="responsive center">
          </div>
        <div class="columni">
          <img src="sponsors/sponserEldercare.jpg"  class="responsive center">
      </div>
      <div class="columni">
        <img src="sponsors/sponserEldercare.jpg"  class="responsive center">
        </div>
      </div>
    </div>
    <div style="height: 100px;"></div>
  <!--Footer-->
  <a  id="footer">test</a>
  <div class="container-fluid p-3 bg-primary text-white text-center" style="width: 100%;">
    <div class="row">
      <div class="col p-2">
        <div class="container-fluid"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d17894.89103267856!2d-80.34367718384985!3d42.82865397385058!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882c4c3f274267a5%3A0x1068c11fe4ce3ea9!2sNorfolk%20County%20Youth%20Soccer%20Park!5e0!3m2!1sen!2sca!4v1682873399185!5m2!1sen!2sca" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
      <div class="col pt-2" style="text-align: center; line-height: 2.;">
        <h4 class="">Contact Us</h4>
        <p class="">
         <small> MAIL<br></small> Club Manager PO Box 1012<br>Simcoe, ON N3Y 5B3<br>
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
        } else 
        {
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
      // document.getElementById("defaultOpen").click();

      function getOption() {
            selectElement = document.querySelector('#select1');
            output = selectElement.options[selectElement.selectedIndex].value;
            document.querySelector('.output').textContent = output;
        }


        $("#facilityname").keyup(function()
        {
          var women = $("#select1").val();
          var boys = $("#select2").val();
          var co_ed = $("#select3").val();
          var facility_name = $("#facilityname").val();

          $.ajax({ 
            url: "today_game.php",
            type: "POST",
            data: {
              women: women,
              boys: boys,
              co_ed: co_ed,
              facility_name: facility_name,
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
          $("#facilityname").val('')='';
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
              women: women,
              boys: boys,
              co_ed: co_ed,
              facility_name: facility_name,
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
      </script>
              
</body>
</html> 
