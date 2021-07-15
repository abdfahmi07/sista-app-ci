<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facilitator extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('seminar_model');
		$this->load->model('dosen_model');
        $this->load->model('kategori_seminar_model');
        $this->load->model('detail_penilaian_model');
		$this->load->library('form_validation');
	}

	public function index()
	{   
		$data['title'] = 'Facilitator - Dashboard';
		$data['user'] = $this->user_model->checkUser($this->session->userdata('email'));
        $data['seminar_today'] = $this->seminar_model->getAllSeminarByNIM($data['user']['nim']);
        $data['seminar'] = $this->seminar_model->getAllSeminarByNIM($data['user']['nim'], '>');

        $this->load->view('components/sidebar', $data);
        $this->load->view('components/header');
		$this->load->view('pages/facilitator/index', $data);
		$this->load->view('components/modal_logout');
        $this->load->view('components/footer');
	}

	// SEMINAR
	public function list_seminar() {
		$data['title'] = 'Facilitator - Data Seminar';
        $data['user'] = $this->user_model->checkUser($this->session->userdata('email'));
        $data['seminar'] = $this->seminar_model->getAllSeminarByNIM($data['user']['nim'], '>=');
        
        $this->load->view('components/sidebar', $data);
        $this->load->view('components/header');
        $this->load->view('pages/facilitator/seminar/list', $data);
        $this->load->view('components/modal_logout');
        $this->load->view('components/footer');
	}

	public function tambah_seminar() {
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
            $data['title'] = 'Facilitator - Daftar Seminar Baru';
            $data['dosen'] = $this->dosen_model->getAll();
            $data['kategori'] = $this->kategori_seminar_model->getAll();
            $data['user'] = $this->user_model->checkUser($this->session->userdata('email'));

            $this->load->view('components/sidebar', $data);
            $this->load->view('components/header');
            $this->load->view('pages/facilitator/seminar/tambah', $data);
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
            redirect('facilitator/list_seminar');
    }
    }

	public function detail_seminar($id) {
		$data['title'] = 'Facilitator - Detail Seminar';
		$data['user'] = $this->user_model->checkUser($this->session->userdata('email'));
		$data['seminar_with_pembimbing'] = $this->seminar_model->getDetailSeminar( $id, $data['user']['nim'], 'nim');
		$data['seminar_with_penguji1'] = $this->seminar_model->getDetailSeminar2( $id,$data['user']['nim'], 'nim');
		$data['seminar_with_penguji2'] = $this->seminar_model->getDetailSeminar3( $id,$data['user']['nim'],'nim');
		$data['seminar_with_kategori'] = $this->seminar_model->getDetailSeminar4( $id,$data['user']['nim'],'nim');
	
	
		$this->load->view('components/sidebar', $data);
		$this->load->view('components/header');
		$this->load->view('pages/facilitator/seminar/detail', $data);
		$this->load->view('components/modal_logout');
		$this->load->view('components/footer');
	}


	// PENILAIAN
	public function list_nilai() {
			$data['title'] = 'Facilitator - Data Penilaian';
			$data['user'] = $this->user_model->checkUser($this->session->userdata('email'));
			$data['penilaian'] = $this->detail_penilaian_model->getAll($data['user']['nim']);
	
			$this->load->view('components/sidebar', $data);
			$this->load->view('components/header');
			$this->load->view('pages/facilitator/penilaian/list', $data);
			$this->load->view('components/modal_logout');
			$this->load->view('components/footer');
		}

		public function detail_nilai($id_penilaian) {
			$data['title'] = 'Facilitator - Detail Penilaian';
			$data['user'] = $this->user_model->checkUser($this->session->userdata('email'));
			$data['penilaian_with_kategori'] = $this->detail_penilaian_model->getDetailWithKategori($id_penilaian, $data['user']['nim']);
			$data['penilaian_with_dosen'] = $this->detail_penilaian_model->getDetailWithDosen($id_penilaian, $data['user']['nim']);
		
		
			$this->load->view('components/sidebar', $data);
			$this->load->view('components/header');
			$this->load->view('pages/facilitator/penilaian/detail', $data);
			$this->load->view('components/modal_logout');
			$this->load->view('components/footer');
		}

}