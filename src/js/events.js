$(document).ready(function()
{

	img = document.getElementById('myImg');
	canvas = document.getElementById('canvas');
	var editCanvas = null;
	var editCanvas = editCan(canvas, img);



	$('#color').change(function(el) {
		editCanvas.drawer.color = $('#color').val();
		console.log($('#color').val());
	});

	$('#thickness').change(function(el) {
		editCanvas.drawer.lineWidth = $('#thickness').val();
		console.log($('#thickness').val());
	});

	$('#writeToCanvas').click(function(el){
		xPosition = (editCanvas.drawer.canvas.width * $('#xAxes').val() )/ 100;
		yPosition = (editCanvas.drawer.canvas.height * $('#yAxes').val() )/ 100;
		console.log("xPos: " + xPosition + " | yPos: " + yPosition );
		text = $('#text').val();
		font = $('#thickness').val() + 'px ' + $('#font').val(); //"italic 40px Calibri" ; //
		console.log("font: " + font);
		maxWidth = editCanvas.drawer.canvas.width;
		x = xPosition;
		y = yPosition;

		var metric = editCanvas.drawer.ctx.measureText(text);
		editCanvas.drawer.ctx.save(); // this will "save" the normal canvas to return to

		editCanvas.drawer.ctx.font = font;
		if(maxWidth != null ){//&& metric.width > maxWidth) {
			// These two methods will change EVERYTHING
			// drawn on the canvas from this point forward
			// Since we only want them to apply to this one fillText,
			// we use save and restore before and after

			// We want to find the center of the text (or whatever point you want) and rotate about it
			var tx = x + (metric.width/2);
			var ty = y + 5;

			// Translate to near the center to rotate about the center
			editCanvas.drawer.ctx.translate(tx,ty);
			// Then rotate...
			editCanvas.drawer.ctx.rotate($('#rotation').val());        //(Math.PI / 2);
			console.log("Rotation: " + $('#rotation').val());
			// Then translate back to draw in the right place!
			editCanvas.drawer.ctx.translate(-tx,-ty);
		}

		editCanvas.drawer.ctx.fillStyle = editCanvas.drawer.color;
		editCanvas.drawer.ctx.fillText(text, x, y);
		editCanvas.drawer.ctx.restore();

	});


	//////////////////////// File Upload /////////////////////////////////

	$('#imageUploadForm').on('submit', (function (e) {
		e.preventDefault();
		var formData = new FormData(this);

		$.ajax({
			type: 'POST',
			url: $(this).attr('action'),
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
			success: function (data) {
				console.log("success");
				console.log(data);

				img = new Image();
				img.src = data;
				img.onload = function () {
					canvas = document.getElementById('canvas');
					editCanvas.drawer.init(canvas, img);
				}
				console.log(data);

			},
			error: function (data) {
				console.log("error");
				console.log(data);
			}
		});
	}));

	$("#ImageBrowse").on("change", function () {
		$("#imageUploadForm").submit();
	});

});