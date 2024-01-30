$("#registration-date-form").on("change", function (event) {
    event.preventDefault();


    if ($("#registration-submit-btn-container").find($("#registration-year-submit-btn")).length === 0) {

        const uploadButton = $('<button>', {
            id: 'registration-year-submit-btn',
            class: 'btn btn-primary input-group-text',
            text: 'Upload',
            type: 'submit'
        });

        $("#registration-submit-btn-container").append(uploadButton);
    }
});

$("#registration-year-input").on("input", function (event) {
    event.preventDefault();
    $("#registration-year").text($("#registration-year-input").val());
});

$("#registration-start-date-input").on("input", function (event) {
    event.preventDefault();
    $("#registration-start-date").text($("#registration-start-date-input").val());
});