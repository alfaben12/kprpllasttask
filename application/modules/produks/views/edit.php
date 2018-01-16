<h3 class="page-title">Edit Produk</h3>
<?= form_open($this->uri->segment(1).'/proses_edit/id/'.$arr); ?>
<?php
foreach ($result as $key => $val) {
	?>
	<div class="row">
	<div class="col-md-6">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Data Produk</h3>
			</div>
			<div class="panel-body">
				<?= form_dropdown('txt_kategoriid', $kategori, set_value('txt_kategoriid', $val['kategoriid']), 'data-placeholder="Kategori" id="txt_kategoriid" class="form-control select2-single"') ?>
				<br/>
				<?= form_error('txt_namaproduk'); ?>
				<br/>
				<input class="form-control" placeholder="Nama Produk" type="text" name="txt_namaproduk" value="<?= set_value('txt_namaproduk', $val['nama_produk']); ?>">
				<?= form_error('txt_namaproduk'); ?>
				<br>
				<input class="form-control" placeholder="Harga" type="text" name="txt_harga" value="<?= set_value('txt_harga', $val['harga']); ?>">
				<?= form_error('txt_harga'); ?>
				<br>
				<div style="text-align: right">
					<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-plus-square"></i> Tambah </button>
				</div>
			</div>
		</div>
	</div>
</div>
	<?php
}
?>
<?= form_close(); ?>