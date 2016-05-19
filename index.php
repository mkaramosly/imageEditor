<!DOCTYPE html >
<html>
<head>
<link rel="stylesheet" type="text/css" href="src/css/theme.css" />
<script type="application/javascript" src="src/js/canvas.js"></script>
</head>
<body>
<header>
  <img src="src/img/logo.png">
</header>
<div class="tools">
  <div class="tool gamma">Gamma
    <input type="range" name="gamma" min="0.0" max="0.1">
  </div>
  <div class="tool black-white">
    <input type="checkbox" name="black-white" class="black-white-input" value="true">Black & White
  </div>
</div>

<h1>Canvas!</h1>
<canvas id="canvas">

</canvas>

<div class="controls">
  <div class="select-list">
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