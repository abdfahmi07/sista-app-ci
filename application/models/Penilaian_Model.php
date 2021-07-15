<?php 

class Penilaian_Model extends CI_Model {
    
    private $table = 'penilaian';
    
    public function getAll() {
        $kategori_penilaian = $this->db->get($this->table);
        return $kategori_penilaian;
    }
}