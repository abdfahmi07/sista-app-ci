<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seminar extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
        $this->load->model('seminar_model');
		$this->load->model('user_model');
        $this->load->model('dosen_model');
        $this->load->model('kategori_seminar_model');
		$this->load->library('form_validation');
	}
    
    // ADMIN
    public function index() {
        $data['title'] = 'Data Seminar';
        $data['user'] = $this->user_model->checkUser($this->session->userdata('email'));
        $data['seminar'] = $this->seminar_model->getAll();
        
        $this->load->view('components/sidebar', $data);
        $this->load->view('components/header');
        $this->load->view('pages/admin/seminar/list', $data);
        $this->load->view('components/modal_logout');
        $this->load->view('components/footer');
    }


    public function tambah() {
        $this->form_validation->set_rules('nim', 'NIM', 'required|trim');
        $this->form_validation->set_rules('name', 'Nama Mahasiswa', 'required|trim');
        $this->form_validation->set_rules('prodi', 'Prodi', 'required|trim');
        $this->form_validation->set_rules('semester', 'Semester', 'required|trim');
        $this->form_validation->set_rules('date_of_seminar', 'Tanggal Seminar', 'required|trim');
        $this->form_validation->set_rules('time_of_seminar', 'Waktu Seminar', 'required|trim');
        $this->form_validation->set_rules('ruangan', 'Ruangan', 'required|trim');
        $this->form_validation->set_rules('title', 'Judul TA', 'required|trim');
        $this->form_validation->set_rules('seminar', 'Seminar', 'required|trim');
        $this->form_validation->set_rules('pembimbing', 'Pembimbing', 'required|trim');
        $this->form_validation->set_rules('penguji1', 'Penguji 1', 'required|trim');
        $this->form_validation->set_rules('penguji2', 'Penguji 2', 'required|trim');


        if($this->form_validation->run() == false) {
            $data['title'] = 'Daftar Seminar Baru';
            $data['dosen'] = $this->dosen_model->getAll();
            $data['kategori'] = $this->kategori_seminar_model->getAll();
            $data['user'] = $this->user_model->checkUser($this->session->userdata('email'));

            $this->load->view('components/sidebar', $data);
            $this->load->view('components/header');
            $this->load->view('pages/admin/seminar/tambah', $data);
            $this->load->view('components/modal_logout');
            $this->load->view('components/footer');
        } else {
            $data = [
                'nim' =>  htmlspecialchars($this->input->post('nim', true)),
                'nama_mahasiswa' => htmlspecialchars( $this->input->post('name', true)),
                'prodi' => htmlspecialchars( $this->input->post('prodi', true)),
                'semester' => htmlspecialchars( $this->input->post('semester', true)),
                'tanggal' => htmlspecialchars( $this->input->post('date_of_seminar', true)),
                'jam' => htmlspecialchars( $this->input->post('time_of_seminar', true)),
                'ruangan' => htmlspecialchars( $this->input->post('ruangan', true)),
                'judul' => htmlspecialchars( $this->input->post('title', true)),
                'kategori_seminar_id' => htmlspecialchars( $this->input->post('seminar', true)),
                'pembimbing_id' => htmlspecialchars( $this->input->post('pembimbing', true)),
                'penguji1_id' => htmlspecialchars( $this->input->post('penguji1', true)),
                'penguji2_id' => htmlspecialchars( $this->input->post('penguji2', true)),
                'nilai_pembimbing' => 0,
                'nilai_penguji1' => 0,
                'nilai_penguji2' => 0,
                'nilai_akhir' => 0
            ];
            $this->seminar_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            New data has been added.</div>');
            redirect('seminar');
    }
    }

    public function edit($id) {
        $data['title'] = 'Edit Data Seminar';
        $data['seminar'] = $this->seminar_model->getById($id);
        $data['dosen'] = $this->dosen_model->getAll();
        $data['kategori'] = $this->kategori_seminar_model->getAll();
        $data['user'] = $this->user_model->checkUser($this->session->userdata('email'));

        $this->load->view('components/sidebar', $data);
        $this->load->view('components/header');
        $this->load->view('pages/admin/seminar/edit', $data);
        $this->load->view('components/modal_logout');
        $this->load->view('components/footer');
    }


    public function penilaian($id) {
        $data['seminar'] = $this->seminar_model->getById($id);
        $data['title'] = 'Penilaian Seminar';
        $data['user'] = $this->user_model->checkUser($this->session->userdata('email'));


        $this->load->view('components/sidebar', $data);
        $this->load->view('components/header');
        $this->load->view('pages/admin/seminar/penilaian', $data);
        $this->load->view('components/modal_logout');
        $this->load->view('components/footer');
}

