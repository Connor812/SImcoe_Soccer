// This handles changes in the Registration section

let registrationFormChanged = false;

const originalRegistrationFormData = $("#registration-form").serialize();

$("#registration-form").on("input", function () {
    // Check if changes have already been detectet
    if ($("#registration-info-submit-btn-container").find("#registration-info-date-submit-btn").length === 0) {
        const uploadButton = $('<button>', {
            id: 'registration-info-date-submit-btn',
            class: 'btn btn-primary',
            text: 'Submit Changes',
            type: 'submit'
        });
        $("#registration-info-submit-btn-container").append(uploadButton);
    }

});

// Update heading and text when input changes
$('#registration-heading-input').on('input', function () {
    var newHeading = $(this).val();
    $('#registration-heading').text(newHeading);
});

$('#registration-date-input').on('input', function () {
    var newText = $(this).val();
    $('#registration-date').text(newText);
});