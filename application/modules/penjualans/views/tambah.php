<h3 class="page-title">Tambah Baru Penjualan</h3>
<?= form_open($this->uri->segment(1).'/prosess_tambah'); ?>
<div class="row">
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Data Pembeli</h3>
			</div>
			<div class="panel-body">
				<table width="100%">
					<tr>
						<td width="13%">Nama</td>
						<td width="2%"> : </td>
						<td><?= form_dropdown('txt_pelangganid', $pelanggan, set_value('txt_pelangganid'), 'data-placeholder="Nama" id="txt_pelangganid" class="form-control select2-single"') ?></td>
					</tr>
					<tr>
						<td width="13%">Alamat</td>
						<td width="2%"> : </td>
						<td id="txt_alamat">-</td>
					</tr>
					<tr>
						<td width="13%">No Telepon</td>
						<td width="2%"> : </td>
						<td id="txt_notelepon">-</td>
					</tr>
					<tr>
						<td width="13%">Email</td>
						<td width="2%"> : </td>
						<td id="txt_email">-</td>
					</tr>
					<tr>
						<td width="13%">Tanggal Dibuat</td>
						<td width="2%"> : </td>
						<td id="txt_dibuattanggal">-</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Data Penjualan</h3>
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
							<?= form_dropdown('txt_jenissablonid_parsing', $jenissablon, set_value('txt_jenissablonid_parsing'), 'data-placeholder="Jenis Sablon" id="txt_jenissablonid" class="form-control select2-single"') ?>
						</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>
							<?= form_dropdown('txt_jumlahwarnasablonid_parsing', $warnasablon, set_value('txt_jumlahwarnasablonid_parsing'), 'data-placeholder="Warna Sablon" id="txt_jumlahwarnasablonid" class="form-control select2-single"') ?>
						</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>
							<input class="form-control" placeholder="Jumlah" id="txt_jumlah" name="txt_jumlah" size="2">
						</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>
							<font id="text_harga">0</font>
							<input type="hidden" class="form-control" placeholder="Harga" id="txt_harga" name="txt_harga">
							<input type="text" class="form-control" placeholder="Stok" id="txt_stok" name="txt_stok">
						</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>
							<input class="btn btn-primary btn-sm" id="txt_generateharga" value="Harga" size="2">
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
				<h3 class="panel-title">Result Penjualan</h3>
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
						<th style="text-align: center;">Sablon</th>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<th style="text-align: center;">Warna Sablon</th>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<th style="text-align: center;">Jumlah</th>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<th style="text-align: center;">Harga</th>
					</thead>
					<tbody></tbody>
				</table>
				<br/>
				<br/>
				<textarea class="form-control" placeholder="Catatan" name="txt_keterangan" rows="3"></textarea>
				<br/>
				<br/>
				<input type="text" id="txt_hapusrow" name="txt_hapusrow" class="btn btn-primary btn-sm" value="Hapus" size="5">
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