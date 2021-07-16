<?php 

class Dosen_Model extends CI_Model {
    
    private $table = 'dosen';

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
        $this->db->order_by('nama', 'ASC');
        $dosen = $this->db->get($this->table);
        return $dosen;
    }

    public function getCount() {
        $total = $this->getAll();
        return $total->num_rows();
    }
}

?>