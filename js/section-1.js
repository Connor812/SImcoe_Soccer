// This handles changes in the section - 1 section

let formChanged = false;

const originalFormData = $("#section-1-form").serialize();

$("#section-1-form").on("input change", function () {
    // Check if changes have already been detected
    if (formChanged) {
        return;
    }

    const currentFormData = $("#section-1-form").serialize();

    if (currentFormData === originalFormData) {
        console.log("No changes have been made");
    } else {
        const uploadButton = $('<button>', {
            id: 'section-1-submit-btn',
            class: 'btn btn-primary',
            text: 'Submit Changes',
            type: 'submit'
        });

        $("#section-1-submit-btn-container").append(uploadButton);

        // Set the flag to indicate changes have been detected
        formChanged = true;
    }
});

// Update heading and text when input changes
$('#section-1-heading-input').on('input', function () {
    var newHeading = $(this).val();
    $('#section-1-heading').text(newHeading);
});

$('#section-1-text-input').on('input', function () {
    var newText = $(this).val();
    $('#section-1-text').text(newText);
});
