$(document).ready(function(){
	$("#txt_tambahrow_bahan").click(function(){
		var bahanid = $("#txt_bahanid").val();

		var text_bahanid = $("#txt_bahanid :selected").text();
		var jumlah_bahan = $("#txt_jumlah_bahan").val();
		var harga = $("#txt_harga").val();
		// if ($("#txt_jumlah_bahan").val() > $("#txt_stok_bahan").val()) {
		// 	alert("Jumlah tidak terpenuhi, sisa stok produk " + $("#txt_stok_bahan").val());
		// 	return false;
		// }else 
		if (bahanid == null || bahanid == 0 || bahanid == "") {
			alert("Bahan dibutuhkan.");
			return false;
		}else if (jumlah_bahan == null || jumlah_bahan == 0 || jumlah_bahan == "") {
			alert("Jumlah dibutuhkan.");
			return false;
		}else if (harga == null || harga == 0 || harga == "") {
			alert("Harga dibutuhkan.");
			return false;
		}else{
			var res = 
			"<tr id='record'>" +
			"<input type='hidden' class='form-control' name='txt_bahanid[]' value='"+ bahanid +"' readonly=''>" +
			"<input type='hidden' class='form-control' name='txt_jumlah_bahan[]' value='"+ jumlah_bahan +"' readonly=''>" +
			"<input type='hidden' class='form-control' name='txt_harga[]' value='"+ harga +"' readonly=''>" +

			"<td style='text-align: center;'><input type='checkbox' name='record'></td>" +
			"<td>&nbsp;</td>" +
			"<td>&nbsp;</td>" +
			"<td style='text-align: center;'><font id='text_warnaid'>"+ text_bahanid +"</font></td>" +
			"<td>&nbsp;</td>" +
			"<td>&nbsp;</td>" +
			"<td style='text-align: center;'><font id='jumlah'>"+ jumlah_bahan +"</font></td>" +
			"<td>&nbsp;</td>" +
			"<td>&nbsp;</td>" +
			"<td style='text-align: center;'><font id='harga'>"+ harga +"</font></td>" +
			"</tr>";
			$("table#result_row_bahan tbody").append(res);
			$("#txt_bahanid").val(bahanid);
			$("#txt_jumlah_bahan").val(jumlah_bahan);
			$("#txt_harga").val(harga);
		}
	});

	// cari data and hapus yang selected table /row
	$("#txt_hapusrow_bahan").click(function(){
		$("table#result_row_bahan tbody").find('input[name="record"]').each(function(){
			if($(this).is(":checked")){
				$(this).parents("tr").remove();
			}
		});
	});

	$("#txt_simpan").click(function(){
		if ($("#txt_penjualanid").val() == "" || $("#txt_penjualanid") == null ) {
			alert("Penjualan harus di isi.");
			return false;
		}
	});
});