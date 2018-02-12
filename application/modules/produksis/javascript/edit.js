$(document).ready(function(){
	$(".kategori").change(function(){
		var key = $(this).attr("key");
		var kategoriid = $("#txt_kategoriid_" + key).val();
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
				$("#txt_produkid_" + key).html(data);
			}
		});
	});

	/* get stok untuk check */
	$(".produk").change(function(){
		var key = $(this).attr("key");
		var kategoriid = $("#txt_kategoriid_" + key).val();
		var produkid = $("#txt_produkid_" + key).val();
		var lenganid = $("#txt_lenganid_" + key).val();
		var sizeid = $("#txt_sizeid_" + key).val();
		var warnaid = $("#txt_warnaid_" + key).val();
		$.ajax({
			url: ajax_url_module + "get_sisa_stok",
			type: "POST",
			data: {
				txt_kategoriid: kategoriid,
				txt_produkid: produkid,
				txt_sizeid: sizeid,
				txt_warnaid: warnaid,

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
				$("#txt_stok_" + key).val(response.stok);
			}
		});
	});

	$(".lengan").change(function(){
		var key = $(this).attr("key");
		var kategoriid = $("#txt_kategoriid_" + key).val();
		var produkid = $("#txt_produkid_" + key).val();
		var lenganid = $("#txt_lenganid_" + key).val();
		var sizeid = $("#txt_sizeid_" + key).val();
		var warnaid = $("#txt_warnaid_" + key).val();
		$.ajax({
			url: ajax_url_module + "get_sisa_stok",
			type: "POST",
			data: {
				txt_kategoriid: kategoriid,
				txt_produkid: produkid,
				txt_sizeid: sizeid,
				txt_warnaid: warnaid,
				txt_lenganid: lenganid
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
				$("#txt_stok_" + key).val(response.stok);
			}
		});
	});

	$(".size").change(function(){
		var key = $(this).attr("key");
		var kategoriid = $("#txt_kategoriid_" + key).val();
		var produkid = $("#txt_produkid_" + key).val();
		var lenganid = $("#txt_lenganid_" + key).val();
		var sizeid = $("#txt_sizeid_" + key).val();
		var warnaid = $("#txt_warnaid_" + key).val();
		$.ajax({
			url: ajax_url_module + "get_sisa_stok",
			type: "POST",
			data: {
				txt_kategoriid: kategoriid,
				txt_produkid: produkid,
				txt_sizeid: sizeid,
				txt_warnaid: warnaid,
				txt_lenganid: lenganid
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
				$("#txt_stok_" + key).val(response.stok);
			}
		});
	});

	$(".warna").change(function(){
		var key = $(this).attr("key");
		var kategoriid = $("#txt_kategoriid_" + key).val();
		var produkid = $("#txt_produkid_" + key).val();
		var lenganid = $("#txt_lenganid_" + key).val();
		var sizeid = $("#txt_sizeid_" + key).val();
		var warnaid = $("#txt_warnaid_" + key).val();
		$.ajax({
			url: ajax_url_module + "get_sisa_stok",
			type: "POST",
			data: {
				txt_kategoriid: kategoriid,
				txt_produkid: produkid,
				txt_sizeid: sizeid,
				txt_warnaid: warnaid,
				txt_lenganid: lenganid
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
				$("#txt_stok_" + key).val(response.stok);
			}
		});
	});

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

	$(".jumlah").keyup(function(){
		var key = $(this).attr("key");
		if ($("#txt_jumlah_" + key).val() > $("#txt_stok_" + key).val()) {
			$("#txt_jumlah_" + key).val(0);
			alert("Jumlah tidak terpenuhi, sisa stok produk " + $("#txt_stok_" + key).val());
			return false;
		}else{
			return true;
		}
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