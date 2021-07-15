<?php 

class Seminar_Model extends CI_Model {
    
    private $table = 'seminar_ta';

    public function getAll() {
        // $this->db->select('*');
        $this->db->select('seminar_ta.id, seminar_ta.nim, seminar_ta.judul, seminar_ta.nama_mahasiswa, seminar_ta.tanggal, seminar_ta.jam, seminar_ta.ruangan, kategori_seminar.nama, seminar_ta.nilai_pembimbing, seminar_ta.nilai_penguji1, seminar_ta.nilai_penguji2');
        // $this->db->select('seminar_ta.semester, seminar_ta.tanggal, seminar_ta.jam, kategori_seminar.nama, seminar_ta.nim,seminar_ta.nama_mahasiswa,seminar_ta.prodi,seminar_ta.judul,seminar_ta.ruangan,dosen.nama, seminar_ta.nilai_pembimbing,seminar_ta.nilai_penguji1,seminar_ta.nilai_penguji2,seminar_ta.nilai_akhir');
        $this->db->from($this->table);
        $this->db->join('kategori_seminar', 'kategori_seminar.id = seminar_ta.kategori_seminar_id');
        $this->db->join('dosen c', 'c.id = seminar_ta.pembimbing_id');
        $this->db->join('dosen b', 'b.nidn = seminar_ta.penguji1_id');
        $this->db->order_by('tanggal DESC, jam DESC');
        // $this->db->order_by('tanggal', 'DESC');

        // $this->db->join('dosen', 'dosen.nidn = eminar_ta.penguji2_id');
        $query = $this->db->get();
        return $query;
    }

    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    public function getById($id)
    {
        return $this->db->get_where($this->table, ["id" => $id])->row();
    }

    public function update($data,$id)
    {
        return $this->db->update($this->table, $data, ['id' => $id]);
    }

    public function delete($id) {
        return $this->db->delete($this->table, ["id" => $id]);
    }

    public function getCount() {
        $this->db->where("tanggal", date("Y-m-d"));
        $count = $this->db->get($this->table);
        return $count->num_rows();
    }

    // Student
    public function getSeminarToday() {
        $this->db->select('seminar_ta.id, seminar_ta.judul, seminar_ta.tanggal, seminar_ta.jam, seminar_ta.nama_mahasiswa, kategori_seminar.nama');
        $this->db->from($this->table);
        $this->db->join('kategori_seminar', 'kategori_seminar.id = seminar_ta.kategori_seminar_id');
        $this->db->where('tanggal >=', date("Y-m-d"));
        $this->db->limit(6);

        $seminar = $this->db->get();
        return $seminar;
    }

    public function getAllSeminarToday() {
        $this->db->select('seminar_ta.id, seminar_ta.judul, seminar_ta.tanggal, seminar_ta.jam, seminar_ta.nama_mahasiswa, kategori_seminar.nama');
        $this->db->from($this->table);
        $this->db->join('kategori_seminar', 'kategori_seminar.id = seminar_ta.kategori_seminar_id');
        $this->db->where('tanggal >=', date("Y-m-d"));

        $seminar = $this->db->get();
        return $seminar;
    }

    public function getPesertaBySeminar($id) {
        $this->db->select('*');
        $this->db->from('peserta_seminar');
        $this->db->where('seminar_id', $id);
        $peserta = $this->db->get();
        return $peserta;
    }

    public function getDetailSeminar($id, $nim = '',   $where = 'id') {
        // $this->db->select('peserta_seminar.id, peserta_seminar.kehadiran, seminar_ta.judul, seminar_ta.nama_mahasiswa, seminar_ta.tanggal, seminar_ta.jam, seminar_ta.ruangan');
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('dosen', 'seminar_ta.pembimbing_id = dosen.id');
        $this->db->where('seminar_ta.id', $id);

        if($nim !== '') {
            $this->db->where("seminar_ta.$where", $nim);
         }
        $seminar = $this->db->get()->row();
        return $seminar;
    }

    public function getDetailSeminar2($id, $nim = '', $where = 'id') {
        // $this->db->select('peserta_seminar.id, peserta_seminar.kehadiran, seminar_ta.judul, seminar_ta.nama_mahasiswa, seminar_ta.tanggal, seminar_ta.jam, seminar_ta.ruangan');
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('dosen', 'seminar_ta.penguji1_id = dosen.nidn');
        $this->db->where('seminar_ta.id', $id);

        if($nim !== '') {
            $this->db->where("seminar_ta.$where", $nim);
         }

        $seminar = $this->db->get()->row();
        return $seminar;
    }

    public function getDetailSeminar3( $id, $nim = '',  $where = 'id') {
        // $this->db->select('peserta_seminar.id, peserta_seminar.kehadiran, seminar_ta.judul, seminar_ta.nama_mahasiswa, seminar_ta.tanggal, seminar_ta.jam, seminar_ta.ruangan');
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('dosen', 'seminar_ta.penguji2_id = dosen.nidn');
        $this->db->where('seminar_ta.id', $id);

        if($nim !== '') {
            $this->db->where("seminar_ta.$where", $nim);
         }

        $seminar = $this->db->get()->row();
        return $seminar;
    }

    public function getDetailSeminar4( $id, $nim = '',  $where = 'id') {
        // $this->db->select('peserta_seminar.id, peserta_seminar.kehadiran, seminar_ta.judul, seminar_ta.nama_mahasiswa, seminar_ta.tanggal, seminar_ta.jam, seminar_ta.ruangan');
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('kategori_seminar', 'kategori_seminar.id = seminar_ta.kategori_seminar_id');
        $this->db->where('seminar_ta.id', $id);

        if($nim !== '') {
            $this->db->where("seminar_ta.$where", $nim);
         }
         
        $seminar = $this->db->get()->row();
        return $seminar;
    }

    // FACILITATOR
    public function getAllSeminarByNIM($nim, $operator = '') {
        $this->db->select('seminar_ta.id, seminar_ta.nim, seminar_ta.judul, seminar_ta.nama_mahasiswa, seminar_ta.tanggal, seminar_ta.jam, seminar_ta.ruangan, kategori_seminar.nama, seminar_ta.nilai_pembimbing, seminar_ta.nilai_penguji1, seminar_ta.nilai_penguji2');
        $this->db->join('kategori_seminar', 'kategori_seminar.id = seminar_ta.kategori_seminar_id');
        $this->db->where('nim', $nim);
        $this->db->where("tanggal $operator", date('Y-m-d'));

        return $this->db->get($this->table);
    }

}