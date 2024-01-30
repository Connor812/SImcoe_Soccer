const originalAd2Image = $("#ad-image-2").attr("src");

$("#ad-image-2-input").change(function () {
    const file = this.files[0];

    if (file) {
        const reader = new FileReader();

        reader.onload = function (e) {
            const imageDataUrl = e.target.result;
            $("#ad-image-2").attr("src", imageDataUrl);
        };

        reader.readAsDataURL(file);
    }

    displayAd2SubmitBtn(originalAd2Image);

});

$("#ad-text-2-input").on("input", function (event) {
    $("#ad-text-2").text($("#ad-text-2-input").val());
    displayAd2SubmitBtn(originalAd2Image);
});

$("#ad-link-2-input").on("input", function (event) {
    displayAd2SubmitBtn(originalAd2Image);
});


function displayAd2SubmitBtn (originalAd2Image) {
    // Checks if it needs to render the button again
    if ($("#ad_2_submit_btn_container").find("#ad-2-submit-btn").length === 0) {
        const uploadButton = $('<button>', {
            id: 'ad-2-submit-btn',
            class: 'btn btn-primary input-group-text hide',
            text: 'Upload',
            type: 'submit'
        });
        const resetButton = $('<button>', {
            id: 'reset-ad-2-image-btn',
            class: 'btn btn-primary',
            text: 'Reset',
            value: originalAd2Image
        });

        $("#ad_2_submit_btn_container").append(uploadButton);
        $("#ad_2_submit_btn_container").append(resetButton);
        addEventListerToRestartAd2Image();
    }
}



function addEventListerToRestartAd2Image() {
    $("#reset-ad-2-image-btn").on("click", function (event) {
        event.preventDefault();
        const src = $(this).val();

        $("#ad-image-2").attr("src", src);
        $("#ad-2-submit-btn").remove();
        $("#reset-ad-2-image-btn").remove();
        $("#ad-image-2-input").val("")
    });
}