public function delete($id) {
    $this->seminar_model->delete($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data has been deleted.</div>');
    redirect('seminar');
    
}

public function update() {
    $this->form_validation->set_rules('nim', 'NIM', 'required|trim');
        $this->form_validation->set_rules('name', 'Nama Mahasiswa', 'required|trim');
        $this->form_validation->set_rules('prodi', 'Prodi', 'required|trim');
        $this->form_validation->set_rules('semester', 'Semester', 'required|trim');
        $this->form_validation->set_rules('date_of_seminar', 'Tanggal Seminar', 'required|trim');
        $this->form_validation->set_rules('time_of_seminar', 'Waktu Seminar', 'required|trim');
        $this->form_validation->set_rules('ruangan', 'Ruangan', 'required|trim');
        $this->form_validation->set_rules('title', 'Judul TA', 'required|trim');
        $this->form_validation->set_rules('seminar', 'Seminar', 'required|trim');
        $this->form_validation->set_rules('pembimbing', 'Pembimbing', 'required|trim');
        $this->form_validation->set_rules('penguji1', 'Penguji 1', 'required|trim');
        $this->form_validation->set_rules('penguji2', 'Penguji 2', 'required|trim');

    if($this->form_validation->run() == false) {
        $data['title'] = 'Edit Data Seminar';
        $data['dosen'] = $this->dosen_model->getAll();
        $data['kategori'] = $this->kategori_seminar_model->getAll();
        $data['user'] = $this->user_model->checkUser($this->session->userdata('email'));

        $this->load->view('components/sidebar', $data);
        $this->load->view('components/header');
        $this->load->view('pages/admin/seminar/edit', $data);
        $this->load->view('components/modal_logout');
        $this->load->view('components/footer');
} else {
    $id_seminar = $this->input->post('id', true);
    $data = [
        'nim' =>  htmlspecialchars($this->input->post('nim', true)),
        'nama_mahasiswa' => htmlspecialchars( $this->input->post('name', true)),
        'prodi' => htmlspecialchars( $this->input->post('prodi', true)),
        'semester' => htmlspecialchars( $this->input->post('semester', true)),
        'tanggal' => htmlspecialchars( $this->input->post('date_of_seminar', true)),
        'jam' => htmlspecialchars( $this->input->post('time_of_seminar', true)),
        'ruangan' => htmlspecialchars( $this->input->post('ruangan', true)),
        'judul' => htmlspecialchars( $this->input->post('title', true)),
        'kategori_seminar_id' => htmlspecialchars( $this->input->post('seminar', true)),
        'pembimbing_id' => htmlspecialchars( $this->input->post('pembimbing', true)),
        'penguji1_id' => htmlspecialchars( $this->input->post('penguji1', true)),
        'penguji2_id' => htmlspecialchars( $this->input->post('penguji2', true)),
    ];
    $this->seminar_model->update($data, $id_seminar);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data has been updated.</div>');
    redirect('seminar');
    
}
}
public function detail($id_seminar) {
    $data['title'] = 'Detail Seminar';
    $data['user'] = $this->user_model->checkUser($this->session->userdata('email'));
    $data['seminar_with_pembimbing'] = $this->seminar_model->getDetailSeminar($id_seminar);
    $data['seminar_with_penguji1'] = $this->seminar_model->getDetailSeminar2($id_seminar);
    $data['seminar_with_penguji2'] = $this->seminar_model->getDetailSeminar3($id_seminar);
    $data['seminar_with_kategori'] = $this->seminar_model->getDetailSeminar4($id_seminar);


    $this->load->view('components/sidebar', $data);
    $this->load->view('components/header');
    $this->load->view('pages/admin/seminar/detail', $data);
    $this->load->view('components/modal_logout');
    $this->load->view('components/footer');
}

public function input_nilai() {
    $this->form_validation->set_rules('nilai_pembimbing', 'Nilai Pembimbing', 'required|trim');
    $this->form_validation->set_rules('nilai_penguji1', 'Nilai Penguji 1', 'required|trim');
    $this->form_validation->set_rules('nilai_penguji2', 'Nilai Penguji 2', 'required|trim');


    if($this->form_validation->run() == false) {
        $id_seminar = $this->input->post('id', true);
        $data['seminar'] = $this->seminar_model->getById($id_seminar);
        $data['title'] = 'Penilaian Seminar';
        $data['user'] = $this->user_model->checkUser($this->session->userdata('email'));

        $this->load->view('components/sidebar', $data);
        $this->load->view('components/header');
        $this->load->view('pages/admin/seminar/penilaian', $data);
        $this->load->view('components/modal_logout');
        $this->load->view('components/footer');
} else {
    $id_seminar = $this->input->post('id', true);
    $data = [
        'nilai_pembimbing' =>  htmlspecialchars($this->input->post('nilai_pembimbing', true)),
        'nilai_penguji1' => htmlspecialchars($this->input->post('nilai_penguji1', true)),
        'nilai_penguji2' => htmlspecialchars($this->input->post('nilai_penguji2', true)),
        'nilai_akhir' => round(($this->input->post('nilai_pembimbing') + $this->input->post('nilai_penguji1') + $this->input->post('nilai_penguji2')) / 3)
    ];
    $this->seminar_model->update($data, $id_seminar);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data has been updated.</div>');
    redirect('seminar');
}
}

public function peserta($id) {
    $data['title'] = 'Data Peserta Seminar';
    $data['peserta'] = $this->seminar_model->getPesertaBySeminar($id);
    $data['seminar'] = $this->seminar_model->getById($id);
    $data['user'] = $this->user_model->checkUser($this->session->userdata('email'));


    $this->load->view('components/sidebar', $data);
    $this->load->view('components/header');
    $this->load->view('pages/admin/seminar/peserta/list', $data);
    $this->load->view('components/modal_logout');
    $this->load->view('components/footer');
    
}

}