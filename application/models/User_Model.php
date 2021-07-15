<?php 

class User_Model extends CI_Model {
    
    private $table = 'users';

    public function insertUser($data) {
        $this->db->insert($this->table, $data);
    }
    
    public function checkUser($email) {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('users_role', 'users_role.id = '. $this->table .' .role_id');
        $this->db->where('users.email', $email);
        $user = $this->db->get()->row_array();
        
        return $user;
    }
    
    // GET DATA MAHASISWA FROM TABLE USER
    public function getAllMahasiswa() {
        $this->db->select('users.id, users_role.role, users.name, users.nim, users.email, users.role_id');
        $this->db->from($this->table);
        $this->db->join('users_role', 'users_role.id = users.role_id');
        $this->db->where('role_id !=', 1);
        $mahasiswa = $this->db->get();

        return $mahasiswa;
    }

    // DELETE DATA MAHASISWA FROM TABLE USER
    public function delete($id) {
        return $this->db->delete($this->table, ["id" => $id]);
    }

    // GET DATA BY ID MAHASISWA FROM TABLE USER
    public function getById($id)
    {
        return $this->db->get_where($this->table, ["id" => $id])->row();
    }

    // UPDATE DATA MAHASISWA FROM TABLE USER
    public function update($data,$id)
    {
        return $this->db->update($this->table, $data, ['id' => $id]);
    }
    
}

?>