<h3 class="page-title">Tambah Baru Bahan</h3>
<?= form_open($this->uri->segment(1).'/prosess_tambah'); ?>
<div class="row">
	<div class="col-md-6">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Data Bahan</h3>
			</div>
			<div class="panel-body">
				<input class="form-control" placeholder="Nama Bahan" type="text" name="txt_nama" value="<?= set_value('txt_nama'); ?>">
				<?= form_error('txt_nama'); ?>
				<br>
				<input class="form-control" placeholder="Stok" type="text" name="txt_stok" value="<?= set_value('txt_bahan'); ?>" onkeypress="return blockNonNumbers(this, event, true, false);">
				<?= form_error('txt_stok'); ?>
				<br>
				<div style="text-align: right">
					<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-plus-square"></i> Tambah </button>
				</div>
			</div>
		</div>
	</div>
</div>
<?= form_close(); ?>