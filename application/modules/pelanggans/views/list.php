<?= $this->session->flashdata('pesan'); ?>
<h3 class="page-title">Pelanggan</h3>
<div class="row">
	<div class="col-md-12">
		<!-- TABLE STRIPED -->
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Daftar Pelanggan</h3>
			</div>
			<div class="panel-body">
				<table class="datatables table table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Email</th>
							<th>No Telepon</th>
							<th>Alamat</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($result as $key => $val) {
							?>
							<tr>
								<td><?= $key + 1 ?></td>
								<td><?= $val['nama'] ?></td>
								<td><?= $val['email'] ?></td>
								<td><?= $val['no_telepon'] ?></td>
								<td><?= $val['alamat'] ?></td>
								<td>
									<div class="btn-group">
										<button class="btn btn-primary btn-sm" aria-expanded="true" data-toggle="dropdown" style="width: 100px;">
											Respon
										</button>
										<ul class="dropdown-menu">
											<li><a href="<?= base_url(). $this->uri->segment(1); ?>/edit/id/<?= $val['id'] ?>">Edit</a></li>
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