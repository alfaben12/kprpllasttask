<h3 class="page-title">Tambah Baru Produksi</h3>
<?= form_open($this->uri->segment(1).'/prosess_tambah'); ?>
<div class="row">
	<div class="col-md-12">
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
							<input class="form-control" placeholder="Qty Bahan" id="txt_jumlah_bahan" name="" size="4" onkeypress="return blockNonNumbers(this, event, true, false);">
						</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>
							<input type="text" class="form-control" placeholder="Harga" id="txt_harga" name="" onkeypress="return blockNonNumbers(this, event, true, false);">
						</td>
						<td>
							<input type="hidden" class="form-control" placeholder="Stok Bahan" id="txt_stok_bahan" name="txt_stok_bahan">
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
				<table width="100%" id="result_row_bahan">
					<thead>
						<th style="text-align: center;">Opsi</th>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<th style="text-align: center;">Bahan</th>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<th style="text-align: center;">Jumlah</th>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<th style="text-align: center;">Harga</th>
					<tbody></tbody>
				</table>
				<br/>
				<br/>
				<textarea class="form-control" placeholder="Catatan" name="txt_keterangan" rows="3"></textarea>
				<br/>
				<br/>
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