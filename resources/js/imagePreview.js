sessionStorage.removeItem("avatarPreview");
sessionStorage.removeItem("thumbnailPreview");

document.addEventListener("DOMContentLoaded", () => {
    const avatarInput = document.getElementById("avatar");
    const avatarPreview = document.getElementById("avatar-preview");
    const savedAvatar = sessionStorage.getItem("avatarPreview");

    const thumbnailInput = document.getElementById("thumbnail");
    const thumbnailPreview = document.getElementById("thumbnail-preview");
    const savedThumbnail = sessionStorage.getItem("thumbnailPreview");

    // If a saved image exists, display it
    if (savedAvatar) {
        avatarPreview.src = savedAvatar;
        avatarPreview.classList.remove("hidden");
    }

    // Attach the change event listener to the file input
    if (avatarInput) {
        avatarInput.addEventListener("change", previewAvatar);
    }

    if (savedThumbnail) {
        thumbnailPreview.src = savedThumbnail;
        thumbnailPreview.classList.remove("hidden");
    }

    // Attach the change event listener to the file input
    if (thumbnailInput) {
        thumbnailInput.addEventListener("change", previewThumbnail);
    }

    // Optionally clear sessionStorage on form submission to avoid persisting preview after upload
    const form = document.querySelector("form");
    if (form) {
        form.addEventListener("submit", () => {
            sessionStorage.removeItem("avatarPreview");
            sessionStorage.removeItem("thumbnailPreview");
        });
    }
});

// Functions to preview the image and save to sessionStorage
function previewAvatar(event) {
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

function previewThumbnail(event) {
    const input = event.target;
    const image = document.getElementById("thumbnail-preview");
    const file = input.files[0];

    if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            image.src = e.target.result;
            image.classList.remove("hidden");
            sessionStorage.setItem("thumbnailPreview", e.target.result);
        };
        reader.readAsDataURL(file);
    } else {
        image.src = "#";
        image.classList.add("hidden");
        sessionStorage.removeItem("thumbnailPreview");
    }
}
