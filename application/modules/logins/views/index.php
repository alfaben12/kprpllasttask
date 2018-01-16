<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<?= $this->session->flashdata('pesan'); ?>
	<?= form_open($this->uri->segment(1).'/prosess_login'); ?>
	<input type="text" name="txt_username" required="">
	<br/>
	<input type="text" name="txt_password" required="">
	<button type="submit">Masuk</button>
	<?= form_close(); ?>
</body>
</html>