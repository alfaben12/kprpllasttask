
<h3 class="page-title">Data Penjualan</h3>
<div class="row">
	<div class="col-md-12">
		<!-- TABLE STRIPED -->
		<div class="panel">
			<div class="panel-body">
				<table class="datatables table table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>No Inv</th>
							<th>Pembeli</th>
							<th>Keterangan</th>
							<th>Status</th>
							<th>Pesan</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($data as $key => $val) {
							?>
							<tr>
								<td><?= $key + 1 ?></td>
								<td><?= $val['no_penjualan'] ?></td>
								<td><?= $val['nama'] ?> (<?= $val['email'] ?>)</td>
								<td><?= $val['keterangan'] == '' ? '-' : $val['keterangan'] ?></td>
								<td><code><?= $val['statusid'] == 0 ? 'Menunggu Verifikasi' : 'Terverifikasi' ?></code></td>
								<td><?= $val['tanggal_pesan'] ?></td>
								
							</tr>
							<?php
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
		<!-- END TABLE STRIPED -->
	</div>