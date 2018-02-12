<h3 class="page-title">Detail Pembelian</h3>
<?php
foreach ($result as $key => $val) {
	?>
	<div class="row">
		<div class="col-md-12">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Data Pembelian</h3>
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
				</div>
			</div>
		</div>
	</div>
	<?php
}
?>