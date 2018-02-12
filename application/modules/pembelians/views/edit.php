<h3 class="page-title">Edit Pembelian</h3>
<?= form_open($this->uri->segment(1).'/prosess_edit/id/'.$arr); ?>
<?php
foreach ($result as $key => $val) {
	?>
	<div class="row">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Data Pembelian</h3>
				</div>
				<div class="panel-body">
					<table width="100%">
						<?php
						foreach ($result_detail as $key => $value) {
							?>
							<tr>
								<td>
									<?= form_dropdown('txt_kategoriid[]', $kategori, set_value('txt_kategoriid[]', $value['kategoriid']), 'data-placeholder="Kategori" id="txt_kategoriid_'.$value['id'].'" key="'.$value['id'].'" class="kategori form-control select2-single"') ?>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td id="produk_drpdw">
									<?= form_dropdown('txt_produkid[]', produk_bykategoriid_dropdown_edit($value['kategoriid']), set_value('txt_produkid[]', $value['produkid']), 'data-placeholder="Produk" id="txt_produkid_'.$value['id'].'" key="'.$value['id'].'" class="produk form-control select2-single"') ?>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>
									<?= form_dropdown('txt_lenganid[]', $lengan, set_value('txt_lenganid[]', $value['lenganid']), 'data-placeholder="Lengan" id="txt_lenganid_'.$value['id'].'" key="'.$value['id'].'" class="lengan form-control select2-single"') ?>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>
									<?= form_dropdown('txt_sizeid[]', $size, set_value('txt_sizeid[]', $value['sizeid']), 'data-placeholder="Size" id="txt_sizeid_'.$value['id'].'" key="'.$value['id'].'" class="size form-control select2-single"') ?>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>
									<?= form_dropdown('txt_warnaid[]', $warna, set_value('txt_warnaid[]', $value['warnaid']), 'data-placeholder="Warna" id="txt_warnaid_'.$value['id'].'" key="'.$value['id'].'" class="warna form-control select2-single"') ?>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>
									<input class="jumlah form-control" placeholder="Jumlah" id="txt_jumlah_<?= $value['id'] ?>" key="<?= $value['id'] ?>" value="<?= $value['jumlah'] ?>" name="txt_jumlah[]" size="5">
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>
									<input type="text" class="form-control" placeholder="Harga" id="txt_harga_<?= $value['id'] ?>" key="<?= $value['id'] ?>"  value="<?= $value['harga'] ?>" name="txt_harga[]" size="10">
									<input type="hidden" class="form-control" placeholder="Stok" id="txt_stok_<?= $value['id'] ?>" key="<?= $value['id'] ?>" name="txt_stok[]">
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>
									<input type="hidden" name="txt_pembeliandetailid[]" value="<?= $value['id'] ?>">
								</td>
								<td>&nbsp;</td>
								<td>
									<a href="<?= base_url(). 'pembelians/hapus_detail/id/'. $value['id'] ?>" class="btn btn-danger btn-sm"><i class="lnr lnr-trash"></i></a>
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
	<?php
}
?>
<?= form_close(); ?>