$(document).ready(function () {

	$('#imagePreview').hide();
	//found on: http://jsfiddle.net/hEpEL/
	$('#imageUpload').change(function(){
		readImgUrlAndPreview(this);
		function readImgUrlAndPreview(input){
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {
					$('#imagePreview').show();
					$('#imagePreview').attr('src', e.target.result);
				}
			};
			reader.readAsDataURL(input.files[0]);
		}
	});

	$(".btn-delete").click(function() {
		$.ajax
		({
			type: "POST",
			url: "deluserpict.php",
			success: function(data){
				alert(data);
			}
		})
	});
});