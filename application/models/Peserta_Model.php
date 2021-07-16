<?php 

class Peserta_Model extends CI_Model {
    
    private $table = 'peserta_seminar';

    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    public function delete($id) {
        return $this->db->delete($this->table, ["id" => $id]);
    }

    public function getById($id)
    {
        return $this->db->get_where($this->table, ["id" => $id])->row();
    }

    public function update($data,$id)
    {
        return $this->db->update($this->table, $data, ['id' => $id]);
    }
    
    public function getAll() {
        $peserta = $this->db->get($this->table);
        return $peserta;
    }

    public function getCount() {
        $total = $this->getAll();
        return $total->num_rows();
    }

    public function getAllSeminarByName($nim) {
        $this->db->select('peserta_seminar.id, peserta_seminar.kehadiran, seminar_ta.judul, seminar_ta.nama_mahasiswa, seminar_ta.tanggal, seminar_ta.jam, seminar_ta.ruangan');
        // $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('seminar_ta', 'seminar_ta.id = peserta_seminar.seminar_id');
        $this->db->where('peserta_seminar.nim', $nim);
        $this->db->order_by('seminar_ta.tanggal DESC, seminar_ta.jam DESC');
        $peserta = $this->db->get();
        return $peserta;
    }

    public function getDetailSeminarPeserta($id_peserta) {
        // $this->db->select('peserta_seminar.id, peserta_seminar.kehadiran, seminar_ta.judul, seminar_ta.nama_mahasiswa, seminar_ta.tanggal, seminar_ta.jam, seminar_ta.ruangan');
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('seminar_ta', 'seminar_ta.id = peserta_seminar.seminar_id');
        $this->db->join('dosen', 'seminar_ta.pembimbing_id = dosen.id');
        // $this->db->where('peserta_seminar.nim', $nim);
        $this->db->where('peserta_seminar.id', $id_peserta);
        $peserta = $this->db->get()->row();
        return $peserta;
    }

    public function getDetailSeminarPeserta2($id_peserta) {
        // $this->db->select('peserta_seminar.id, peserta_seminar.kehadiran, seminar_ta.judul, seminar_ta.nama_mahasiswa, seminar_ta.tanggal, seminar_ta.jam, seminar_ta.ruangan');
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('seminar_ta', 'seminar_ta.id = peserta_seminar.seminar_id');
        $this->db->join('dosen', 'seminar_ta.penguji1_id = dosen.nidn');
        $this->db->where('peserta_seminar.id', $id_peserta);
        $peserta = $this->db->get()->row();
        return $peserta;
    }

    public function getDetailSeminarPeserta3($id_peserta) {
        // $this->db->select('peserta_seminar.id, peserta_seminar.kehadiran, seminar_ta.judul, seminar_ta.nama_mahasiswa, seminar_ta.tanggal, seminar_ta.jam, seminar_ta.ruangan');
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('seminar_ta', 'seminar_ta.id = peserta_seminar.seminar_id');
        $this->db->join('dosen', 'seminar_ta.penguji2_id = dosen.nidn');
        $this->db->where('peserta_seminar.id', $id_peserta);
        $peserta = $this->db->get()->row();
        return $peserta;
    }

    public function getDetailSeminarPeserta4($id_peserta) {
        // $this->db->select('peserta_seminar.id, peserta_seminar.kehadiran, seminar_ta.judul, seminar_ta.nama_mahasiswa, seminar_ta.tanggal, seminar_ta.jam, seminar_ta.ruangan');
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('seminar_ta', 'seminar_ta.id = peserta_seminar.seminar_id');
        $this->db->join('kategori_seminar', 'kategori_seminar.id = seminar_ta.kategori_seminar_id');
        $this->db->where('peserta_seminar.id', $id_peserta);
        $peserta = $this->db->get()->row();
        return $peserta;
    }
}

?>