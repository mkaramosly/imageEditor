<!DOCTYPE html >
<html>
<head>
	<link rel="stylesheet" type="text/css" href="src/css/theme.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
	<script type="application/javascript" src="src/js/canvas.js"></script>
	<script type="application/javascript" src="src/js/events.js"></script>
	<script src="src/js/toolbar.js"></script>
	<script src="vendor/tracking.js/build/tracking-min.js"></script>
</head>
<body>
<div class="mainContainer">

	<canvas id="canvas" height="800px" width="1200px">
	</canvas>

	<div class="controls">
		<div class="gamma">Gamma
			<input type="range" name="gamma" min="0" max="100">
		</div>
		<div class="black-white">Black & White
			<input type="checkbox" name="black-white" class="black-white-input" value="true">
		</div>
		<div class="select select-pattern">Pattern
			<select id="shape">
				<option>Circle</option>
				<option>Square</option>
				<option>Triangle</option>
				<option>Octagon</option>
			</select>
		</div>
		<div class="select select-color">Color

			<input id="color" type="color" />
<!--			<select id="color">-->
<!--				<option>Black</option>-->
<!--				<option>Blue</option>-->
<!--				<option>Purple</option>-->
<!--				<option>Red</option>-->
<!--				<option>Orange</option>-->
<!--				<option>Yellow</option>-->
<!--				<option>Green</option>-->
<!--				<option>White</option>-->
<!--			</select>-->
		</div>
		<div class="select select-thickness">Thickness
<!--			<select id="thickness">-->
<!--				<option value="2">2px</option>-->
<!--				<option value="5">5px</option>-->
<!--				<option value="10">10px</option>-->
<!--				<option value="20">20px</option>-->
<!--			</select>-->
			<input type="range" id="thickness" value="1" min="1" max="100">
		</div>
	</div>
	<div id="tools">
		<button id="pen-button">Pen</button>
		<button id="camera-button">Camera</button>
	</div>

	<div id="content-window">
		<img id="myImg" src="https://www.google.com/logos/doodles/2016/yuri-kochiyamas-95th-birthday-5723472594468864-hp.jpg"/>
		<video id="cameraFeed" width="400" height="300" style="display: none" preload autoplay loop muted></video>
	</div>
	<form id="imageUploadForm" action="fileHandler.php" method="post" enctype="multipart/form-data">
		Select image to upload:
		<input type="file" name="upfile" id="ImageBrowse">
		<input type="submit" value="Upload Image" name="submit">
	</form>

	<script type="text/javascript">

	</script>

	<script src="src/js/tracking/colorTracker.js"></script>

</div>
</body>
<footer>

</footer>
</html>