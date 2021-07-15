<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('dosen_model');
		$this->load->library('form_validation');
	}
    
    public function index() {
        $data['title'] = 'Data Dosen';
        $data['dosen'] = $this->dosen_model->getAll();
        $data['counting'] = $this->dosen_model->getCount();
        $data['user'] = $this->user_model->checkUser($this->session->userdata('email'));
        

        $this->load->view('components/sidebar', $data);
        $this->load->view('components/header');
        $this->load->view('pages/admin/dosen/list', $data);
        $this->load->view('components/modal_logout');
        $this->load->view('components/footer');
    }

    public function tambah() {
        $this->form_validation->set_rules('nidn', 'NIDN', 'required|trim|is_unique[dosen.nidn]', [
            'is_unique' => 'This nidn has already exist!'
        ]);
        $this->form_validation->set_rules('name', 'Nama Dosen', 'required|trim');

        if($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Data Dosen';
            $data['user'] = $this->user_model->checkUser($this->session->userdata('email'));

            $this->load->view('components/sidebar', $data);
            $this->load->view('components/header');
            $this->load->view('pages/admin/dosen/tambah');
            $this->load->view('components/modal_logout');
            $this->load->view('components/footer');
        }  else {
            $data = [
                'nidn' =>  htmlspecialchars($this->input->post('nidn', true)),
                'nama' => htmlspecialchars( $this->input->post('name', true)),
            ];
            $this->dosen_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            New data has been added.</div>');
            redirect('dosen');
    }
    }

    public function edit($id) {
        $data['dosen'] = $this->dosen_model->getById($id);
        $data['title'] = 'Edit Data Dosen';
        $data['user'] = $this->user_model->checkUser($this->session->userdata('email'));

        $this->load->view('components/sidebar', $data);
        $this->load->view('components/header');
        $this->load->view('pages/admin/dosen/edit', $data);
        $this->load->view('components/modal_logout');
        $this->load->view('components/footer');
    }

    public function update() {
        $this->form_validation->set_rules('nidn', 'NIDN', 'required|trim');
        $this->form_validation->set_rules('name', 'Nama Dosen', 'required|trim');

        if($this->form_validation->run() == false) {
            $id_dosen = $this->input->post('id', true);
            $data['dosen'] = $this->dosen_model->getById($id_dosen);
            $data['title'] = 'Edit Data Dosen';
            $data['user'] = $this->user_model->checkUser($this->session->userdata('email'));

            $this->load->view('components/sidebar', $data);
            $this->load->view('components/header');
            $this->load->view('pages/admin/dosen/edit', $data);
            $this->load->view('components/modal_logout');
            $this->load->view('components/footer');
    } else {
        $id_dosen = $this->input->post('id', true);
        $data = [
            'nidn' =>  htmlspecialchars($this->input->post('nidn', true)),
            'nama' => htmlspecialchars( $this->input->post('name', true)),
        ];
        $this->dosen_model->update($data, $id_dosen);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data has been updated.</div>');
        redirect('dosen');
    }
    }

    public function delete($id) {
        $this->dosen_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data has been deleted.</div>');
        redirect('dosen');
    }
}