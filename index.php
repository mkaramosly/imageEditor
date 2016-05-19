<!DOCTYPE html >
<html>
<head>
<link rel="stylesheet" type="text/css" href="src/css/theme.css" />
<script type="application/javascript" src="src/js/canvas.js"></script>
</head>
<body>

<h1>Canvas!</h1>
<canvas id="canvas">

</canvas>

<div class="tools">
  <div class="gamma">Gamma
    <input type="range" name="gamma" min="0" max="10">
  </div>
  <div class="black-white">Black & White
    <input type="checkbox" name="black-white" class="black-white-input" value="true">
  </div>
</div>
<div class="controls">
  <div class="select-pattern">Pattern
    <select>
      <option>Circle</option>
      <option>Square</option>
      <option>Triangle</option>
      <option>Octagon</option>
    </select>
  </div>
  <div class="select-color">Color
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
  <div class="select-thickness">Thickness
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

</body>
<footer>

</footer>
</html>