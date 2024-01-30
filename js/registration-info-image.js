$("#new-registration-info-image").change(function () {
    const fileInput = $(this)[0]; // Get the DOM element
    const file = fileInput.files[0];
    const originalRegistrationInfoImage = $("#registration-info-image").attr("src");

    if (file) {
        const reader = new FileReader();

        reader.onload = function (e) {
            const imageDataUrl = e.target.result;
            $("#registration-info-image").attr("src", imageDataUrl);
        };

        reader.readAsDataURL(file);
    }

    // Checks if it needs to render the button again
    if ($("#upload-registration-info-img-submit-btn").length === 0) {
        const uploadButton = $('<button>', {
            id: 'upload-registration-info-img-submit-btn',
            class: 'btn btn-primary input-group-text hide',
            text: 'Upload',
            type: 'submit'
        });
        const resetButton = $('<button>', {
            id: 'reset-registration-btn',
            class: 'btn btn-primary',
            text: 'Reset',
            value: originalRegistrationInfoImage
        });

        $("#registration-image-upload-btn-container").append(uploadButton);
        $("#registration-image-upload-btn-container").append(resetButton);
        addEventListenerToRegistrationResetBtn();
    }

});

function addEventListenerToRegistrationResetBtn() {
    $("#reset-registration-btn").on("click", function (event) {
        event.preventDefault();
        const src = $(this).val();

        $("#registration-info-image").attr("src", src);
        $("#upload-registration-info-img-submit-btn").remove();
        $("#reset-registration-btn").remove();
        $("#new-registration-info-image").val("")
    });
}
