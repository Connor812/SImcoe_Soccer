const originalAd1Image = $("#ad-image-1").attr("src");

$("#ad-image-1-input").change(function () {
    const file = this.files[0];

    if (file) {
        const reader = new FileReader();

        reader.onload = function (e) {
            const imageDataUrl = e.target.result;
            $("#ad-image-1").attr("src", imageDataUrl);
        };

        reader.readAsDataURL(file);
    }

    displayAd1SubmitBtn(originalAd1Image);

});

$("#ad-text-1-input").on("input", function (event) {
    $("#ad-text-1").text($("#ad-text-1-input").val());
    displayAd1SubmitBtn(originalAd1Image);
});

$("#ad-link-1-input").on("input", function (event) {
    displayAd1SubmitBtn(originalAd1Image);
});


function displayAd1SubmitBtn (originalAd1Image) {
    // Checks if it needs to render the button again
    if ($("#ad_1_submit_btn_container").find("#ad-1-submit-btn").length === 0) {
        const uploadButton = $('<button>', {
            id: 'ad-1-submit-btn',
            class: 'btn btn-primary input-group-text hide',
            text: 'Upload',
            type: 'submit'
        });
        const resetButton = $('<button>', {
            id: 'reset-ad-1-image-btn',
            class: 'btn btn-primary',
            text: 'Reset',
            value: originalAd1Image
        });

        $("#ad_1_submit_btn_container").append(uploadButton);
        $("#ad_1_submit_btn_container").append(resetButton);
        addEventListerToRestartAd1Image();
    }
}



function addEventListerToRestartAd1Image() {
    $("#reset-ad-1-image-btn").on("click", function (event) {
        event.preventDefault();
        const src = $(this).val();

        $("#ad-image-1").attr("src", src);
        $("#ad-1-submit-btn").remove();
        $("#reset-ad-1-image-btn").remove();
        $("#ad-image-1-input").val("")
    });
}