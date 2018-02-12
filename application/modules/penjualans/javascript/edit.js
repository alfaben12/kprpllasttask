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


	$(".harga").click(function(){
		var key = $(this).attr("key");
		if ($("#txt_jumlah_" + key).val() > $("#txt_stok_" + key).val()) {
			$("#txt_jumlah_" + key).val(0);
			alert("Jumlah tidak terpenuhi, sisa stok produk " + $("#txt_stok_" + key).val());
			return false;
		}else{
			var kategoriid = $("#txt_kategoriid_" + key).val();
			var produkid = $("#txt_produkid_" + key).val();
			var lenganid = $("#txt_lenganid_" + key).val();
			var sizeid = $("#txt_sizeid_" + key).val();
			var warnaid = $("#txt_warnaid_" + key).val();
			var jenissablonid = $("#txt_jenissablonid_" + key).val();
			var warnasablonid = $("#txt_jumlahwarnasablonid_" + key).val();
			var jumlah = $("#txt_jumlah_" + key).val();
			if (kategoriid == null || kategoriid == 0 || kategoriid == "") {
				alert("Kategori produk dibutuhkan.");
				return false;
			}else if (produkid == null || produkid == 0 || produkid == "") {
				alert("Produk dibutuhkan.");
				return false;
			}else if (lenganid == null || lenganid == 0 || lenganid == "") {
				alert("Ukuran lengan dibutuhkan.");
				return false;
			}else if (sizeid == null || sizeid == 0 || sizeid == "") {
				alert("Size dibutuhkan.");
				return false;
			}else if (warnaid == null || warnaid == 0 || warnaid == "") {
				alert("Warna dibutuhkan.");
				return false;
			}else if (jenissablonid == null || jenissablonid == 0 || jenissablonid == "") {
				alert("Jenis sablon dibutuhkan.");
				return false;
			}else if (warnasablonid == null || warnasablonid == 0 || warnasablonid == "") {
				alert("Warna sablon dibutuhkan.");
				return false;
			}else if (jumlah == null || jumlah == 0 || jumlah == "") {
				alert("Jumlah dibutuhkan.");
				return false;
			}else{
				$.ajax({
					url: ajax_url_module + "generate_total_harga",
					type: "POST",
					data: {
						txt_kategoriid: kategoriid,
						txt_produkid: produkid,
						txt_sizeid: sizeid,
						txt_warnaid: warnaid,
						txt_lenganid: lenganid,
						txt_jenissablonid: jenissablonid,
						txt_jumlahwarnasablonid: warnasablonid,
						txt_jumlah: jumlah

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
					if (response.recheck_harga == 0 || response.recheck_harga == null || response.recheck_harga == "") {
						alert("Stok tidak tersedia.");
						return false;
					}else{
						$("#txt_stok_" + key).val(response.stok);
						$("#text_harga_" + key).text(response.total_harga);
						$("#txt_harga_" + key).val(response.total_harga);
					}
				}
			});
			}
		}
	});

	/* SET VALUE 0 */
	$(".kategori").change(function(){
		var key = $(this).attr("key");
		$("#txt_harga_" + key).val(null);
		$("#text_harga_" + key).text(0);
	});

	/* SET VALUE 0 */
	$(".produk").change(function(){
		var key = $(this).attr("key");
		$("#txt_harga_" + key).val(null);
		$("#text_harga_" + key).text(0);
	});

	/* SET VALUE 0 */
	$(".size").change(function(){
		var key = $(this).attr("key");
		$("#txt_harga_" + key).val(null);
		$("#text_harga_" + key).text(0);
	});

	/* SET VALUE 0 */
	$(".warna").change(function(){
		var key = $(this).attr("key");
		$("#txt_harga_" + key).val(null);
		$("#text_harga_" + key).text(0);
	});

	/* SET VALUE 0 */
	$(".lengan").change(function(){
		var key = $(this).attr("key");
		$("#txt_harga_" + key).val(null);
		$("#text_harga_" + key).text(0);
	});

	/* SET VALUE 0 */
	$(".jenissablon").change(function(){
		var key = $(this).attr("key");
		$("#txt_harga_" + key).val(null);
		$("#text_harga_" + key).text(0);
	});

	/* SET VALUE 0 */
	$(".jumlahwarnasablon").change(function(){
		var key = $(this).attr("key");
		$("#txt_harga_" + key).val(null);
		$("#text_harga_" + key).text(0);
	});

	/* SET VALUE 0 */
	$(".jumlah").keyup(function(){
		var key = $(this).attr("key");
		$("#txt_harga_" + key).val(null);
		$("#text_harga_" + key).text(0);
	});

	$("#txt_simpan").click(function(){
		if ($("#txt_pelangganid").val() == "" || $("#txt_pelangganid") == null ) {
			alert("Pelanggan harus di isi");
			return false;
		}
	});
});