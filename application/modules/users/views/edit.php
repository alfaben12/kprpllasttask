<h3 class="page-title">Edit User</h3>
<?= form_open($this->uri->segment(1).'/proses_edit/id/'.$arr); ?>
<?php
foreach ($result as $key => $val) {
	?>
	<div class="row">
		<div class="col-md-6">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Data User</h3>
				</div>
				<div class="panel-body">
					<input class="form-control" placeholder="Nama" type="text" name="txt_nama" value="<?= set_value('txt_nama', $val['nama']) ?>">
					<?= form_error('txt_nama'); ?>
					<br>
					<input class="form-control" placeholder="Username" type="text" name="txt_username" value="<?= set_value('txt_username', $val['username']) ?>">
					<?= form_error('txt_username', $val['username']); ?>
					<br>
					<input class="form-control" placeholder="Password" type="password" name="txt_password" value="<?= set_value('txt_password') ?>">
					<?= form_error('txt_password'); ?>
					<br>
					<?= form_dropdown('txt_roleid', $role, set_value('txt_roleid', $val['roleid'])) ?>
					<?= form_error('txt_roleid'); ?>
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