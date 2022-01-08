<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends  CI_Controller {

    public function index()
    {
        $data['title'] = 'Laporan';
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar');
        $this->load->view('laporan/index');
        $this->load->view('templates/admin_footer');
    }

    public function laporan_aksi()
    {
        $data['title'] = 'Cetak Laporan';
        $tanggal = $this->input->post('tanggal');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'tanggal' => $tanggal,
            'bulan'   => $bulan,
            'tahun'   => $tahun,
            'laporan' => $this->laporan_model->laporan($tanggal, $bulan, $tahun)
        );
        $data['laporan'] = $this->laporan_model->laporan($tanggal, $bulan, $tahun);
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar');
        $this->load->view('laporan/print_laporan', $data);
        $this->load->view('templates/admin_footer');
    }
}