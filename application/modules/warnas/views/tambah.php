<h3 class="page-title">Tambah Baru Warna</h3>
<?= form_open($this->uri->segment(1).'/prosess_tambah'); ?>
<div class="row">
	<div class="col-md-6">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Data Warna</h3>
			</div>
			<div class="panel-body">
				<input class="form-control" placeholder="Warna" type="text" name="txt_warna" value="<?= set_value('txt_warna'); ?>">
				<?= form_error('txt_warna'); ?>
				<br>
				<div style="text-align: right">
					<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-plus-square"></i> Tambah </button>
				</div>
			</div>
		</div>
	</div>
</div>
<?= form_close(); ?>