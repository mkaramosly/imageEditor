<!DOCTYPE html >
<html>
<head>
	<link rel="stylesheet" type="text/css" href="src/css/theme.css"/>
	<script type="application/javascript" src="src/js/canvas.js"></script>
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
			<select>
				<option>Circle</option>
				<option>Square</option>
				<option>Triangle</option>
				<option>Octagon</option>
			</select>
		</div>
		<div class="select select-color">Color
			<select>
				<option>Black</option>
				<option>Blue</option>
				<option>Purple</option>
				<option>Red</option>
				<option>Orange</option>
				<option>Yellow</option>
				<option>Green</option>
				<option>White</option>
			</select>
		</div>
		<div class="select select-thickness">Thickness
			<select>
				<option>2px</option>
				<option>5px</option>
				<option>10px</option>
				<option>20px</option>
			</select>
		</div>
	</div>


	<form action="upload.php" method="post" enctype="multipart/form-data">
		Select image to upload:
		<input type="file" name="fileToUpload" id="fileToUpload">
		<input type="submit" value="Upload Image" name="submit">
	</form>


	<img id="myImg"
	     src="https://www.google.com/logos/doodles/2016/yuri-kochiyamas-95th-birthday-5723472594468864-hp.jpg"/>

	<script type="text/javascript">
		img = document.getElementById('myImg');
		canvas = document.getElementById('canvas');
		editCan(canvas, img);
	</script>


</div>
</body>
<footer>

</footer>
</html>