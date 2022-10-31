<?php

class Ins extends CI_Controller
{
	function __construct()
	{

		parent::__construct();
		$this->load->helper('url');
		$config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider"> » </span>';
		$this->breadcrumb->initialize($config);
		no_access();
		levelsuper();
	}
	public function index()
	{
		$data = array(
			"title" => 'Manajemen Desa',
			"menu" => getmenu(),
			"aktif" => "ins",
			"getrow" => $this->db->get('desa')->row_array(),
			"content" => "ins/index.php",
		);
		$this->breadcrumb->append_crumb('Manajemen Desa', site_url('ins'));
		$this->load->view('admin/templatedash', $data);
	}
	public function add()
	{
		$data = array(
			"desa" => strtoupper($_POST['desa']),
			"kecamatan" => strtoupper($_POST['kecamatan']),
			"kabupaten" => strtoupper($_POST['kabupaten']),
			"kepala_desa" => strtoupper($_POST['kepala_desa']),
			"alamat_desa" => strtoupper($_POST['alamat_desa']),
			"telp" => strtoupper($_POST['telp']),
			"kode_pos" => strtoupper($_POST['kode_pos']),
		);
		$this->db->query('DELETE FROM desa WHERE 1=1');
		$this->db->insert('desa', $data);
		$this->session->set_flashdata('sukses', 'Data Berhasil Di Update');
		redirect('Ins');
	}
}
