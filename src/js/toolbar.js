$(document).ready(function () {
    var cameraFeed = null;

    // When the camera tool button is clicked
    $("#camera-button").click(function () {
        hideAllTools();
        cameraFeed = initializeCameraFeed();
        $('#cameraFeed').show();
    });

    // When the pen tool button is clicked
    $("#pen-button").click(function () {
        hideAllTools();
        destroyCameraFeed(cameraFeed);
        $('#myImg').show();
        $('.controls').show();
    });

    function hideAllTools() {
        $('#content-window').children().hide();
        $('.controls').hide();
    }
});

