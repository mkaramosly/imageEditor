<!DOCTYPE html >
<html>
<head>
    <link rel="stylesheet" type="text/css" href="src/css/theme.css"/>
    <script type="application/javascript" src="src/js/canvas.js"></script>
    <script src="vendor/tracking.js/build/tracking-min.js"></script>
</head>
<body>

<h1>Canvas!</h1>
<canvas id="canvas" height="600px" width="800px">
</canvas>

<div id="tools">
    <button id="pen-button">Pen</button>
    <button id="camera-button">Camera</button>
</div>

<div>
    <img id="myImg" src="https://www.google.com/logos/doodles/2016/yuri-kochiyamas-95th-birthday-5723472594468864-hp.jpg"/>
    <video id="cameraFeed" width="400" height="300" style="display: none" preload autoplay loop muted></video>
</div>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

<script type="text/javascript">
    img = document.getElementById('myImg');
    canvas = document.getElementById('canvas');

    editCan(canvas, img);
</script>

<script src="src/js/tracking/colorTracker.js"></script>
</body>
<footer>

</footer>
</html>