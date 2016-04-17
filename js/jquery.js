$(document).ready(function () {
	$(".ch-profile-pic").on("click", function (e) {
		$("#dropdown-profile-pic").toggle();
		return false;
		e.preventDefault;
	});
});
