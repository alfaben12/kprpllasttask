<h3 class="page-title">Tambah User Baru</h3>
<?= form_open($this->uri->segment(1).'/prosess_tambah'); ?>
<div class="row">
	<div class="col-md-6">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Data User</h3>
			</div>
			<div class="panel-body">
				<input class="form-control" placeholder="Nama" type="text" name="txt_nama" value="<?= set_value('txt_nama') ?>">
				<?= form_error('txt_nama'); ?>
				<br>
				<input class="form-control" placeholder="Username" type="text" name="txt_username" value="<?= set_value('txt_username') ?>">
				<?= form_error('txt_username'); ?>
				<br>
				<input class="form-control" placeholder="Password" type="password" name="txt_password" value="<?= set_value('txt_password') ?>">
				<?= form_error('txt_password'); ?>
				<br>
				<?= form_dropdown('txt_roleid', $role, set_value('txt_roleid')) ?>
				<?= form_error('txt_roleid'); ?>
				<div style="text-align: right">
					<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-plus-square"></i> Tambah </button>
				</div>
			</div>
		</div>
	</div>
</div>
<?= form_close(); ?>