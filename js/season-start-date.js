// This handles changes in the Registration section

let seasonDateFormChanged = false;

const originalSeasoDateFormData = $("#season_date").serialize();

$("#season_date").on("input change", function () {
    // Check if changes have already been detected
    if (seasonDateFormChanged) {
        return;
    }

    const currentFormData = $("#season_date").serialize();

    if (currentFormData === originalSeasoDateFormData) {
        console.log("No changes have been made");
    } else {
        const uploadButton = $('<button>', {
            id: 'season-date-submit-btn',
            class: 'btn btn-primary',
            text: 'Submit Changes',
            type: 'submit'
        });

        $("#season_start_date_submit_btn").append(uploadButton);

        // Set the flag to indicate changes have been detected
        seasonDateFormChanged = true;
    }
});

// Update heading and text when input changes
$('#season_start_date_input').on('input', function () {
    var newHeading = $(this).val();
    $('#season_start_date_text').text(newHeading);
});

$('#u6_start_date_input').on('input', function () {
    var newText = $(this).val();
    $('#u6_start_date_text').text(newText);
});