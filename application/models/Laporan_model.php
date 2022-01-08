<?php

class Laporan_model extends CI_Model {

    public function laporan($tanggal, $bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->join('invoice1', 'invoice1.id_invoice = pesanan.id_invoice');
        $this->db->where('DAY(invoice1.tgl_pesan)', $tanggal);
        $this->db->where('MONTH(invoice1.tgl_pesan)', $bulan);
        $this->db->where('YEAR(invoice1.tgl_pesan)', $tahun);
        return $this->db->get();
    }
}