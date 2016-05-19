$(document).ready(function () {
    // When the camera button is clicked
    $("#camera-button").click(function () {
        $('#content-window').children().hide();
        initializeCameraFeed();
        $('#cameraFeed').show();
    });
});

