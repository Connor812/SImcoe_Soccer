$(document).ready(function () {
    // Listen for changes in the file input
    $('#news-image-input').change(function () {
        // Read the selected file
        readURL(this);
    });


    $("#news-heading-input").on("input", function (event) {
        $("#news-heading").text($("#news-heading-input").val());
    });

    $("#news-text-input").on("input", function (event) {
        $("#news-text").text($("#news-text-input").val());
    });

    // Function to read the selected file and display it
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                // Set the source of the image element
                $('#news-image').attr('src', e.target.result);
            };

            // Read the file as a data URL
            reader.readAsDataURL(input.files[0]);
        }
    }
});

