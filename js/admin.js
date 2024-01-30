//  Function to update the registration btn
$(document).ready(function () {

    // If There is the floating error or success handler, then add an event listener to the remove button, and remove the container once clicked
    if (document.getElementById('floating-error-btn')) {
        const floatingErrorBtn = document.getElementById('floating-error-btn');
        floatingErrorBtn.addEventListener('click', (event) => {
            event.preventDefault();
            const idOfErrorBox = floatingErrorBtn.value;
            const errorBox = document.getElementById(idOfErrorBox);
            errorBox.remove();
        });
    }

    console.log(document.getElementById('floating-success-btn'));
    if (document.getElementById('floating-success-btn')) {
        const floatingSuccessBtn = document.getElementById('floating-success-btn');
        floatingSuccessBtn.addEventListener('click', (event) => {
            event.preventDefault();
            const idOfSuccessBox = floatingSuccessBtn.value;
            const successBox = document.getElementById(idOfSuccessBox);
            successBox.remove();
        });
    }

    // New hero Image
    $("#new-hero-img").change(function () {
        const fileInput = $(this)[0]; // Get the DOM element
        const file = fileInput.files[0];
        const originalHeroImage = $("#hero-img").attr("src");

        if (file) {
            const reader = new FileReader();

            reader.onload = function (e) {
                const imageDataUrl = e.target.result;
                $("#hero-img").attr("src", imageDataUrl);
            };

            reader.readAsDataURL(file);
        }

        // Checks if it needs to render the button again
        if ($("#upload-hero-img-submit-btn").length === 0) {
            const uploadButton = $('<button>', {
                id: 'upload-hero-img-submit-btn',
                class: 'btn btn-primary input-group-text hide',
                text: 'Upload',
                for: 'new-hero-img',
                type: 'submit'
            });
            const resetButton = $('<button>', {
                id: 'reset-btn',
                class: 'btn btn-primary',
                text: 'Reset',
                value: originalHeroImage
            });

            $("#hero-upload-btn").append(uploadButton);
            $("#hero-upload-btn").append(resetButton);
            addEventListenerToResetBtn();
        }

    });

    function addEventListenerToResetBtn() {
        $("#reset-btn").on("click", function (event) {
            event.preventDefault();
            const src = $(this).val();

            $("#hero-img").attr("src", src);
            $("#upload-hero-img-submit-btn").remove();
            $("#reset-btn").remove();
            $("#new-hero-img").val("")
        });
    }

    // Attach a click event listener to the dropdown items
    $('.dropdown-item').on('click', function () {
        // Get the value attribute of the clicked item
        var selectedValue = $(this).attr("value");

        var formData = {
            status: selectedValue
        };
        console.log(formData);

        // Perform AJAX POST request
        $.ajax({
            type: "POST",
            url: "admin-functions/update-registration-status.php",
            data: formData,
            dataType: "json", // Expect JSON response
            success: function (response) {
                const res = response.success
                registrationMessage(res, formData.status);
            },
            error: function (error) {
                const res = error.responseJSON.error;
                registrationMessage(res, formData.status);
            }
        });
    });
});

function registrationMessage(res, status) {
    const registrationBtn = $("#registration-btn");
    if (res == "Update successful") {
        registrationBtn.text(`registration ${status}`)
    }

    if (status == "open") {
        registrationBtn.removeAttr("disabled");
    }
    if (status == "closed") {
        registrationBtn.attr("disabled", "disabled");
    }

    const registrationStateResult = $("#registration-state-result");
    let className = "registration-success";
    if (res != "Update successful" && res != "No changes made") {
        className = "registration-error";
    }
    registrationStateResult.text(res).removeClass("registration-error").addClass(className);
}

//  End of Update registration btn