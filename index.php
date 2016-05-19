<!DOCTYPE html >
<html>
<head>
<link rel="stylesheet" type="text/css" href="src/css/theme.css" />
<script type="application/javascript" src="src/js/canvas.js"></script>
</head>
<body>

<h1>Canvas!</h1>
<canvas id="canvas" height="600px" width="800px">

</canvas>


<img id="myImg" src="https://www.google.com/logos/doodles/2016/yuri-kochiyamas-95th-birthday-5723472594468864-hp.jpg"/>

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

</body>
<footer>

</footer>
</html>