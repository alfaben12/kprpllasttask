<h3 class="page-title">Detail Penjualan</h3>
<?php
foreach ($result as $key => $val) {
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
						foreach ($result_detail as $key => $value) {
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
	<?php
}
?>