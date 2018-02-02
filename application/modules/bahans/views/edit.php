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
					<input class="form-control" placeholder="Nama Bahan" type="text" name="txt_nama" value="<?= set_value('txt_nama', $val['nama']); ?>">
					<?= form_error('txt_nama'); ?>
					<br>
					<input class="form-control" placeholder="Stok" type="text" name="txt_stok" value="<?= set_value('txt_bahan', $val['stok']); ?>" onkeypress="return blockNonNumbers(this, event, true, false);">
					<?= form_error('txt_stok'); ?>
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