<h3 class="page-title">Tambah Baru Jenis Sablon</h3>
<?= form_open($this->uri->segment(1).'/prosess_tambah'); ?>
<div class="row">
	<div class="col-md-6">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Data Jenis Sablon</h3>
			</div>
			<div class="panel-body">
				<input class="form-control" placeholder="Jenis Sablon" type="text" name="txt_jenissablon" value="<?= set_value('txt_jenissablon'); ?>">
				<?= form_error('txt_jenissablon'); ?>
				<br>
				<input class="form-control" placeholder="Harga" type="text" name="txt_harga" value="<?= set_value('txt_harga'); ?>" onkeypress="return blockNonNumbers(this, event, true, false);">
				<?= form_error('txt_harga'); ?>
				<br>
				<div style="text-align: right">
					<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-plus-square"></i> Tambah </button>
				</div>
			</div>
		</div>
	</div>
</div>
<?= form_close(); ?>