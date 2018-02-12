$(document).ready(function(){
	$(".bahan").change(function(){
		var key = $(this).attr("key");
		var bahanid = $("#txt_bahanid_" + key).val();
		$.ajax({
			url: ajax_url_module + "get_sisa_stok_bahan",
			type: "POST",
			data: {
				txt_bahanid: bahanid
			},
			global: true,
			async: true,
			cache: false,
			dataType: "json",
			beforeSend: function() {
				// $.blockUI({message: $("#domMessage")});
			},
			complete: function() {
				// $.unblockUI();
			},
			success: function (response) {
				$("#txt_stok_bahan_" + key).val(response.stok);
			}
		});
	});

	// $(".jumlah_bahan").keyup(function(){
	// 	var key = $(this).attr("key");
	// 	if ($("#txt_jumlah_bahan_" + key).val() > $("#txt_stok_bahan_" + key).val()) {
	// 		$("#txt_jumlah_bahan_" + key).val(0);
	// 		alert("Jumlah tidak terpenuhi, sisa stok bahan " + $("#txt_stok_bahan_" + key).val());
	// 		return false;
	// 	}else{
	// 		return true;
	// 	}
	// });
});