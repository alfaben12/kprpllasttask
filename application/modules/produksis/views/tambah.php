<h3 class="page-title">Tambah Baru Produksi</h3>
<?= form_open($this->uri->segment(1).'/prosess_tambah'); ?>
<div class="row">
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Data Produksi</h3>
			</div>
			<div class="panel-body">
				<table width="100%">
					<tr>
						<td width="13%">Nama</td>
						<td width="2%"> : </td>
						<td><?= form_dropdown('txt_penjualanid', $penjualan, set_value('txt_penjualanid'), 'data-placeholder="Penjualan" id="txt_penjualanid" class="form-control select2-single"') ?></td>
					</tr>
				</table>
			</div>
		</div>
		<div id="txt_penjualandetail"></div>
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Data Produk</h3>
			</div>
			<div class="panel-body">
				<table width="100%">
					<tr>
						<td>
							<?= form_dropdown('txt_kategoriid_parsing', $kategori, set_value('txt_kategoriid_parsing'), 'data-placeholder="Kategori" id="txt_kategoriid" class="form-control select2-single"') ?>
						</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td id="produk_drpdw">
							<?= form_dropdown('txt_produkid_parsing', produk_bykategoriid_dropdown_edit(null), set_value('txt_produkid_parsing'), 'data-placeholder="Produk" id="txt_produkid" class="form-control select2-single"') ?>
						</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>
							<?= form_dropdown('txt_lenganid_parsing', $lengan, set_value('txt_lenganid_parsing'), 'data-placeholder="Lengan" id="txt_lenganid" class="form-control select2-single"') ?>
						</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>
							<?= form_dropdown('txt_sizeid_parsing', $size, set_value('txt_sizeid_parsing'), 'data-placeholder="Size" id="txt_sizeid" class="form-control select2-single"') ?>
						</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>
							<?= form_dropdown('txt_warnaid_parsing', $warna, set_value('txt_warnaid_parsing'), 'data-placeholder="Warna" id="txt_warnaid" class="form-control select2-single"') ?>
						</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>
							<input class="form-control" placeholder="Qty Produk" id="txt_jumlah" name="txt_jumlah" size="4">
						</td>
						<td>
							<input type="hidden" class="form-control" placeholder="Stok" id="txt_stok" name="txt_stok">
						</td>
					</tr>
				</table>
				<br/>
				<br/>
				<div style="text-align: right">
					<input class="btn btn-primary btn-sm" id="txt_tambahrow" value="Tambahkan" size="6">
				</div>
			</div>
		</div>
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Data Bahan</h3>
			</div>
			<div class="panel-body">
				<table width="100%">
					<tr>
						<td>
							<?= form_dropdown('txt_bahanid_parsing', $bahan, set_value('txt_bahanid_parsing'), 'data-placeholder="Bahan" id="txt_bahanid" class="form-control select2-single"') ?>
						</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>
							<input class="form-control" placeholder="Qty Bahan" id="txt_jumlah_bahan" name="txt_jumlah_bahan" size="4">
						</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>
							<input type="text" class="form-control" placeholder="Stok Bahan" id="txt_stok_bahan" name="txt_stok_bahan">
						</td>
					</tr>
				</table>
				<br/>
				<br/>
				<div style="text-align: right">
					<input class="btn btn-primary btn-sm" id="txt_tambahrow_bahan" value="Tambahkan" size="6">
				</div>
			</div>
		</div>
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Result Produksi</h3>
			</div>
			<div class="panel-body">
				<table width="100%" id="result_row">
					<thead>
						<th style="text-align: center;">Opsi</th>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<th style="text-align: center;">Kategori</th>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<th style="text-align: center;">Produk</th>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<th style="text-align: center;">Lengan</th>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<th style="text-align: center;">Size</th>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<th style="text-align: center;">Warna</th>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<th style="text-align: center;">Jumlah</th>
					</thead>
					<tbody></tbody>
				</table>
				<br/>
				<br/>
				<table width="100%" id="result_row_bahan">
					<thead>
						<th style="text-align: center;">Opsi</th>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<th style="text-align: center;">Bahan</th>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<th style="text-align: center;">Jumlah</th>
					<tbody></tbody>
				</table>
				<br/>
				<br/>
				<textarea class="form-control" placeholder="Catatan" name="txt_keterangan" rows="3"></textarea>
				<br/>
				<br/>
				<input type="text" id="txt_hapusrow" name="txt_hapusrow" class="btn btn-primary btn-sm" value="Hapus Produk" size="10">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="text" id="txt_hapusrow_bahan" name="txt_hapusrow_bahan" class="btn btn-primary btn-sm" value="Hapus Bahan" size="10">
				<br/>
				<br/>
				<div style="text-align: right">
					<input type="submit" class="btn btn-primary btn-sm" id="txt_simpan" value="Simpan">
				</div>
			</div>
		</div>
	</div>
</div>
<?= form_close(); ?>