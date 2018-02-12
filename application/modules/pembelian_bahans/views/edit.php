<h3 class="page-title">Edit Produksi</h3>
<?= form_open($this->uri->segment(1).'/prosess_edit/id/'.$arr); ?>
<?php
foreach ($result as $key => $val) {
	?>
	<div class="row">
		<div class="col-md-12">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Data Bahan</h3>
				</div>
				<div class="panel-body">
					<table width="100%">
						<?php
						foreach ($result_bahan as $key => $value) {
							?>
							<tr>
								<td>
									<?= form_dropdown('txt_bahanid[]', $bahan, set_value('txt_bahanid[]', $value['bahanid']), 'data-placeholder="Bahan" id="txt_bahanid_'.$value['id'].'" key="'.$value['id'].'" class="bahan form-control select2-single"') ?>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>
									<input class="jumlah_bahan form-control" placeholder="Jumlah Bahan" id="txt_jumlah_bahan_<?= $value['id'] ?>" key="<?= $value['id'] ?>" value="<?= $value['jumlah'] ?>" name="txt_jumlah_bahan[]" size="5">
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>
									<input class="harga form-control" placeholder="Harga" id="txt_harga_<?= $value['id'] ?>" key="<?= $value['id'] ?>" value="<?= $value['harga'] ?>" name="txt_harga[]" size="5">
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>
									<input type="hidden" class="form-control" placeholder="Stok Bahan" id="txt_stok_bahan_<?= $value['id'] ?>" key="<?= $value['id'] ?>" name="txt_stok_bahan[]">
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>
									<input type="hidden" name="txt_pembelianbahanid[]" value="<?= $value['id'] ?>">
								</td>
								<td>&nbsp;</td>
								<td>
									<a href="<?= base_url(). 'pembelian_bahans/hapus_bahan/id/'. $value['id'] ?>" class="btn btn-danger btn-sm"><i class="lnr lnr-trash"></i></a>
								</td>
							</tr>
							<tr>
								<td><br/></td>
							</tr>
							<?php
						}
						?>
					</table>
				</div>
			</div>
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Keterangan</h3>
				</div>
				<div class="panel-body">
					<textarea class="form-control" placeholder="Catatan" name="txt_keterangan" rows="3"><?= $val['keterangan'] ?></textarea>
					<input type="hidden" name="txt_statusid" value="<?= $val['statusid'] ?>">
					<br/>
					<div style="text-align: right">
						<input type="submit" class="btn btn-primary btn-sm" id="txt_simpan" value="Simpan">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
}
?>
<?= form_close(); ?>