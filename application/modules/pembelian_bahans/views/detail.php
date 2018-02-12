<h3 class="page-title">Detail Pembelian Bahan</h3>
<?php
foreach ($result as $key => $val) {
	?>
	<div class="row">
		<div class="col-md-12">
			<div class="panel">
				<div class="panel-body">
					<table width="100%">
						<tr>
							<td>
								<font><b> Bahan</b></font>
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
						foreach ($result_bahan as $key => $value) {
							?>
							<tr>
								<td>
									<font><?= $value['nama_bahan'] ?></font>
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