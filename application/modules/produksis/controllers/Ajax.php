<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Ajax extends CI_Controller{

	function __construct(){
		parent :: __construct();
		$this->load->model('produksi');
		$this->load->model('penjualans/penjualan');
		$this->load->model('bahans/bahan');
	}

	function get_produk_bykategoriid(){
		$kategoriid = $this->input->post('txt_kategoriid');
		$data = produk_bykategoriid_dropdown($kategoriid);
		echo $data;
	}

	function generate_total_harga(){
		/* membuat variable post data */
		$kategoriid = $this->input->post('txt_kategoriid');
		$produkid = $this->input->post('txt_produkid');
		$sizeid = $this->input->post('txt_sizeid');
		$warnaid = $this->input->post('txt_warnaid');
		$lenganid = $this->input->post('txt_lenganid');
		$jenissablon = $this->input->post('txt_jenissablonid');
		$warnasablon = $this->input->post('txt_jumlahwarnasablonid');
		$jumlah = $this->input->post('txt_jumlah');

		$this->db->trans_start();
		/* membuat value */
		$this->penjualan->setKategoriID($kategoriid);
		$this->penjualan->setProdukID($produkid);
		$this->penjualan->setSizeID($sizeid);
		$this->penjualan->setWarnaID($warnaid);
		$this->penjualan->setLenganID($lenganid);
		$this->penjualan->setJenisSablonID($jenissablon);
		$this->penjualan->setJumlahWarnaID($warnasablon);
		$this->penjualan->setJumlah($jumlah);

		/* function get result */
		$result = $this->penjualan->get_harga_by_paramid();
		$hargajenissablon = $this->penjualan->get_harga_jenissablon();
		$hargawarnasablon = $this->penjualan->get_harga_warnasablon();
		$this->db->trans_complete();

		foreach ($result as $key => $val) {
			$data['recheck_harga'] = $val['total_harga'];
			$data['total_harga'] = (($val['total_harga'] + $hargajenissablon + $hargawarnasablon) * $jumlah);
			$data['stok'] = $val['stok'];
			$data['id'] = $val['id'];
		}

		echo json_encode($data);
	}

	function get_sisa_stok(){
		/* membuat variable post data */
		$kategoriid = $this->input->post('txt_kategoriid');
		$produkid = $this->input->post('txt_produkid');
		$sizeid = $this->input->post('txt_sizeid');
		$warnaid = $this->input->post('txt_warnaid');
		$lenganid = $this->input->post('txt_lenganid');

		$this->db->trans_start();
		/* membuat value */
		$this->penjualan->setKategoriID($kategoriid);
		$this->penjualan->setProdukID($produkid);
		$this->penjualan->setSizeID($sizeid);
		$this->penjualan->setWarnaID($warnaid);
		$this->penjualan->setLenganID($lenganid);

		/* function get result */
		$result = $this->penjualan->get_harga_by_paramid();
		$this->db->trans_complete();

		foreach ($result as $key => $val) {
			$data['stok'] = $val['stok'] == null ? 0 : $val['stok'];
			$data['id'] = $val['id'] == null ? 0 : $val['id'];
		}

		echo json_encode($data);
	}

	function get_sisa_stok_bahan(){
		/* membuat variable post data */
		$bahanid = $this->input->post('txt_bahanid');

		$this->db->trans_start();
		/* membuat value */
		$this->bahan->setID($bahanid);

		/* function get result */
		$result = $this->bahan->get_stok_by_paramid();
		$this->db->trans_complete();

		foreach ($result as $key => $val) {
			$data['id'] = $val['id'] == null ? 0 : $val['id'];
			$data['stok'] = $val['stok'] == null ? 0 : $val['stok'];
		}

		echo json_encode($data);
	}

	function get_detail_penjualan(){
		$penjualanid = $this->input->post('txt_penjualanid');

		/* membuat value */
		$this->penjualan->setID($penjualanid);

		/* fungsi ambil data */
		$result = $this->penjualan->ambil_data();
		$result_detail = $this->penjualan->ambil_data_view_detail();

		/* hasil data */
		$data['result'] = $result;
		$data['result_detail'] = $result_detail;

		$html = '';

		$html .= '
		<h3 class="page-title">Detail Penjualan</h3>';

		foreach ($result as $key => $val) {
			$html .= '
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Data Pembeli</h3>
						</div>
						<div class="panel-body">
							<table width="100%">
								<tr>
									<td width="13%">Nama</td>
									<td width="2%"> : </td>
									<td>'; $html .= $val['nama']; $html .='</td>
								</tr>
								<tr>
									<td width="13%">Alamat</td>
									<td width="2%"> : </td>
									<td id="txt_alamat">'; $html .= $val['alamat']; $html .='</td>
								</tr>
								<tr>
									<td width="13%">No Telepon</td>
									<td width="2%"> : </td>
									<td id="txt_alamat">'; $html .=$val['no_telepon']; $html .='</td>
									<td id="txt_notelepon">-</td>
								</tr>
								<tr>
									<td width="13%">Email</td>
									<td width="2%"> : </td>
									<td id="txt_email">'; $html .=$val['email']; ; $html .='</td>
								</tr>
							</table>
						</div>
					</div>
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Data Penjualan</h3>
						</div>
						<div class="panel-body">
							<table width="100%">
								<tr>
									<td>
										<font><b> Kategori</b></font>
									</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>
										<font><b> Produk</b></font>
									</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>
										<font><b> Lengan</b></font>
									</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>
										<font><b> Size</b></font>
									</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>
										<font><b> Warna</b></font>
									</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>
										<font><b> Sablon</b></font>
									</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>
										<font><b> Warna Sablon</b></font>
									</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>
										<font><b> Jumlah</b></font>
									</td>
								</tr>
								<tr>
									<td><br/></td>
								</tr>';
								foreach ($result_detail as $key => $value) {
								$html .='
								<tr>
									<td>
										<font>'; $html .=$value['nama_kategori']; $html .='</font>
									</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>
										<font>'; $html .=$value['nama_produk']; $html .='</font>
									</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>
										<font>'; $html .=$value['nama_lengan']; $html .='</font>
									</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>
										<font>'; $html .=$value['nama_size']; $html .='</font>
									</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>
										<font>'; $html .=$value['nama_warna']; $html .='</font>
									</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>
										<font>'; $html .=$value['nama_sablon']; $html .='</font>
									</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>
										<font>'; $html .=$value['nama_warnasablon']; $html .=' Warna</font>
									</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>
										<font>'; $html .=$value['jumlah']; $html .='</font>
									</td>
								</tr>
								<tr>
									<td><br/></td>
								</tr>';
							}
							$html .='
							</table>
						</div>
					</div>
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Keterangan</h3>
						</div>
						<div class="panel-body">
							<textarea class="form-control" placeholder="Catatan" name="txt_keterangan" rows="3" disabled="">'; $html .=$val['keterangan']; $html .='</textarea>
						</div>
					</div>
				</div>
			</div>';
		}
		echo $html;
	}
}
?>