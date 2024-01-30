$("#rules-regulations-form").on("change", function () {
console.log("change");

displaySubmitBtn();

});

$("#link-rules-text").on("input", function (event) {
    event.preventDefault();
    $("#link-pdf-btn").text($("#link-rules-text").val());
});

function displaySubmitBtn() {
    // Checks if it needs to render the button again
    if ($("#rules-regulations-submit-btn-container").find('#rules-regulations-submit-btn').length === 0) {
        const uploadButton = $('<button>', {
            id: 'rules-regulations-submit-btn',
            class: 'btn btn-primary input-group-text hide',
            text: 'Upload',
            type: 'submit'
        });

        $("#rules-regulations-submit-btn-container").append(uploadButton);
    }
}