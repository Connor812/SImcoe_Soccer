 // When the user scrolls down 20px from the top of the document, slide down the navbar
 window.onscroll = function() {
    scrollFunction()
};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("navbar").style.top = "0";
    } else {
        document.getElementById("navbar").style.top = "-50px";
    }
}

function openPage(pageName, elmnt, color) {
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

function getOption() {
    selectElement = document.querySelector('#select1');
    output = selectElement.options[selectElement.selectedIndex].value;
    document.querySelector('.output').textContent = output;
}



// jquery calls

// $("#facilityname").keyup(function()
$("#submit").click(function() {
    const divsion = $("#select1").val();
    const team = $("#select2").val();
    
    // var facility_name = $("#facilityname").val();

    $.ajax({
        url: "today_game.php",
        type: "POST",
        data: {
            division: divsion,
            team: team,
            // facility_name: facility_name,
        },
        success: function(response) {
            console.log("Hello", response);
            var data = JSON.parse(response);
            var tbody = $("table tbody");
            tbody.empty();
            if (data.length > 0) {
                $.each(data, function(index, row) {
                    var tr = $("<tr>");
                    tr.append("<td>" + row.date + "</td>");
                    tr.append("<td>" + row.time + "</td>");
                    tr.append("<td>" + row.field + "</td>");
                    tr.append("<td>" + row.opposition + "</td>");
                    tr.append("<td>" + row.status + "</td>");
                    tbody.append(tr);
                });
            } else {
                var tr = $("<tr>");
                tr.append("<td colspan='5'>No records found.</td>");
                tbody.append(tr);
            }
        }
    });
});

$("#reset").click(function() {
    $("#select1").prop('selectedIndex', 0);
    $("#select2").prop('selectedIndex', 0);
    $("#select3").prop('selectedIndex', 0);
    //   $("#facilityname").val('')='';
    $(".test tr").remove();
})
$("#calendar_ics").click(function() {
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



$("#select1").change(function() {
    // alert("ok")
    var select1 = this.value;
    console.log(select1)
    $.ajax({
        url: "fetch_category.php",
        type: "POST",
        data: {
            select1: select1,
        },
        success: function(data) {
            console.log(data)
            $("#select3").val('');
            var data = JSON.parse(data);
            var tbody = $("#select2");
            tbody.empty();
            if (data.length > 0) {
                var tr = $("<option value=''>Select Division</option>");
                tbody.append(tr);
                $.each(data, function(index, row) {
                    var tr = $("<option value='" + row.division_name + "'>" + row
                        .division_name + "</option>");
                    tbody.append(tr);
                });
            } else {
                var tr = $("<option value=''>Select Division</option>");
                tbody.append(tr);
            }

        },
    });
})


$("#select2").change(function() {
    var select2 = this.value;
    var select1 = $('#select1').val();
    // console.log("select 1", select1, "select2", select2);
    // console.log(select2)
    $.ajax({
        url: "fetch_team.php",
        type: "POST",
        data: {
            select2: select2,
            select1: select1,
        },
        success: function(data) {
            console.log("return", data)
            $("#select3").val();
            var data = JSON.parse(data);
            var tbody = $("#select3");

            tbody.empty();

            options = '<option value="">Select Team</option>';
            for (let i = 0; i < data.length; i++) {
                options +=
                    `<option value="${data[i].team_name}">${data[i].team_name}</option>`
            }
            document.getElementById("select3").innerHTML = options;

            // if (data.length > 0) 
            // {
            //   var tr = $("<option value=''>Select Team</option>");
            //   tbody.append(tr);
            //   $.each(data, function(index, row)
            //   {
            //     var tr = $("<option value='"+ row.team_name +"'>"+row.team_name+"</option>");
            //     tbody.append(tr);
            //   });
            // } else 
            // {
            //   var tr = $("<option value=''>Select Team</option>");
            //   tbody.append(tr);
            // }
        },
    });
})