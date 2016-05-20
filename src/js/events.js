$(document).ready(function()
{

	$('#color').change(function(el) {
		editCanvas.drawer.color = $('#color').val();
		console.log($('#color').val());
	});

	$('#thickness').change(function(el) {
		editCanvas.drawer.lineWidth = $('#thickness').val();
		console.log($('#thickness').val());
	});

});