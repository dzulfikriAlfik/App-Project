<?php

class Laporan extends CI_Controller
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
		$this->load->model('M_laporan');
		$this->load->library('pdf_report');
		no_access();
	}

	public function index()
	{
		$data = array(
			"title" => 'Laporan',
			"menu" => getmenu(),
			"aktif" => "laporan",
			"content" => "laporan/index.php",
		);
		$this->breadcrumb->append_crumb('Laporan', site_url('laporan'));
		$this->load->view('admin/template', $data);
	}

	public function eks()
	{
		$data['all'] = $this->M_laporan->all();
		$this->load->view('admin/laporan/eks', $data);
	}

	public function printpdf($id)
	{
		$kk = getKK($id);
		$data = array(
			"id" => $id,
			"getrow" => $this->db->where('nik', $id)->get('penduduk')->row_array(),
			"getdesa" => $this->db->get('desa')->row_array()
		);
		$this->load->view('admin/laporan/pdf', $data);
	}

	public function printkelahiran()
	{
		$data = [
			"all" => $this->db->query("SELECT * FROM penduduk JOIN kk ON penduduk.id_kk = kk.id_kk WHERE mutasi = 3 AND date_format(tanggal_lahir, '%Y') >= 2018 ORDER BY penduduk.id_kk ASC")->result(),
			"getdesa" => $this->db->get('desa')->row_array()
		];
		$this->load->view('admin/laporan/printkelahiran', $data);
	}

	public function printkematian()
	{
		$data = [
			"all" => $this->db->query("SELECT * FROM penduduk WHERE penduduk.status = 2 AND (penduduk.mutasi = 1 OR penduduk.mutasi = 3)")->result(),
			"getdesa" => $this->db->get('desa')->row_array()
		];
		$this->load->view('admin/laporan/printkematian', $data);
	}
}
