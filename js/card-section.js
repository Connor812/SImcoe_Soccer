if ($("#card_section").length > 0) {
    const card_container = $("#card_section");
    const card_num = $("#card_section").attr("card_num");
    const card_heading = `#card_${card_num}_heading`;
    const card_heading_input = `#card_${card_num}_heading_input`;
    const card_text = `#card_${card_num}_text`;
    const card_text_input = `#card_${card_num}_text_input`;
    const card_image_input = `#card_${card_num}_image_input`;
    const card_image = `#card_${card_num}_image`;
    const originalCardImage = $(card_image).attr("src");
    const closeBtn = $('<button>', {
        id: 'close-card-section',
        class: 'btn btn-primary card-close-btn',
        text: 'Close',
        card_num: card_num,
        value: originalCardImage
    });

    card_container.append(closeBtn);
    $("#close-card-section").on("click", function (event) {

        $(card_image).attr("src", originalCardImage);
        $(card_container).remove();
    });

    $("#card-form").change(function (event) {
        console.log("change")
        if ($("#card-submit-btn-container").find('#card-upload-btn').length === 0) {
            const uploadButton = $('<button>', {
                id: 'card-upload-btn',
                class: 'btn btn-primary input-group-text',
                text: 'Upload',
                type: 'submit'
            });

            $("#card-submit-btn-container").append(uploadButton);
        }
    });

    $(card_heading_input).on("input", function (event) {
        $(card_heading).text($(card_heading_input).val());
    });
    $(card_text_input).on("input", function (event) {
        $(card_text).text($(card_text_input).val());
    });

    $(card_image_input).on("change", function (event) {
        event.preventDefault();
        const selectedFile = this.files[0];

        if (selectedFile) {
            const reader = new FileReader();

            reader.onload = function (e) {
                const imageDataUrl = e.target.result;
                $(card_image).attr("src", imageDataUrl);
            };

            reader.readAsDataURL(selectedFile);
        }
    })
}
