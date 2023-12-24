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
});

tinymce.init({
    selector: "textarea#content",
    toolbar:
        "blocks undo redo bold italic underline strikethrough link charmap",
    skin: window.matchMedia("(prefers-color-scheme: dark)").matches
        ? "oxide-dark"
        : "oxide",
    icons: "oxide",
    menubar: false,
    content_css: window.matchMedia("(prefers-color-scheme: dark)").matches
        ? "dark"
        : "default",
});
