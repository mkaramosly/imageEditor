<!DOCTYPE html >
<html>

<head>
	<link rel="stylesheet" type="text/css" href="src/css/theme.css"/>
	<link rel="stylesheet" type="text/css" href="src/css/font-awesome.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
	<script type="application/javascript" src="src/js/canvas.js"></script>
	<script type="application/javascript" src="src/js/events.js"></script>
	<script src="src/js/toolbar.js"></script>
	<script src="vendor/tracking.js/build/tracking-min.js"></script>
	<script src="vendor/tracking.js/examples/assets/splines.min.js"></script>
</head>

<body>
<div class="mainContainer">

	<div id="canvas-wrapper">
		<img id="logo" src="src/img/logo.png" width="100px"/>
		<div id="tools">
			<button id="pen-button" class="fa fa-pencil fa-2x"></button>
			<button id="camera-button" class="fa fa-camera fa-2x"></button>
		</div>

		<!--		<div class="gamma">Gamma-->
		<!--			<input type="range" name="gamma" min="0" max="100">-->
		<!--		</div>-->
		<!--		<div class="black-white">Black & White-->
		<!--			<input type="checkbox" name="black-white" class="black-white-input" value="true">-->
		<!--		</div>-->

		<!--		<div class="select select-pattern">Pattern-->
		<!--			<select id="shape">-->
		<!--				<option>Circle</option>-->
		<!--				<option>Square</option>-->
		<!--				<option>Triangle</option>-->
		<!--				<option>Octagon</option>-->
		<!--			</select>-->
		<!--		</div>-->

		<div class="controls">
			<label for="text">Text</label>
			<input id="text" type="text" />
			<label for"font">Font</label>
			<select id="font">
				<option>Arial</option>
				<option>Arial Black</option>
				<option>Comic Sans MS</option>
				<option>Courier New</option>
				<option>Impact</option>
				<option>Lucida Console</option>
				<option>Lucida Sans Unicode</option>
				<option>Times New Roman</option>
				<option>Tahoma</option>
				<option>Trebuchet MS</option>
				<option>Verdana</option>
			</select>

			<input type="range" id="xAxes" name="xAxes" min="0" max="100">X</input>
			<input type="range" id="yAxes" name="yAxes" min="0" max="100">Y</input>
			</br>Rotation
			<input type="range" id="rotation" name="rotation" min="0" max="3.14" value="0"></input>
			<button id="writeToCanvas">Write!</button>
			</br>
<!--			<div class="select select-pattern">Pattern-->
<!--				<select id="shape">-->
<!--					<option>Circle</option>-->
<!--					<option>Square</option>-->
<!--					<option>Triangle</option>-->
<!--					<option>Octagon</option>-->
<!--				</select>-->
<!--			</div>-->

			<div class="select select-color">Color
				<input id="color" type="color"/>
			</div>
			<div class="select select-thickness">Thickness
				<input type="range" id="thickness" value="1" min="1" max="100">
			</div>
		</div>
		<canvas id="canvas" height="800px" width="1200px">
		</canvas>
	</div>

	<div id="content-window">
		<img id="myImg"
		     src="https://www.google.com/logos/doodles/2016/yuri-kochiyamas-95th-birthday-5723472594468864-hp.jpg"/>
		<video id="cameraFeed" class="flippable" width="400" height="300" style="display: none" preload autoplay loop
		       muted></video>
	</div>
	<form id="imageUploadForm" action="fileHandler.php" method="post" enctype="multipart/form-data">
		Select image to upload:
		<input type="file" name="upfile" id="ImageBrowse">
<!--		<button type="submit" name="submit" class="fa fa-cloud-upload  fa-2x">-->
<!---->
<!--			<i class="icon-circle-arrow-right icon-large"></i>-->
<!--		</button>-->
<!--		<input type="submit" name="submit">-->
	</form>

	<script type="text/javascript">

	</script>

	<script src="src/js/tracking/colorTracker.js"></script>

</div>
</body>
<footer>

</footer>

</html>