<?= $this->session->flashdata('pesan'); ?>
<h1 class="page-title"><i class="lnr lnr-home"></i> Gudang</h1>
<!-- <h3 class="page-title">Produk</h3> -->
<a href="<?= base_url('produks/tambah'); ?>" class="btn btn-primary">Tambah Produk <b>+</b></a>
<div class="row" style="margin-top: 20px;">
	<div class="col-md-12">
		<!-- TABLE STRIPED -->
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Daftar Produk</h3>
			</div>
			<div class="panel-body">
				<table class="datatables table table-striped" >
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Kategori</th>
							<th>Nama Produk</th>
							<th>Harga</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($result as $key => $val) {
							?>
							<tr>
								<td><?= $key + 1 ?></td>
								<td><?= $val['nama_kategori'] ?></td>
								<td><?= $val['nama_produk'] ?></td>
								<td><?= $val['harga'] ?></td>
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
