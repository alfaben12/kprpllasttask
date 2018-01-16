<h3 class="page-title">Tambah Baru Produk</h3>
<?= form_open($this->uri->segment(1).'/prosess_tambah'); ?>
<div class="row">
	<div class="col-md-6">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Data Produk</h3>
			</div>
			<div class="panel-body">
				<?= form_dropdown('txt_kategoriid', $kategori, set_value(''), 'data-placeholder="Kategori" id="txt_kategoriid" class="form-control select2-single"') ?>
				<br>
				<?= form_error('txt_kategoriid'); ?>
				<br>
				<?= form_dropdown('txt_produkid', produk_bykategoriid_dropdown_edit(null), set_value('txt_produkid'), 'data-placeholder="Produk" id="txt_produkid" class="form-control select2-single"') ?>
				
				<br>
				<br>
				<?= form_dropdown('txt_sizeid', $size, set_value('txt_sizeid'), 'data-placeholder="Size" class="form-control select2-single"') ?>
				<br>
				<?= form_error('txt_sizeid'); ?>
				<br>
				<?= form_dropdown('txt_warnaid', $warna, set_value('txt_warnaid'), 'data-placeholder="Warna" class="form-control select2-single"') ?>
				<br>
				<?= form_error('txt_warnaid'); ?>
				<br>
				<?= form_dropdown('txt_lenganid', $lengan, set_value('txt_lenganid'), 'data-placeholder="Size Lengan" class="form-control select2-single"') ?>
				<br>
				<?= form_error('txt_lenganid'); ?>
				<br>
				<input class="form-control" placeholder="Stok" type="text" name="txt_stok" value="<?= set_value('txt_stok') ?>" onkeypress="return blockNonNumbers(this, event, true, false);">
				<?= form_error('txt_stok'); ?>
				<br>
				<div style="text-align: right">
					<button type="submit" id="btn_submit" class="btn btn-primary btn-sm"><i class="fa fa-plus-square"></i> Tambah </button>
				</div>
			</div>
		</div>
	</div>
</div>
<?= form_close(); ?>