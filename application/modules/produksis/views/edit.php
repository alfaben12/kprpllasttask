<h3 class="page-title">Detail Penjualan</h3>
<?php
foreach ($result_penjualan as $key => $val) {
	?>
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
							<td><?= $val['nama'] ?></td>
						</tr>
						<tr>
							<td width="13%">Alamat</td>
							<td width="2%"> : </td>
							<td id="txt_alamat"><?= $val['alamat'] ?></td>
						</tr>
						<tr>
							<td width="13%">No Telepon</td>
							<td width="2%"> : </td>
							<td id="txt_alamat"><?= $val['no_telepon'] ?></td>
							<td id="txt_notelepon">-</td>
						</tr>
						<tr>
							<td width="13%">Email</td>
							<td width="2%"> : </td>
							<td id="txt_email"><?= $val['email'] ?></td>
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
								<font><b> Kategori</b></font>
							</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>
								<font><b> Produk</b></font>
							</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>
								<font><b> Lengan</b></font>
							</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>
								<font><b> Size</b></font>
							</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>
								<font><b> Warna</b></font>
							</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>
								<font><b> Sablon</b></font>
							</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>
								<font><b> Warna Sablon</b></font>
							</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>
								<font><b> Jumlah</b></font>
							</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>
								<font><b> Harga</b></font>
							</td>
						</tr>
						<tr>
							<td><br/></td>
						</tr>
						<?php
						foreach ($result_detail_penjualan as $key => $value) {
							?>
							<tr>
								<td>
									<font><?= $value['nama_kategori'] ?></font>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>
									<font><?= $value['nama_produk'] ?></font>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>
									<font><?= $value['nama_lengan'] ?></font>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>
									<font><?= $value['nama_size'] ?></font>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>
									<font><?= $value['nama_warna'] ?></font>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>
									<font><?= $value['nama_sablon'] ?></font>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>
									<font><?= $value['nama_warnasablon'] ?> Warna</font>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>
									<font><?= $value['jumlah'] ?></font>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>
									<font><?= $value['harga'] ?></font>
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
					<textarea class="form-control" placeholder="Catatan" name="txt_keterangan" rows="3" disabled=""><?= $val['keterangan'] ?></textarea>
					<br/>
				</div>
			</div>
		</div>
	</div>
	<?php
}
?>
<h3 class="page-title">Edit Produksi</h3>
<?= form_open($this->uri->segment(1).'/prosess_edit/id/'.$arr); ?>
<?php
foreach ($result as $key => $val) {
	?>
	<div class="row">
		<div class="col-md-12">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Data Produksi</h3>
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
									<input type="hidden" class="form-control" placeholder="Stok" id="txt_stok_<?= $value['id'] ?>" key="<?= $value['id'] ?>" name="txt_stok[]">
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>
									<input type="hidden" name="txt_produksidetailid[]" value="<?= $value['id'] ?>">
								</td>
								<td>&nbsp;</td>
								<td>
									<a href="<?= base_url(). 'produksis/hapus_detail/id/'. $value['id'] ?>" class="btn btn-danger btn-sm"><i class="lnr lnr-trash"></i></a>
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
									<input type="hidden" class="form-control" placeholder="Stok Bahan" id="txt_stok_bahan_<?= $value['id'] ?>" key="<?= $value['id'] ?>" name="txt_stok_bahan[]">
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>
									<input type="hidden" name="txt_produksibahanid[]" value="<?= $value['id'] ?>">
								</td>
								<td>&nbsp;</td>
								<td>
									<a href="<?= base_url(). 'produksis/hapus_bahan/id/'. $value['id'] ?>" class="btn btn-danger btn-sm"><i class="lnr lnr-trash"></i></a>
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