$(document).ready(function () {
    // Listen for changes in the file input
    $('#announcement-image').change(function () {
        // Read the selected file
        readURL(this)
    });


    $("#heading-input").on("input", function (event) {
        $("#heading").text($("#heading-input").val());
    });

    $("#text-input").on("input", function (event) {
        $("#text").text($("#text-input").val());
    });

    // Function to read the selected file and display it
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                // Set the source of the image element
                $('#image').attr('src', e.target.result);
            };

            // Read the file as a data URL
            reader.readAsDataURL(input.files[0]);
        }
    }
});

