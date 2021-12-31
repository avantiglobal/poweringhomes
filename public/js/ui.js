// UI Events
let toggledMenu = false;

$('.toggler-icon').click(() => {
    if (toggledMenu) {
        $("header").css('display', 'block', 'important');
        $("header").css('padding-top', '5em', 'important');
        $("#top-menu").addClass('flex-margin');
        $("#dashboard .container").addClass('flex-margin');
        $("main").addClass('flex-margin');
    } else {
        $("header").css('display', 'none', 'important');
        $("#top-menu").removeClass('flex-margin');
        $("main").removeClass('flex-margin');
    }
    toggledMenu = !toggledMenu;
});

// Logout
$(".btn-logout").click(function () {
    $.ajax({
        url: "/user/logout",
        success: function (data) {
            window.location = "/login";
        }
    });
    return false;
});