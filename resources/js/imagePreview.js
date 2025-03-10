(function () {
    // Function to preview the image and save to sessionStorage
    function previewImage(event) {
        const input = event.target;
        const image = document.getElementById("avatar-preview");
        const file = input.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                image.src = e.target.result;
                image.classList.remove("hidden");
                sessionStorage.setItem("avatarPreview", e.target.result);
            };
            reader.readAsDataURL(file);
        } else {
            image.src = "#";
            image.classList.add("hidden");
            sessionStorage.removeItem("avatarPreview");
        }
    }

    // Wait for the DOM to be fully loaded
    document.addEventListener("DOMContentLoaded", () => {
        const avatarInput = document.getElementById("avatar");
        const avatarPreview = document.getElementById("avatar-preview");
        const savedImage = sessionStorage.getItem("avatarPreview");

        // If a saved image exists, display it
        if (savedImage) {
            avatarPreview.src = savedImage;
            avatarPreview.classList.remove("hidden");
        }

        // Attach the change event listener to the file input
        if (avatarInput) {
            avatarInput.addEventListener("change", previewImage);
        }

        // Optionally clear sessionStorage on form submission to avoid persisting preview after upload
        const form = document.querySelector("form");
        if (form) {
            form.addEventListener("submit", () => {
                sessionStorage.removeItem("avatarPreview");
            });
        }
    });
})();
