<?= $this->session->flashdata('pesan'); ?>
<h3 class="page-title">Penjualan</h3>
<div class="row">
	<div class="col-md-12">
		<!-- TABLE STRIPED -->
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">List Penjualan</h3>
			</div>
			<div class="panel-body">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>No Inv</th>
							<th>Pembeli</th>
							<th>Keterangan</th>
							<th>Status</th>
							<th>Pesan</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($result as $key => $val) {
							?>
							<tr>
								<td><?= $key + 1 ?></td>
								<td><?= $val['no_penjualan'] ?></td>
								<td><?= $val['nama'] ?> (<?= $val['email'] ?>)</td>
								<td><?= $val['keterangan'] == '' ? '-' : $val['keterangan'] ?></td>
								<td><code><?= $val['statusid'] == 0 ? 'Menunggu Verifikasi' : 'Terverifikasi' ?></code></td>
								<td><?= $val['tanggal_pesan'] ?></td>
								<td>
									<div class="btn-group">
										<button class="btn btn-primary btn-sm" aria-expanded="true" data-toggle="dropdown" style="width: 100px;">
											Respon
										</button>
										<ul class="dropdown-menu">
											<li><a href="<?= base_url(). $this->uri->segment(1); ?>/detail/id/<?= $val['id'] ?>">Detail</a></li>
											<?php
											if ($val['statusid'] == 0) {
												?>
												<li><a href="<?= base_url(). $this->uri->segment(1); ?>/edit/id/<?= $val['id'] ?>">Edit</a></li>
												<li><a href="<?= base_url(). $this->uri->segment(1); ?>/verifikasi/id/<?= $val['id'] ?>">Verifikasi</a></li>
												<?php
											}
											?>
											<li><a href="<?= base_url(). $this->uri->segment(1); ?>/hapus/id/<?= $val['id'] ?>">Hapus</a></li>
										</ul>
									</div>
								</td>
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