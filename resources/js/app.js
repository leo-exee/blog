import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

$(".js-select2").select2({
    closeOnSelect: false,
    placeholder: "Sélectionnez un ou plusieurs tags",
    allowClear: true,
    allowHtml: true,
    tags: false,
    content_style: `
    p { 
    margin-block: 0; 
    }
    `,
});

tinymce.init({
    selector: "textarea#content",
    toolbar: "blocks undo redo bold italic underline strikethrough",
    skin: window.matchMedia("(prefers-color-scheme: dark)").matches
        ? "oxide-dark"
        : "oxide",
    menubar: false,
    content_css: window.matchMedia("(prefers-color-scheme: dark)").matches
        ? "dark"
        : "default",
    statusbar: false,
});

document.addEventListener("DOMContentLoaded", function () {
    var notification = document.querySelector(".notification");
    var closeBtn = document.querySelector(".close");

    closeBtn.addEventListener("click", function () {
        notification.style.display = "none";
    });

    setTimeout(function () {
        notification.style.display = "none";
    }, 5000);
});
