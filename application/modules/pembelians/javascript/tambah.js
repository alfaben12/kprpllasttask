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

	/* get stok untuk check */
	$("#txt_produkid").change(function(){
		var kategoriid = $("#txt_kategoriid").val();
		var produkid = $("#txt_produkid").val();
		var lenganid = $("#txt_lenganid").val();
		var sizeid = $("#txt_sizeid").val();
		var warnaid = $("#txt_warnaid").val();
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
				$("#txt_stok").val(response.stok);
			}
		});
	});

	$("#txt_lenganid").change(function(){
		var kategoriid = $("#txt_kategoriid").val();
		var produkid = $("#txt_produkid").val();
		var lenganid = $("#txt_lenganid").val();
		var sizeid = $("#txt_sizeid").val();
		var warnaid = $("#txt_warnaid").val();
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
				$("#txt_stok").val(response.stok);
			}
		});
	});

	$("#txt_lenganid").change(function(){
		var kategoriid = $("#txt_kategoriid").val();
		var produkid = $("#txt_produkid").val();
		var lenganid = $("#txt_lenganid").val();
		var sizeid = $("#txt_sizeid").val();
		var warnaid = $("#txt_warnaid").val();
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
				$("#txt_stok").val(response.stok);
			}
		});
	});

	$("#txt_sizeid").change(function(){
		var kategoriid = $("#txt_kategoriid").val();
		var produkid = $("#txt_produkid").val();
		var lenganid = $("#txt_lenganid").val();
		var sizeid = $("#txt_sizeid").val();
		var warnaid = $("#txt_warnaid").val();
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
				$("#txt_stok").val(response.stok);
			}
		});
	});

	$("#txt_warnaid").change(function(){
		var kategoriid = $("#txt_kategoriid").val();
		var produkid = $("#txt_produkid").val();
		var lenganid = $("#txt_lenganid").val();
		var sizeid = $("#txt_sizeid").val();
		var warnaid = $("#txt_warnaid").val();
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
				$("#txt_stok").val(response.stok);
			}
		});
	});

	var key = 0;
	$("#txt_tambahrow").click(function(){
		var kategoriid = $("#txt_kategoriid").val();
		var produkid = $("#txt_produkid").val();
		var lenganid = $("#txt_lenganid").val();
		var sizeid = $("#txt_sizeid").val();
		var warnaid = $("#txt_warnaid").val();

		var text_kategoriid = $("#txt_kategoriid :selected").text();
		var text_produkid = $("#txt_produkid :selected").text();
		var text_lenganid = $("#txt_lenganid :selected").text();
		var text_sizeid = $("#txt_sizeid :selected").text();
		var text_warnaid = $("#txt_warnaid :selected").text();
		var jumlah = $("#txt_jumlah").val();
		var harga = $("#txt_harga").val();

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
		}else if (jumlah == null || jumlah == 0 || jumlah == "") {
			alert("Jumlah dibutuhkan.");
			return false;
		}else if(harga == null || harga == "" || harga == 0) {
			alert("Harga belum terisi.");
			return false;
		}else{
			var markup = 
			"<tr id='record'>" +
			"<input type='hidden' class='form-control' name='txt_kategoriid[]' value='"+ kategoriid +"' readonly=''>" +
			"<input type='hidden' class='form-control' name='txt_produkid[]' value='"+ produkid +"' readonly=''>" +
			"<input type='hidden' class='form-control' name='txt_sizeid[]' value='"+ sizeid +"' readonly=''>" +
			"<input type='hidden' class='form-control' name='txt_warnaid[]' value='"+ warnaid +"' readonly=''>" +
			"<input type='hidden' class='form-control' name='txt_lenganid[]' value='"+ lenganid +"' readonly=''>" +
			"<input type='hidden' class='form-control' name='txt_jumlah[]' value='"+ jumlah +"' readonly=''>" +
			"<input type='hidden' class='form-control' name='txt_harga[]' value='"+ harga +"' readonly=''>" +

			"<td style='text-align: center;'><input type='checkbox' name='record'></td>" +
			"<td>&nbsp;</td>" +
			"<td>&nbsp;</td>" +
			"<td style='text-align: center;'><font id='text_kategoriid'>"+ text_kategoriid +"</font></td>" +
			"<td>&nbsp;</td>" +
			"<td>&nbsp;</td>" +
			"<td style='text-align: center;'><font id='text_produkid'>"+ text_produkid +"</font></td>" +
			"<td>&nbsp;</td>" +
			"<td>&nbsp;</td>" +
			"<td style='text-align: center;'><font id='text_lenganid'>"+ text_lenganid +"</font></td>" +
			"<td>&nbsp;</td>" +
			"<td>&nbsp;</td>" +
			"<td style='text-align: center;'><font id='text_sizeid'>"+ text_sizeid +"</font></td>" +
			"<td>&nbsp;</td>" +
			"<td>&nbsp;</td>" +
			"<td style='text-align: center;'><font id='text_warnaid'>"+ text_warnaid +"</font></td>" +
			"<td>&nbsp;</td>" +
			"<td>&nbsp;</td>" +
			"<td style='text-align: center;'><font id='jumlah'>"+ jumlah +"</font></td>" +
			"<td>&nbsp;</td>" +
			"<td>&nbsp;</td>" +
			"<td style='text-align: center;'><font id='harga'>"+ harga +"</font></td>" +
			"</tr>";
			$("table#result_row tbody").append(markup);
			$("#txt_kategoriid").val(kategoriid);
			$("#txt_produkid").val(produkid);
			$("#txt_sizeid").val(sizeid);
			$("#txt_warnaid").val(warnaid);
			$("#txt_lenganid").val(lenganid);
			$("#txt_jumlah").val(jumlah);
			key++;
		}
	});

	// cari data and hapus yang selected table /row
	$("#txt_hapusrow").click(function(){
		$("table#result_row tbody").find('input[name="record"]').each(function(){
			if($(this).is(":checked")){
				$(this).parents("tr").remove();
			}
		});
	});

	/* SET VALUE 0 */
	$("#txt_kategoriid").change(function(){
		$("#txt_harga").val(null);
		$("#text_harga").text(0);
	});

	/* SET VALUE 0 */
	$("#txt_produkid").change(function(){
		$("#txt_harga").val(null);
		$("#text_harga").text(0);
	});

	/* SET VALUE 0 */
	$("#txt_sizeid").change(function(){
		$("#txt_harga").val(null);
		$("#text_harga").text(0);
	});

	/* SET VALUE 0 */
	$("#txt_warnaid").change(function(){
		$("#txt_harga").val(null);
		$("#text_harga").text(0);
	});

	/* SET VALUE 0 */
	$("#txt_lenganid").change(function(){
		$("#txt_harga").val(null);
		$("#text_harga").text(0);
	});

	/* SET VALUE 0 */
	$("#txt_jenissablonid").change(function(){
		$("#txt_harga").val(null);
		$("#text_harga").text(0);
	});

	/* SET VALUE 0 */
	$("#txt_jumlahwarnasablonid").change(function(){
		$("#txt_harga").val(null);
		$("#text_harga").text(0);
	});

	/* SET VALUE 0 */
	$("#txt_jumlah").keyup(function(){
		$("#txt_harga").val(null);
		$("#text_harga").text(0);
	});

	$("#txt_simpan").click(function(){
		if ($("#txt_pelangganid").val() == "" || $("#txt_pelangganid") == null ) {
			alert("Pelanggan harus di isi");
			return false;
		}
	});
});