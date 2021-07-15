<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('user_model');
		$this->load->model('user_role_model');
	}

	public function index()
	{ 
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if($this->form_validation->run() == false) {
			$data['title'] = 'Login Page';
			$this->load->view('components/auth/header', $data);
			$this->load->view('pages/auth/login');
			$this->load->view('components/auth/footer');
		}  else {
			$this->_login();
		}

	}

	private function _login() {
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->user_model->checkUser($email);


		if($user) {
			if(password_verify($password, $user['password'])) {
				$data = [
					'name' => $user['name'],
					'email' => $user['email']
				];
				
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button> Selamat Datang, ' . $user['role'] . '</div>');
				$this->session->set_userdata($data);
				
				if($user['role_id'] == 1) {
					redirect('dashboard');
				} else if($user['role_id'] == 2) {
					redirect('facilitator');
				} else {
					redirect('home');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					Wrong password!
				</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Email is not registered!
			</div>');
			redirect('auth');
		}

	}

    public function registration() {

        // Set Validation
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('nim', 'NIM', 'required|trim|is_unique[users.nim]');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', [
			'is_unique' => 'This email has already registered!'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
			"matches" => "Password don't match!",
			"min_length" => 'Password too short!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
		// $this->form_validation->set_rules('role', 'Password', 'required|trim|matches[password1]');
		
		// Check Condition of Validation
		if($this->form_validation->run() == false) {
			$data['title'] = 'Register Page';
			$data['user_role'] = $this->user_role_model->getAll();

			$this->load->view('components/auth/header', $data);
			$this->load->view('pages/auth/register', $data);
			$this->load->view('components/auth/footer');
		}
		 else {
			$data = [
				'name' => htmlspecialchars( $this->input->post('name', true)),
				'nim' => htmlspecialchars( $this->input->post('nim', true)),
				'image_url' => 'default.jpg',
				'email' =>  htmlspecialchars($this->input->post('email', true)),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 3,
				'date_created' => date("Y-m-d H:i:s")
			];
			$this->user_model->insertUser($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Congratulation! Your account has been created. <br> Please Login</div>');
			redirect('auth');
		 }
		}

		public function logout() {
			$this->session->unset_userdata('email');
			$this->session->unset_userdata('name');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			You have been logged out!</div>');
			redirect('auth');
		}
}