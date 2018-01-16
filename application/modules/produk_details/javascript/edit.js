$(document).ready(function(){
	$("#txt_kategoriid").change(function(){
		var kategoriid = $("#txt_kategoriid").val();
		$.ajax({
			url: ajax_url_module + "get_produk_bykategoriid",
			type: "POST",
			data: {txt_kategoriid: kategoriid},
			dataType: "html",
			beforeSend: function() {
				// $.blockUI({message: $("#domMessage")});
			},
			complete: function() {
				// $.unblockUI();
			},
			success: function (data) {
				$("#txt_produkid").html(data);
			}
		});
	});

	$("#btn_submit").click(function(){
		if ($("#txt_produkid").val() == "" || $("#txt_produkid").val() == null || $("#txt_produkid").val() == 0) {
			alert("Nama produk dibutuhkan.");
			return false;
		}
	});
});