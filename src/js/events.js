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