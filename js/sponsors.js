const indoorSponsorBtns = document.querySelectorAll(".delete-indoor-sponsor-btn");

indoorSponsorBtns.forEach(btn => {

    btn.addEventListener("mouseover", (event) => {
        const sponsor_image_id = btn.getAttribute("sponsor-id");
        const img = document.getElementById(`sponsor-img-${sponsor_image_id}`);

        img.classList.add("delete-sponsor-img");
    });

    btn.addEventListener("mouseout", (event) => {
        const sponsor_image_id = btn.getAttribute("sponsor-id");
        const img = document.getElementById(`sponsor-img-${sponsor_image_id}`);

        img.classList.remove("delete-sponsor-img");
    }); 
});

const outdoorSponsorBtns = document.querySelectorAll(".delete-outdoor-sponsor-btn");

outdoorSponsorBtns.forEach(btn => {

    btn.addEventListener("mouseover", (event) => {
        const sponsor_image_id = btn.getAttribute("sponsor-id");
        const img = document.getElementById(`sponsor-img-${sponsor_image_id}`);

        img.classList.add("delete-sponsor-img");
    });

    btn.addEventListener("mouseout", (event) => {
        const sponsor_image_id = btn.getAttribute("sponsor-id");
        const img = document.getElementById(`sponsor-img-${sponsor_image_id}`);

        img.classList.remove("delete-sponsor-img");
    }); 
});