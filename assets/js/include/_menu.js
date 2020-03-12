import $ from "jquery";

$(function() {
    $('[data-tooltip="tooltip"]').tooltip({ trigger: "hover" });
    $('[data-tooltip="tooltip"]').click(function () {
        $('[data-tooltip="tooltip"]').tooltip("hide");
    });
});



