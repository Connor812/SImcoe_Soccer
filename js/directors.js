document.addEventListener('DOMContentLoaded', function () {

    const directors = document.querySelectorAll(".director");
    const form =
        console.log(directors);

    directors.forEach((director) => {
        director.addEventListener("click", function (event) {

            const id = this.value;
            console.log(this.getAttribute("name"));
            console.log(this.getAttribute("position"));

            const newPositionInput = document.getElementById("new-position");
            const newNameInput = document.getElementById("new-name");
            const updateDirectorForm = document.getElementById("update-director-form");
            const deleteDirectorForm = document.getElementById("delete-director-form");

            newPositionInput.value = this.getAttribute("position");
            newNameInput.value = this.getAttribute("name");
            updateDirectorForm.setAttribute("action", `admin-functions/update-director.php?id=${id}`);
            deleteDirectorForm.setAttribute("action", `admin-functions/delete-director.php?id=${id}`);

        });
    });
});