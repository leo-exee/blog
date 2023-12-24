import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

$(".js-select2").select2({
    closeOnSelect: false,
    placeholder: "Sélectionnez un ou plusieurs tags",
    allowClear: true,
    tags: false,
});
