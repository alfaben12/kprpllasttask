$(document).ready(function(){
	$("#txt_find").click(function(){
		var tanggal_awal=$("#txt_tanggal_awal").val();
		var tanggal_akhir=$("#txt_tanggal_akhir").val();
		$.ajax({
			url: ajax_url_module + "ambil_penjualan",
			type: "POST",
			data: {
				txt_tanggal_akhir:tanggal_akhir,
				txt_tanggal_awal:tanggal_awal
			},
			dataType: "html",
			beforeSend: function() {
				// $.blockUI({message: $("#domMessage")});
			},
			complete: function() {
				// $.unblockUI();
			},
			success: function (data) {
				$("#result").html(data);
			}
		})
	})
});