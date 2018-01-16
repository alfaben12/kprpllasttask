<h3 class="page-title">Tambah Baru Kategori Produk</h3>
<?= form_open($this->uri->segment(1).'/prosess_tambah'); ?>
<div class="row">
	<div class="col-md-6">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Data Kategori</h3>
			</div>
			<div class="panel-body">
				<input class="form-control" placeholder="Nama Kategori" type="text" name="txt_namakategori" value="<?= set_value('txt_namakategori'); ?>">
				<?= form_error('txt_namakategori'); ?>
				<br>
				<div style="text-align: right">
					<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-plus-square"></i> Tambah </button>
				</div>
			</div>
		</div>
	</div>
</div>
<?= form_close(); ?>