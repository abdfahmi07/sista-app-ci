<?php 

class Kategori_Seminar_Model extends CI_Model {
    
    private $table = 'kategori_seminar';
    
    public function getAll() {
        $kategori = $this->db->get($this->table);
        return $kategori;
    }

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
}