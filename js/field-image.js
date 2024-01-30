// New hero Image
$("#field-image-form").change(function (event) {
    console.log("Change");
    const fileInput = $(event.target); // Get the DOM element
    const file = fileInput.prop('files')[0];
    const originalFieldImage = $("#field-image").attr("src");

    if (file) {
        const reader = new FileReader();

        reader.onload = function (e) {
            const imageDataUrl = e.target.result;
            $("#field-image").attr("src", imageDataUrl);
        };

        reader.readAsDataURL(file);
    }

    // Checks if it needs to render the button again
    if ($("#field-img-submit-btn").find('#field-img-submit-btn').length === 0) {
        const uploadButton = $('<button>', {
            id: 'field-img-submit-btn',
            class: 'btn btn-primary input-group-text hide',
            text: 'Upload',
            type: 'submit'
        });
        const resetButton = $('<button>', {
            id: 'reset-field-image',
            class: 'btn btn-primary',
            text: 'Reset',
            value: originalFieldImage
        });

        $("#field-img-submit-container").append(uploadButton);
        $("#field-img-submit-container").append(resetButton);
        addEventListenerToFieldResetBtn();
    }

});

function addEventListenerToFieldResetBtn() {
    $("#reset-field-image").on("click", function (event) {
        event.preventDefault();
        const src = $(this).val();

        $("#field-image").attr("src", src);
        $("#field-img-submit-btn").remove();
        $("#reset-field-image").remove();
        $("#new-field-image").val("")
    });
}