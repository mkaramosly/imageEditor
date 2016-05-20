$(document).ready(function () {
    var cameraFeed = null;

    // When the camera tool button is clicked
    $("#camera-button").click(function () {
        hideAllTools();
        cameraFeed = initializeCameraFeed();
        $('#cameraFeed').show();
        $('.flippable').addClass('flipped');
    });

    // When the pen tool button is clicked
    $("#pen-button").click(function () {
        hideAllTools();
        destroyCameraFeed(cameraFeed);
        $('#myImg').show();
        $('.controls').show();
        $('.flippable').removeClass('flipped');
    });

    function hideAllTools() {
        $('#content-window').children().hide();
        $('.controls').hide();
    }
});

