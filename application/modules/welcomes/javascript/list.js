$(document).ready(function(){
	$("#test").click(function(){
		$.ajax({
			url: ajax_url_module + "debug",
			type: "POST",
			dataType: "html",
			beforeSend: function() {
				// $.blockUI({message: $("#domMessage")});
			},
			complete: function() {
				// $.unblockUI();
			},
			success: function (data) {
				alert(data);
			}
		});
	});
});