document.addEventListener('DOMContentLoaded', function () {

    const pastPresidents = document.querySelectorAll(".past_president");
    const form =
        console.log(pastPresidents);

    pastPresidents.forEach((president) => {
        president.addEventListener("click", function (event) {

            const id = this.value;
            console.log(this.getAttribute("name"));
            console.log(this.getAttribute("year"));

            const newYearInput = document.getElementById("new-past-year");
            const newNameInput = document.getElementById("new-past-name");
            const updatePastPresidentForm = document.getElementById("update-past-president-form");
            const deletePastPresidentForm = document.getElementById("delete-past-president-form");

            newYearInput.value = this.getAttribute("year");
            newNameInput.value = this.getAttribute("name");
            updatePastPresidentForm.setAttribute("action", `admin-functions/update-past-presidents.php?id=${id}`);
            deletePastPresidentForm.setAttribute("action", `admin-functions/delete-past-presidents.php?id=${id}`);

        });
    });
});