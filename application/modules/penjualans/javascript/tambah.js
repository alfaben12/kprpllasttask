$(document).ready(function(){
	$("#txt_pelangganid").change(function(){
		var pelangganid = $("#txt_pelangganid").val();
		$.ajax({
			url: ajax_url_module + "get_info_data_pelanggan",
			type: "POST",
			data: {txt_pelangganid: pelangganid},
			dataType: "json",
			beforeSend: function() {
				// $.blockUI({message: $("#domMessage")});
			},
			complete: function() {
				// $.unblockUI();
			},
			success: function (response) {
				$("#txt_alamat").text(response.alamat);
				$("#txt_notelepon").text(response.no_telepon);
				$("#txt_email").text(response.email);
				$("#txt_dibuattanggal").text(response.dibuat_tanggal);
			}
		});
	});

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

	$("#txt_generateharga").click(function(){
		var kategoriid = $("#txt_kategoriid").val();
		var produkid = $("#txt_produkid").val();
		var lenganid = $("#txt_lenganid").val();
		var sizeid = $("#txt_sizeid").val();
		var warnaid = $("#txt_warnaid").val();
		var jenissablonid = $("#txt_jenissablonid").val();
		var warnasablonid = $("#txt_jumlahwarnasablonid").val();
		var jumlah = $("#txt_jumlah").val();
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
				$("#text_harga").text(response.total_harga);
				$("#txt_harga").val(response.total_harga);
			}
		});
		}
	});

	var key = 0;
	$("#txt_tambahrow").click(function(){
		var kategoriid = $("#txt_kategoriid").val();
		var produkid = $("#txt_produkid").val();
		var lenganid = $("#txt_lenganid").val();
		var sizeid = $("#txt_sizeid").val();
		var warnaid = $("#txt_warnaid").val();
		var jenissablonid = $("#txt_jenissablonid").val();
		var warnasablonid = $("#txt_jumlahwarnasablonid").val();
		
		var text_kategoriid = $("#txt_kategoriid :selected").text();
		var text_produkid = $("#txt_produkid :selected").text();
		var text_lenganid = $("#txt_lenganid :selected").text();
		var text_sizeid = $("#txt_sizeid :selected").text();
		var text_warnaid = $("#txt_warnaid :selected").text();
		var text_jenissablonid = $("#txt_jenissablonid :selected").text();
		var text_warnasablonid = $("#txt_jumlahwarnasablonid :selected").text();
		var jumlah = $("#txt_jumlah").val();
		var harga = $("#txt_harga").val();

		if (harga == null || harga == "" || harga == 0) {
			alert("Klik tombol harga untuk melihat harga terlebih dahulu.");
			return false;
		}else{
			var markup = 
			"<tr id='record'>" +
			"<input type='hidden' class='form-control' name='txt_kategoriid["+ key +"]' value='"+ text_kategoriid +"' readonly=''>" +
			"<input type='hidden' class='form-control' name='txt_produkid["+ key +"]' value='"+ text_produkid +"' readonly=''>" +
			"<input type='hidden' class='form-control' name='txt_sizeid["+ key +"]' value='"+ text_sizeid +"' readonly=''>" +
			"<input type='hidden' class='form-control' name='txt_warnaid["+ key +"]' value='"+ text_warnaid +"' readonly=''>" +
			"<input type='hidden' class='form-control' name='txt_lenganid["+ key +"]' value='"+ text_lenganid +"' readonly=''>" +
			"<input type='hidden' class='form-control' name='txt_jenissablonid["+ key +"]' value='"+ text_jenissablonid +"' readonly=''>" +
			"<input type='hidden' class='form-control' name='txt_warnasablonid["+ key +"]' value='"+ text_warnasablonid +"' readonly=''>" +
			"<input type='hidden' class='form-control' name='txt_jumlah["+ key +"]' value='"+ jumlah +"' readonly=''>" +
			"<input type='hidden' class='form-control' name='txt_harga["+ key +"]' value='"+ harga +"' readonly=''>" +

			"<td style='text-align: center;'><input type='checkbox' name='record'></td>" +
			"<td>&nbsp;</td>" +
			"<td>&nbsp;</td>" +
			"<td style='text-align: center;'><font id='text_kategoriid'>"+ text_kategoriid +"</font></td>" +
			"<td>&nbsp;</td>" +
			"<td>&nbsp;</td>" +
			"<td style='text-align: center;'><font id='text_produkid'>"+ text_produkid +"</font></td>" +
			"<td>&nbsp;</td>" +
			"<td>&nbsp;</td>" +
			"<td style='text-align: center;'><font id='text_sizeid'>"+ text_sizeid +"</font></td>" +
			"<td>&nbsp;</td>" +
			"<td>&nbsp;</td>" +
			"<td style='text-align: center;'><font id='text_warnaid'>"+ text_warnaid +"</font></td>" +
			"<td>&nbsp;</td>" +
			"<td>&nbsp;</td>" +
			"<td style='text-align: center;'><font id='text_lenganid'>"+ text_lenganid +"</font></td>" +
			"<td>&nbsp;</td>" +
			"<td>&nbsp;</td>" +
			"<td style='text-align: center;'><font id='text_jenissablonid'>"+ text_jenissablonid +"</font></td>" +
			"<td>&nbsp;</td>" +
			"<td>&nbsp;</td>" +
			"<td style='text-align: center;'><font id='text_warnasablonid'>"+ text_warnasablonid +"</font></td>" +
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
			$("#txt_jenissablonid").val(jenissablonid);
			$("#txt_jumlahwarnasablonid").val(jumlahwarnasablonid);
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
});