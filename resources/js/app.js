require("./bootstrap");

jQuery(function () {
    $("#sidebarCollapse").on("click", function () {
        $("#sidebar").toggleClass("toggleSidebar");
    });
});
